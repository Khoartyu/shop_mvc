// Tệp: /shop_mvc/js/cart.js

// Hàm này sẽ được gọi từ trang chi tiết (Giai đoạn 2) và trang giỏ hàng (Giai đoạn 3)

/**
 * Lấy giỏ hàng từ localStorage.
 * @returns {Array} Mảng các sản phẩm trong giỏ, hoặc mảng rỗng.
 */
function getCart() {
    // Lấy dữ liệu từ localStorage, key là 'cart'
    const cartJson = localStorage.getItem('cart');
    // Nếu không có gì, trả về mảng rỗng
    if (!cartJson) {
        return [];
    }
    // Nếu có, chuyển JSON (văn bản) thành mảng (object)
    return JSON.parse(cartJson);
}

/**
 * Lưu giỏ hàng vào localStorage.
 * @param {Array} cart Mảng giỏ hàng cần lưu.
 */
function saveCart(cart) {
    // Chuyển mảng (object) thành JSON (văn bản) để lưu
    const cartJson = JSON.stringify(cart);
    localStorage.setItem('cart', cartJson);
}

/**
 * Thêm sản phẩm vào giỏ hàng.
 * @param {object} newItem Đối tượng sản phẩm cần thêm
 * (ví dụ: { id: 101, name: 'Áo Sơ Mi (Size S)', price: 200000, image: '...', quantity: 1 })
 */
function addToCart(newItem) {
    let cart = getCart();

    // 1. Kiểm tra xem sản phẩm (biến thể) này đã có trong giỏ chưa
    let existingItem = cart.find(item => item.id === newItem.id);

    if (existingItem) {
        // 2. Nếu đã có: Chỉ cập nhật số lượng
        existingItem.quantity += newItem.quantity;
    } else {
        // 3. Nếu chưa có: Thêm mới vào giỏ
        cart.push(newItem);
    }

    // 4. Lưu giỏ hàng mới vào localStorage
    saveCart(cart);

    // 5. Cập nhật số lượng hiển thị trên icon giỏ hàng
    updateCartCounter();
}

/**
 * Cập nhật số lượng trên icon giỏ hàng (ở header)
 */
function updateCartCounter() {
    const cart = getCart();
    // Tính tổng số lượng (ví dụ: 2 áo + 3 quần = 5)
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0);

    // Tìm tất cả các counter (cho cả mobile và desktop)
    const counters = document.querySelectorAll('.cart-counter');
    
    counters.forEach(counter => {
        counter.textContent = totalItems;
    });
}

// ----------------------------------------------------
// Tự động chạy hàm này khi file được nạp
// Để đảm bảo icon giỏ hàng luôn đúng khi tải lại trang
document.addEventListener('DOMContentLoaded', () => {
    updateCartCounter();
});
// ----------------------------------------------------