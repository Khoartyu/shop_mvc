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
        // JOIN bảng danhmuc để lấy tên danh mục luôn
        $query = "
            SELECT s.*, d.ten_danhmuc 
            FROM sanpham s
            LEFT JOIN danhmuc d ON s.danhmuc_id = d.id
            WHERE s.id = ?
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // SỬA: Truyền mảng $row vào constructor của SanPham
            // Vì Model SanPham mới nhận mảng $data
            return new SanPham($row);
        }
        return null;
    }

    /* ===============================================
     * CÁC HÀM CRUD (CHO GIAI ĐOẠN 4 - ADMIN)
     * ===============================================
     */

    // 🟠 Thêm sản phẩm mới
    public function insert($ten_san_pham, $mo_ta, $anh_dai_dien, $danhmuc_id)
    {
        $query = "INSERT INTO sanpham (ten_san_pham, mo_ta, anh_dai_dien, danhmuc_id, ngay_tao, ngay_cap_nhat)
                  VALUES (?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ten_san_pham, $mo_ta, $anh_dai_dien, $danhmuc_id]);
    }

    // 🟣 Cập nhật sản phẩm
    public function update($id, $ten_san_pham, $mo_ta, $anh_dai_dien, $danhmuc_id)
    {
        $query = "UPDATE sanpham 
                  SET ten_san_pham=?, mo_ta=?, anh_dai_dien=?, danhmuc_id=?, ngay_cap_nhat=NOW()
                  WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ten_san_pham, $mo_ta, $anh_dai_dien, $danhmuc_id, $id]);
    }

    // 🔴 Xóa sản phẩm
    public function delete($id)
    {
        $query = "DELETE FROM sanpham WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }

    // 🌟 Lấy sản phẩm liên quan
    public function getByCategoryId($danhmuc_id, $exclude_id, $limit = 3)
    {
        if (is_null($danhmuc_id)) {
            return [];
        }

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
        $stmt->bindParam(1, $danhmuc_id);
        $stmt->bindParam(2, $exclude_id);
        $stmt->bindParam(3, $limit, PDO::PARAM_INT);
        $stmt->execute();

        // Trả về mảng thô để dễ xử lý ở Service/Controller
        // Sau này có thể map sang object SanPham nếu muốn
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // (Tùy chọn: Convert sang object SanPham nếu cần đồng bộ)
        // $objects = [];
        // foreach($rows as $row) $objects[] = new SanPham($row);
        // return $objects;

        return $rows; 
    }
}
?>