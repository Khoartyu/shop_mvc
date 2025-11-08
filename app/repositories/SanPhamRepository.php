<?php
require_once __DIR__ . "/../models/SanPham.php";
require_once __DIR__ . "/../../config/database.php";

class SanPhamRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // 🟢 Lấy tất cả sản phẩm (Cho Giai đoạn 1)
    public function getAll()
    {
        // (Hàm này đã đúng, nó lấy MIN(gia) và trả về mảng thô (array) cho JS)
        $query = "
            SELECT 
                s.*, 
                (SELECT MIN(b.gia) 
                 FROM bienthe_sanpham b 
                 WHERE b.sanpham_id = s.id) AS gia
            FROM sanpham s 
            ORDER BY s.ngay_cap_nhat DESC
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🟡 Lấy sản phẩm theo ID (Cho Giai đoạn 2)
    public function getById($id)
    {
        $query = "SELECT * FROM sanpham WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // SỬA: Phải truyền 7 tham số cho Model mới
            // (Thêm $row['danhmuc_id'])
            return new SanPham(
                $row['id'],
                $row['danhmuc_id'], // <-- ĐÃ THÊM
                $row['ten_san_pham'],
                $row['mo_ta'],
                $row['anh_dai_dien'],
                $row['ngay_tao'],
                $row['ngay_cap_nhat']
            );
        }
        return null;
    }

    /* * ===============================================
     * CÁC HÀM CRUD (CHO GIAI ĐOẠN 4 - ADMIN)
     * ===============================================
     */

    // 🟠 Thêm sản phẩm mới
    // SỬA: Thêm tham số $danhmuc_id
    public function insert($ten_san_pham, $mo_ta, $anh_dai_dien, $danhmuc_id)
    {
        // SỬA: Thêm cột `danhmuc_id` vào query
        $query = "INSERT INTO sanpham (ten_san_pham, mo_ta, anh_dai_dien, danhmuc_id, ngay_tao, ngay_cap_nhat)
                  VALUES (?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        // SỬA: Thêm $danhmuc_id vào execute
        return $stmt->execute([$ten_san_pham, $mo_ta, $anh_dai_dien, $danhmuc_id]);
    }

    // 🟣 Cập nhật sản phẩm
    // SỬA: Thêm tham số $danhmuc_id
    public function update($id, $ten_san_pham, $mo_ta, $anh_dai_dien, $danhmuc_id)
    {
        // SỬA: Thêm `danhmuc_id = ?` vào query
        $query = "UPDATE sanpham 
                  SET ten_san_pham=?, mo_ta=?, anh_dai_dien=?, danhmuc_id=?, ngay_cap_nhat=NOW()
                  WHERE id=?";
        $stmt = $this->conn->prepare($query);
        // SỬA: Thêm $danhmuc_id vào execute
        return $stmt->execute([$ten_san_pham, $mo_ta, $anh_dai_dien, $danhmuc_id, $id]);
    }

    // 🔴 Xóa sản phẩm (Hàm này giữ nguyên)
    public function delete($id)
    {
        $query = "DELETE FROM sanpham WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }

    // 🌟 BỔ SUNG: Hàm lấy sản phẩm liên quan (từ Step 31)
    public function getByCategoryId($danhmuc_id, $exclude_id, $limit = 3)
    {
        // ... (if is_null ...)

        $query = "
            SELECT 
                s.*, 
                (SELECT MIN(b.gia) 
                 FROM bienthe_sanpham b 
                 WHERE b.sanpham_id = s.id) AS gia
            FROM sanpham s 
            WHERE s.danhmuc_id = ? AND s.id != ?
            LIMIT ?
        ";

        $stmt = $this->conn->prepare($query);

        // SỬA LẠI 2 DÒNG NÀY:
        // Gán 2 tham số đầu tiên (vị trí 1 và 2)
        $stmt->bindParam(1, $danhmuc_id);
        $stmt->bindParam(2, $exclude_id);

        // Gán tham số thứ 3 (LIMIT) và ép kiểu nó là SỐ (PDO::PARAM_INT)
        $stmt->bindParam(3, $limit, PDO::PARAM_INT);

        $stmt->execute(); // Chạy execute

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
