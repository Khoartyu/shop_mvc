<?php
// Tệp: /app/repositories/AdminRepository.php

require_once __DIR__ . '/../../config/database.php';

class AdminRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // 1. SQL lấy tổng doanh thu theo ngày
    public function getRevenueByDate($dateStr) {
        // Sử dụng tham số date để linh hoạt hơn, nhưng logic SQL vẫn giữ nguyên
        $sql = "SELECT SUM(tong_tien) as revenue 
                FROM donhang 
                WHERE DATE(ngay_dat) = :dateStr AND trang_thai != 'Đã hủy'";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['dateStr' => $dateStr]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['revenue'] ?? 0;
    }

    // 2. SQL đếm đơn hàng theo trạng thái
    public function countOrdersByStatus($status) {
        $sql = "SELECT COUNT(*) as count FROM donhang WHERE trang_thai = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['status' => $status]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'] ?? 0;
    }

    // 3. SQL đếm số lượng biến thể sắp hết hàng
    public function countLowStockVariants($limit) {
        $sql = "SELECT COUNT(*) as alerts FROM bienthe_sanpham WHERE so_luong_ton < :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['limit' => $limit]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['alerts'] ?? 0;
    }

    // 4. SQL lấy danh sách sản phẩm thô (chưa format)
    public function getAllProductsRaw() {
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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>