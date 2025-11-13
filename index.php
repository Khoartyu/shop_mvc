<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store - Thời trang</title>
    <link rel="shortcut icon" href="images/Assets/logo/logoc.png" type="image/x-icon">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- CSS tùy chỉnh -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'layout/header.php' ?>

 


    <main class="section-wrapper mt-3">

        <!-- Hero Section -->
        <section class="position-relative w-100 overflow-hidden">
            <img src="images/Assets/banner-carousel/thoi_trang_mac_suong.jpg" class="img-fluid w-100" alt="Hero Image">
        </section>

        <!-- danh mục -->
        <div class="container-fluid p-0 mt-4">
            <div class="row">
                <div class="col coldanhmuc">
                    <div class="mt-2 mb-2">
                        <a href="#"><img loading="lazy" src="images/Assets/danhmuc/danhmuc1.jpg" class="img-fluid"></a>
                        <a href="#" id="danhmuc-link" style=" font-size:12px; font-weight:bold;">
                            CHỈ TỪ 70K
                        </a>
                    </div>

                </div>
                <div class="col coldanhmuc">
                    <div class="mt-2 mb-2">
                        <a href="#"><img loading="lazy" src="images/Assets/danhmuc/danhmuc2.jpg" class="img-fluid"></a>
                        <a href="#" id="danhmuc-link" style="font-size:12px; font-weight:bold;">
                            MỀM MỊN MÁT
                        </a>
                    </div>

                </div>
                <div class="col coldanhmuc">
                    <div class="mt-2 mb-2">
                        <a href="#"><img loading="lazy" src="images/Assets/danhmuc/danhmuc-3.jpg" class="img-fluid"></a>
                        <a href="#" id="danhmuc-link" style=" font-size:12px; font-weight:bold;">
                            CÔNG NGHỆ CAO
                        </a>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col coldanhmuc">
                    <div class="mt-2 mb-2">
                        <a href="#"><img loading="lazy" src="images/Assets/danhmuc/dm4.jpg" class="img-fluid"></a>
                        <a href="#" id="danhmuc-link" style=" font-size:12px; font-weight:bold;">
                            "LÀ" SƯỚNG
                        </a>
                    </div>

                </div>
                <div class="col coldanhmuc">
                    <div class="mt-2 mb-2">
                        <a href="#"><img loading="lazy" src="images/Assets/danhmuc/dm-5.jpg" class="img-fluid"></a>
                        <a href="#" id="danhmuc-link" style=" font-size:12px; font-weight:bold;">
                            ĐA DẠNG SIZE
                        </a>
                    </div>

                </div>
                <div class="col  coldanhmuc">
                    <div class="mt-2 mb-2">
                        <a href="#"><img loading="lazy" src="images/Assets/danhmuc/dm-6.jpg" class="img-fluid"></a>
                        <a href="#" id="danhmuc-link" style=" font-size:12px; font-weight:bold;">
                            CÁ NHÂN HÓA
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- hero-banner -->
        <section class="position-relative w-100 overflow-hidden">
            <img src="images/Assets/banner-carousel/thoi_trang_gia_that_tot.jpg" class="img-fluid w-100"
                alt="Hero Image">
        </section>
        <!-- hero-cr -->
        <div id="carouselExample" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="images/Assets/banner-carousel/dac_quyen_vang_vip.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="images/Assets/banner-carousel/sale_dac_quyen.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="images/Assets/banner-carousel/Restock_Day_Nit.jpg" class="d-block w-100" alt="...">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Optional: Indicator buttons -->
            <div class="carousel-indicators" id="bn-cr">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
        </div>

        <!-- carousel danh mục -->
        <div class="container-fluid mb-5 ccr">
            <h5 class="text-center" style="font-weight:600;">Sale Nhanh Chớp Ngay</h5>
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
                                <img src="images/Assets/carouselsanpham/15e98e98-310f-3800-d563-001bee3e4cf9.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/435627a0-5f56-0300-596d-001afd09d59a.jpg"
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
                                <img src="images/Assets/carouselsanpham/06713670-7221-0100-bacb-001be813d44e.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp4.jpg" class="d-block w-100" alt="...">
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
                                <img src="images/Assets/carouselsanpham/sp5.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp4.jpg" class="d-block w-100" alt="...">
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
                                <img src="images/Assets/carouselsanpham/sp6.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp7.jpg" class="d-block w-100" alt="...">
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
        <script>
            // Giai đoạn 1: Trang chủ (ĐÃ SỬA LỖI - GIỮ NGUYÊN LAYOUT)

            // SỬA 1: Dùng đường dẫn tuyệt đối
            fetch('/shop_mvc/api/index.php?action=layTatCa')
                .then(res => res.json())
                .then(ds => {
                    let html = '';

                    if (!Array.isArray(ds)) {
                        console.error('Lỗi API:', ds);
                        document.querySelector('.row').innerHTML = '<p class="text-danger text-center">Không tải được sản phẩm!</p>';
                        return;
                    }

                    ds.forEach((sp, index) => {

                        // SỬA 2: Đổi tên cột 'hinh_anh' -> 'anh_dai_dien'
                        // (Bạn vẫn phải nhập nhiều ảnh, cách nhau bằng dấu phẩy, vào cột `anh_dai_dien`)
                        const dsAnh = sp.anh_dai_dien ? sp.anh_dai_dien.split(',') : ['images/placeholder.jpg'];

                        const carouselId = `carousel${index + 1}`;

                        // (Bắt đầu HTML)
                        html += `
    <div class="col-lg-3 col-6">
        
        <div id="${carouselId}" class="carousel carousel-dark slide" data-bs-ride="carousel">
            
            <div class="carousel-indicators">
                ${dsAnh.map((_, i) => `
                    <button type="button" data-bs-target="#${carouselId}" data-bs-slide-to="${i}" 
                        ${i === 0 ? 'class="active" aria-current="true"' : ''} aria-label="Slide ${i + 1}">
                    </button>`).join('')}
            </div>

            <div class="carousel-inner">
                ${dsAnh.map((anh, i) => `
                    <div class="carousel-item ${i === 0 ? 'active' : ''}">
                        
                        <a href="/shop_mvc/baocao/chitietsp.php?id=${sp.id}">
                            <img src="/shop_mvc/${anh.trim()}" class="d-block w-100" alt="${sp.ten_san_pham}">
                        </a>
                    </div>`).join('')}
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#${carouselId}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#${carouselId}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="price">
            <span class="mb-1">
                <span style="text-decoration:line-through">${(sp.gia * 1.2).toLocaleString()}đ</span>
                <span style="color:#ff0000">&nbsp;${Number(sp.gia).toLocaleString()}đ</span>
            </span>
        </div>
    </div>
    `;
                    });

                    document.querySelector('.row').innerHTML = html;
                })
                .catch(err => {
                    console.error('Lỗi tải sản phẩm:', err);
                    document.querySelector('.row').innerHTML = '<p class="text-danger text-center">Không tải được danh sách sản phẩm!</p>';
                });
        </script>
        <div class="container-fluid mb-5 ccr">
            <div class="text-end"><a class="btn btn-dark btn-sm">XEM THÊM CÁC SẢN PHẨM KHÁC</a></div>
        </div>
        <!-- hero-cr -->
        <div id="carouselExample02" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="images/Assets/banner-carousel/dac_quyen_vang_vip.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="images/Assets/banner-carousel/sale_dac_quyen.jpg" class="d-block w-100" alt="...">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample02"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample02"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Optional: Indicator buttons -->
            <div class="carousel-indicators" id="bn-cr">
                <button type="button" data-bs-target="#carouselExample02" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample02" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
        </div>

        <!-- carousel danh mục -->
        <div class="container-fluid mb-5 ccr">
            <h5 class="text-center" style="font-weight:600;">Tân Trang Tủ Đồ, Mặc Lên Đời</h5>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div id="carousel5" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel5" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel5" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <a href="baocao/chitietsp.html">
                                <div class="carousel-item active">
                                    <img src="images/Assets/carouselsanpham/sp8.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/Assets/carouselsanpham/sp9.jpg" class="d-block w-100" alt="...">
                                </div>
                            </a>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel5"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel5"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">257 </span>
                                <span style="color:#ff0000">&nbsp; 154 </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample6" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample6" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample6" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp10.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp11.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample6"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample6"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">
                                    557 </span>
                                <span style="color:#ff0000">&nbsp;334</span>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample7" class="carousel carousel-dark slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp12.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp13.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample7" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample7" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample7"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample7"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">457 </span>
                                <span style="color:#ff0000">&nbsp;274</span>
                            </span>
                        </div>
                    </div>


                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample8" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample8" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample8" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp13.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp14.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample8"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample8"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">397 </span>
                                <span style="color:#ff0000">&nbsp;238</span>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid mb-5 ccr">
            <div class="text-end"><a class="btn btn-dark btn-sm">XEM THÊM CÁC SẢN PHẨM KHÁC</a></div>
        </div>
        <!-- hero-cr -->
        <div id="carouselExample03" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="images/Assets/banner-carousel/sale_kinh_dien.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="images/Assets/banner-carousel/nhap_hoi_kinh_dien.jpg" class="d-block w-100" alt="...">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample03"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample03"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Optional: Indicator buttons -->
            <div class="carousel-indicators" id="bn-cr">
                <button type="button" data-bs-target="#carouselExample03" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample03" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
        </div>

        <!-- carousel danh mục -->
        <div class="container-fluid mb-5 ccr">
            <h5 class="text-center" style="font-weight:600;">"Mặc Sướng" Với Giá Hời</h5>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div id="carousel9" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel9" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel9" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp15.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp16.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel9"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel9"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">397 </span>
                                <span style="color:#ff0000">&nbsp;337</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample10" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample10" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample10" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp17.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp18.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample10"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample10"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">
                                    457
                                </span>
                                <span style="color:#ff0000">&nbsp;388</span>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample11" class="carousel carousel-dark slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp19.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp20.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample11" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample11" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample11"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample11"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">457 </span>
                                <span style="color:#ff0000">&nbsp; 388</span>
                            </span>
                        </div>
                    </div>


                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample12" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample12" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample12" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp21.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp22.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample12"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample12"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span>
                                    177
                                </span>
                                <span style="color:#ff0000">&nbsp;</span>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid mb-5 ccr">
            <div class="text-end"><a class="btn btn-dark btn-sm">XEM THÊM CÁC SẢN PHẨM KHÁC</a></div>
        </div>
        <!-- hero-cr -->
        <div id="carouselExample04" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="images/Assets/banner-carousel/ao_polo_coffee.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="images/Assets/banner-carousel/quan_tay_non_iron.jpg" class="d-block w-100" alt="...">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample04"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample04"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Optional: Indicator buttons -->
            <div class="carousel-indicators" id="bn-cr">
                <button type="button" data-bs-target="#carouselExample04" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample04" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
        </div>
        <!-- carousel danh mục -->
        <div class="container-fluid mb-5 ccr">
            <h5 class="text-center" style="font-weight:600;">YaMe Chọn Giúp Bạn</h5>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div id="carousel13" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel13" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel13" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp23.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp24.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel13"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel13"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">347 </span>
                                <span style="color:#ff0000">&nbsp;243</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample14" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample14" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample14" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp25.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp26.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample14"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample14"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">287 </span>
                                <span style="color:#ff0000">&nbsp;201</span>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample15" class="carousel carousel-dark slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp27.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp28.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample15" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample15" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample15"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample15"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">557 </span>
                                <span style="color:#ff0000">&nbsp;390</span>
                            </span>
                        </div>
                    </div>


                </div>
                <div class="col-lg-3 col-6">
                    <div id="carouselExample16" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample16" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample16" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/Assets/carouselsanpham/sp29.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/Assets/carouselsanpham/sp30.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample16"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample16"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                        <div class="price">
                            <span class="mb-1">
                                <span style="text-decoration:line-through">357 </span>
                                <span style="color:#ff0000">&nbsp;286</span>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid mb-5 ccr">
            <div class="text-end"><a class="btn btn-dark btn-sm">XEM THÊM CÁC SẢN PHẨM KHÁC</a></div>
        </div>





    </main>

    <!-- Footer -->
    <?php include 'layout/footer.php' ?>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/style.js"></script>
</body>

</html>