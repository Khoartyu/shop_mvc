<?php
// repositories/UserRepository.php
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../../config/database.php";

class UserRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // 1. Lấy tất cả user (để hiển thị lên bảng Dashboard)
    public function getAllUsers() {
        $query = "SELECT * FROM users ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $users = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User(
                $row['id'],
                $row['ten_dang_nhap'],
                $row['mat_khau'], // Lưu ý: Password này đã mã hóa
                $row['ho_ten'],
                $row['quyen']
            );
        }
        return $users;
    }

    // 2. Tìm user theo ID (để lấy thông tin khi bấm Sửa)
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new User(
                $row['id'],
                $row['ten_dang_nhap'],
                $row['mat_khau'],
                $row['ho_ten'],
                $row['quyen']
            );
        }
        return null;
    }

    // 3. Tìm user theo tên đăng nhập (Giữ nguyên code cũ của bạn)
    public function getUserByUsername($username) {
        $query = "SELECT * FROM users WHERE ten_dang_nhap = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new User(
                $row['id'],
                $row['ten_dang_nhap'],
                $row['mat_khau'],
                $row['ho_ten'],
                $row['quyen']
            );
        }
        return null;
    }

    // 4. Thêm user mới (Nhận mật khẩu đã được mã hóa từ Service)
    public function createUser($ten_dang_nhap, $mat_khau_hash, $ho_ten, $quyen) {
        $query = "INSERT INTO users (ten_dang_nhap, mat_khau, ho_ten, quyen) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ten_dang_nhap, $mat_khau_hash, $ho_ten, $quyen]);
    }

    // 5. Cập nhật thông tin (Không cập nhật mật khẩu ở hàm này)
    public function updateUser($id, $ho_ten, $quyen) {
        $query = "UPDATE users SET ho_ten = ?, quyen = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ho_ten, $quyen, $id]);
    }

    // 6. Cập nhật mật khẩu riêng (Để bảo mật và tách biệt logic)
    public function updatePassword($id, $mat_khau_moi_hash) {
        $query = "UPDATE users SET mat_khau = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$mat_khau_moi_hash, $id]);
    }

    // 7. Xóa user
    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>