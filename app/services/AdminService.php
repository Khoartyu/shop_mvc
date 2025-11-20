<?php
// Tệp: /app/services/AdminService.php

// Import Repository vào thay vì import Database trực tiếp
require_once __DIR__ . '/../repositories/AdminRepository.php';

class AdminService {
    private $adminRepo;

    public function __construct() {
        // Khởi tạo Repository để nhờ nó lấy dữ liệu
        $this->adminRepo = new AdminRepository();
    }

    /**
     * 1. Lấy số liệu thống kê KPI cho Dashboard
     * Logic: Gọi các hàm nhỏ từ Repo và gom lại thành 1 mảng
     */
    public function getDashboardKPIs() {
        // a. Lấy doanh thu hôm nay (Logic ngày tháng nằm ở đây)
        $today = date('Y-m-d'); // Lấy ngày hiện tại của PHP
        $revenue = $this->adminRepo->getRevenueByDate($today);

        // b. Đếm đơn chờ xử lý
        $pending = $this->adminRepo->countOrdersByStatus('Chờ xử lý');

        // c. Đếm cảnh báo tồn kho (Logic < 10 nằm ở đây, dễ dàng sửa thành 5 hay 20)
        $alerts = $this->adminRepo->countLowStockVariants(10);

        // Trả về định dạng Frontend cần
        return [
            'revenueToday' => (float)$revenue,
            'ordersPending' => (int)$pending,
            'stockAlerts' => (int)$alerts
        ];
    }

    /**
     * 2. Lấy danh sách sản phẩm và format dữ liệu
     * Logic: Lấy dữ liệu thô từ Repo -> Format lại tên cột, xử lý null
     */
    public function getProductsList() {
        // Bước 1: Lấy dữ liệu thô
        $rawProducts = $this->adminRepo->getAllProductsRaw();

        // Bước 2: Format dữ liệu (Logic nghiệp vụ)
        return array_map(function($p) {
            return [
                'id' => $p['id'],
                'name' => $p['name'],
                // Logic xử lý nếu danh mục bị xóa hoặc null
                'category' => $p['category'] ?? 'Chưa phân loại', 
                'basePrice' => $p['min_price'],
                'totalStock' => $p['total_stock'],
                'variantCount' => $p['variant_count'],
                'variants' => [] // Placeholder cho frontend
            ];
        }, $rawProducts);
    }
}
?>