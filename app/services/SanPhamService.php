<?php
require_once __DIR__ . "/../repositories/SanPhamRepository.php";
require_once __DIR__ . "/../repositories/ChiTietSanPhamRepository.php";
require_once __DIR__ . "/../repositories/BienTheSanPhamRepository.php";

class SanPhamService
{
    private $spRepo;
    private $ctspRepo;
    private $btRepo;

    public function __construct()
    {
        $this->spRepo = new SanPhamRepository();
        $this->ctspRepo = new ChiTietSanPhamRepository();
        $this->btRepo = new BienTheSanPhamRepository();
    }

    public function layTatCa()
    {
        return [
            'banners' => $this->spRepo->getBanners(),
            'categories' => $this->spRepo->getCategories(),
            'products' => $this->spRepo->getAll()
        ];
    }

    public function getById($id)
    {
        $product = $this->spRepo->getById($id);
        if ($product) {
            $product->list_hinhanh = $this->ctspRepo->getBySanPhamId($id);
            $product->variants = $this->btRepo->getBySanPhamId($id);
            $product->list_lienquan = $this->spRepo->getByCategoryId($product->danhmuc_id, $id, 3);
        }
        return $product;
    }

    // --- CÁC HÀM CRUD (QUAN TRỌNG: PHẢI TRẢ VỀ MẢNG CÓ 'thanhcong' VÀ 'thongbao') ---

    // 🟠 Thêm sản phẩm
    public function themSanPham($ten, $gia, $so_luong, $mo_ta, $anh_dai_dien, $danhmuc_id)
    {
        if (empty($ten)) {
            return ["thanhcong" => false, "thongbao" => "Tên sản phẩm không hợp lệ!"];
        }
        
        // Gọi Repository
        $ketQua = $this->spRepo->insert($ten, $gia, $so_luong, $mo_ta, $anh_dai_dien, $danhmuc_id);
        
        // Trả về đúng định dạng JSON mà Javascript mong đợi
        return $ketQua
            ? ["thanhcong" => true, "thongbao" => "Đã thêm sản phẩm thành công!"]
            : ["thanhcong" => false, "thongbao" => "Lỗi hệ thống, thêm thất bại!"];
    }

    // 🟣 Cập nhật sản phẩm
    public function capNhatSanPham($id, $ten, $gia, $so_luong, $mo_ta, $anh_dai_dien, $danhmuc_id)
    {
        if (empty($ten)) {
            return ["thanhcong" => false, "thongbao" => "Dữ liệu không hợp lệ!"];
        }
        
        $ketQua = $this->spRepo->update($id, $ten, $gia, $so_luong, $mo_ta, $anh_dai_dien, $danhmuc_id);
        
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
?>