<?php
// Tệp: .../api/index.php
require_once __DIR__ . "/../config/session.php";
header(header: "Content-Type: application/json; charset=utf-8");

require_once __DIR__ . "/../app/controllers/SanPhamController.php";
require_once __DIR__ . '/../app/controllers/AdminController.php';
require_once __DIR__ . "/../app/controllers/AuthController.php"; // [MỚI]

$action = $_GET['action'] ?? '';

$adminController = new AdminController();
$authController = new AuthController(); // [MỚI]
$controller = new SanPhamController();

switch ($action) {

    // 🟢 Lấy tất cả sản phẩm
    case 'layTatCa':
        $controller->layTatCa();
        break;

    // 🔵 Lấy theo ID (Controller tự xử lý $_GET['id'])
    case 'getById':
        $controller->getById();
        break;

    // 🟠 Thêm sản phẩm
    case 'them':
        $controller->them();
        break;

    // 🟣 Cập nhật sản phẩm
    case 'capNhat':
        $controller->capNhat();
        break;

    // 🔴 Xóa sản phẩm
    case 'xoa':
        $controller->xoa();
        break;

    // 📊 Lấy số liệu Dashboard
    case 'adminKPIs':
        $adminController->getDashboardData();
        break;

    // 📦 Lấy danh sách sản phẩm trang admin
    case 'adminProducts':
        $adminController->getProductList();
        break;  

    // 🔐 Xử lý Login
    case 'login':
        $authController->login();
        break;

    // 🆕 Đăng ký
    case 'register':
        $authController->register();
        break;

    // 🔓 Logout
    case 'logout':
        $authController->logout();
        break;

    case 'adminCategories':
        $adminController->getCategoryList();
        break;

    // 🎨 Thuộc tính
    case 'adminAttributes':
        $adminController->getAttributeList();
        break;

    // 🧾 Đơn hàng
    case 'adminOrders':
        $adminController->getOrderList();
        break;

    // 👥 Khách hàng
    case 'adminCustomers':
        $adminController->getCustomerList();
        break;

    // 🛡️ Users (Quản trị)
    case 'adminUsers':
        $adminController->getUserList();
        break;
    
    // ...

    default:
        http_response_code(404);
        echo json_encode(["thong_bao" => "Không có hành động (action) hợp lệ!"]);
}
?>
