<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store - Thời trang</title>
    
    <link rel="shortcut icon" href="/shop_mvc/images/Assets/logo/logoc.png" type="image/x-icon">
    
    </head>
<style>
    /* CSS cho Tab (Đã đổi ID để không xung đột) */
    .modal-nav-tabs-custom {
        border-bottom: 2px solid #dee2e6;
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
    }
    .modal-tab-btn {
        background: none;
        border: none;
        padding: 10px 30px;
        font-size: 1.1rem;
        font-weight: 600;
        color: #6c757d;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }
    .modal-tab-btn:hover { color: #198754; }
    .modal-tab-btn.active {
        color: #198754;
        border-bottom-color: #198754;
    }
    .modal-tab-content.hidden-tab { display: none !important; }
    
    /* Fix z-index để modal đè lên header */
    .modal-backdrop { z-index: 1060 !important; }
    .modal { z-index: 1070 !important; }
</style>
<body>
    <header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background:#343a40; font-size: 15px;">
        <div class="container">
            <div class="d-flex">
                <button class="navbar-toggler me-2" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand nav-link" id="lgbrand" href="/shop_mvc/index.php">
                    <img src="/shop_mvc/images/Assets/logo/logobrand.png" width="100" height="33.33px" alt="logobrand">
                </a>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item d-block d-md-none">
                    <div class="d-flex">
                        <a href="#" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                            <i class="fas fa-search"></i>
                        </a>

                        <a href="/../shop_mvc/baocao/login.php" class="nav-link d-block d-md-none">
                            <i class="fas fa-user"></i>
                        </a>
                        <a class="nav-link d-none d-md-block" data-bs-toggle="modal" data-bs-target="#formdangnhap">
                            <i class="fas fa-user"></i>
                        </a>

                        <a href="/shop_mvc/baocao/giohang.php" class="nav-link position-relative">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="position-absolute start-100 m-1 translate-middle badge rounded-pill bg-danger cart-counter" style="top: 15%;">0</span>
                        </a>&nbsp;&nbsp;&nbsp;
                    </div>
                </li>
            </ul>

            <div class="collapse navbar-collapse text-uppercase" id="navbarNav">
                <ul class="navbar-nav m-auto text-white" style="font-size: medium;font-weight: 400;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            Khuyến mãi
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <div class="top-bar"></div>
                            <li><a class="dropdown-item" href="/shop_mvc/baocao/khuyenmai.php">Đặc Quyền Vip - Giảm Sâu 40%</a></li>
                            <li><a class="dropdown-item" href="#"> Chọn Giúp Bạn</a></li>
                            <li><a class="dropdown-item" href="#">Nhập Hội Kinh Điển</a></li>
                            <li><a class="dropdown-item" href="#">Beginner Sale Sốc</a></li>
                            <li><a class="dropdown-item" href="#">Hè Cháy - Phụ Kiện Slay</a></li>
                            <li><a class="dropdown-item" href="#">Giá Đặc Biệt</a></li>
                            <li><a class="dropdown-item" href="#">Outlet Sale</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/shop_mvc/baocao/mobandautuan.php">Mở Bán Tuần Này</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            Quần Áo
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <div class="top-bar"></div>
                            <li><a class="dropdown-item" href="#">Áo Thun</a></li>
                            <li><a class="dropdown-item" href="#">Áo Khoác </a></li>
                            <li><a class="dropdown-item" href="#">Áo Sơ Mi </a></li>
                            <li><a class="dropdown-item" href="#">Quần Short </a></li>
                            <li><a class="dropdown-item" href="#">Quần Dài</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            Phụ Kiện
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Balo</a></li>
                            <li><a class="dropdown-item" href="#">Túi Đeo</a></li>
                            </ul>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-md-block">
                        <div class="d-flex">
                            <a href="#" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                                <i class="fas fa-search"></i>
                            </a>
                            <a href="/../shop_mvc/baocao/login.php" id="lgbrand" class="nav-link d-block d-md-none">
                                <i class="fas fa-user"></i>
                            </a>
                            <a class="nav-link d-none d-md-block" id="lgbrand" data-bs-toggle="modal" data-bs-target="#formdangnhap">
                                <i class="fas fa-user"></i>
                            </a>
                            <a href="/shop_mvc/baocao/giohang.php" class="nav-link position-relative">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="position-absolute start-100 m-1 translate-middle badge rounded-pill bg-danger cart-counter" style="top: 15%;">0</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-top w-100" style="height: 68px;" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="container">
            <div class="offcanvas-header pt-1 py-0 d-flex">
                <input type="text" class="form-control custom-input" style="font-size: xx-large; border: none !important;box-shadow: none;" placeholder="Tìm sản phẩm..." />
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
        </div>
    </div>
</header>

<!-- ========================================================= -->
<!-- MODAL ĐĂNG NHẬP / ĐĂNG KÝ (Sử dụng Giao diện Login.php) -->
<!-- ========================================================= -->

<!-- 1. CSS TÙY CHỈNH (Lấy từ file login.php của bạn) -->


<!-- 2. HTML CỦA MODAL -->
<!-- ID "formdangnhap" này phải khớp với nút User trên thanh Menu (PC) -->
<div class="modal fade" id="formdangnhap" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Lấy giao diện card từ file login.php -->
        <div class="modal-content shadow-lg border-0" style="border-radius: 1rem; overflow: hidden;">
            <div class="card-body p-5">
                
                <!-- Nút đóng (Thêm vào) -->
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>

                <h2 class="text-center fw-bold mb-4 text-dark">Chào mừng trở lại!</h2>

                <!-- Tab Navigation (Đã đổi ID) -->
                <div class="nav-tabs-custom">
                    <button id="modal-tab-login" class="modal-tab-btn active">Đăng Nhập</button>
                    <button id="modal-tab-register" class="modal-tab-btn">Đăng Ký</button>
                </div>

                <!-- Alert (Đã đổi ID) -->
                <div id="modal-alert-message" class="alert d-none text-center" role="alert"></div>

                <!-- FORM LOGIN (Đã đổi ID) -->
                <div id="modal-content-login" class="modal-tab-content">
                    <form id="modal-form-login">
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
                                <input type="checkbox" class="form-check-input" id="modal-remember">
                                <label class="form-check-label" for="modal-remember">Ghi nhớ</label>
                            </div>
                            <a href="#" class="text-decoration-none text-success">Quên mật khẩu?</a>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">ĐĂNG NHẬP</button>
                        <div class="text-center my-3 text-muted"><span>— Hoặc đăng nhập bằng —</span></div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-danger w-50"><i class="fab fa-google me-2"></i>Google</button>
                            <button type="button" class="btn btn-outline-primary w-50"><i class="fab fa-facebook-f me-2"></i>Facebook</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <a href="#" id="modal-link-to-register" class="text-decoration-none text-secondary">
                            Chưa có tài khoản? <span class="fw-bold text-success">Đăng ký ngay</span>
                        </a>
                    </div>
                </div>

                <!-- FORM REGISTER (Đã đổi ID) -->
                <div id="modal-content-register" class="modal-tab-content hidden-tab">
                    <form id="modal-form-register">
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
                    <div class="text-center mt-4">
                        <a href="#" id="modal-link-to-login" class="text-decoration-none text-secondary">
                            Đã có tài khoản? <span class="fw-bold text-dark">Đăng nhập ngay</span>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- 3. JAVASCRIPT XỬ LÝ (Đã đổi ID) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- 1. KHAI BÁO BIẾN (Dùng ID của Modal) ---
        const mLoginBtn = document.getElementById('modal-tab-login');
        const mRegisterBtn = document.getElementById('modal-tab-register');
        const mLinkToReg = document.getElementById('modal-link-to-register');
        const mLinkToLog = document.getElementById('modal-link-to-login');
        
        const mLoginContent = document.getElementById('modal-content-login');
        const mRegisterContent = document.getElementById('modal-content-register');
        const mAlertMsg = document.getElementById('modal-alert-message');

        // Chỉ chạy nếu Modal (mLoginBtn) tồn tại
        if (!mLoginBtn) return;

        // --- 2. HÀM CHUYỂN TAB ---
        const showModalTab = (tabName) => {
            mAlertMsg.classList.add('d-none'); 
            if (tabName === 'login') {
                mLoginBtn.classList.add('active');
                mRegisterBtn.classList.remove('active');
                mLoginContent.classList.remove('hidden-tab');
                mRegisterContent.classList.add('hidden-tab');
            } else {
                mRegisterBtn.classList.add('active');
                mLoginBtn.classList.remove('active');
                mRegisterContent.classList.remove('hidden-tab');
                mLoginContent.classList.add('hidden-tab');
            }
        };

        // Gắn sự kiện click chuyển tab (cho cả nút và link text)
        mLoginBtn.addEventListener('click', () => showModalTab('login'));
        mRegisterBtn.addEventListener('click', () => showModalTab('register'));
        mLinkToReg.addEventListener('click', (e) => { e.preventDefault(); showModalTab('register'); });
        mLinkToLog.addEventListener('click', (e) => { e.preventDefault(); showModalTab('login'); });

        // --- 3. HÀM HIỂN THỊ THÔNG BÁO ---
        const showModalAlert = (type, message) => {
            mAlertMsg.classList.remove('d-none', 'alert-danger', 'alert-success', 'alert-info');
            if (type === 'error') mAlertMsg.classList.add('alert-danger');
            else if (type === 'success') mAlertMsg.classList.add('alert-success');
            else mAlertMsg.classList.add('alert-info');
            mAlertMsg.innerHTML = message;
        };

        // --- 4. XỬ LÝ API LOGIN ---
        document.getElementById('modal-form-login').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            showModalAlert('loading', '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...');

            try {
                const response = await fetch('/shop_mvc/api/index.php?action=login', { method: 'POST', body: formData });
                const data = await response.json();

                if (data.success) {
                    showModalAlert('success', 'Thành công! Đang chuyển hướng...');
                    setTimeout(() => { window.location.href = data.redirect; }, 1000);
                } else {
                    showModalAlert('error', data.message);
                }
            } catch (err) {
                console.error(err);
                showModalAlert('error', 'Lỗi kết nối server!');
            }
        });

        // --- 5. XỬ LÝ API REGISTER ---
        document.getElementById('modal-form-register').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);

            if (formData.get('mat_khau_reg') !== formData.get('xac_nhan_mat_khau')) {
                showModalAlert('error', 'Mật khẩu xác nhận không khớp!');
                return;
            }
            showModalAlert('loading', '<i class="fas fa-spinner fa-spin"></i> Đang đăng ký...');

            try {
                const response = await fetch('/shop_mvc/api/index.php?action=register', { method: 'POST', body: formData });
                const data = await response.json();

                if (data.success) {
                    showModalAlert('success', data.message);
                    setTimeout(() => { showModalTab('login'); }, 1500);
                    e.target.reset();
                } else {
                    showModalAlert('error', data.message);
                }
            } catch (err) {
                console.error(err);
                showModalAlert('error', 'Lỗi kết nối server!');
            }
        });
    });
</script>
    </body>
</html>