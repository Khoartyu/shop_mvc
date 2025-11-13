<?php
// Tệp: /app/controllers/AdminController.php

require_once __DIR__ . '/../services/AdminService.php';

class AdminController {
    private $adminService;

    public function __construct() {
        $this->adminService = new AdminService();
    }

    // API trả về số liệu KPI (Doanh thu, Đơn chờ, Cảnh báo)
    public function getDashboardData() {
        $kpis = $this->adminService->getDashboardKPIs();
        header('Content-Type: application/json');
        echo json_encode($kpis);
    }

    // API trả về danh sách sản phẩm
    public function getProductList() {
        $products = $this->adminService->getProductsList();
        header('Content-Type: application/json');
        echo json_encode($products);
    }
}
?>