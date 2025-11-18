
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
            <div class="modal-content border-0 shadow-lg">

                <button type="button" class="btn-close position-absolute top-0 end-0 m-4 z-3" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body p-5">

                    <h3 class="text-center fw-bold mb-4 text-uppercase" style="letter-spacing: 2px;">Chào mừng</h3>

                    <div class="modal-nav-tabs-custom">
                        <button id="modal-tab-login" class="modal-tab-btn active">Đăng Nhập</button>
                        <button id="modal-tab-register" class="modal-tab-btn">Đăng Ký</button>
                    </div>

                    <div id="modal-alert-message" class="alert d-none text-center rounded-0" role="alert"></div>

                    <div id="modal-content-login" class="modal-tab-content">
                        <form id="modalLoginForm">
                            <div class="mb-3">
                                <label class="form-label small text-muted text-uppercase fw-bold">Email / Tên đăng nhập</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="ten_dang_nhap" class="form-control" required placeholder="Nhập tài khoản">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small text-muted text-uppercase fw-bold">Mật khẩu</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="mat_khau" class="form-control" required placeholder="Nhập mật khẩu">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input rounded-0" id="modalRemember">
                                    <label class="form-check-label small text-secondary" for="modalRemember">Ghi nhớ tôi</label>
                                </div>
                                <a href="#" class="text-decoration-none small text-secondary fw-bold">Quên mật khẩu?</a>
                            </div>

                            <button type="submit" class="btn btn-dark btn-dark-custom w-100 mb-3">Đăng Nhập</button>

                            <div class="text-center my-3 position-relative">
                                <hr class="m-0 text-secondary opacity-25">
                                <span class="position-absolute top-50 start-50 translate-middle bg-white px-2 small text-muted">HOẶC</span>
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="button" class="btn btn-outline-custom w-50 btn-sm py-2"><i class="fab fa-google text-danger me-2"></i>Google</button>
                                <button type="button" class="btn btn-outline-custom w-50 btn-sm py-2"><i class="fab fa-facebook-f text-primary me-2"></i>Facebook</button>
                            </div>
                        </form>

                        <div class="text-center mt-4 small text-muted">
                            Chưa có tài khoản?
                            <a href="#" id="modal-link-to-register" class="text-decoration-none fw-bold text-dark border-bottom border-dark pb-1">Đăng ký ngay</a>
                        </div>
                    </div>

                    <div id="modal-content-register" class="modal-tab-content hidden-tab">
                        <form id="modalRegisterForm">
                            <div class="mb-3">
                                <label class="form-label small text-muted text-uppercase fw-bold">Họ và Tên</label>
                                <input type="text" name="ho_ten" class="form-control" required placeholder="Nguyễn Văn A">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-muted text-uppercase fw-bold">Email</label>
                                <input type="email" name="email" class="form-control" required placeholder="email@example.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-muted text-uppercase fw-bold">Mật khẩu</label>
                                <input type="password" name="mat_khau_reg" class="form-control" required placeholder="Tối thiểu 6 ký tự">
                            </div>
                            <div class="mb-4">
                                <label class="form-label small text-muted text-uppercase fw-bold">Xác nhận Mật khẩu</label>
                                <input type="password" name="xac_nhan_mat_khau" class="form-control" required placeholder="Nhập lại mật khẩu">
                            </div>
                            <button type="submit" class="btn btn-dark-custom w-100">Đăng Ký Tài Khoản</button>
                        </form>

                        <div class="text-center mt-4 small text-muted">
                            Đã có tài khoản?
                            <a href="#" id="modal-link-to-login" class="text-decoration-none fw-bold text-dark border-bottom border-dark pb-1">Đăng nhập ngay</a>
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

            const switchModalTab = (tab) => {
                mAlertMsg.classList.add('d-none');
                if (tab === 'login') {
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

            const showModalAlert = (type, message) => {
                mAlertMsg.classList.remove('d-none', 'alert-danger', 'alert-success', 'alert-dark');
                if (type === 'error') mAlertMsg.classList.add('alert-danger');
                else if (type === 'success') mAlertMsg.classList.add('alert-success');
                else mAlertMsg.classList.add('alert-dark'); // Dùng alert tối màu cho loading
                mAlertMsg.innerHTML = message;
            };

            // --- API CALLS (Giữ nguyên logic cũ) ---
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
                            window.location.href = data.redirect;
                        }, 1000);
                    } else {
                        showModalAlert('error', data.message);
                    }
                } catch (err) {
                    showModalAlert('error', 'Lỗi kết nối server!');
                }
            });

            document.getElementById('modalRegisterForm').addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(e.target);
                if (formData.get('mat_khau_reg') !== formData.get('xac_nhan_mat_khau')) {
                    showModalAlert('error', 'Mật khẩu không khớp!');
                    return;
                }
                showModalAlert('loading', 'Đang đăng ký...');
                try {
                    const response = await fetch('/shop_mvc/api/index.php?action=register', {
                        method: 'POST',
                        body: formData
                    });
                    const data = await response.json();
                    if (data.success) {
                        showModalAlert('success', data.message);
                        setTimeout(() => {
                            switchModalTab('login');
                            e.target.reset();
                        }, 1500);
                    } else {
                        showModalAlert('error', data.message);
                    }
                } catch (err) {
                    showModalAlert('error', 'Lỗi kết nối server!');
                }
            });
        });
    </script>
    <style>
        /* Tùy chỉnh màu sắc cho Modal */
        .modal-content {
            border-radius: 0;
            /* Bo góc vuông vức sang trọng */
        }

        /* Tab Navigation */
        .modal-nav-tabs-custom {
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .modal-tab-btn {
            background: none;
            border: none;
            padding: 10px 15px;
            font-size: 1.1rem;
            font-weight: 500;
            color: #9ca3af;
            /* Xám nhạt */
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .modal-tab-btn:hover {
            color: #111827;
            /* Đen */
        }

        .modal-tab-btn.active {
            color: #111827;
            /* Đen đậm */
            border-bottom-color: #111827;
        }

        /* Input Styles */
        .form-control {
            border-radius: 0;
            border: 1px solid #d1d5db;
            padding: 10px 15px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #111827;
            /* Viền đen khi focus */
        }

        .input-group-text {
            background-color: #f9fafb;
            border-radius: 0;
            border: 1px solid #d1d5db;
            color: #6b7280;
        }

        /* Button Styles */
        .btn-dark-custom {
            background-color: #1f2937;
            border-color: #1f2937;
            border-radius: 0;
            padding: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .btn-dark-custom:hover {
            background-color: #111827;
            border-color: #111827;
        }

        .btn-outline-custom {
            border-radius: 0;
            border: 1px solid #d1d5db;
            color: #374151;
        }

        .btn-outline-custom:hover {
            background-color: #f3f4f6;
            color: #111827;
        }

        .modal-tab-content.hidden-tab {
            display: none !important;
        }

        .modal-backdrop {
            z-index: 1060 !important;
        }

        .modal {
            z-index: 1070 !important;
        }
    </style>