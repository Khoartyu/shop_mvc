<?php
require_once __DIR__ . '/../services/CustomerService.php';

class CustomerController {
    private $service;

    public function __construct() {
        $this->service = new CustomerService();
    }

    public function index() {
        echo json_encode($this->service->getAll());
    }

    public function store() {
        $ho_ten = $_POST['ho_ten'] ?? '';
        $email = $_POST['email'] ?? '';
        $mat_khau = $_POST['mat_khau'] ?? '';
        $sdt = $_POST['so_dien_thoai'] ?? '';
        $dia_chi = $_POST['dia_chi'] ?? '';

        if (empty($email) || empty($mat_khau)) {
            echo json_encode(['success' => false, 'message' => 'Email và mật khẩu là bắt buộc']);
            return;
        }

        echo json_encode($this->service->create($ho_ten, $email, $mat_khau, $sdt, $dia_chi));
    }

    public function update() {
        $id = $_POST['id'];
        $ho_ten = $_POST['ho_ten'];
        $email = $_POST['email'];
        $sdt = $_POST['so_dien_thoai'];
        $dia_chi = $_POST['dia_chi'];
        $mat_khau = $_POST['mat_khau'] ?? null;

        echo json_encode($this->service->update($id, $ho_ten, $email, $sdt, $dia_chi, $mat_khau));
    }

    public function delete() {
        $id = $_GET['id'];
        echo json_encode($this->service->delete($id));
    }
}
?>