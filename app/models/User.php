<?php
class User {
    public $id;
    public $ten_dang_nhap;
    public $mat_khau;
    public $ho_ten;
    public $quyen;

    // Hàm khởi tạo khớp với bảng 'users' trong CSDL
    public function __construct($id, $ten_dang_nhap, $mat_khau, $ho_ten, $quyen) {
        $this->id = $id;
        $this->ten_dang_nhap = $ten_dang_nhap;
        $this->mat_khau = $mat_khau;
        $this->ho_ten = $ho_ten;
        $this->quyen = $quyen;
    }
}
?>