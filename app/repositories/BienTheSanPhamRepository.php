<?php
// Tệp: /app/repositories/BienTheSanPhamRepository.php
require_once __DIR__ . "/../../config/database.php";

class BienTheSanPhamRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    /**
     * Lấy danh sách biến thể của sản phẩm (Kèm Tên Màu, Tên Size)
     */
    public function getBySanPhamId($sanpham_id) {
        // SỬA CÂU SQL: JOIN với bảng mau_sac và kich_thuoc
        $query = "
            SELECT 
                bt.*,
                ms.ten_mau, 
                ms.ma_hex,
                kt.ten_kich_thuoc
            FROM bienthe_sanpham bt
            LEFT JOIN danhmuc_mausac ms ON bt.mau_sac_id = ms.id
            LEFT JOIN danhmuc_kichthuoc kt ON bt.kich_thuoc_id = kt.id
            WHERE bt.sanpham_id = ?
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$sanpham_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>