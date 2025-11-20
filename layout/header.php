




    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background:#343a40; font-size: 15px;">
            <div class="container">
                <div class="d-flex align-items-center">
                    <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand nav-link p-0" id="lgbrand" href="/shop_mvc/index.php">
                        <img src="/shop_mvc/images/Assets/logo/logobrand.png" width="100" height="33.33px" alt="FASHION" style="object-fit: contain;">
                    </a>
                </div>

                <div class="d-flex d-md-none align-items-center">
                    <a href="#" class="nav-link text-white px-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop">
                        <i class="fas fa-search"></i>
                    </a>
                    <a class="nav-link text-white px-2" data-bs-toggle="modal" data-bs-target="#formdangnhap">
                        <i class="fas fa-user"></i>
                    </a>
                    <a href="/shop_mvc/baocao/giohang.php" class="nav-link text-white px-2 position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart-total-count-mobile" style="font-size: 0.6rem;">0</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse text-uppercase" id="navbarNav">
                    <ul class="navbar-nav m-auto text-white" style="font-size: 0.9rem; font-weight: 500;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">Khuyến mãi</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="/shop_mvc/baocao/khuyenmai.php">Đặc Quyền Vip - 40%</a></li>
                                <li><a class="dropdown-item" href="#">Chọn Giúp Bạn</a></li>
                                <li><a class="dropdown-item" href="#">Outlet Sale</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/shop_mvc/baocao/mobandautuan.php">Mở Bán Tuần Này</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">Quần Áo</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">Áo Thun</a></li>
                                <li><a class="dropdown-item" href="#">Áo Khoác</a></li>
                                <li><a class="dropdown-item" href="#">Quần Dài</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">Phụ Kiện</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">Balo</a></li>
                                <li><a class="dropdown-item" href="#">Túi Đeo</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="navbar-nav d-none d-md-flex align-items-center">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop">
                                <i class="fas fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#formdangnhap">
                                <i class="fas fa-user"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/shop_mvc/baocao/giohang.php" class="nav-link position-relative">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart-total-count" style="display: none;">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="offcanvas offcanvas-top w-100" style="height: 80px;" tabindex="-1" id="offcanvasTop">
            <div class="container h-100">
                <div class="offcanvas-header h-100 d-flex align-items-center">
                    <i class="fas fa-search fs-4 text-muted me-3"></i>
                    <input type="text" class="form-control custom-input flex-grow-1" style="font-size: 1.5rem; border: none;" placeholder="Tìm kiếm sản phẩm..." />
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </header>

    <div class="modal fade" id="formdangnhap" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 0;">
                
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body p-4 p-md-5">
                    <h3 class="text-center fw-bold mb-4 text-uppercase" style="letter-spacing: 2px;">Thành viên</h3>

                    <div class="modal-nav-tabs-custom">
                        <button id="modal-tab-login" class="modal-tab-btn active">Đăng Nhập</button>
                        <button id="modal-tab-register" class="modal-tab-btn">Đăng Ký</button>
                    </div>

                    <div id="modal-alert-message" class="alert d-none text-center rounded-0 small py-2" role="alert"></div>

                    <div id="modal-content-login" class="modal-tab-content">
                        <form id="modalLoginForm">
                            <div class="mb-3">
                                <label class="form-label small text-muted fw-bold text-uppercase">Tài khoản</label>
                                <input type="text" name="ten_dang_nhap" class="form-control" required placeholder="Email hoặc tên đăng nhập">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-muted fw-bold text-uppercase">Mật khẩu</label>
                                <input type="password" name="mat_khau" class="form-control" required placeholder="Nhập mật khẩu">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input rounded-0" id="modalRemember">
                                    <label class="form-check-label small text-secondary" for="modalRemember">Ghi nhớ</label>
                                </div>
                                <a href="#" class="text-decoration-none small text-secondary fw-bold">Quên mật khẩu?</a>
                            </div>
                            <button type="submit" class="btn btn-dark btn-dark-custom w-100 mb-3">Đăng Nhập</button>
                            
                            <div class="text-center position-relative my-3">
                                <hr class="m-0">
                                <span class="position-absolute top-50 start-50 translate-middle bg-white px-2 small text-muted">HOẶC</span>
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="button" class="btn btn-outline-custom w-50 btn-sm py-2"><i class="fab fa-google text-danger me-2"></i>Google</button>
                                <button type="button" class="btn btn-outline-custom w-50 btn-sm py-2"><i class="fab fa-facebook-f text-primary me-2"></i>Facebook</button>
                            </div>
                        </form>
                        <div class="text-center mt-4 small text-muted">
                            Chưa có tài khoản? <a href="#" id="modal-link-to-register" class="text-decoration-none fw-bold text-dark border-bottom border-dark pb-1">Đăng ký ngay</a>
                        </div>
                    </div>

                    <div id="modal-content-register" class="modal-tab-content hidden-tab">
                        <form id="modalRegisterForm">
                            <div class="mb-3">
                                <label class="form-label small text-muted fw-bold text-uppercase">Họ và Tên</label>
                                <input type="text" name="ho_ten" class="form-control" required placeholder="Nguyễn Văn A">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-muted fw-bold text-uppercase">Email</label>
                                <input type="email" name="email" class="form-control" required placeholder="email@example.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-muted fw-bold text-uppercase">Mật khẩu</label>
                                <input type="password" name="mat_khau_reg" class="form-control" required placeholder="Tối thiểu 6 ký tự">
                            </div>
                            <div class="mb-4">
                                <label class="form-label small text-muted fw-bold text-uppercase">Xác nhận</label>
                                <input type="password" name="xac_nhan_mat_khau" class="form-control" required placeholder="Nhập lại mật khẩu">
                            </div>
                            <button type="submit" class="btn btn-dark btn-dark-custom w-100">Đăng Ký Tài Khoản</button>
                        </form>
                        <div class="text-center mt-4 small text-muted">
                            Đã có tài khoản? <a href="#" id="modal-link-to-login" class="text-decoration-none fw-bold text-dark border-bottom border-dark pb-1">Đăng nhập</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mLoginBtn = document.getElementById('modal-tab-login');
            const mRegisterBtn = document.getElementById('modal-tab-register');
            const mLinkToReg = document.getElementById('modal-link-to-register');
            const mLinkToLog = document.getElementById('modal-link-to-login');
            const mLoginContent = document.getElementById('modal-content-login');
            const mRegisterContent = document.getElementById('modal-content-register');
            const mAlertMsg = document.getElementById('modal-alert-message');

            if (!mLoginBtn) return;

            // --- HÀM CHUYỂN TAB ---
            const switchModalTab = (tab) => {
                mAlertMsg.classList.add('d-none'); // Ẩn thông báo lỗi cũ
                if (tab === 'login') {
                    // Active nút Login
                    mLoginBtn.classList.add('active');
                    mRegisterBtn.classList.remove('active');
                    // Hiện form Login, Ẩn form Register
                    mLoginContent.classList.remove('hidden-tab');
                    mRegisterContent.classList.add('hidden-tab');
                } else {
                    // Active nút Register
                    mRegisterBtn.classList.add('active');
                    mLoginBtn.classList.remove('active');
                    // Hiện form Register, Ẩn form Login
                    mRegisterContent.classList.remove('hidden-tab');
                    mLoginContent.classList.add('hidden-tab');
                }
            };

            // Gắn sự kiện Click
            mLoginBtn.addEventListener('click', () => switchModalTab('login'));
            mRegisterBtn.addEventListener('click', () => switchModalTab('register'));
            
            mLinkToReg.addEventListener('click', (e) => {
                e.preventDefault();
                switchModalTab('register');
            });
            mLinkToLog.addEventListener('click', (e) => {
                e.preventDefault();
                switchModalTab('login');
            });

            // --- HÀM HIỂN THỊ THÔNG BÁO ---
            const showModalAlert = (type, message) => {
                mAlertMsg.classList.remove('d-none', 'alert-danger', 'alert-success', 'alert-dark');
                if (type === 'error') mAlertMsg.classList.add('alert-danger');
                else if (type === 'success') mAlertMsg.classList.add('alert-success');
                else mAlertMsg.classList.add('alert-dark'); // Loading
                mAlertMsg.innerHTML = message;
            };

            // --- XỬ LÝ FORM ĐĂNG NHẬP ---
            document.getElementById('modalLoginForm').addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(e.target);
                showModalAlert('loading', '<i class="fas fa-spinner fa-spin"></i> Đang kiểm tra...');
                
                try {
                    const response = await fetch('/shop_mvc/api/index.php?action=login', {
                        method: 'POST',
                        body: formData
                    });
                    const data = await response.json();
                    
                    if (data.success) {
                        showModalAlert('success', 'Đăng nhập thành công!');
                        setTimeout(() => {
                            window.location.href = data.redirect || '/shop_mvc/index.php';
                        }, 1000);
                    } else {
                        showModalAlert('error', data.message || 'Đăng nhập thất bại');
                    }
                } catch (err) {
                    console.error(err);
                    showModalAlert('error', 'Lỗi kết nối server!');
                }
            });

            // --- XỬ LÝ FORM ĐĂNG KÝ ---
            document.getElementById('modalRegisterForm').addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(e.target);
                
                // Kiểm tra mật khẩu
                if (formData.get('mat_khau_reg') !== formData.get('xac_nhan_mat_khau')) {
                    showModalAlert('error', 'Mật khẩu xác nhận không khớp!');
                    return;
                }

                showModalAlert('loading', '<i class="fas fa-spinner fa-spin"></i> Đang đăng ký...');
                
                try {
                    const response = await fetch('/shop_mvc/api/index.php?action=register', {
                        method: 'POST',
                        body: formData
                    });
                    const data = await response.json();
                    
                    if (data.success) {
                        showModalAlert('success', data.message || 'Đăng ký thành công!');
                        // Chuyển sang tab đăng nhập sau 1.5s
                        setTimeout(() => {
                            switchModalTab('login');
                            e.target.reset();
                            showModalAlert('success', 'Vui lòng đăng nhập bằng tài khoản vừa tạo.');
                        }, 1500);
                    } else {
                        showModalAlert('error', data.message || 'Đăng ký thất bại');
                    }
                } catch (err) {
                    console.error(err);
                    showModalAlert('error', 'Lỗi kết nối server!');
                }
            });
        });
    </script>