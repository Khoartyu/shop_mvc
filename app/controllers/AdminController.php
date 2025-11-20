<?php
require_once __DIR__ . '/../repositories/AdminRepository.php';

class AdminController {
    private $adminRepo;

    public function __construct() {
        $this->adminRepo = new AdminRepository();
    }

    // Helper: Trả về JSON
    private function sendJson($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getDashboardData() {
        $this->sendJson($this->adminRepo->getKPIs());
    }

    public function getProductList() {
        $this->sendJson($this->adminRepo->getAllProducts());
    }

    public function getCategoryList() {
        $this->sendJson($this->adminRepo->getAllCategories());
    }

    public function getAttributeList() {
        $this->sendJson($this->adminRepo->getAllAttributes());
    }

    public function getOrderList() {
        $this->sendJson($this->adminRepo->getAllOrders());
    }

    public function getCustomerList() {
        $this->sendJson($this->adminRepo->getAllCustomers());
    }

    public function getUserList() {
        $this->sendJson($this->adminRepo->getAllUsers());
    }
}
?>