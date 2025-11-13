<?php
require_once __DIR__ . "/../../config/session.php";
require_once __DIR__ . "/../repositories/UserRepository.php";

class AuthService {
    private $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    public function loginAdmin($username, $password) {
        // 1. Tìm user (Lấy về object User)
        $user = $this->userRepo->getUserByUsername($username);

        // 2. Kiểm tra: Có user không?
        if (!$user) {
            return ['success' => false, 'message' => 'Tên đăng nhập không tồn tại!'];
        }

        // 3. Kiểm tra mật khẩu (Dùng ->mat_khau thay vì ['mat_khau'])
        if (md5($password) !== $user->mat_khau) {
            return ['success' => false, 'message' => 'Mật khẩu không đúng!'];
        }

        // 4. Lưu vào Session (Dùng -> thay vì [])
        $_SESSION['is_admin'] = true;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->ho_ten;
        $_SESSION['user_role'] = $user->quyen;

        return [
            'success' => true, 
            'message' => 'Đăng nhập thành công!', 
            // Đường dẫn chuyển hướng (Lưu ý đường dẫn này phải đúng với cấu trúc thư mục của bạn)
            'redirect' => '/shop_mvc/app/views/admin/dashboard.php'
        ];
    }
    // [MỚI] Hàm đăng ký khách hàng
    public function registerCustomer($fullname, $email, $password) {
        // 1. Kiểm tra email tồn tại (Cần thêm hàm checkEmail trong Repo)
        // if ($this->customerRepo->existsByEmail($email)) { ... }

        // 2. Hash mật khẩu (MD5 theo yêu cầu của bạn)
        $hashed_password = md5($password);

        // 3. Lưu vào CSDL (Cần thêm hàm create trong Repo)
        // $result = $this->customerRepo->create($fullname, $email, $hashed_password);
        
        // Tạm thời trả về true để demo luồng
        return ['success' => true, 'message' => 'Đăng ký thành công! Vui lòng đăng nhập.'];
    }
    public function logout() {
        session_unset();
        session_destroy();
        return ['success' => true, 'message' => 'Đã đăng xuất!'];
    }
}
?>