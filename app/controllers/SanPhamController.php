<?php
require_once __DIR__ . "/../services/SanPhamService.php";

class SanPhamController
{
    private $service;

    public function __construct()
    {
        $this->service = new SanPhamService();
    }

    // 🟢 Lấy tất cả sản phẩm (Giai đoạn 1)
    // -> Hàm này của bạn ĐÃ ĐÚNG.
    public function layTatCa()
    {
        $data = $this->service->layTatCa();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // 🟡 Lấy chi tiết 1 sản phẩm (Giai đoạn 2)
    // -> Hàm này của bạn ĐÃ ĐÚNG.
    public function getById()
    {
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

    // 🟠 Thêm sản phẩm
    public function them()
    {
        // 1. SỬA: Lấy 4 trường (thêm 'danhmuc_id')
        $ten = $_POST['ten_san_pham'] ?? '';
        $mo_ta = $_POST['mo_ta'] ?? '';
        $anh_dai_dien = $_POST['anh_dai_dien'] ?? '';
        $danhmuc_id = $_POST['danhmuc_id'] ?? null; // Lấy 'danhmuc_id'

        // 2. SỬA: Gọi hàm service với 4 tham số
        $ketQua = $this->service->themSanPham($ten, $mo_ta, $anh_dai_dien, $danhmuc_id);

        header('Content-Type: application/json');
        echo json_encode($ketQua);
    }

    // 🟣 Cập nhật sản phẩm
    public function capNhat()
    {
        // 1. SỬA: Lấy 5 trường (thêm 'danhmuc_id')
        $id = $_POST['id'] ?? 0;
        $ten = $_POST['ten_san_pham'] ?? '';
        $mo_ta = $_POST['mo_ta'] ?? '';
        $anh_dai_dien = $_POST['anh_dai_dien'] ?? '';
        $danhmuc_id = $_POST['danhmuc_id'] ?? null; // Lấy 'danhmuc_id'

        // 2. SỬA: Gọi hàm service với 5 tham số
        $ketQua = $this->service->capNhatSanPham($id, $ten, $mo_ta, $anh_dai_dien, $danhmuc_id);

        header('Content-Type: application/json');
        echo json_encode($ketQua);
    }

    // 🔴 Xóa sản phẩm
    // -> Hàm này của bạn ĐÃ ĐÚNG.
    public function xoa()
    {
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