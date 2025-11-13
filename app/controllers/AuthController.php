<?php
require_once __DIR__ . "/../services/AuthService.php";

class AuthController {
    private $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    // Xử lý Đăng nhập (cho cả Admin và Khách hàng)
    public function login() {
        $username = $_POST['ten_dang_nhap'] ?? ''; // Khớp với name="ten_dang_nhap" trong form
        $password = $_POST['mat_khau'] ?? '';      // Khớp với name="mat_khau"

        // Gọi Service xử lý
        // Lưu ý: AuthService của bạn hiện tại đang xử lý loginAdmin.
        // Bạn cần mở rộng AuthService để xử lý loginCustomer nếu muốn tách biệt,
        // hoặc dùng chung logic kiểm tra bảng users/khachhang.
        // Ở đây mình giả định bạn dùng chung hàm loginAdmin cho Admin
        
        $result = $this->authService->loginAdmin($username, $password);
        
        // Trả về JSON để JS xử lý chuyển hướng hoặc hiện lỗi
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    // Xử lý Đăng ký (Khách hàng)
    public function register() {
        $fullname = trim($_POST['ho_ten'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['mat_khau_reg'] ?? '';
        $confirmPassword = $_POST['xac_nhan_mat_khau'] ?? '';

        if ($password !== $confirmPassword) {
            echo json_encode(['success' => false, 'message' => 'Mật khẩu xác nhận không khớp!']);
            return;
        }

        // Gọi Service đăng ký (Bạn cần thêm hàm registerCustomer vào AuthService)
        // Giả sử hàm này trả về ['success' => true/false, 'message' => '...']
        $result = $this->authService->registerCustomer($fullname, $email, $password);

        header('Content-Type: application/json');
        echo json_encode($result);
    }
    
    public function logout() {
        $result = $this->authService->logout();
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
?>