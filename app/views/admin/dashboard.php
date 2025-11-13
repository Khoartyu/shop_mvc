<?php
/**
 * File: /app/views/admin/dashboard.php
 * Dashboard Quản trị - Kết nối API thật
 */

// 1. Cấu hình Session và Database
// Đi lùi 3 cấp để tìm config (views -> admin -> app -> shop_mvc)
require_once __DIR__ . '/../../../config/session.php'; 

// 2. Kiểm tra quyền Admin (Middleware đơn giản)
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: /shop_mvc/app/views/admin/login.php'); 
    exit;
}

$admin_name = $_SESSION['user_name'] ?? 'Admin';
$admin_role = $_SESSION['user_role'] ?? 'Quản trị viên';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | <?php echo htmlspecialchars($admin_name); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#059669', 
                        'secondary': '#f97316',
                        'background-dark': '#1f2937',
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-thumb { background: #4b5563; border-radius: 3px; }
        html, body { height: 100%; margin: 0; }
        .active-link { background-color: #374151 !important; color: #fff !important; }
    </style>
</head>
<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">

    <header class="fixed top-0 right-0 p-4 z-20">
        <div class="bg-white rounded-lg shadow-xl px-4 py-2 text-sm flex items-center space-x-3">
            <span class="text-gray-700">Xin chào, <strong><?php echo htmlspecialchars($admin_name); ?></strong> (<?php echo htmlspecialchars($admin_role); ?>)</span>
            <button onclick="handleLogout()" class="text-red-500 hover:text-red-700 font-semibold transition-colors">
                Đăng Xuất
            </button>
        </div>
    </header>

    <aside id="sidebar" class="w-64 bg-background-dark text-white p-4 flex-shrink-0 overflow-y-auto z-10">
        <h1 class="text-2xl font-bold mb-8 text-primary border-b border-gray-700 pb-3">Quản Trị Shop</h1>
        <nav>
            <a href="#" data-page="dashboard" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors mb-2 active-link">
                <span class="mr-3">📊</span> Tổng Quan
            </a>
            <a href="#" data-page="products" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors mb-2">
                <span class="mr-3">📦</span> Sản Phẩm & SKU
            </a>
            <a href="#" data-page="orders" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors mb-2">
                <span class="mr-3">📄</span> Đơn Hàng
            </a>
            <a href="#" data-page="customers" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors mb-2">
                <span class="mr-3">👥</span> Khách Hàng
            </a>
        </nav>
    </aside>

    <main id="content-container" class="flex-1 p-6 overflow-y-auto mt-12">
        <div class="flex justify-center items-center h-full text-gray-500">Đang tải dữ liệu...</div>
    </main>
    
    <div id="app-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-11/12 md:w-2/3 lg:w-1/2">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 id="modal-title" class="text-xl font-bold text-gray-800">Tiêu đề</h3>
                <button onClick="closeModal()" class="text-gray-500 hover:text-gray-900">✕</button>
            </div>
            <div id="modal-body" class="max-h-96 overflow-y-auto"></div>
            <div id="modal-footer" class="mt-4 pt-3 border-t flex justify-end space-x-2">
                <button onClick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Đóng</button>
            </div>
        </div>
    </div>

    <script>
        // =======================================================
        // 1. CẤU HÌNH & API
        // =======================================================
        const API_URL = '/shop_mvc/api/index.php'; 

        // Hàm tiện ích: Định dạng tiền tệ
        const formatCurrency = (amount) => new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);

        // Hàm gọi API thật
        const fetchData = async (action, params = '') => {
            try {
                const response = await fetch(`${API_URL}?action=${action}${params}`);
                if (!response.ok) throw new Error('Lỗi kết nối API');
                return await response.json();
            } catch (error) {
                console.error(`Lỗi khi gọi ${action}:`, error);
                return null;
            }
        };

        // =======================================================
        // 2. XỬ LÝ DỮ LIỆU (DATA FETCHING)
        // =======================================================
        
        // Lấy KPI Dashboard
        const getKPIs = async () => {
            const data = await fetchData('adminKPIs');
            return data || { revenueToday: 0, ordersPending: 0, stockAlerts: 0 };
        };

        // Lấy danh sách sản phẩm
        const getProducts = async () => {
            const data = await fetchData('adminProducts');
            // API trả về mảng sản phẩm, nếu lỗi trả về mảng rỗng
            return Array.isArray(data) ? data : [];
        };

        // Lấy đơn hàng (TẠM THỜI: Chưa có API, trả về rỗng)
        const getOrders = async () => {
            // TODO: Bạn cần tạo API 'adminOrders' trong AdminController sau này
            // const data = await fetchData('adminOrders'); 
            return []; 
        };

        // Lấy khách hàng (TẠM THỜI: Chưa có API)
        const getCustomers = async () => {
            return [];
        };

        // =======================================================
        // 3. RENDER GIAO DIỆN
        // =======================================================

        // --- Render Dashboard ---
        const renderDashboard = async () => {
            const kpis = await getKPIs();
            
            const html = `
                <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Tổng Quan Hoạt Động</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-primary">
                        <p class="text-sm font-medium text-gray-500">Doanh thu hôm nay</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">${formatCurrency(kpis.revenueToday)}</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-secondary">
                        <p class="text-sm font-medium text-gray-500">Đơn hàng chờ xử lý</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">${kpis.ordersPending}</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-red-500">
                        <p class="text-sm font-medium text-gray-500">Cảnh báo Tồn kho</p>
                        <p class="text-3xl font-bold text-red-600 mt-1">${kpis.stockAlerts}</p>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md text-center text-gray-500">
                    <p>Chọn các mục bên trái để quản lý chi tiết.</p>
                </div>
            `;
            document.getElementById('content-container').innerHTML = html;
        };

        // --- Render Sản Phẩm ---
        const renderProducts = async () => {
            const products = await getProducts();
            
            if (products.length === 0) {
                document.getElementById('content-container').innerHTML = '<p class="text-center p-10">Chưa có sản phẩm nào.</p>';
                return;
            }

            // Lưu ý: API trả về các trường: id, name, category, basePrice, totalStock, variantCount
            const productListHtml = products.map(p => `
                <tr class="hover:bg-gray-50 border-b">
                    <td class="px-6 py-4 font-medium text-gray-900">${p.id}</td>
                    <td class="px-6 py-4">
                        <div class="text-base font-semibold">${p.name}</div>
                        <div class="text-sm text-gray-500">${p.category}</div>
                    </td>
                    <td class="px-6 py-4 text-primary font-bold">Từ ${formatCurrency(p.basePrice)}</td>
                    <td class="px-6 py-4 text-lg font-bold ${p.totalStock < 10 ? 'text-red-500' : 'text-green-600'}">
                        ${p.totalStock}
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm px-3 py-1 rounded-full bg-gray-200">${p.variantCount} SKU</span>
                    </td>
                    <td class="px-6 py-4 space-x-2">
                        <button class="text-blue-600 hover:underline" onclick="alert('Chức năng sửa đang phát triển')">Sửa</button>
                        <button class="text-red-600 hover:underline" onclick="alert('Chức năng xóa đang phát triển')">Xóa</button>
                    </td>
                </tr>
            `).join('');

            const html = `
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-extrabold text-gray-900">Quản lý Sản phẩm</h2>
                    <button class="px-4 py-2 bg-primary text-white font-semibold rounded-lg shadow-md hover:bg-green-700">
                        + Thêm Mới
                    </button>
                </div>
                <div class="bg-white rounded-xl shadow-lg overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tên SP</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Giá</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kho</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Biến thể</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            ${productListHtml}
                        </tbody>
                    </table>
                </div>
            `;
            document.getElementById('content-container').innerHTML = html;
        };

        // --- Render Đơn hàng (Placeholder) ---
        const renderOrders = async () => {
            document.getElementById('content-container').innerHTML = `
                <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Quản lý Đơn hàng</h2>
                <p class="bg-yellow-100 p-4 rounded text-yellow-800">Chức năng này cần thêm API backend (Giai đoạn tiếp theo).</p>
            `;
        };

        // --- Render Khách hàng (Placeholder) ---
        const renderCustomers = async () => {
            document.getElementById('content-container').innerHTML = `
                <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Quản lý Khách hàng</h2>
                <p class="bg-yellow-100 p-4 rounded text-yellow-800">Chức năng này cần thêm API backend (Giai đoạn tiếp theo).</p>
            `;
        };

        // =======================================================
        // 4. ĐIỀU HƯỚNG & MODAL
        // =======================================================
        
        const menuItems = document.querySelectorAll('.menu-item');
        
        // Chuyển tab
        const navigateTo = (page) => {
            menuItems.forEach(item => item.classList.remove('active-link'));
            const activeItem = document.querySelector(`.menu-item[data-page="${page}"]`);
            if (activeItem) activeItem.classList.add('active-link');

            switch (page) {
                case 'dashboard': renderDashboard(); break;
                case 'products': renderProducts(); break;
                case 'orders': renderOrders(); break;
                case 'customers': renderCustomers(); break;
                default: renderDashboard();
            }
        };

        menuItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                navigateTo(item.getAttribute('data-page'));
            });
        });

        // Modal Utils
        const modal = document.getElementById('app-modal');
        window.closeModal = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        };

        // Đăng xuất
        window.handleLogout = async () => {
            if(confirm('Bạn muốn đăng xuất?')) {
                await fetchData('logout');
                window.location.href = '/shop_mvc/index.php';
            }
        }

        // Chạy lần đầu
        window.onload = () => navigateTo('dashboard');
    </script>
</body>
</html>