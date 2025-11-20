<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Kiểm tra đăng nhập (để xử lý nút Thanh toán)
$isUserLoggedIn = isset($_SESSION['user_id']) ? 'true' : 'false';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng - Fashion Store</title>
    <link rel="shortcut icon" href="/shop_mvc/images/Assets/logo/logoc.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <script>
        // Biến toàn cục kiểm tra trạng thái đăng nhập từ PHP
        const checkLoginString = "<?php echo $isUserLoggedIn; ?>";
        const isLoggedIn = (checkLoginString === "true");
    </script>
</head>

<body>
    <?php include __DIR__ . '/../layout/header.php'; ?>

    <main class="section-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pt-1 py-1 bg-info-subtle" style="font-size: small;">
                <li class="breadcrumb-item ms-2">
                    <a href="../index.php" class="text-decoration-none">
                        <i class="fa fa-house text-black link-primary"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Thông tin giỏ hàng</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <section class="cart-section mb-5">
                    <div class="container">
                        <h2 class="mb-4 fw-bold text-uppercase">Giỏ hàng của bạn</h2>

                        <div class="row">
                            <div class="col-lg-8">
                                <div id="cart-items-container">
                                    <p class="text-center py-5">
                                        <i class="fas fa-spinner fa-spin"></i> Đang tải dữ liệu giỏ hàng...
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3 fw-bold">Tóm tắt đơn hàng</h5>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Tạm tính:</span>
                                            <span id="cart-temp-total" class="fw-bold">0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <span>Phí vận chuyển:</span>
                                            <span class="text-success">Miễn phí</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between fw-bold mb-4 fs-5">
                                            <span>Tổng cộng:</span>
                                            <span class="text-danger" id="cart-final-total">0đ</span>
                                        </div>
                                        
                                        <button id="btn-checkout" class="btn btn-dark w-100 mb-2 py-2 text-uppercase fw-bold">
                                            Tiến hành thanh toán
                                        </button>
                                        
                                        <a href="../index.php" class="btn btn-outline-secondary w-100">
                                            <i class="fa-solid fa-arrow-left"></i> Tiếp tục mua sắm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../layout/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/style.js"></script>
    
    <script src="../js/cart.js"></script>

    <script>
        // Định nghĩa lại key cho khớp với file cart.js
        const CART_STORAGE_KEY = 'shopping_cart';

        // 1. Hàm hiển thị giỏ hàng
        function renderCartPage() {
            const container = document.getElementById('cart-items-container');
            if (!container) return;

            // Lấy dữ liệu từ Key 'shopping_cart' thay vì 'cart'
            let cart = JSON.parse(localStorage.getItem(CART_STORAGE_KEY)) || [];

            container.innerHTML = ''; // Xóa nội dung loading

            // Nếu giỏ hàng trống
            if (cart.length === 0) {
                container.innerHTML = `
                    <div class="alert alert-light text-center border shadow-sm py-5">
                        <h5 class="mt-3">Giỏ hàng của bạn đang trống</h5>
                        <a href="../index.php" class="btn btn-dark mt-3">Mua sắm ngay</a>
                    </div>`;
                updateTotals(0);
                return;
            }

            let totalMoney = 0;

            // Duyệt qua sản phẩm để vẽ HTML
            cart.forEach((item, index) => {
                // Ép kiểu số an toàn
                let price = Number(item.price) || 0;
                let qty = Number(item.quantity) || 0;
                let itemTotal = price * qty;

                totalMoney += itemTotal;

                let imageSrc = item.image ? item.image : '/shop_mvc/images/placeholder.jpg';

                container.innerHTML += `
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 col-md-2">
                                    <img src="${imageSrc}" class="img-fluid rounded" alt="${item.name}" style="width: 100%; height: 80px; object-fit: cover;">
                                </div>
                                
                                <div class="col-9 col-md-4">
                                    <h6 class="mb-1 text-dark fw-bold text-truncate">${item.name}</h6>
                                    <small class="text-muted">Đơn giá: ${price.toLocaleString('vi-VN')}đ</small>
                                </div>

                                <div class="col-6 col-md-3 mt-3 mt-md-0">
                                    <div class="input-group input-group-sm" style="width: 110px;">
                                        <button class="btn btn-outline-secondary" type="button" onclick="updatePageQuantity(${index}, -1)">-</button>
                                        <input type="text" class="form-control text-center border-secondary" value="${qty}" readonly style="background-color: white;">
                                        <button class="btn btn-outline-secondary" type="button" onclick="updatePageQuantity(${index}, 1)">+</button>
                                    </div>
                                </div>

                                <div class="col-6 col-md-3 mt-3 mt-md-0 text-end">
                                    <span class="fw-bold text-danger d-block mb-2">${itemTotal.toLocaleString('vi-VN')}đ</span>
                                    <button class="btn btn-sm btn-light text-muted hover-danger" onclick="removePageItem(${index})" title="Xóa">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            updateTotals(totalMoney);
        }

        // 2. Hàm cập nhật số lượng (Dành riêng cho trang này)
        function updatePageQuantity(index, change) {
            let cart = JSON.parse(localStorage.getItem(CART_STORAGE_KEY)) || [];
            let newQty = (Number(cart[index].quantity) || 0) + change;

            if (newQty < 1) {
                if (confirm("Bạn có chắc muốn xóa sản phẩm này?")) {
                    cart.splice(index, 1);
                }
            } else {
                cart[index].quantity = newQty;
            }

            // Lưu lại vào LocalStorage
            localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cart));
            
            // Re-render lại giao diện
            renderCartPage();
            
            // Gọi hàm updateCartIcon() từ file cart.js để cập nhật số trên Header
            if (typeof updateCartIcon === 'function') {
                updateCartIcon();
            }
        }

        // 3. Hàm xóa sản phẩm
        function removePageItem(index) {
            if (confirm("Xóa sản phẩm này khỏi giỏ hàng?")) {
                let cart = JSON.parse(localStorage.getItem(CART_STORAGE_KEY)) || [];
                cart.splice(index, 1);
                
                localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cart));
                
                renderCartPage();
                
                if (typeof updateCartIcon === 'function') {
                    updateCartIcon();
                }
            }
        }

        // 4. Cập nhật hiển thị tổng tiền
        function updateTotals(amount) {
            const tempTotal = document.getElementById('cart-temp-total');
            const finalTotal = document.getElementById('cart-final-total');
            const formattedMoney = amount.toLocaleString('vi-VN') + 'đ';
            
            if (tempTotal) tempTotal.textContent = formattedMoney;
            if (finalTotal) finalTotal.textContent = formattedMoney;
        }

        // 5. Xử lý nút Thanh toán
        document.getElementById('btn-checkout').addEventListener('click', function(e) {
            e.preventDefault();
            let cart = JSON.parse(localStorage.getItem(CART_STORAGE_KEY)) || [];

            if (cart.length === 0) {
                alert('Giỏ hàng đang trống! Vui lòng thêm sản phẩm.');
                return;
            }

            if (typeof isLoggedIn !== 'undefined' && isLoggedIn === true) {
                // Đã đăng nhập -> Chuyển sang trang thanh toán
                window.location.href = '/shop_mvc/baocao/thanhtoan.php';
            } else {
                alert('Vui lòng đăng nhập để tiến hành thanh toán!');
                
                // Trigger mở Modal Đăng nhập (nếu có trong header)
                const loginModalTrigger = document.querySelector('[data-bs-target="#formdangnhap"]');
                if(loginModalTrigger) {
                    loginModalTrigger.click();
                } else {
                    window.location.href = '/shop_mvc/baocao/login.php';
                }
            }
        });

        // 6. Khởi chạy
        document.addEventListener('DOMContentLoaded', () => {
            renderCartPage();
            
            // Đảm bảo badge trên header cũng được cập nhật đúng
            if (typeof updateCartIcon === 'function') {
                updateCartIcon();
            }
        });
    </script>
</body>
</html>