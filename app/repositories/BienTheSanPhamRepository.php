<?php
// Tệp: /app/repositories/BienTheSanPhamRepository.php

// (Không cần nạp model, chúng ta chỉ trả về mảng dữ liệu)
require_once __DIR__ . "/../../config/database.php";

class BienTheSanPhamRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    /**
     * Lấy tất cả biến thể (Size/Màu/Giá/Tồn kho) của 1 sản phẩm
     * @param int $sanpham_id ID của sản phẩm cha
     * @return array Danh sách các biến thể
     */
    public function getBySanPhamId($sanpham_id) {
        $query = "SELECT * FROM bienthe_sanpham WHERE sanpham_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$sanpham_id]);
        
        // Trả về TẤT CẢ các dòng
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Sau này Giai đoạn 4 (Admin) sẽ cần các hàm
    như insert(), update(), delete() cho bảng này
    */
}
?>