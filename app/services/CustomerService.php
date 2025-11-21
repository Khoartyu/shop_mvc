<?php
require_once __DIR__ . '/../repositories/CustomerRepository.php';

class CustomerService {
    private $repo;

    public function __construct() {
        $this->repo = new CustomerRepository();
    }

    public function getAll() {
        return $this->repo->getAll();
    }

    public function create($ho_ten, $email, $mat_khau, $sdt, $dia_chi) {
        // Check email trùng
        if ($this->repo->getByEmail($email)) {
            return ['success' => false, 'message' => 'Email này đã được sử dụng'];
        }
        
        // Hash password
        $hash = md5($mat_khau);
        
        if ($this->repo->create($ho_ten, $email, $hash, $sdt, $dia_chi)) {
            return ['success' => true, 'message' => 'Thêm khách hàng thành công'];
        }
        return ['success' => false, 'message' => 'Lỗi hệ thống'];
    }

    public function update($id, $ho_ten, $email, $sdt, $dia_chi, $mat_khau = null) {
        // Cập nhật thông tin chung
        $this->repo->update($id, $ho_ten, $email, $sdt, $dia_chi);

        // Nếu Admin muốn reset mật khẩu cho khách
        if (!empty($mat_khau)) {
            $hash = md5($mat_khau);
            $this->repo->updatePassword($id, $hash);
        }

        return ['success' => true, 'message' => 'Cập nhật thành công'];
    }

    public function delete($id) {
        if ($this->repo->delete($id)) {
            return ['success' => true, 'message' => 'Xóa thành công'];
        }
        return ['success' => false, 'message' => 'Lỗi khi xóa'];
    }
    // Thêm hàm Login cho khách hàng
    public function login($email, $mat_khau) {
        // 1. Tìm khách hàng theo email
        $customer = $this->repo->getByEmail($email);

        // 2. Kiểm tra xem có user không
        if (!$customer) {
            return ['success' => false, 'message' => 'Email không tồn tại'];
        }

        // 3. Kiểm tra mật khẩu (Hỗ trợ cả MD5 cũ và Hash mới)
        $checkPass = false;
        if (password_verify($mat_khau, $customer['mat_khau'])) {
            $checkPass = true; // Khớp hash mới
        } elseif (md5($mat_khau) === $customer['mat_khau']) {
            $checkPass = true; // Khớp MD5 cũ
            // (Tùy chọn) Update lại thành hash mới để bảo mật dần
            $this->repo->updatePassword($customer['id'], password_hash($mat_khau, PASSWORD_DEFAULT));
        }

        if ($checkPass) {
            // 4. Lưu Session cho khách hàng
            $_SESSION['customer_id'] = $customer['id'];
            $_SESSION['customer_name'] = $customer['ho_ten'];
            $_SESSION['customer_email'] = $customer['email'];
            
            return ['success' => true, 'message' => 'Đăng nhập thành công', 'user' => $customer];
        }

        return ['success' => false, 'message' => 'Mật khẩu không đúng'];
    }

    // Hàm đăng xuất
    public function logout() {
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['customer_email']);
        return ['success' => true];
    }
}
?>  