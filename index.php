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

        <section id="dynamic-hero-slider" class="position-relative w-100 overflow-hidden min-h-banner">
            <div class="spinner-border text-secondary" role="status"></div>
        </section>

        <div class="container-fluid p-0 mt-4">
            <div class="row" id="dynamic-categories">
                </div>
        </div>  

        <div id="dynamic-sub-banners" class="mt-4">
            </div>

        <div class="container-fluid mb-5 ccr mt-5">
            <h5 class="text-center mb-4" style="font-weight:600;">Sản Phẩm Mới Nhất</h5>
            
            <div class="row" id="product-list">
                <div class="text-center w-100 py-5">
                    <div class="spinner-border text-dark" role="status"></div>
                    <p>Đang tải dữ liệu...</p>
                </div>
            </div>

            <div class="text-end mt-3">
                <a href="#" class="btn btn-dark btn-sm">XEM THÊM CÁC SẢN PHẨM KHÁC</a>
            </div>
        </div>

    </main>
    
    <!-- Footer -->
    <?php include 'layout/footer.php' ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="/shop_mvc/js/style.js"></script>
    <script src="/shop_mvc/js/home.js"></script>
</body>

</html>