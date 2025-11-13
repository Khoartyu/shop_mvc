<?php
// Nạp Model User
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../../config/database.php";

class UserRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Tìm user theo tên đăng nhập
    public function getUserByUsername($username) {
        $query = "SELECT * FROM users WHERE ten_dang_nhap = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Trả về đối tượng User
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
}
?>