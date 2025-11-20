<?php
// File: app/controllers/ShopAuthController.php
require_once __DIR__ . '/../services/CustomerService.php';

class ShopAuthController {
    private $customerService;

    public function __construct() {
        $this->customerService = new CustomerService();
    }

    // Xử lý Đăng nhập
    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập email và mật khẩu']);
            return;
        }

        // Gọi Service để kiểm tra (Hàm login này bạn đã thêm ở bước trước)
        $result = $this->customerService->login($email, $password);
        echo json_encode($result);
    }

    // Xử lý Đăng ký
    public function register() {
        $fullname = $_POST['fullname'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';

        if (empty($email) || empty($password) || empty($fullname)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ thông tin bắt buộc']);
            return;
        }

        // Gọi Service tạo khách hàng mới
        $result = $this->customerService->create($fullname, $email, $password, $phone, $address);
        echo json_encode($result);
    }

    // Xử lý Đăng xuất
    public function logout() {
        // Xóa session khách hàng
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['customer_email']);
        
        echo json_encode(['success' => true, 'message' => 'Đã đăng xuất']);
    }

    // Kiểm tra trạng thái
    public function checkStatus() {
        if (isset($_SESSION['customer_id'])) {
            echo json_encode(['logged_in' => true, 'user' => $_SESSION['customer_name']]);
        } else {
            echo json_encode(['logged_in' => false]);
        }
    }
}
?>