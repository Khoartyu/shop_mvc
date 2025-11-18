<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Kiểm tra đăng nhập
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
                <section class="cart-section">
                    <div class="container">
                        <h2 class="mb-4">Giỏ hàng của bạn</h2>

                        <div class="row">
                            <div class="col-lg-8">
                                <div id="cart-items-container">
                                    <p class="text-center py-5">
                                        <i class="fas fa-spinner fa-spin"></i> Đang tải dữ liệu giỏ hàng...
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Tổng đơn hàng</h5>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Tạm tính:</span>
                                            <span id="cart-temp-total">0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <span>Phí vận chuyển:</span>
                                            <span>Miễn phí</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between fw-bold mb-4">
                                            <span>Tổng cộng:</span>
                                            <span class="text-danger" id="cart-final-total">0đ</span>
                                        </div>
                                        <a href="#" id="btn-checkout" class="btn btn-primary w-100 mb-2">Tiến hành thanh toán</a>
                                        <a href="../index.php" class="btn btn-outline-secondary w-100">Tiếp tục mua sắm</a>
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
    
<script>
        // 1. Hàm hiển thị giỏ hàng
        function renderCartPage() {
            const container = document.getElementById('cart-items-container');
            if (!container) return;

            // QUAN TRỌNG: Sửa key thành 'cart' cho khớp với LocalStorage của bạn
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            container.innerHTML = ''; // Xóa chữ đang tải

            // Nếu giỏ hàng trống
            if (cart.length === 0) {
                container.innerHTML = '<div class="alert alert-warning text-center">Giỏ hàng của bạn đang trống.</div>';
                updateTotals(0);
                return;
            }

            let totalMoney = 0;

            // Duyệt qua sản phẩm
            cart.forEach((item, index) => {
                // Ép kiểu số để tính toán không bị lỗi NaN
                let price = Number(item.price) || 0;
                let qty = Number(item.quantity) || 0;
                let itemTotal = price * qty;
                
                totalMoney += itemTotal;

                // Xử lý ảnh (nếu link ảnh lỗi hoặc rỗng)
                let imageSrc = item.image ? item.image : '/shop_mvc/images/placeholder.jpg';

                // Vẽ HTML
                container.innerHTML += `
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 col-md-2">
                                    <img src="${imageSrc}" class="img-fluid rounded" alt="${item.name}">
                                </div>
                                <div class="col-9 col-md-5">
                                    <h6 class="mb-1 text-truncate">${item.name}</h6>
                                    <small class="text-muted">Đơn giá: ${price.toLocaleString('vi-VN')}đ</small>
                                </div>
                                <div class="col-6 col-md-3 mt-3 mt-md-0">
                                    <div class="input-group input-group-sm">
                                        <button class="btn btn-outline-secondary" onclick="updateQuantity(${index}, -1)">-</button>
                                        <input type="text" class="form-control text-center" value="${qty}" readonly style="background-color: white;">
                                        <button class="btn btn-outline-secondary" onclick="updateQuantity(${index}, 1)">+</button>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2 mt-3 mt-md-0 text-end">
                                    <span class="fw-bold d-block">${itemTotal.toLocaleString('vi-VN')}đ</span>
                                    <br>
                                    <a href="#" class="text-danger text-decoration-none small" onclick="removeItem(${index})">Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            updateTotals(totalMoney);
        }

        // 2. Hàm cập nhật số lượng
        function updateQuantity(index, change) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            // Ép kiểu số trước khi cộng trừ
            let newQty = (Number(cart[index].quantity) || 0) + change;

            if (newQty < 1) {
                if (confirm("Bạn có chắc muốn xóa sản phẩm này?")) {
                    cart.splice(index, 1);
                }
            } else {
                cart[index].quantity = newQty;
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            renderCartPage();
            updateBadge();
        }

        // 3. Hàm xóa sản phẩm
        function removeItem(index) {
            if (confirm("Xóa sản phẩm này khỏi giỏ hàng?")) {
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                cart.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCartPage();
                updateBadge();
            }
        }

        // 4. Cập nhật tổng tiền hiển thị
        function updateTotals(amount) {
            const tempTotal = document.getElementById('cart-temp-total');
            const finalTotal = document.getElementById('cart-final-total');
            if(tempTotal) tempTotal.textContent = amount.toLocaleString('vi-VN') + 'đ';
            if(finalTotal) finalTotal.textContent = amount.toLocaleString('vi-VN') + 'đ';
        }

        // 5. Cập nhật số lượng trên Header
        function updateBadge() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let count = cart.reduce((sum, item) => sum + (Number(item.quantity) || 0), 0);
            
            const badges = document.querySelectorAll('.cart-counter');
            badges.forEach(el => el.innerText = count);
        }

        // 6. Xử lý nút thanh toán
        document.getElementById('btn-checkout').addEventListener('click', function(e) {
            e.preventDefault();
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            if (cart.length === 0) {
                alert('Giỏ hàng đang trống!');
                return;
            }

            if (typeof isLoggedIn !== 'undefined' && isLoggedIn === true) {
                window.location.href = '/shop_mvc/baocao/thanhtoan.php';
            } else {
                alert('Vui lòng đăng nhập để tiếp tục!');
                
                // Mở Modal đăng nhập nếu có
                const loginModal = document.getElementById('formdangnhap');
                if (loginModal && typeof bootstrap !== 'undefined') {
                    const modalInstance = new bootstrap.Modal(loginModal);
                    modalInstance.show();
                } else {
                    window.location.href = '/shop_mvc/baocao/login.php';
                }
            }
        });

        // 7. Chạy ngay khi trang tải xong
        document.addEventListener('DOMContentLoaded', () => {
            console.log("Cart loaded with key 'cart'");
            renderCartPage();
            updateBadge();
        });
    </script>

</body>
</html>