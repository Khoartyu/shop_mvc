<?php
// Tệp: /app/services/SanPhamService.php

require_once __DIR__ . "/../repositories/SanPhamRepository.php";
// 1. Sửa require_once cho đúng file (đã đổi tên)
require_once __DIR__ . "/../repositories/ChiTietSanPhamRepository.php"; 
// 2. Nạp Repository MỚI
require_once __DIR__ . "/../repositories/BienTheSanPhamRepository.php"; 

class SanPhamService {
    
    // 3. Cần 3 thuộc tính cho 3 Repository
    private $spRepo;   // SanPham (Tên, Mô tả)
    private $ctspRepo; // ChiTietSanPham (17 Ảnh)
    private $btRepo;   // BienTheSanPham (Size, Màu, Giá, Tồn kho)

    public function __construct() {
        // 4. Gán cả 3 repo
        $this->spRepo = new SanPhamRepository();
        $this->ctspRepo = new ChiTietSanPhamRepository(); 
        $this->btRepo = new BienTheSanPhamRepository();
    }

    // 🟢 Lấy tất cả (Cho Giai đoạn 1)
    public function layTatCa() {
        // Hàm này chỉ lấy thông tin SP cha (đúng rồi)
        return $this->spRepo->getAll();
    }

    // 🟡 Lấy theo ID (Cho Giai đoạn 2 - API 'getById')
    public function getById($id) {
        
        // 5. Logic Giai đoạn 2 (ghép 3 bảng)
        
        // 5a. Lấy sản phẩm chính (Tên, Mô tả...)
        $product = $this->spRepo->getById($id); 

        if ($product) {
            // 5b. Lấy danh sách ảnh (từ chitietsanpham)
            $images = $this->ctspRepo->getBySanPhamId($id);
            
            // 5c. Lấy danh sách biến thể (từ bienthe_sanpham)
            $variants = $this->btRepo->getBySanPhamId($id);
            
            // 5d. Ghép 2 mảng này vào đối tượng sản phẩm
            $product->list_hinhanh = $images;   // (Tên cũ là haRepo)
            $product->list_bienthe = $variants; // (Thuộc tính động mới)
        }

        return $product;
    }

    /* ===============================================
     * CÁC HÀM CRUD (CHO GIAI ĐOẠN 4 - ADMIN)
     * ===============================================
     */

    // 🟠 Thêm sản phẩm mới (chỉ thêm vào bảng `sanpham`)
    // 6. SỬA LỖI: Các tham số truyền vào phải khớp với SanPhamRepository
    public function themSanPham($ten, $mo_ta, $anh_dai_dien) {
        if (empty($ten)) {
            return ["thanhcong" => false, "thongbao" => "Tên sản phẩm không hợp lệ!"];
        }

        // 7. SỬA LỖI: Gọi hàm insert() đã sửa (chỉ 3 tham số)
        $ketQua = $this->spRepo->insert($ten, $mo_ta, $anh_dai_dien);
        return $ketQua 
            ? ["thanhcong" => true, "thongbao" => "Đã thêm sản phẩm cha thành công!"]
            : ["thanhcong" => false, "thongbao" => "Thêm sản phẩm cha thất bại!"];
    }

    // 🟣 Cập nhật sản phẩm
    // 6. SỬA LỖI: Các tham số truyền vào phải khớp với SanPhamRepository
    public function capNhatSanPham($id, $ten, $mo_ta, $anh_dai_dien) {
        if (empty($ten)) {
            return ["thanhcong" => false, "thongbao" => "Dữ liệu không hợp lệ!"];
        }

        // 7. SỬA LỖI: Gọi hàm update() đã sửa (chỉ 4 tham số)
        $ketQua = $this->spRepo->update($id, $ten, $mo_ta, $anh_dai_dien);
        return $ketQua 
            ? ["thanhcong" => true, "thongbao" => "Cập nhật sản phẩm thành công!"]
            : ["thanhcong" => false, "thongbao" => "Cập nhật thất bại!"];
    }

    // 🔴 Xóa sản phẩm
    public function xoaSanPham($id) {
        // Hàm này đúng, vì CSDL tự xóa (ON DELETE CASCADE)
        $ketQua = $this->spRepo->delete($id);
        return $ketQua 
            ? ["thanhcong" => true, "thongbao" => "Đã xóa sản phẩm!"]
            : ["thanhcong" => false, "thongbao" => "Xóa thất bại!"];
    }
}
?>