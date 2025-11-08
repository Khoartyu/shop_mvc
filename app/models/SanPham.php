<?php
// Tệp: /app/models/SanPham.php

class SanPham {
    
    // 1. Các thuộc tính khớp 100% với các cột
    public $id;
    public $danhmuc_id; // <-- THÊM THUỘC TÍNH MỚI
    public $ten_san_pham;
    public $mo_ta;
    public $anh_dai_dien;
    public $ngay_tao;
    public $ngay_cap_nhat;
    
    // 2. Các thuộc tính "ĐỘNG" (để Service ghép vào)
    public $list_hinhanh = []; 
    public $list_bienthe = [];
    public $list_lienquan = []; // Thêm luôn list liên quan

    // 3. Hàm khởi tạo (Constructor)
    // THÊM $danhmuc_id vào tham số
    public function __construct($id, $danhmuc_id, $ten_san_pham, $mo_ta, $anh_dai_dien, $ngay_tao, $ngay_cap_nhat) {
        $this->id = $id;
        $this->danhmuc_id = $danhmuc_id; // <-- GÁN GIÁ TRỊ MỚI
        $this->ten_san_pham = $ten_san_pham;
        $this->mo_ta = $mo_ta;
        $this->anh_dai_dien = $anh_dai_dien;
        $this->ngay_tao = $ngay_tao;
        $this->ngay_cap_nhat = $ngay_cap_nhat;
    }
}
?>