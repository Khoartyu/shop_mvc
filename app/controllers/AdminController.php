<?php
require_once __DIR__ . '/../repositories/AdminRepository.php';

class AdminController {
    private $adminRepo;

    public function __construct() {
        $this->adminRepo = new AdminRepository();
    }

    // Helper: Trả về JSON
    private function sendJson($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getDashboardData() {
        $this->sendJson($this->adminRepo->getKPIs());
    }

    public function getProductList() {
        // Lấy từ khóa từ URL, nếu không có thì để rỗng
        $keyword = $_GET['keyword'] ?? ''; 
        
        // Gọi hàm repo với từ khóa
        $this->sendJson($this->adminRepo->getAllProducts($keyword));
    }

    public function getCategoryList() {
        $this->sendJson($this->adminRepo->getAllCategories());
    }

    public function getAttributeList() {
        $this->sendJson($this->adminRepo->getAllAttributes());
    }

    public function getOrderList() {
        $this->sendJson($this->adminRepo->getAllOrders());
    }

    public function getCustomerList() {
        $this->sendJson($this->adminRepo->getAllCustomers());
    }

    public function getUserList() {
        $this->sendJson($this->adminRepo->getAllUsers());
    }

    public function themDanhmuc() {
        $ten = $_POST['ten_danhmuc'] ?? '';
        $hinh = $_POST['hinh_anh'] ?? '';
        
        if(empty($ten)) {
            $this->sendJson(['thanhcong' => false, 'thongbao' => 'Tên không được để trống']);
            return;
        }

        $res = $this->adminRepo->createCategory($ten, $hinh);
        $this->sendJson(['thanhcong' => $res, 'thongbao' => $res ? 'Thêm thành công!' : 'Lỗi thêm danh mục']);
    }

    public function capNhatDanhmuc() {
        $id = $_POST['id'] ?? 0;
        $ten = $_POST['ten_danhmuc'] ?? '';
        $hinh = $_POST['hinh_anh'] ?? '';

        $res = $this->adminRepo->updateCategory($id, $ten, $hinh);
        $this->sendJson(['thanhcong' => $res, 'thongbao' => $res ? 'Cập nhật thành công!' : 'Lỗi cập nhật']);
    }

    public function xoaDanhmuc() {
        $id = $_POST['id'] ?? 0;
        $res = $this->adminRepo->deleteCategory($id);
        $this->sendJson(['thanhcong' => $res, 'thongbao' => $res ? 'Đã xóa danh mục!' : 'Lỗi xóa']);
    }

    public function getCategoryDetail() {
        $id = $_GET['id'] ?? 0;
        $data = $this->adminRepo->getCategoryById($id);
        $this->sendJson($data);
    }

    // Xử lý Màu
    public function themMau() {
        $ten = $_POST['ten_mau'] ?? '';
        $hex = $_POST['ma_hex'] ?? '#000000';
        
        if(empty($ten)) {
            $this->sendJson(['thanhcong' => false, 'thongbao' => 'Tên màu không được trống']);
            return;
        }
        
        $res = $this->adminRepo->addColor($ten, $hex);
        $this->sendJson(['thanhcong' => $res, 'thongbao' => $res ? 'Đã thêm màu!' : 'Lỗi thêm màu']);
    }

    public function xoaMau() {
        $id = $_POST['id'] ?? 0;
        $res = $this->adminRepo->deleteColor($id);
        $this->sendJson(['thanhcong' => $res, 'thongbao' => $res ? 'Đã xóa màu!' : 'Lỗi xóa màu']);
    }

    // Xử lý Size
    public function themSize() {
        $ten = $_POST['ten_kich_thuoc'] ?? '';
        
        if(empty($ten)) {
            $this->sendJson(['thanhcong' => false, 'thongbao' => 'Tên size không được trống']);
            return;
        }
        
        $res = $this->adminRepo->addSize($ten);
        $this->sendJson(['thanhcong' => $res, 'thongbao' => $res ? 'Đã thêm size!' : 'Lỗi thêm size']);
    }

    public function xoaSize() {
        $id = $_POST['id'] ?? 0;
        $res = $this->adminRepo->deleteSize($id);
        $this->sendJson(['thanhcong' => $res, 'thongbao' => $res ? 'Đã xóa size!' : 'Lỗi xóa size']);
    }
}
?>