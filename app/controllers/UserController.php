<?php
// controllers/UserController.php
require_once __DIR__ . '/../services/UserService.php';

class UserController {
    private $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    // API: Lấy danh sách
    public function index() {
        $users = $this->userService->getAllUsers();
        echo json_encode($users);
    }

    // API: Thêm mới
    public function store() {
        $ten = $_POST['ten_dang_nhap'] ?? '';
        $pass = $_POST['mat_khau'] ?? '';
        $name = $_POST['ho_ten'] ?? '';
        $role = $_POST['quyen'] ?? 'Nhân viên';

        if (empty($ten) || empty($pass)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ thông tin']);
            return;
        }

        $result = $this->userService->createUser($ten, $pass, $name, $role);
        echo json_encode($result);
    }

    // API: Cập nhật
    public function update() {
        $id = $_POST['id'] ?? 0;
        $name = $_POST['ho_ten'] ?? '';
        $role = $_POST['quyen'] ?? 'Nhân viên';
        $pass = $_POST['mat_khau'] ?? null; // Có thể null nếu không đổi pass

        $result = $this->userService->updateUser($id, $name, $role, $pass);
        echo json_encode($result);
    }

    // API: Xóa
    public function delete() {
        $id = $_GET['id'] ?? 0;
        $result = $this->userService->deleteUser($id);
        echo json_encode($result);
    }
}
?>