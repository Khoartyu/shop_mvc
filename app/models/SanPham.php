<?php
class SanPham {
    
    // 1. Các thuộc tính này khớp 100% với các cột trong bảng `sanpham`
    public $id;
    public $ten_san_pham;
    public $mo_ta;
    public $anh_dai_dien; // Đã đổi tên (trước là hinh_anh)
    public $ngay_tao;
    public $ngay_cap_nhat;
    
    // (XÓA $gia và $so_luong vì đã chuyển sang bảng bienthe_sanpham)

    
    // 2. Thêm 2 thuộc tính "ĐỘNG"
    // Đây là chỗ để Service "nhét" dữ liệu từ 2 bảng con vào
    
    /**
     * @var array Chứa danh sách các ảnh chi tiết (từ bảng `chitietsanpham`)
     */
    public $list_hinhanh = []; 
    
    /**
     * @var array Chứa danh sách các biến thể (từ bảng `bienthe_sanpham`)
     */
    public $list_bienthe = [];


    // 3. Hàm khởi tạo (Constructor)
    // Chỉ khởi tạo các thuộc tính có trong bảng `sanpham`
    public function __construct($id, $ten_san_pham, $mo_ta, $anh_dai_dien, $ngay_tao, $ngay_cap_nhat) {
        $this->id = $id;
        $this->ten_san_pham = $ten_san_pham;
        $this->mo_ta = $mo_ta;
        $this->anh_dai_dien = $anh_dai_dien; // Đã đổi tên
        $this->ngay_tao = $ngay_tao;
        $this->ngay_cap_nhat = $ngay_cap_nhat;
    }
}
?>