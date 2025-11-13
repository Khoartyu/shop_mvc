<?php
// Tệp: /app/repositories/ChiTietSanPhamRepository.php

require_once __DIR__ . "/../../config/database.php";

class ChiTietSanPhamRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    /**
     * Lấy tất cả hình ảnh thuộc về 1 sản phẩm
     * @param int $sanpham_id ID của sản phẩm
     * @return array Danh sách các ảnh
     */
    public function getBySanPhamId($sanpham_id) {
        $query = "SELECT * FROM chitietsanpham WHERE sanpham_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$sanpham_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>