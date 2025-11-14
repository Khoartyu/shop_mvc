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

    // =================================================================
    // CÁC HÀM CHO TRANG CHỦ (GIAI ĐOẠN 1)
    // =================================================================

    /**
     * 🟢 1. Lấy tất cả sản phẩm (Kèm giá thấp nhất từ bảng biến thể)
     */
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

    /**
     * 🟢 2. (MỚI) Lấy danh sách Banner (Slider & Quảng cáo)
     */
    public function getBanners()
    {
        // Chỉ lấy banner đang hiện (hien_thi = 1), sắp xếp theo thứ tự
        $query = "SELECT * FROM banners WHERE hien_thi = 1 ORDER BY thu_tu ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 🟢 3. (MỚI) Lấy danh sách Danh mục (Cho Carousel Danh mục)
     */
    public function getCategories()
    {
        $query = "SELECT * FROM danhmuc";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // =================================================================
    // CÁC HÀM CHO TRANG CHI TIẾT (GIAI ĐOẠN 2)
    // =================================================================

    /**
     * 🟡 4. Lấy chi tiết 1 sản phẩm (Kèm tên danh mục)
     */
    public function getById($id)
    {
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
            // Truyền mảng $row vào Model SanPham mới
            return new SanPham($row);
        }
        return null;
    }

    /**
     * 🟡 5. Lấy sản phẩm liên quan (Cùng danh mục, trừ chính nó)
     */
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

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // =================================================================
    // CÁC HÀM CRUD CHO ADMIN (GIAI ĐOẠN 4)
    // =================================================================

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
}
?>