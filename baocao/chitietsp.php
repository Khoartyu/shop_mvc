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
                <li class="breadcrumb-item ms-2"><a href="../index.html" class=" text-decoration-none"><i
                            class="fa fa-house text-black link-primary"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Quần Short No Style M158 Đen</li>
            </ol>
        </nav>
        <div class="container-fluid mb-5">
            <div class="row mt-2">
                <div class="col-md-1 d-none d-lg-block">
                    <div data-bs-spy="scroll" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
                        class="scrollspy-example container p-0 pe-2" tabindex="0">
                        <div style="overflow-y: scroll; height: 500px;" class="">
                            <a href="#item1"><img src="../images/chitietsp/16.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item2"><img src="../images/chitietsp/2.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item3"><img src="../images/chitietsp/1.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item4"><img src="../images/chitietsp/18.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item5"> <img src="../images/chitietsp/3.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item6"><img src="../images/chitietsp/4.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item7"><img src="../images/chitietsp/5.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item8"><img src="../images/chitietsp/6.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item9"><img src="../images/chitietsp/7.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item10"><img src="../images/chitietsp/9.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item11"><img src="../images/chitietsp/10.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item12"><img src="../images/chitietsp/11.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item13"><img src="../images/chitietsp/12.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item14"><img src="../images/chitietsp/13.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item15"> <img src="../images/chitietsp/8.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item16"><img src="../images/chitietsp/14.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>
                            <a href="#item17"><img src="../images/chitietsp/15.jpg" class="img-fluid" width="60px"
                                    height="80px" alt=""></a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 d-none d-md-block">
                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
                        data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary rounded-2" tabindex="0">
                        <div class="container" style="overflow-y: scroll; height: 630px;">
                            <div id="item1">
                                <img src="../images/chitietsp/16.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item2">
                                <img src="../images/chitietsp/2.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item3">
                                <img src="../images/chitietsp/1.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item4">
                                <img src="../images/chitietsp/18.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item5">
                                <img src="../images/chitietsp/3.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item6">
                                <img src="../images/chitietsp/4.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item7">
                                <img src="../images/chitietsp/5.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item8">
                                <img src="../images/chitietsp/6.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item9">
                                <img src="../images/chitietsp/7.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item10">
                                <img src="../images/chitietsp/8.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item11">
                                <img src="../images/chitietsp/9.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item12">
                                <img src="../images/chitietsp/10.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item13">
                                <img src="../images/chitietsp/11.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item14">
                                <img src="../images/chitietsp/12.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item15">
                                <img src="../images/chitietsp/13.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item16">
                                <img src="../images/chitietsp/14.jpg" class="img-fluid" alt="">
                            </div>
                            <div id="item17">
                                <img src="../images/chitietsp/15.jpg" class="img-fluid" alt="">
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 112 d-block d-md-none">
                    <div data-bs-spy="scroll" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
                        class="scrollspy-example bg-body-tertiary rounded-2" tabindex="0">

                        <!-- Cuộn ngang Bootstrap -->
                        <div class="d-flex overflow-auto overflow-y-hidden container" style="height: 400px;">

                            <div id="item1" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/16.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item2" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/2.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item3" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/1.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item4" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/18.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item5" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/3.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item6" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/4.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item7" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/5.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item8" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/6.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item9" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/7.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item10" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/8.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item11" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/9.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item12" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/10.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item13" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/11.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item14" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/12.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item15" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/13.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item16" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/14.jpg" class="img-fluid responsive-image" alt="">
                            </div>
                            <div id="item17" class="flex-shrink-0 me-2">
                                <img src="../images/chitietsp/15.jpg" class="img-fluid responsive-image" alt="">
                            </div>

                            <!-- Các item còn lại tương tự -->

                        </div>

                    </div>
                </div>



                <div class="col-lg-6 col-md-6 thongtinsp">

                    <h4 class="text-muted mt-2">Quần Short No Style M158 Đen</h4>
                    <div class="price1">
                        <div style="display: inline-flex;">
                            <h4 class="text-decoration-line-through me-1" style="color: #ff0000;">257.000</h4>
                            <p>đ</p>
                        </div>
                    </div>
                    <h4 class="text-dark">Đặc Quyền Vàng VIP: Giảm Sâu 40%</h4>
                    <div class="price1">
                        <div style="display: inline-flex;">
                            <h4 class="me-1" style="color: #ff0000;">154.200</h4>
                            <p style="font-weight: bold;font-size:18px;">đ</p>
                        </div>
                    </div>
                    <h4 class="text-dark" style="font-weight: 200;">Giá Hời áp dụng đến hết ngày 31/05/2025</h4>
                    <form action="">
                        <!-- Chọn size -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <select class="form-select btn-outline-danger">
                                    <option value="1">Đen, Size S</option>
                                    <option value="1">Đen, Size M</option>
                                    <option value="1">Đen, Size L</option>
                                    <option value="2">Đen, Size XL</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex">
                                <span class="input-group-text">Số lượng</span>

                                <select class="form-select border rounded-0">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="2">4</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 d-md-block d-none">
                                <button type="submit"
                                    class="btn btn-danger text-white w-100 btn-sm py-2 px-3 add-to-cart-btn"
                                    data-id="sp01" data-name="Áo thun nam cổ tròn"
                                    data-image="../images/Assets/carouselsanpham/s33.jpg" data-price="199000"
                                    data-size="M" data-color="Đen">
                                    THÊM VÀO GIỎ HÀNG
                                </button>
                            </div>
                            <div class="col-12 col-md-6 d-block d-md-none mt-3 ">
                                <button type="submit" class="btn btn-danger text-white w-100 btn-sm py-2 px-3">THÊM VÀO
                                    GIỎ HÀNG</button>
                            </div>
                        </div>
                        <!-- Số lượng + nút thêm -->

                    </form>

                    <ul class="list-group list-group-flush mt-3 ms-auto">
                        <li class="list-group-item">Đen, Size S</li>
                        <li class="list-group-item">Đen, Size M</li>
                        <li class="list-group-item">Đen, Size L</li>
                        <li class="list-group-item">Đen, Size XL</li>

                    </ul>
                    <div class="thongtinchitietsp">
                        <div class="w-100 text-muted">Mã số: #0024126</div>
                        <div class="w-100 fw-bold text-dark">Quần Short 5 Inch Dáng Rộng No Style M158</div>



                        1. Kiểu sản phẩm: Quần short lưng thun dáng rộng.<br>
                        2. Ưu điểm:<br>
                        • Dáng rộng tạo cảm giác thoải mái, phóng khoáng.<br>
                        • Vải Mesh giúp thoát ẩm nhanh, mang lại cảm giác mát mẻ.<br>
                        • Phù hợp với nhiều phong cách, từ thể thao đến đường phố.<br>
                        3. Chất liệu: Mesh Fabric 100% Polyester.<br>
                        4. Kỹ thuật:<br>
                        • Lưng thun đảm bảo sự vừa vặn và linh hoạt.<br>
                        • Túi trước và sau tiện lợi cho việc đựng đồ dùng cá nhân.<br>




                        <div class="mb-3">
                            <div class="collapse" id="productDetails">
                                • In dẻo họa tiết sắc nét, bền màu.<br>
                                • Ép logo tạo điểm nhấn thương hiệu.<br>
                                • Thiết kế 2 lớp với lớp trong bằng vải lưới tạo cảm giác luôn thoáng mát.<br>
                                5. Phù hợp với ai: Những người hoạt động thể thao cần sự thoải mái và thấm hút mồ hôi,
                                và
                                những
                                ai yêu thích sự thoải mái với dáng rộng và chất liệu thoáng mát.<br>
                                6. Thuộc Bộ Sưu Tập: No Style - Bộ sưu tập với nhiều phong cách khác nhau, đem lại sự
                                hoàn
                                hảo
                                cho mọi gu thời trang của bạn.<br>
                                7. Tên thường gọi hoặc tìm kiếm về sản phẩm này: Quần short nam, quần short dáng rộng 2
                                lớp,
                                quần short vải lưới, quần short thể thao, quần short thoáng mát.

                            </div>

                            <!-- Nút toggle collapse -->
                            <a class="btn btn-outline-secondary text-dark btn-sm" data-bs-toggle="collapse"
                                href="#productDetails" role="button" aria-expanded="false"
                                aria-controls="productDetails">
                                Đọc thêm / Ẩn bớt
                            </a>

                        </div>
                    </div>
                    <div class="container">
                        <div
                            class="d-flex align-items-center justify-content-center pt-3 py-3  border border-light rounded-2 flex-row bg-body-tertiary">
                            <a href="#"><img src="../images/chitietsp/lienquan/1.jpg" width="80px" height="100px"
                                    class="img-fluid" alt=""></a>
                            <a href="#"><img src="../images/chitietsp/lienquan/2.jpg" width="80px" height="100px"
                                    class="img-fluid" alt=""></a>
                            <a href="#"><img src="../images/chitietsp/lienquan/3.jpg" width="80px" height="100px"
                                    class="img-fluid" alt=""></a>
                        </div>

                        </a>
                    </div>
                </div>
            </div>

        </div>
        
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
</body>

</html>