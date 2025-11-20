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

    // 2. Lấy danh sách Sản phẩm (cho Admin)
    public function getAllProducts() {
        $query = "SELECT s.*, d.ten_danhmuc as category, 
                  (SELECT SUM(so_luong_ton) FROM bienthe_sanpham WHERE sanpham_id = s.id) as totalStock,
                  (SELECT COUNT(*) FROM bienthe_sanpham WHERE sanpham_id = s.id) as variantCount,
                  (SELECT MIN(gia) FROM bienthe_sanpham WHERE sanpham_id = s.id) as basePrice
                  FROM sanpham s 
                  LEFT JOIN danhmuc d ON s.danhmuc_id = d.id 
                  ORDER BY s.id DESC";
        $stmt = $this->conn->prepare($query);
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
}
?>