<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store</title>
    <link rel="shortcut icon" href="../images/Assets/logo/logoc.png" type="image/x-icon">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- CSS tùy chỉnh -->
    <link rel="stylesheet" href="../css/style.css">
</head>


<body>
    <?php include '../layout/header.html' ?>

    <!-- modal fade -->
    <div class="modal fade" id="formdangnhap">
        <div class="modal-dialog">
            <div class="modal-content border border-0 rounded-0 ">
                <div class="modal-header">
                    <div class="modal-title">
                        <h3>Đăng nhập</h3>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                            <a href="#" class="float-end text-decoration-none">Quên mật khẩu?</a>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">Đăng nhập</button>

                        <div class="text-center mb-3">Hoặc đăng nhập bằng</div>

                        <div class="social-login">
                            <button type="button" class="btn btn-outline-dark w-100 mb-2">
                                <i class="fab fa-google"></i> Google
                            </button>
                            <button type="button" class="btn btn-outline-dark w-100">
                                <i class="fab fa-facebook"></i> Facebook
                            </button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        Chưa có tài khoản?
                        <a href="dangky.html" class="text-decoration-none">Đăng ký ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="section-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pt-1 py-1 bg-info-subtle" style="font-size: small;">

                <li class="breadcrumb-item ms-2"><a href="/shop_mvc/index.php" class=" text-decoration-none"><i
                            class="fa fa-house text-black link-primary"></i></a></li>

                <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-name">Đang tải...</li>
            </ol>
        </nav>
        <div class="container-fluid mb-5">
            <div class="row mt-2">

                <div class="col-md-1 d-none d-lg-block">
                    <div data-bs-spy="scroll" ...>
                        <div style="overflow-y: scroll; height: 500px;" class="" id="gallery-thumbnail">
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 d-none d-md-block">
                    <div data-bs-spy="scroll" ...>
                        <div class="container" style="overflow-y: scroll; height: 630px;" id="gallery-main">
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 112 d-block d-md-none">
                    <div data-bs-spy="scroll" ...>
                        <div class="d-flex overflow-auto overflow-y-hidden container" style="height: 400px;" id="gallery-mobile">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 thongtinsp">
                    <h4 class="text-muted mt-2" id="product-name">Đang tải tên sản phẩm...</h4>
                    <div class="price1">
                        <div style="display: inline-flex;">
                            <h4 class="me-1" style="color: #ff0000;" id="product-price">...</h4>
                            <p style="font-weight: bold;font-size:18px;">đ</p>
                        </div>
                    </div>
                    <form action="">
                        <div class="row mb-3">
                            <div class="col-12">
                                <select class="form-select btn-outline-danger" name="size" id="product-variants">
                                    <option value="">Đang tải các lựa chọn...</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex">
                                <span class="input-group-text">Số lượng</span>
                                <select class="form-select border rounded-0" id="product-quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 d-md-block d-none">
                                <button type="button"
                                    class="btn btn-danger text-white w-100 btn-sm py-2 px-3 add-to-cart-btn"
                                    id="add-to-cart-btn">
                                    THÊM VÀO GIỎ HÀNG
                                </button>
                            </div>
                            <div class="col-12 col-md-6 d-block d-md-none mt-3 ">
                                <button type="button" id="add-to-cart-btn-mobile" class="btn btn-danger text-white w-100 btn-sm py-2 px-3">THÊM VÀO
                                    GIỎ HÀNG</button>
                            </div>
                        </div>
                    </form>

                    <div class="thongtinchitietsp mt-3" id="product-description">
                        <p>Đang tải mô tả...</p>
                    </div>

                    <div class="container mt-3">
                        <div id="related-products-container"
                            class="d-flex align-items-center justify-content-center pt-3 py-3  border border-light rounded-2 flex-row bg-body-tertiary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const urlParams = new URLSearchParams(window.location.search);
            const productId = urlParams.get('id');

            // Lấy các element
            const breadcrumbName = document.getElementById('breadcrumb-name');
            const productName = document.getElementById('product-name');
            const productPrice = document.getElementById('product-price');
            const productDescription = document.getElementById('product-description');
            const galleryThumb = document.getElementById('gallery-thumbnail');
            const galleryMain = document.getElementById('gallery-main');
            const galleryMobile = document.getElementById('gallery-mobile');
            const productVariantsSelect = document.getElementById('product-variants');
            const addToCartBtn = document.getElementById('add-to-cart-btn');
            const addToCartBtnMobile = document.getElementById('add-to-cart-btn-mobile');

            // (Lấy element cho sản phẩm liên quan)
            const relatedContainer = document.getElementById('related-products-container');

            if (!productId) {
                productName.textContent = 'Lỗi: Không tìm thấy ID sản phẩm.';
                return;
            }

            // Gọi API (getById)
            fetch(`/shop_mvc/api/index.php?action=getById&id=${productId}`)
                .then(response => {
                    if (!response.ok) throw new Error('Lỗi mạng hoặc không tìm thấy API');
                    return response.json();
                })
                .then(product => {
                    if (product.error) {
                        productName.textContent = product.error;
                        return;
                    }

                    // 4. Đổ dữ liệu (Text)
                    document.title = product.ten_san_pham;
                    breadcrumbName.textContent = product.ten_san_pham;
                    productName.textContent = product.ten_san_pham;

                    // 5. Đổ dữ liệu (Biến thể - Size/Màu/Giá)
                    productVariantsSelect.innerHTML = '';
                    if (product.list_bienthe && product.list_bienthe.length > 0) {
                        product.list_bienthe.forEach((variant, index) => {
                            const optionText = `${variant.ten_bienthe} - (${Number(variant.gia).toLocaleString('vi-VN')} đ) - (Còn: ${variant.so_luong_ton})`;
                            const option = new Option(optionText, variant.id);
                            option.dataset.price = variant.gia;
                            option.dataset.stock = variant.so_luong_ton;
                            productVariantsSelect.add(option);

                            if (index === 0) {
                                productPrice.textContent = Number(variant.gia).toLocaleString('vi-VN');
                            }
                        });
                    } else {
                        productPrice.textContent = 'Hết hàng';
                        productVariantsSelect.add(new Option('Sản phẩm đã hết hàng', ''));
                    }

                    // 6. Đổ dữ liệu (Mô tả)
                    productDescription.innerHTML = `
                    <div class="w-100 text-muted">Mã số: #${product.id}</div>
                    <div class="w-100 fw-bold text-dark">${product.ten_san_pham}</div>
                    <br>
                    <p>${product.mo_ta.replace(/\n/g, '<br>')}</p>
                `;

                    // 7. Đổ dữ liệu (Gallery Ảnh - 'list_hinhanh' là tên sai, đúng là 'list_chitietsanpham'?)
                    // (Kiểm tra lại Service: Ồ, Service của mình (Step 35) đặt tên là 'list_hinhanh'. Mình sẽ giữ nguyên)
                    galleryThumb.innerHTML = '';
                    galleryMain.innerHTML = '';
                    galleryMobile.innerHTML = '';

                    if (product.list_hinhanh && product.list_hinhanh.length > 0) {
                        product.list_hinhanh.forEach((img, index) => {
                            const imgUrl = `/shop_mvc/${img.duong_dan.trim()}`;
                            const imgId = `item-${img.id}`;
                            const imgIdMobile = `item-mobile-${img.id}`;

                            galleryThumb.innerHTML += `<a href="#${imgId}"><img src="${imgUrl}" class="img-fluid" width="60px" height="80px" alt="thumb ${index}"></a>`;
                            galleryMain.innerHTML += `<div id="${imgId}"><img src="${imgUrl}" class="img-fluid" alt="${product.ten_san_pham}"></div>`;
                            galleryMobile.innerHTML += `<div id="${imgIdMobile}" class="flex-shrink-0 me-2"><img src="${imgUrl}" class="img-fluid responsive-image" alt="mobile ${index}"></div>`;
                        });
                    } else {
                        galleryMain.innerHTML = '<p>Sản phẩm này chưa có ảnh.</p>';
                    }

                    // 8. (MỚI) Đổ dữ liệu (Sản phẩm liên quan)
                    relatedContainer.innerHTML = '';
                    if (product.list_lienquan && product.list_lienquan.length > 0) {
                        product.list_lienquan.forEach(related_sp => {
                            const imgUrl = `/shop_mvc/${related_sp.anh_dai_dien.trim()}`;
                            const linkUrl = `/shop_mvc/baocao/chitietsp_copy.php?id=${related_sp.id}`; // Trỏ về file này

                            relatedContainer.innerHTML += `
                            <a href="${linkUrl}" class="m-2">
                                <img src="${imgUrl}" width="80px" height="100px" class="img-fluid" alt="${related_sp.ten_san_pham}">
                            </a>
                        `;
                        });
                    }

                })
                .catch(error => {
                    console.error('Có lỗi khi fetch sản phẩm:', error);
                    productName.textContent = 'Không thể tải chi tiết sản phẩm. Vui lòng kiểm tra console.';
                });

            // (Sự kiện 'change' cho select - đã đúng)
            productVariantsSelect.addEventListener('change', (e) => {
                const selectedOption = e.target.options[e.target.selectedIndex];
                const newPrice = selectedOption.dataset.price;
                productPrice.textContent = Number(newPrice).toLocaleString('vi-VN');
            });
        });
    </script>

    <!-- <div class="container-fluid mb-5 ccr">
            <h5 class="text-center" style="font-weight:600;">Có Thể Bạn Quan Tâm</h5>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div id="carousel1" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../images/Assets/carouselsanpham/15e98e98-310f-3800-d563-001bee3e4cf9.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../images/Assets/carouselsanpham/435627a0-5f56-0300-596d-001afd09d59a.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel1"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel1"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">57</span>
                                <span style="color:#ff0000">&nbsp;46</span>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-6">
                    <div id="carousel2" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../images/Assets/carouselsanpham/06713670-7221-0100-bacb-001be813d44e.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../images/Assets/carouselsanpham/sp4.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel2"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel2"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">285</span>
                                <span style="color:#ff0000">&nbsp;228</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample3" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample3" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample3" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../images/Assets/carouselsanpham/sp5.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../images/Assets/carouselsanpham/sp4.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample3"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample3"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">285</span>
                                <span style="color:#ff0000">&nbsp;228</span>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample4" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample4" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample4" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../images/Assets/carouselsanpham/sp6.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../images/Assets/carouselsanpham/sp7.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample4"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample4"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">49 </span>
                                <span style="color:#ff0000">&nbsp;39 </span>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid mb-5 ccr">
            <div class="text-end"><a href="../index.html" class="btn btn-dark btn-sm">XEM THÊM CÁC SẢN PHẨM KHÁC</a></div>
        </div> -->

    </main>
    <!-- Footer -->
    <?php include '../layout/footer.html' ?>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/style.js"></script>
    <script src="/shop_mvc/js/cart.js"></script>
</body>

</html>