<?php
// Không cần require config ở đây nếu header đã có session_start
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập & Đăng ký - Fashion Store</title>
    
    <link rel="shortcut icon" href="/shop_mvc/images/Assets/logo/logoc.png" type="image/x-icon">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="stylesheet" href="/shop_mvc/css/style.css">
    
    <style>
        /* CSS tùy chỉnh cho Tab chuyển đổi Login/Register */
        .nav-tabs-custom {
            border-bottom: 2px solid #dee2e6;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }
        .tab-btn {
            background: none;
            border: none;
            padding: 10px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            color: #6c757d;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }
        .tab-btn:hover {
            color: #198754; /* Màu xanh success của Bootstrap */
        }
        .tab-btn.active {
            color: #198754;
            border-bottom-color: #198754;
        }
        
        /* Class ẩn hiện của Bootstrap là d-none, nhưng ta thêm helper này cho JS dễ đọc */
        .hidden {
            display: none !important;
        }
        
        .login-section {
            background-color: #f8f9fa;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }
        
        .card {
            border-radius: 1rem;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <?php require_once __DIR__ . '/../layout/header.php'; ?>

    <section class="login-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5">
                            
                            <h2 class="text-center fw-bold mb-4 text-dark">Chào mừng trở lại!</h2>

                            <div class="nav-tabs-custom">
                                <button id="tab-login" class="tab-btn active">Đăng Nhập</button>
                                <button id="tab-register" class="tab-btn">Đăng Ký</button>
                            </div>

                            <div id="alert-message" class="alert d-none text-center" role="alert"></div>

                            <div id="content-login">
                                <form id="form-login">
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Tên đăng nhập / Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="ten_dang_nhap" class="form-control" required placeholder="Nhập tên đăng nhập">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Mật khẩu</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input type="password" name="mat_khau" class="form-control" required placeholder="Nhập mật khẩu">
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="remember">
                                            <label class="form-check-label" for="remember">Ghi nhớ</label>
                                        </div>
                                        <a href="#" class="text-decoration-none text-success">Quên mật khẩu?</a>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">ĐĂNG NHẬP</button>
                                    
                                    <div class="text-center my-3 text-muted">
                                        <span>— Hoặc đăng nhập bằng —</span>
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-danger w-50"><i class="fab fa-google me-2"></i>Google</button>
                                        <button type="button" class="btn btn-outline-primary w-50"><i class="fab fa-facebook-f me-2"></i>Facebook</button>
                                    </div>
                                </form>
                            </div>

                            <div id="content-register" class="d-none">
                                <form id="form-register">
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Họ và Tên</label>
                                        <input type="text" name="ho_ten" class="form-control" required placeholder="Nguyễn Văn A">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Email</label>
                                        <input type="email" name="email" class="form-control" required placeholder="email@example.com">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Mật khẩu</label>
                                        <input type="password" name="mat_khau_reg" class="form-control" required placeholder="Tối thiểu 6 ký tự">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Xác nhận Mật khẩu</label>
                                        <input type="password" name="xac_nhan_mat_khau" class="form-control" required placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 py-2 fw-bold">ĐĂNG KÝ TÀI KHOẢN</button>
                                </form>
                            </div>

                            <div class="text-center mt-4">
                                <a href="/shop_mvc/index.php" class="text-decoration-none text-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Quay lại Trang chủ
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once __DIR__ . '/../layout/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/shop_mvc/js/cart.js"></script> <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. XỬ LÝ CHUYỂN TAB
            const loginBtn = document.getElementById('tab-login');
            const registerBtn = document.getElementById('tab-register');
            const loginContent = document.getElementById('content-login');
            const registerContent = document.getElementById('content-register');
            const alertMsg = document.getElementById('alert-message');

            const showTab = (tabName) => {
                // Ẩn thông báo cũ
                alertMsg.classList.add('d-none'); 
                
                if (tabName === 'login') {
                    loginBtn.classList.add('active');
                    registerBtn.classList.remove('active');
                    
                    // Bootstrap dùng d-none để ẩn
                    loginContent.classList.remove('d-none');
                    registerContent.classList.add('d-none');
                } else {
                    registerBtn.classList.add('active');
                    loginBtn.classList.remove('active');
                    
                    registerContent.classList.remove('d-none');
                    loginContent.classList.add('d-none');
                }
            };

            loginBtn.addEventListener('click', () => showTab('login'));
            registerBtn.addEventListener('click', () => showTab('register'));

            // 2. HÀM HIỂN THỊ THÔNG BÁO (Dùng class alert của Bootstrap)
            const showAlert = (type, message) => {
                alertMsg.classList.remove('d-none', 'alert-danger', 'alert-success', 'alert-info');
                
                if (type === 'error') {
                    alertMsg.classList.add('alert-danger');
                } else if (type === 'success') {
                    alertMsg.classList.add('alert-success');
                } else {
                    alertMsg.classList.add('alert-info');
                }
                alertMsg.innerHTML = message;
            };

            // 3. XỬ LÝ ĐĂNG NHẬP
            document.getElementById('form-login').addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(e.target);
                
                showAlert('loading', '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...');

                try {
                    const response = await fetch('/shop_mvc/api/index.php?action=login', {
                        method: 'POST',
                        body: formData
                    });
                    const data = await response.json();

                    if (data.success) {
                        showAlert('success', data.message);
                        setTimeout(() => { window.location.href = data.redirect; }, 1000);
                    } else {
                        showAlert('error', data.message);
                    }
                } catch (err) {
                    console.error(err);
                    showAlert('error', 'Lỗi kết nối server!');
                }
            });

            // 4. XỬ LÝ ĐĂNG KÝ
            document.getElementById('form-register').addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(e.target);

                // Kiểm tra mật khẩu khớp
                if (formData.get('mat_khau_reg') !== formData.get('xac_nhan_mat_khau')) {
                    showAlert('error', 'Mật khẩu xác nhận không khớp!');
                    return;
                }

                showAlert('loading', '<i class="fas fa-spinner fa-spin"></i> Đang đăng ký...');

                try {
                    const response = await fetch('/shop_mvc/api/index.php?action=register', {
                        method: 'POST',
                        body: formData
                    });
                    const data = await response.json();

                    if (data.success) {
                        showAlert('success', data.message);
                        // Chuyển qua tab đăng nhập sau 1.5s
                        setTimeout(() => { showTab('login'); }, 1500);
                        e.target.reset(); 
                    } else {
                        showAlert('error', data.message);
                    }
                } catch (err) {
                    console.error(err);
                    showAlert('error', 'Lỗi kết nối server!');
                }
            });
        });
    </script>
</body>
</html>