<?php
// Tệp: /app/services/SanPhamService.php

require_once __DIR__ . "/../repositories/SanPhamRepository.php";
require_once __DIR__ . "/../repositories/ChiTietSanPhamRepository.php";
require_once __DIR__ . "/../repositories/BienTheSanPhamRepository.php";

class SanPhamService
{

    private $spRepo;   // SanPham (Tên, Mô tả, Danh mục)
    private $ctspRepo; // ChiTietSanPham (17 Ảnh)
    private $btRepo;   // BienTheSanPham (Size, Màu, Giá, Tồn kho)

    public function __construct()
    {
        $this->spRepo = new SanPhamRepository();
        $this->ctspRepo = new ChiTietSanPhamRepository();
        $this->btRepo = new BienTheSanPhamRepository();
    }

    // 🟢 Lấy tất cả (Cho Giai đoạn 1)
    public function layTatCa()
    {
        return [
            'banners' => $this->spRepo->getBanners(),       // Lấy Slider/Banner
            'categories' => $this->spRepo->getCategories(), // Lấy Danh mục
            'products' => $this->spRepo->getAll()           // Lấy Sản phẩm mới
        ];
    }

    // 🟡 Lấy theo ID (Cho Giai đoạn 2 - API 'getById')
    public function getById($id)
    {

        // 1. Lấy sản phẩm chính (Object SanPham)
        $product = $this->spRepo->getById($id);

        if ($product) {
            // 2. Lấy danh sách ảnh (từ chitietsanpham)
            $images = $this->ctspRepo->getBySanPhamId($id);

            // 3. Lấy danh sách biến thể (từ bienthe_sanpham)
            $variants = $this->btRepo->getBySanPhamId($id);

            // 4. Lấy sản phẩm liên quan (từ SanPhamRepository)
            $related = $this->spRepo->getByCategoryId($product->danhmuc_id, $id, 3);

            // 5. Ghép dữ liệu vào object
            $product->list_hinhanh = $images;

            // SỬA: Dùng thuộc tính 'variants' cho khớp với Model mới
            $product->variants = $variants; // (Tên cũ là list_bienthe)

            $product->list_lienquan = $related;
        }

        return $product;
    }

    /* ===============================================
     * CÁC HÀM CRUD (CHO GIAI ĐOẠN 4 - ADMIN)
     * ===============================================
     */

    // 🟠 Thêm sản phẩm mới
    public function themSanPham($ten, $mo_ta, $anh_dai_dien, $danhmuc_id)
    {
        if (empty($ten)) {
            return ["thanhcong" => false, "thongbao" => "Tên sản phẩm không hợp lệ!"];
        }
        $ketQua = $this->spRepo->insert($ten, $mo_ta, $anh_dai_dien, $danhmuc_id);
        return $ketQua
            ? ["thanhcong" => true, "thongbao" => "Đã thêm sản phẩm cha thành công!"]
            : ["thanhcong" => false, "thongbao" => "Thêm sản phẩm cha thất bại!"];
    }

    // 🟣 Cập nhật sản phẩm
    public function capNhatSanPham($id, $ten, $mo_ta, $anh_dai_dien, $danhmuc_id)
    {
        if (empty($ten)) {
            return ["thanhcong" => false, "thongbao" => "Dữ liệu không hợp lệ!"];
        }
        $ketQua = $this->spRepo->update($id, $ten, $mo_ta, $anh_dai_dien, $danhmuc_id);
        return $ketQua
            ? ["thanhcong" => true, "thongbao" => "Cập nhật sản phẩm thành công!"]
            : ["thanhcong" => false, "thongbao" => "Cập nhật thất bại!"];
    }

    // 🔴 Xóa sản phẩm
    public function xoaSanPham($id)
    {
        $ketQua = $this->spRepo->delete($id);
        return $ketQua
            ? ["thanhcong" => true, "thongbao" => "Đã xóa sản phẩm!"]
            : ["thanhcong" => false, "thongbao" => "Xóa thất bại!"];
    }
}
