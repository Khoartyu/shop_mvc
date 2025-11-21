<?php
// services/UserService.php
require_once __DIR__ . '/../repositories/UserRepository.php';

class UserService {
    private $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    public function getAllUsers() {
        return $this->userRepo->getAllUsers();
    }

    public function getUserById($id) {
        return $this->userRepo->getUserById($id);
    }

    // Logic tạo tài khoản
    public function createUser($ten_dang_nhap, $mat_khau, $ho_ten, $quyen) {
        // 1. Check trùng username
        if ($this->userRepo->getUserByUsername($ten_dang_nhap)) {
            return ['success' => false, 'message' => 'Tên đăng nhập đã tồn tại!'];
        }

        // 2. Mã hóa mật khẩu (Khuyên dùng password_hash thay vì MD5)
        // Nếu bạn muốn giữ hệ thống cũ dùng MD5 thì thay bằng: $hash = md5($mat_khau);
        $hash = md5($mat_khau);

        // 3. Lưu
        if ($this->userRepo->createUser($ten_dang_nhap, $hash, $ho_ten, $quyen)) {
            return ['success' => true, 'message' => 'Tạo tài khoản thành công'];
        }
        return ['success' => false, 'message' => 'Lỗi hệ thống'];
    }

    // Logic cập nhật thông tin
    public function updateUser($id, $ho_ten, $quyen, $mat_khau_moi = null) {
        // Cập nhật thông tin cơ bản
        $this->userRepo->updateUser($id, $ho_ten, $quyen);

        // Nếu có nhập mật khẩu mới thì cập nhật mật khẩu
        if (!empty($mat_khau_moi)) {
            $hash = md5($mat_khau_moi);
            $this->userRepo->updatePassword($id, $hash);
        }

        return ['success' => true, 'message' => 'Cập nhật thành công'];
    }

    public function deleteUser($id) {
        // Có thể thêm check: Không cho xóa chính mình hoặc xóa Super Admin
        if ($this->userRepo->deleteUser($id)) {
            return ['success' => true, 'message' => 'Xóa thành công'];
        }
        return ['success' => false, 'message' => 'Lỗi khi xóa'];
    }
}
?>