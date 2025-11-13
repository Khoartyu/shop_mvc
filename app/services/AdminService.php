<?php
// Tệp: /app/services/AdminService.php

require_once __DIR__ . '/../../config/database.php';

class AdminService {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    /**
     * 1. Lấy số liệu thống kê KPI cho Dashboard
     */
    public function getDashboardKPIs() {
        // a. Tính tổng doanh thu hôm nay
        // (Chỉ tính đơn 'Đã giao' hoặc cả đơn mới tùy bạn, ở đây mình tính tất cả trừ 'Đã hủy')
        $sqlRevenue = "SELECT SUM(tong_tien) as revenue 
                       FROM donhang 
                       WHERE DATE(ngay_dat) = CURDATE() AND trang_thai != 'Đã hủy'";
        $stmt = $this->conn->prepare($sqlRevenue);
        $stmt->execute();
        $revenue = $stmt->fetch(PDO::FETCH_ASSOC)['revenue'] ?? 0;

        // b. Đếm đơn hàng đang chờ xử lý
        $sqlPending = "SELECT COUNT(*) as pending FROM donhang WHERE trang_thai = 'Chờ xử lý'";
        $stmt = $this->conn->prepare($sqlPending);
        $stmt->execute();
        $pending = $stmt->fetch(PDO::FETCH_ASSOC)['pending'] ?? 0;

        // c. Cảnh báo tồn kho (Đếm số biến thể có tồn kho < 10)
        $sqlAlerts = "SELECT COUNT(*) as alerts FROM bienthe_sanpham WHERE so_luong_ton < 10";
        $stmt = $this->conn->prepare($sqlAlerts);
        $stmt->execute();
        $alerts = $stmt->fetch(PDO::FETCH_ASSOC)['alerts'] ?? 0;

        return [
            'revenueToday' => (float)$revenue,
            'ordersPending' => (int)$pending,
            'stockAlerts' => (int)$alerts
        ];
    }

    /**
     * 2. Lấy danh sách sản phẩm (kèm thống kê biến thể) cho trang Quản lý SP
     */
    public function getProductsList() {
        // Câu này hơi phức tạp: JOIN bảng sản phẩm với danh mục và tính tổng tồn kho từ biến thể
        $sql = "
            SELECT 
                s.id, 
                s.ten_san_pham as name, 
                d.ten_danhmuc as category,
                COUNT(b.id) as variant_count,
                IFNULL(SUM(b.so_luong_ton), 0) as total_stock,
                IFNULL(MIN(b.gia), 0) as min_price
            FROM sanpham s
            LEFT JOIN danhmuc d ON s.danhmuc_id = d.id
            LEFT JOIN bienthe_sanpham b ON s.id = b.sanpham_id
            GROUP BY s.id
            ORDER BY s.id DESC
        ";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Format lại dữ liệu để khớp với Frontend của bạn
        // (Frontend đang chờ mảng 'variants' bên trong mỗi product, ta tạm để rỗng để load sau)
        return array_map(function($p) {
            return [
                'id' => $p['id'],
                'name' => $p['name'],
                'category' => $p['category'] ?? 'Chưa phân loại',
                'basePrice' => $p['min_price'],
                'totalStock' => $p['total_stock'],
                'variantCount' => $p['variant_count'],
                'variants' => [] // Chúng ta sẽ làm tính năng "Xem chi tiết" để load cái này sau
            ];
        }, $products);
    }
}
?>