<?php
class Customer {
    public $id;
    public $ho_ten;
    public $email;
    public $mat_khau;
    public $dia_chi;
    public $so_dien_thoai;
    public $ngay_dang_ky;

    public function __construct($id, $ho_ten, $email, $mat_khau, $dia_chi, $so_dien_thoai, $ngay_dang_ky) {
        $this->id = $id;
        $this->ho_ten = $ho_ten;
        $this->email = $email;
        $this->mat_khau = $mat_khau;
        $this->dia_chi = $dia_chi;
        $this->so_dien_thoai = $so_dien_thoai;
        $this->ngay_dang_ky = $ngay_dang_ky;
    }
}
?>