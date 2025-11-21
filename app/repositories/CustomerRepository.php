<?php
require_once __DIR__ . "/../models/Customer.php";
require_once __DIR__ . "/../../config/database.php";

class CustomerRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll() {
        $query = "SELECT * FROM khachhang ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Kiểm tra email trùng (Khi thêm mới)
    public function getByEmail($email) {
        $query = "SELECT * FROM khachhang WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($ho_ten, $email, $mat_khau, $sdt, $dia_chi) {
        $query = "INSERT INTO khachhang (ho_ten, email, mat_khau, so_dien_thoai, dia_chi) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ho_ten, $email, $mat_khau, $sdt, $dia_chi]);
    }

    public function update($id, $ho_ten, $email, $sdt, $dia_chi) {
        $query = "UPDATE khachhang SET ho_ten = ?, email = ?, so_dien_thoai = ?, dia_chi = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ho_ten, $email, $sdt, $dia_chi, $id]);
    }

    public function updatePassword($id, $mat_khau) {
        $query = "UPDATE khachhang SET mat_khau = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$mat_khau, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM khachhang WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>