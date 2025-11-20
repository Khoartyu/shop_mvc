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
     * 🟢 1. Lấy tất cả sản phẩm
     * (ĐÃ SỬA: Ưu tiên lấy giá biến thể, nếu không có thì lấy giá gốc)
     */
    public function getAll()
    {
        // COALESCE(a, b): Nếu a có giá trị thì lấy a, nếu a là NULL thì lấy b
        $query = "
            SELECT 
                s.*, 
                COALESCE(
                    (SELECT MIN(b.gia) FROM bienthe_sanpham b WHERE b.sanpham_id = s.id), 
                    s.gia
                ) AS gia
            FROM sanpham s 
            ORDER BY s.ngay_cap_nhat DESC
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 1. Tìm giá biến thể trước
        // 2. Nếu (1) là NULL, thì lấy giá gốc này
    }

    /**
     * 🟢 2. Lấy danh sách Banner
     */
    public function getBanners()
    {
        $query = "SELECT * FROM banners WHERE hien_thi = 1 ORDER BY thu_tu ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 🟢 3. Lấy danh sách Danh mục
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
     * 🟡 4. Lấy chi tiết 1 sản phẩm
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
            return new SanPham($row);
        }
        return null;
    }

    /**
     * 🟡 5. Lấy sản phẩm liên quan
     * (ĐÃ SỬA: Ưu tiên lấy giá biến thể, nếu không có thì lấy giá gốc)
     */
    public function getByCategoryId($danhmuc_id, $exclude_id, $limit = 3)
    {
        if (is_null($danhmuc_id)) {
            return [];
        }

        $query = "
            SELECT 
                s.*, 
                COALESCE(
                    (SELECT MIN(b.gia) FROM bienthe_sanpham b WHERE b.sanpham_id = s.id),
                    s.gia
                ) AS gia
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

    // 🟠 Thêm sản phẩm (Thêm so_luong)
    public function insert($ten, $gia, $so_luong, $mo_ta, $anh, $dm_id) {
        $query = "INSERT INTO sanpham (ten_san_pham, gia, so_luong, mo_ta, anh_dai_dien, danhmuc_id, ngay_tao, ngay_cap_nhat)
                  VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ten, $gia, $so_luong, $mo_ta, $anh, $dm_id]);
    }

    // 🟣 Cập nhật sản phẩm (Thêm so_luong)
    public function update($id, $ten, $gia, $so_luong, $mo_ta, $anh, $dm_id) {
        $query = "UPDATE sanpham 
                  SET ten_san_pham=?, gia=?, so_luong=?, mo_ta=?, anh_dai_dien=?, danhmuc_id=?, ngay_cap_nhat=NOW()
                  WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ten, $gia, $so_luong, $mo_ta, $anh, $dm_id, $id]);
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