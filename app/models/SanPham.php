<?php
// Tệp: /app/models/SanPham.php

class SanPham {
    // Các thuộc tính khớp với CSDL mới
    public $id;
    public $danhmuc_id;
    public $ten_san_pham;
    public $mo_ta;
    public $anh_dai_dien; // Tên cột mới
    public $ngay_tao;
    public $ngay_cap_nhat;

    // Các thuộc tính "động" (được Service ghép vào sau)
    public $ten_danhmuc; 
    public $list_hinhanh = []; // Gallery 17 ảnh
    public $variants = [];     // Size/Màu/Giá
    public $list_lienquan = []; // Sản phẩm liên quan

    // SỬA HÀM KHỞI TẠO: Nhận vào 1 mảng $data thay vì từng biến
    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->danhmuc_id = $data['danhmuc_id'] ?? null;
        $this->ten_san_pham = $data['ten_san_pham'] ?? '';
        $this->mo_ta = $data['mo_ta'] ?? '';
        $this->anh_dai_dien = $data['anh_dai_dien'] ?? '';
        $this->ngay_tao = $data['ngay_tao'] ?? date('Y-m-d H:i:s');
        $this->ngay_cap_nhat = $data['ngay_cap_nhat'] ?? date('Y-m-d H:i:s');
        
        // Map thêm tên danh mục nếu có (từ phép JOIN)
        $this->ten_danhmuc = $data['ten_danhmuc'] ?? null;
    }
}
?>