<?php
// Tệp: /api/index.php
require_once __DIR__ . "/../config/session.php";
header(header: "Content-Type: application/json; charset=utf-8");
require_once __DIR__ . "/../app/controllers/UserController.php";
require_once __DIR__ . "/../app/controllers/SanPhamController.php";
require_once __DIR__ . '/../app/controllers/AdminController.php';
require_once __DIR__ . "/../app/controllers/AuthController.php"; // [MỚI]
require_once __DIR__ . "/../app/controllers/CustomerController.php";
require_once __DIR__ . "/../app/controllers/ShopAuthController.php";
$action = $_GET['action'] ?? '';
$customerController = new CustomerController();
$shopAuthController = new ShopAuthController();
$adminController = new AdminController();
$authController = new AuthController(); // [MỚI]
$controller = new SanPhamController();
$userController = new UserController();
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

    case 'getUsers':
        $userController->index();
        break;
    case 'addUser':
        $userController->store();
        break;
    case 'updateUser':
        $userController->update();
        break;
    case 'deleteUser':
        $userController->delete();
        break;
    // === KHÁCH HÀNG ===
    case 'getCustomers':
        $customerController->index();
        break;
    case 'addCustomer':
        $customerController->store();
        break;
    case 'updateCustomer':
        $customerController->update();
        break;
    case 'deleteCustomer':
        $customerController->delete();
        // =================================================
        // 🟢 CÁC API DÀNH CHO KHÁCH HÀNG (SHOP CLIENT)
        // =================================================

        // 1. Khách hàng đăng nhập
    case 'shopLogin':
        $shopAuthController->login();
        break;

    // 2. Khách hàng đăng ký
    case 'shopRegister':
        $shopAuthController->register();
        break;

    // 3. Khách hàng đăng xuất
    case 'shopLogout':
        $shopAuthController->logout();
        break;

    // 4. Kiểm tra trạng thái (đã login chưa)
    case 'checkLoginStatus':
        $shopAuthController->checkStatus();
        break;
    default:
        http_response_code(404);
        echo json_encode(["thong_bao" => "Không có hành động (action) hợp lệ!"]);
}
