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

        // SỬA CÂU QUERY: Thêm 1 "truy vấn con" (subquery)
        // để lấy giá thấp nhất (MIN) từ bảng `bienthe_sanpham`
        // và đặt tên cột đó là 'gia' (để JS cũ của bạn vẫn đọc được 'sp.gia')
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

        // SỬA: Trả về mảng (array) dữ liệu thô
        // JavaScript (fetch) thích làm việc với mảng này hơn
        // là object 'new SanPham()' (vốn đã bị thiếu 'gia')
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🟡 Lấy sản phẩm theo ID (Hàm này giữ nguyên như cũ)
    // (Vì Giai đoạn 2 Service sẽ gọi nó để lấy object)
    public function getById($id)
    {
        $query = "SELECT * FROM sanpham WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // (Hàm này vẫn trả về object SanPham như cũ)
            return new SanPham(
                $row['id'],
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

    // 🟠 Thêm sản phẩm mới (chỉ thêm vào bảng `sanpham`)
    // SỬA: Bỏ $gia, $hinh_anh, $so_luong
    public function insert($ten_san_pham, $mo_ta, $anh_dai_dien)
    {
        // SỬA: Câu query chỉ insert 3 cột này
        $query = "INSERT INTO sanpham (ten_san_pham, mo_ta, anh_dai_dien, ngay_tao, ngay_cap_nhat)
                  VALUES (?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ten_san_pham, $mo_ta, $anh_dai_dien]);
    }

    // 🟣 Cập nhật sản phẩm (chỉ cập nhật bảng `sanpham`)
    // SỬA: Bỏ $gia, $hinh_anh, $so_luong
    public function update($id, $ten_san_pham, $mo_ta, $anh_dai_dien)
    {
        // SỬA: Câu query chỉ update 3 cột này
        $query = "UPDATE sanpham 
                  SET ten_san_pham=?, mo_ta=?, anh_dai_dien=?, ngay_cap_nhat=NOW()
                  WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ten_san_pham, $mo_ta, $anh_dai_dien, $id]);
    }

    // 🔴 Xóa sản phẩm
    public function delete($id)
    {
        // Hàm này giữ nguyên. CSDL sẽ tự động xóa các biến thể và ảnh liên quan (do ON DELETE CASCADE)
        $query = "DELETE FROM sanpham WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
