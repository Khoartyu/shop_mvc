<?php
require_once __DIR__ . "/../../config/database.php";

class AdminRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // 1. KPI Dashboard
    public function getKPIs() {
        $kpis = [];
        // Doanh thu hôm nay
        $stmt = $this->conn->prepare("SELECT SUM(tong_tien) as total FROM donhang WHERE DATE(ngay_dat) = CURDATE() AND trang_thai != 'Đã hủy'");
        $stmt->execute();
        $kpis['revenueToday'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        // Đơn chờ xử lý
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM donhang WHERE trang_thai = 'Chờ xử lý'");
        $stmt->execute();
        $kpis['ordersPending'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        // Cảnh báo tồn kho (dưới 10)
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM bienthe_sanpham WHERE so_luong_ton < 10");
        $stmt->execute();
        $kpis['stockAlerts'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        return $kpis;
    }

    // 2. Lấy danh sách Sản phẩm (Có hỗ trợ tìm kiếm)
    public function getAllProducts($keyword = '') {
        $sql = "SELECT s.*, d.ten_danhmuc as category, 
                  (SELECT SUM(so_luong_ton) FROM bienthe_sanpham WHERE sanpham_id = s.id) as totalStock,
                  (SELECT COUNT(*) FROM bienthe_sanpham WHERE sanpham_id = s.id) as variantCount,
                  (SELECT MIN(gia) FROM bienthe_sanpham WHERE sanpham_id = s.id) as basePrice
                  FROM sanpham s 
                  LEFT JOIN danhmuc d ON s.danhmuc_id = d.id";

        // Nếu có từ khóa thì thêm điều kiện WHERE
        if (!empty($keyword)) {
            $sql .= " WHERE s.ten_san_pham LIKE :keyword";
        }

        $sql .= " ORDER BY s.id DESC";

        $stmt = $this->conn->prepare($sql);

        // Gán giá trị cho tham số :keyword
        if (!empty($keyword)) {
            $keyword = "%$keyword%";
            $stmt->bindParam(':keyword', $keyword);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 3. Lấy danh sách Danh mục
    public function getAllCategories() {
        $stmt = $this->conn->prepare("SELECT * FROM danhmuc ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 4. Lấy danh sách Thuộc tính (Màu & Size)
    public function getAllAttributes() {
        $data = [];
        // Màu sắc
        $stmt = $this->conn->prepare("SELECT * FROM danhmuc_mausac");
        $stmt->execute();
        $data['colors'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Kích thước
        $stmt = $this->conn->prepare("SELECT * FROM danhmuc_kichthuoc");
        $stmt->execute();
        $data['sizes'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    // 5. Lấy danh sách Đơn hàng
    public function getAllOrders() {
        $query = "SELECT d.*, k.ho_ten as ten_khach_hang, u.ho_ten as nhan_vien_xuly 
                  FROM donhang d
                  LEFT JOIN khachhang k ON d.khachhang_id = k.id
                  LEFT JOIN users u ON d.nhanvien_xuly_id = u.id
                  ORDER BY d.ngay_dat DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 6. Lấy danh sách Khách hàng
    public function getAllCustomers() {
        $stmt = $this->conn->prepare("SELECT * FROM khachhang ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 7. Lấy danh sách Users (Nhân viên/Admin)
    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT id, ten_dang_nhap, ho_ten, quyen FROM users ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm danh mục
    public function createCategory($ten, $hinh) {
        $stmt = $this->conn->prepare("INSERT INTO danhmuc (ten_danhmuc, hinh_anh) VALUES (?, ?)");
        return $stmt->execute([$ten, $hinh]);
    }

    // Cập nhật danh mục
    public function updateCategory($id, $ten, $hinh) {
        $query = "UPDATE danhmuc SET ten_danhmuc = ?, hinh_anh = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$ten, $hinh, $id]);
    }

    // Xóa danh mục
    public function deleteCategory($id) {
        // Lưu ý: Cần cẩn thận nếu xóa danh mục đang chứa sản phẩm (nhưng tạm thời cứ xóa)
        $stmt = $this->conn->prepare("DELETE FROM danhmuc WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Lấy 1 danh mục theo ID (để sửa)
    public function getCategoryById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM danhmuc WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 1. MÀU SẮC
    public function addColor($ten, $hex) {
        $stmt = $this->conn->prepare("INSERT INTO danhmuc_mausac (ten_mau, ma_hex) VALUES (?, ?)");
        return $stmt->execute([$ten, $hex]);
    }

    public function deleteColor($id) {
        $stmt = $this->conn->prepare("DELETE FROM danhmuc_mausac WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // 2. KÍCH THƯỚC
    public function addSize($ten) {
        $stmt = $this->conn->prepare("INSERT INTO danhmuc_kichthuoc (ten_kich_thuoc) VALUES (?)");
        return $stmt->execute([$ten]);
    }

    public function deleteSize($id) {
        $stmt = $this->conn->prepare("DELETE FROM danhmuc_kichthuoc WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>