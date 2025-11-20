// Định nghĩa key để lưu trong LocalStorage
const CART_KEY = 'shopping_cart';

/**
 * Hàm thêm sản phẩm vào giỏ hàng
 * @param {Object} product - Đối tượng chứa thông tin sản phẩm (id, name, price, image, quantity,...)
 */
function addToCart(product) {
    // 1. Lấy giỏ hàng hiện tại từ LocalStorage
    let cart = getCartItems();

    // 2. Kiểm tra xem sản phẩm (biến thể) này đã có trong giỏ chưa
    // So sánh dựa trên ID biến thể (variantId)
    const existingItemIndex = cart.findIndex(item => item.id === product.id);

    if (existingItemIndex > -1) {
        // 3a. Nếu có rồi -> Cộng dồn số lượng
        cart[existingItemIndex].quantity += product.quantity;
    } else {
        // 3b. Nếu chưa có -> Thêm mới vào mảng
        cart.push(product);
    }

    // 4. Lưu lại vào LocalStorage
    saveCart(cart);

    // 5. Cập nhật icon giỏ hàng trên header (nếu có)
    updateCartIcon();
    
    // 6. Log để kiểm tra
    console.log("Giỏ hàng hiện tại:", cart);
}

/**
 * Hàm lấy danh sách sản phẩm từ LocalStorage
 */
function getCartItems() {
    const cartJson = localStorage.getItem(CART_KEY);
    return cartJson ? JSON.parse(cartJson) : [];
}

/**
 * Hàm lưu giỏ hàng vào LocalStorage
 */
function saveCart(cart) {
    localStorage.setItem(CART_KEY, JSON.stringify(cart));
}

/**
 * Hàm cập nhật số lượng hiển thị trên icon giỏ hàng (Header)
 * Bạn cần thêm class hoặc id 'cart-count' vào thẻ span số lượng trên header
 */
function updateCartIcon() {
    const cart = getCartItems();
    const totalCount = cart.reduce((sum, item) => sum + item.quantity, 0);
    
    // Tìm phần tử hiển thị số lượng trên menu (bạn cần gán ID này trong header.php)
    const cartCountEl = document.getElementById('cart-total-count'); 
    if (cartCountEl) {
        cartCountEl.textContent = totalCount;
        cartCountEl.style.display = totalCount > 0 ? 'inline-block' : 'none';
    }
}

// Gọi cập nhật icon ngay khi load trang (để hiển thị số lượng cũ)
document.addEventListener('DOMContentLoaded', updateCartIcon);  