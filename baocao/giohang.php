<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng - Fashion Store</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome cho icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- CSS tùy chỉnh -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<?php include __DIR__ . '/../layout/header.php'; ?>
    <main class="section-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pt-1 py-1 bg-info-subtle" style="font-size: small;">
                <li class="breadcrumb-item ms-2"><a href="../index.html" class=" text-decoration-none"><i
                            class="fa fa-house text-black link-primary"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Thông tin giỏ hàng</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-12">
                <section class="cart-section">
                    <div class="container">
                        <h2 class="mb-4">Giỏ hàng của bạn</h2>

                        <div class="row">
                            <!-- Danh sách sản phẩm -->
                            <div class="col-lg-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-2">
                                                <img src="../images/Assets/carouselsanpham/s33.jpg"
                                                    class="cart-item-image" alt="Product">
                                            </div>
                                            <div class="col-md-5">
                                                <h5 class="mb-1">Áo thun nam cổ tròn</h5>
                                                <p class="text-muted mb-0">Size: M</p>
                                                <p class="text-muted mb-0">Màu: Đen</p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary quantity-minus">-</button>
                                                    <input type="number" class="form-control border border-secondary quantity-input" value="1"
                                                        min="1">
                                                    <button class="btn btn-outline-secondary quantity-plus">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-end">
                                                <span class="fw-bold"></span>
                                                <button class="btn btn-link text-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- Thêm các sản phẩm khác tương tự -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tổng kết -->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Tổng đơn hàng</h5>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Tạm tính:</span>
                                            <span>0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <span>Phí vận chuyển:</span>
                                            <span>0đ</span>
                                        </div>

                                        <hr>

                                        <div class="d-flex justify-content-between fw-bold mb-4">
                                            <span>Tổng cộng:</span>
                                            <span class="text-danger">0đ</span>
                                        </div>

                                        <a href="thanhtoan.html" class="btn btn-primary w-100 mb-2">Tiến hành thanh toán</a>
                                        <a href="../index.html" class="btn btn-outline-secondary w-100">Tiếp tục mua
                                            sắm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <!-- Cart Section -->



    <?php include __DIR__. '/../layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 <script src="../js/style.js"></script>

</body>

</html>