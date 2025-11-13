<?php
require_once __DIR__ . "/../../config/session.php";

class AuthMiddleware {

    // 1. Hàm bắt buộc phải Đăng nhập (Dùng ở đầu trang dashboard, products...)
    public static function requireLogin() {
        if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
            // Chưa đăng nhập -> Đá về trang login
            header('Location: /shop_mvc/app/views/admin/login.php');
            exit();
        }
    }

    // 2. Hàm kiểm tra có phải là 'Quản trị viên' không (Dùng để ẩn/hiện nút)
    public static function isAdmin() {
        return (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'Quản trị viên');
    }

    // 3. Hàm chặn API nếu không phải Admin (Dùng trong SanPhamController)
    public static function checkAdminApi() {
        if (!self::isAdmin()) {
            header('Content-Type: application/json');
            http_response_code(403);
            echo json_encode(['thanhcong' => false, 'thongbao' => 'Bạn không có quyền thực hiện hành động này!']);
            exit();
        }
    }
}
?>