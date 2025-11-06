<?php
require_once __DIR__ . "/../services/SanPhamService.php";

class SanPhamController {
    private $service;

    public function __construct() {
        $this->service = new SanPhamService();
    }

    // 🟢 Lấy tất cả sản phẩm (Giai đoạn 1)
    // -> Hàm này của bạn ĐÃ ĐÚNG.
    public function layTatCa() {
        $data = $this->service->layTatCa(); 
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // 🟡 Lấy chi tiết 1 sản phẩm (Giai đoạn 2)
    // -> Hàm này của bạn ĐÃ ĐÚNG.
    // Nó gọi Service, Service gọi 3 repo, trả về 1 JSON lớn.
    public function getById() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id <= 0) {
            header('Content-Type: application/json');
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'ID sản phẩm không hợp lệ']);
            return;
        }

        $data = $this->service->getById($id);

        header('Content-Type: application/json');
        if ($data) {
            echo json_encode($data);
        } else {
            http_response_code(404); // Not Found
            echo json_encode(['error' => 'Không tìm thấy sản phẩm']);
        }
    }

    /* ===============================================
     * CÁC HÀM CRUD (CHO GIAI ĐOẠN 4 - ADMIN)
     * ===============================================
     */

    // 🟠 Thêm sản phẩm (chỉ thêm vào bảng `sanpham`)
    public function them() {
        // 1. SỬA LỖI: Chỉ lấy 3 trường của bảng 'sanpham'
        $ten = $_POST['ten_san_pham'] ?? '';
        $mo_ta = $_POST['mo_ta'] ?? '';
        $anh_dai_dien = $_POST['anh_dai_dien'] ?? ''; // Đã đổi tên cột

        // 2. SỬA LỖI: Gọi hàm service đã sửa (chỉ 3 tham số)
        $ketQua = $this->service->themSanPham($ten, $mo_ta, $anh_dai_dien);
        
        header('Content-Type: application/json');
        echo json_encode($ketQua);
    }

    // 🟣 Cập nhật sản phẩm (chỉ cập nhật bảng `sanpham`)
    public function capNhat() {
        // 1. SỬA LỖI: Chỉ lấy các trường của bảng 'sanpham'
        $id = $_POST['id'] ?? 0;
        $ten = $_POST['ten_san_pham'] ?? '';
        $mo_ta = $_POST['mo_ta'] ?? '';
        $anh_dai_dien = $_POST['anh_dai_dien'] ?? ''; // Đã đổi tên cột

        // 2. SỬA LỖI: Gọi hàm service đã sửa (chỉ 4 tham số)
        $ketQua = $this->service->capNhatSanPham($id, $ten, $mo_ta, $anh_dai_dien);
        
        header('Content-Type: application/json');
        echo json_encode($ketQua);
    }

    // 🔴 Xóa sản phẩm
    // -> Hàm này của bạn ĐÃ ĐÚNG.
    public function xoa() {
        $id = $_POST['id'] ?? 0;
        $ketQua = $this->service->xoaSanPham($id);
        
        header('Content-Type: application/json');
        echo json_encode($ketQua);
    }
    
    // (Lưu ý: Bạn sẽ cần thêm các hàm mới ở đây cho Giai đoạn 4, ví dụ:
    // public function themBienThe() { ... }
    // public function xoaBienThe() { ... }
    // public function uploadAnh() { ... }
    // )
}
?>