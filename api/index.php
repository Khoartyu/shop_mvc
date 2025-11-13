<?php
// Tệp: /api/index.php
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
    // 🟢 Giai đoạn 1: Lấy tất cả (Đã đúng)
    case 'layTatCa':
        $controller->layTatCa();
        break;

    // 🟡 Giai đoạn 2: Lấy theo ID
    // SỬA LỖI 1: Tên 'action' phải là 'getById' để khớp với JS và Controller
    case 'getById': 
        // SỬA LỖI 2: Chỉ cần gọi hàm, Controller sẽ tự lấy $_GET['id']
        $controller->getById(); 
        break;

    // 🟠 Giai đoạn 4: Thêm (Đã đúng)
    case 'them':
        $controller->them();
        break;

    // 🟣 Giai đoạn 4: Cập nhật (Đã đúng)
    case 'capNhat':
        $controller->capNhat();
        break;

    // 🔴 Giai đoạn 4: Xóa (Đã đúng)
    case 'xoa':
        $controller->xoa();
        break;
    
    case 'adminKPIs': // Lấy số liệu Dashboard
        $adminController->getDashboardData();
        break;

    case 'adminProducts': // Lấy danh sách sản phẩm quản trị
        $adminController->getProductList();
        break;    
    case 'login':
        $authController->login();
        break;
    case 'register': // [MỚI]
        $authController->register();
        break;
    case 'logout':
        $authController->logout();
        break;
    default:
        http_response_code(404); // Thêm mã lỗi 404
        echo json_encode(["thong_bao" => "Không có hành động (action) hợp lệ!"]);
}
?>