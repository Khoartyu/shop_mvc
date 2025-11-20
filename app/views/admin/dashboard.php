<?php

/**
 * File: /app/views/admin/dashboard.php
 */

// 1. Cấu hình Session
require_once __DIR__ . '/../../../config/session.php';

// 2. Kiểm tra quyền Admin
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
    <title>Dashboard | Quản trị Shop</title>
    <link rel="shortcut icon" href="/shop_mvc/images/Assets/logo/logoc.png" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#059669',
                        'secondary': '#f97316',
                        'dark': '#1f2937',
                        'light': '#f3f4f6'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 3px;
        }

        html,
        body {
            height: 100%;
            margin: 0;
        }

        .active-link {
            background-color: #374151 !important;
            color: #fff !important;
            border-left: 4px solid #059669;
        }

        /* Loading Spinner */
        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #059669;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">

    <header class="fixed top-0 right-0 left-64 h-16 bg-white shadow-sm z-20 flex items-center justify-between px-6 transition-all duration-300">
        <h2 class="text-xl font-bold text-gray-700" id="page-title">Tổng Quan</h2>

        <div class="flex items-center space-x-4">
            <div class="text-right hidden md:block">
                <p class="text-sm font-bold text-gray-800"><?php echo htmlspecialchars($admin_name); ?></p>
                <p class="text-xs text-green-600"><?php echo htmlspecialchars($admin_role); ?></p>
            </div>
            <button onclick="handleLogout()" class="p-2 text-gray-500 hover:text-red-600 transition-colors" title="Đăng xuất">
                <i class="fas fa-sign-out-alt fa-lg"></i>
            </button>
        </div>
    </header>

    <aside id="sidebar" class="w-64 bg-dark text-white h-full flex-shrink-0 overflow-y-auto z-30 fixed left-0 top-0 shadow-xl">
        <div class="p-6 border-b border-gray-700">
            <h1 class="text-2xl font-bold text-white text-base tracking-wider">
                <i class="fas fa-store me-2 "></i> Dashboard
            </h1>
        </div>

        <nav class="p-4 space-y-1">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 mt-2">Thống kê</p>
            <a href="#" data-page="dashboard" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors active-link">
                <i class="fas fa-chart-line w-6 text-center mr-2"></i> Tổng Quan
            </a>

            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 mt-4">Sản phẩm</p>
            <a href="#" data-page="products" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors">
                <i class="fas fa-box w-6 text-center mr-2"></i> Quản lý Sản phẩm
            </a>
            <a href="#" data-page="categories" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors">
                <i class="fas fa-tags w-6 text-center mr-2"></i> Danh mục (Loại)
            </a>
            <a href="#" data-page="attributes" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors">
                <i class="fas fa-ruler-combined w-6 text-center mr-2"></i> Thuộc tính (Size/Màu)
            </a>

            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 mt-4">Bán hàng</p>
            <a href="#" data-page="orders" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors">
                <i class="fas fa-file-invoice-dollar w-6 text-center mr-2"></i> Đơn Hàng
            </a>
            <a href="#" data-page="customers" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors">
                <i class="fas fa-users w-6 text-center mr-2"></i> Khách Hàng
            </a>

            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 mt-4">Hệ thống</p>
            <a href="#" data-page="users" class="menu-item flex items-center p-3 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors">
                <i class="fas fa-user-shield w-6 text-center mr-2"></i>Quản Lý Tài khoản
            </a>
        </nav>
    </aside>

    <main id="content-wrapper" class="flex-1 ml-64 mt-16 p-6 overflow-y-auto h-[calc(100vh-4rem)] bg-gray-100">
        <div id="content-container" class="fade-in"></div>
    </main>

    <div id="app-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 transition-opacity duration-300">
        <div class="bg-white rounded-xl shadow-2xl w-11/12 md:w-2/3 lg:w-1/2 transform scale-100 transition-transform duration-300 overflow-hidden">
            <div class="flex justify-between items-center border-b px-6 py-4 bg-gray-50">
                <h3 id="modal-title" class="text-xl font-bold text-gray-800">Tiêu đề</h3>
                <button onClick="closeModal()" class="text-gray-400 hover:text-red-500 text-2xl focus:outline-none">&times;</button>
            </div>
            <div id="modal-body" class="p-6 max-h-[70vh] overflow-y-auto"></div>
            <div id="modal-footer" class="px-6 py-4 bg-gray-50 border-t flex justify-end space-x-2">
                <button onClick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">Đóng</button>
            </div>
        </div>
    </div>

    <script>
       // =======================================================
    // 1. CẤU HÌNH & TIỆN ÍCH
    // =======================================================
    const API_URL = '/shop_mvc/api/index.php';
    
    const formatCurrency = (amount) => new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND'
    }).format(amount);

    const formatDate = (dateString) => {
        if(!dateString) return '';
        const date = new Date(dateString);
        return date.toLocaleDateString('vi-VN') + ' ' + date.toLocaleTimeString('vi-VN', {hour: '2-digit', minute:'2-digit'});
    };

    const getStatusBadge = (status) => {
        const colors = {
            'Chờ xử lý': 'bg-yellow-100 text-yellow-800',
            'Đang giao': 'bg-blue-100 text-blue-800',
            'Đã giao': 'bg-green-100 text-green-800',
            'Đã hủy': 'bg-red-100 text-red-800'
        };
        return `<span class="px-2 py-1 text-xs font-bold rounded-full ${colors[status] || 'bg-gray-100'}">${status}</span>`;
    };

    // =======================================================
    // 2. HÀM GỌI API
    // =======================================================
    const fetchData = async (action, params = '') => {
        try {
            const response = await fetch(`${API_URL}?action=${action}${params}`);
            if (!response.ok) throw new Error('Lỗi API');
            return await response.json();
        } catch (error) {
            console.error(`Error fetching ${action}:`, error);
            return null;
        }
    };

    // =======================================================
    // 3. CÁC HÀM RENDER GIAO DIỆN
    // =======================================================

    // --- 3.1 DASHBOARD ---
    const renderDashboard = async () => {
        const kpis = await fetchData('adminKPIs') || { revenueToday: 0, ordersPending: 0, stockAlerts: 0 };
        
        const html = `
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-primary flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Doanh thu hôm nay</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">${formatCurrency(kpis.revenueToday)}</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full text-primary"><i class="fas fa-dollar-sign fa-lg"></i></div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-secondary flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Đơn chờ xử lý</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">${kpis.ordersPending}</p>
                    </div>
                    <div class="p-3 bg-orange-100 rounded-full text-secondary"><i class="fas fa-box-open fa-lg"></i></div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Cảnh báo Tồn kho</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">${kpis.stockAlerts}</p>
                    </div>
                    <div class="p-3 bg-red-100 rounded-full text-red-500"><i class="fas fa-exclamation-triangle fa-lg"></i></div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-8 text-center border border-gray-200">
                <img src="/shop_mvc/images/Assets/logo/logochinh.png" class="h-16 mx-auto mb-4" alt="Logo">
                <h3 class="text-lg font-medium text-gray-600">Chào mừng đến với Hệ thống Quản trị</h3>
            </div>
        `;
        document.getElementById('content-container').innerHTML = html;
    };

    // --- 3.2 SẢN PHẨM (CÓ TÌM KIẾM) ---
    const renderProducts = async (keyword = '') => {
        // Gọi API có kèm tham số keyword
        const products = await fetchData('adminProducts', `&keyword=${keyword}`) || [];
        
        // Tạo thanh tìm kiếm và nút thêm
        const toolsHtml = `
            <div class="flex gap-4">
                <div class="relative">
                    <input type="text" 
                           id="search-product" 
                           value="${keyword}" 
                           onkeyup="handleSearchProduct(event)"
                           placeholder="Tìm tên sản phẩm..." 
                           class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary w-64">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>

                <button onclick="openProductModal()" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition-colors flex items-center">
                    <i class="fas fa-plus mr-2"></i> Thêm Mới
                </button>
            </div>`;

        // Nếu không tìm thấy sản phẩm nào
        if(products.length === 0) {
            document.getElementById('content-container').innerHTML = `
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Quản lý Sản phẩm</h2>
                    ${toolsHtml}
                </div>
                <div class="text-center p-12 border rounded-xl bg-white">
                    <p class="text-gray-500">
                        ${keyword ? `Không tìm thấy sản phẩm nào tên là "<b>${keyword}</b>"` : 'Chưa có dữ liệu sản phẩm.'}
                    </p>
                </div>`;
            // Vẫn phải focus lại ô input để người dùng nhập tiếp được
            if(keyword) document.getElementById('search-product').focus();
            return;
        }

        const rows = products.map(p => {
            const imgSrc = p.anh_dai_dien ? `/shop_mvc/${p.anh_dai_dien.split(',')[0].trim()}` : '/shop_mvc/images/placeholder.jpg';
            return `
            <tr class="hover:bg-gray-50 border-b transition-colors">
                <td class="px-6 py-4 text-gray-500">#${p.id}</td>
                <td class="px-6 py-4 flex items-center">
                    <img class="h-10 w-10 rounded object-cover border mr-3" src="${imgSrc}" onerror="this.src='/shop_mvc/images/placeholder.jpg'">
                    <div>
                        <div class="text-sm font-semibold text-gray-900">${p.ten_san_pham}</div>
                        <div class="text-xs text-gray-500">${p.category || 'Chưa phân loại'}</div>
                    </div>
                </td>
                <td class="px-6 py-4 font-bold text-primary text-sm">Từ ${formatCurrency(p.basePrice || 0)}</td>
                <td class="px-6 py-4 text-sm">${p.totalStock || 0}</td>
                <td class="px-6 py-4 text-right">
                    <button onclick="openProductModal(${p.id})" class="text-blue-600 hover:bg-blue-50 p-2 rounded"><i class="fas fa-edit"></i></button>
                    <button onclick="deleteItem('sanpham', ${p.id})" class="text-red-600 hover:bg-red-50 p-2 rounded"><i class="fas fa-trash"></i></button>
                </td>
            </tr>`;
        }).join('');
        
        document.getElementById('content-container').innerHTML = `
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Danh sách Sản phẩm</h2>
                ${toolsHtml}
            </div>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Sản phẩm</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Giá Gốc</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Tồn Kho</th>
                            <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">${rows}</tbody>
                </table>
            </div>
        `;
        
        // Giữ focus vào ô input sau khi render lại
        const input = document.getElementById('search-product');
        if(input) {
            input.focus();
            // Mẹo: Đưa con trỏ về cuối dòng text
            const val = input.value; 
            input.value = ''; 
            input.value = val;
        }
    };

    // --- HÀM XỬ LÝ SỰ KIỆN TÌM KIẾM ---
    // (Dán hàm này xuống dưới cùng, chung chỗ với các hàm window.xxx)
    let searchTimeout = null;
    window.handleSearchProduct = (event) => {
        const keyword = event.target.value;

        // Kỹ thuật Debounce: Đợi người dùng ngừng gõ 300ms mới gọi API
        // Giúp tránh gọi API quá nhiều lần liên tục
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            renderProducts(keyword);
        }, 300);
    };

    // --- 3.3 DANH MỤC (CẬP NHẬT) ---
    const renderCategories = async () => {
        const cats = await fetchData('adminCategories') || [];
        
        // Nút Thêm
        const addButton = `
            <button onclick="openCategoryModal()" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition-colors flex items-center">
                <i class="fas fa-plus mr-2"></i> Thêm Danh mục
            </button>`;

        if(cats.length === 0) {
             document.getElementById('content-container').innerHTML = `
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Quản lý Danh mục</h2>
                    ${addButton}
                </div>
                <div class="text-center p-12 border rounded-xl bg-white"><p class="text-gray-500">Chưa có danh mục nào.</p></div>`;
            return;
        }

        const rows = cats.map(c => `
            <tr class="hover:bg-gray-50 border-b">
                <td class="px-6 py-4">#${c.id}</td>
                <td class="px-6 py-4 flex items-center">
                    <img src="/shop_mvc/${c.hinh_anh}" class="w-10 h-10 rounded-full mr-3 object-cover border" onerror="this.src='/shop_mvc/images/placeholder.jpg'">
                    <span class="font-medium">${c.ten_danhmuc}</span>
                </td>
                <td class="px-6 py-4 text-right">
                    <button onclick="openCategoryModal(${c.id})" class="text-blue-600 p-2 hover:bg-blue-50 rounded"><i class="fas fa-edit"></i></button>
                    <button onclick="deleteItem('danhmuc', ${c.id})" class="text-red-600 p-2 hover:bg-red-50 rounded"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        `).join('');

        renderTable('Quản lý Danh mục', ['ID', 'Tên danh mục', 'Hành động'], rows, 'Thêm Danh mục');
        
        // Gắn lại sự kiện cho nút thêm ở header bảng (do renderTable tạo lại HTML)
        // Mẹo nhỏ: renderTable trả về HTML string hoặc ta dùng cách querySelector sau khi render
        const headerBtn = document.querySelector('button.bg-primary'); 
        if(headerBtn && headerBtn.innerText.includes('Thêm Danh mục')) {
            headerBtn.setAttribute('onclick', 'openCategoryModal()');
        }
    };

    // --- 3.4 THUỘC TÍNH (CẬP NHẬT) ---
    const renderAttributes = async () => {
        const data = await fetchData('adminAttributes') || { colors: [], sizes: [] };
        
        // Render bảng Màu
        const colorRows = data.colors.map(c => `
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">#${c.id}</td>
                <td class="px-4 py-2 flex items-center">
                    <span class="w-6 h-6 rounded-full border mr-2 shadow-sm" style="background-color: ${c.ma_hex}"></span>
                    ${c.ten_mau}
                </td>
                <td class="px-4 py-2 text-gray-500 text-xs uppercase">${c.ma_hex}</td>
                <td class="px-4 py-2 text-right">
                    <button onclick="deleteItem('mausac', ${c.id})" class="text-red-600 hover:bg-red-50 p-1 rounded"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        `).join('');

        // Render bảng Size
        const sizeRows = data.sizes.map(s => `
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">#${s.id}</td>
                <td class="px-4 py-2 font-bold">${s.ten_kich_thuoc}</td>
                <td class="px-4 py-2 text-right">
                    <button onclick="deleteItem('kichthuoc', ${s.id})" class="text-red-600 hover:bg-red-50 p-1 rounded"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        `).join('');

        const html = `
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Quản lý Thuộc tính</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-4 border">
                    <div class="flex justify-between items-center mb-4 pb-2 border-b">
                        <h3 class="font-bold text-gray-700">Màu Sắc</h3>
                        <button onclick="openAttributeModal('color')" class="text-sm bg-blue-100 text-blue-600 px-3 py-1 rounded hover:bg-blue-200 font-medium">
                            <i class="fas fa-plus mr-1"></i> Thêm Màu
                        </button>
                    </div>
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-gray-500"><tr><th class="px-4 py-2">ID</th><th class="px-4 py-2">Tên</th><th class="px-4 py-2">Hex</th><th class="px-4 py-2"></th></tr></thead>
                        <tbody>${colorRows}</tbody>
                    </table>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-4 border">
                    <div class="flex justify-between items-center mb-4 pb-2 border-b">
                        <h3 class="font-bold text-gray-700">Kích Thước</h3>
                        <button onclick="openAttributeModal('size')" class="text-sm bg-blue-100 text-blue-600 px-3 py-1 rounded hover:bg-blue-200 font-medium">
                            <i class="fas fa-plus mr-1"></i> Thêm Size
                        </button>
                    </div>
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-gray-500"><tr><th class="px-4 py-2">ID</th><th class="px-4 py-2">Size</th><th class="px-4 py-2"></th></tr></thead>
                        <tbody>${sizeRows}</tbody>
                    </table>
                </div>
            </div>
        `;
        document.getElementById('content-container').innerHTML = html;
    };

    // --- 3.5 ĐƠN HÀNG ---
    const renderOrders = async () => {
        const orders = await fetchData('adminOrders') || [];
        if(orders.length === 0) return renderEmptyState('Đơn hàng');

        const rows = orders.map(o => `
            <tr class="hover:bg-gray-50 border-b">
                <td class="px-6 py-4 font-mono text-blue-600">#DH${o.id}</td>
                <td class="px-6 py-4">
                    <div class="font-medium text-gray-900">${o.ten_khach_hang || 'Khách vãng lai'}</div>
                    <div class="text-xs text-gray-500">${formatDate(o.ngay_dat)}</div>
                </td>
                <td class="px-6 py-4 font-bold text-gray-800">${formatCurrency(o.tong_tien)}</td>
                <td class="px-6 py-4">${getStatusBadge(o.trang_thai)}</td>
                <td class="px-6 py-4 text-xs text-gray-500">${o.nhan_vien_xuly || '---'}</td>
                <td class="px-6 py-4 text-right">
                    <button class="text-blue-600 hover:bg-blue-50 p-2 rounded" title="Xem chi tiết"><i class="fas fa-eye"></i></button>
                </td>
            </tr>
        `).join('');

        renderTable('Quản lý Đơn hàng', ['Mã đơn', 'Khách hàng', 'Tổng tiền', 'Trạng thái', 'NV Xử lý', 'Hành động'], rows, '');
    };

    // --- 3.6 KHÁCH HÀNG ---
    const renderCustomers = async () => {
        const customers = await fetchData('adminCustomers') || [];
        if(customers.length === 0) return renderEmptyState('Khách hàng');

        const rows = customers.map(c => `
            <tr class="hover:bg-gray-50 border-b">
                <td class="px-6 py-4">#${c.id}</td>
                <td class="px-6 py-4 font-medium">${c.ho_ten}</td>
                <td class="px-6 py-4 text-gray-600">${c.email}</td>
                <td class="px-6 py-4 text-gray-600">${c.so_dien_thoai || '---'}</td>
                <td class="px-6 py-4 text-xs text-gray-500">${formatDate(c.ngay_dang_ky)}</td>
            </tr>
        `).join('');

        renderTable('Quản lý Khách hàng', ['ID', 'Họ tên', 'Email', 'SĐT', 'Ngày tham gia'], rows, '');
    };

    // --- 3.7 USERS (QUẢN TRỊ) ---
    const renderUsers = async () => {
        const users = await fetchData('adminUsers') || [];
        const rows = users.map(u => `
            <tr class="hover:bg-gray-50 border-b">
                <td class="px-6 py-4">#${u.id}</td>
                <td class="px-6 py-4 font-bold text-gray-700">${u.ten_dang_nhap}</td>
                <td class="px-6 py-4">${u.ho_ten}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded text-xs font-bold ${u.quyen === 'Quản trị viên' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'}">
                        ${u.quyen}
                    </span>
                </td>
                <td class="px-6 py-4 text-right">
                    <button class="text-blue-600 p-2 hover:bg-blue-50 rounded"><i class="fas fa-edit"></i></button>
                </td>
            </tr>
        `).join('');

        renderTable('Quản lý Tài khoản hệ thống', ['ID', 'Username', 'Họ tên', 'Quyền', 'Hành động'], rows, 'Thêm Nhân viên');
    };

    // =======================================================
    // 4. HÀM RENDER HELPER (Tái sử dụng Table)
    // =======================================================
    const renderTable = (title, headers, bodyRows, addButtonText) => {
        const headerHtml = headers.map(h => 
            `<th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">${h}</th>`
        ).join('');

        const btnHtml = addButtonText ? `
            <button class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition-colors flex items-center">
                <i class="fas fa-plus mr-2"></i> ${addButtonText}
            </button>` : '';

        const html = `
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">${title}</h2>
                ${btnHtml}
            </div>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 whitespace-nowrap">
                        <thead class="bg-gray-50"><tr>${headerHtml}</tr></thead>
                        <tbody class="bg-white divide-y divide-gray-200">${bodyRows}</tbody>
                    </table>
                </div>
            </div>
        `;
        document.getElementById('content-container').innerHTML = html;
    };

    const renderEmptyState = (itemName) => {
        document.getElementById('content-container').innerHTML = `
            <div class="text-center p-12">
                <div class="text-6xl text-gray-200 mb-4"><i class="fas fa-inbox"></i></div>
                <h3 class="text-xl font-medium text-gray-600">Chưa có dữ liệu ${itemName}</h3>
            </div>`;
    };

    // =======================================================
    // 5. ROUTING & NAVIGATION
    // =======================================================
    const menuItems = document.querySelectorAll('.menu-item');
    const pageTitle = document.getElementById('page-title');

    const navigateTo = async (page) => {
        // Update UI Active State
        menuItems.forEach(item => item.classList.remove('active-link'));
        const activeItem = document.querySelector(`.menu-item[data-page="${page}"]`);
        if (activeItem) {
            activeItem.classList.add('active-link');
            pageTitle.innerText = activeItem.textContent.trim();
        }

        // Show Loading
        document.getElementById('content-container').innerHTML = '<div class="flex justify-center items-center h-96"><div class="loader"></div></div>';

        // Route
        switch (page) {
            case 'dashboard': await renderDashboard(); break;
            case 'products': await renderProducts(); break;
            case 'categories': await renderCategories(); break;
            case 'attributes': await renderAttributes(); break;
            case 'orders': await renderOrders(); break;
            case 'customers': await renderCustomers(); break;
            case 'users': await renderUsers(); break;
            default: await renderDashboard();
        }
    };

    // Event Listeners
    menuItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            navigateTo(item.getAttribute('data-page'));
        });
    });

    window.closeModal = () => document.getElementById('app-modal').classList.add('hidden');
    
    window.handleLogout = async () => {
        if (confirm('Đăng xuất khỏi hệ thống?')) {
            await fetchData('logout');
            window.location.href = '/shop_mvc/baocao/logout.php'; // Điều chỉnh đường dẫn login của bạn
        }
    };

    // =======================================================
    // 6. LOGIC XỬ LÝ DỮ LIỆU (CRUD)
    // =======================================================

    // --- HÀM XÓA CHUNG (CẬP NHẬT LẦN 2) ---
    window.deleteItem = async (type, id) => {
        if (!confirm('Bạn có chắc chắn muốn xóa không?')) return;

        const formData = new FormData();
        formData.append('id', id);

        let actionName = '';
        if (type === 'sanpham') actionName = 'xoa'; 
        if (type === 'danhmuc') actionName = 'xoaDanhmuc';
        if (type === 'mausac') actionName = 'xoaMau';     // Mới
        if (type === 'kichthuoc') actionName = 'xoaSize'; // Mới

        try {
            const response = await fetch(`${API_URL}?action=${actionName}`, {
                method: 'POST', body: formData
            });
            const result = await response.json();

            if (result.thanhcong) {
                alert('Đã xóa thành công!');
                // Reload lại đúng trang hiện tại
                const currentPage = document.querySelector('.active-link').getAttribute('data-page');
                navigateTo(currentPage);
            } else {
                alert('Lỗi: ' + result.thongbao);
            }
        } catch (error) {
            console.error(error);
            alert('Có lỗi xảy ra.');
        }
    };

    // --- HÀM MỞ MODAL SẢN PHẨM (THÊM & SỬA) ---
    window.openProductModal = async (id = null) => {
        const modal = document.getElementById('app-modal');
        const modalTitle = document.getElementById('modal-title');
        const modalBody = document.getElementById('modal-body');
        
        // Lấy danh sách danh mục để đổ vào dropdown
        const categories = await fetchData('adminCategories') || [];
        const categoryOptions = categories.map(c => `<option value="${c.id}">${c.ten_danhmuc}</option>`).join('');

        let productData = { ten_san_pham: '', mo_ta: '', danhmuc_id: '', anh_dai_dien: '' };
        let isEdit = false;

        // Nếu có ID -> Chế độ Sửa -> Lấy dữ liệu cũ
        if (id) {
            isEdit = true;
            modalTitle.innerText = "Cập nhật Sản phẩm";
            const response = await fetchData('getById', `&id=${id}`);
            if (response) productData = response;
        } else {
            modalTitle.innerText = "Thêm Sản phẩm mới";
        }

        // Render Form vào Modal Body
        modalBody.innerHTML = `
            <form id="product-form" class="space-y-4">
                ${isEdit ? `<input type="hidden" name="id" value="${id}">` : ''}
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                    <input type="text" name="ten_san_pham" value="${productData.ten_san_pham}" required 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Danh mục</label>
                    <select name="danhmuc_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">-- Chọn danh mục --</option>
                        ${categoryOptions}
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Đường dẫn ảnh (VD: images/sanpham/a.jpg)</label>
                    <input type="text" name="anh_dai_dien" value="${productData.anh_dai_dien}" 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    <p class="text-xs text-gray-500 mt-1">*Tạm thời nhập đường dẫn, chức năng upload ảnh sẽ làm sau.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Mô tả</label>
                    <textarea name="mo_ta" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">${productData.mo_ta}</textarea>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        ${isEdit ? 'Lưu Cập Nhật' : 'Thêm Mới'}
                    </button>
                </div>
            </form>
        `;

        // Chọn đúng danh mục trong select box nếu đang sửa
        if(isEdit && productData.danhmuc_id) {
            document.querySelector('select[name="danhmuc_id"]').value = productData.danhmuc_id;
        }

        // Xử lý khi bấm nút Submit (Lưu)
        document.getElementById('product-form').addEventListener('submit', async (e) => {
            e.preventDefault(); // Chặn load lại trang
            
            const formData = new FormData(e.target);
            const action = isEdit ? 'capNhat' : 'them'; // Chọn action API tương ứng
            
            try {
                const res = await fetch(`${API_URL}?action=${action}`, {
                    method: 'POST',
                    body: formData
                });
                const result = await res.json();
                
                if (result.thanhcong) {
                    alert(result.thongbao);
                    closeModal();
                    renderProducts(); // Tải lại danh sách
                } else {
                    alert('Lỗi: ' + result.thongbao);
                }
            } catch (err) {
                console.error(err);
                alert('Lỗi hệ thống!');
            }
        });

        // Hiển thị Modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    };

    // --- HÀM MỞ MODAL DANH MỤC ---
    window.openCategoryModal = async (id = null) => {
        const modal = document.getElementById('app-modal');
        const modalTitle = document.getElementById('modal-title');
        const modalBody = document.getElementById('modal-body');
        
        let data = { ten_danhmuc: '', hinh_anh: '' };
        let isEdit = false;

        if (id) {
            isEdit = true;
            modalTitle.innerText = "Cập nhật Danh mục";
            // Gọi API lấy chi tiết danh mục
            const res = await fetchData('getCategoryDetail', `&id=${id}`);
            if(res) data = res;
        } else {
            modalTitle.innerText = "Thêm Danh mục mới";
        }

        modalBody.innerHTML = `
            <form id="category-form" class="space-y-4">
                ${isEdit ? `<input type="hidden" name="id" value="${id}">` : ''}
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tên danh mục</label>
                    <input type="text" name="ten_danhmuc" value="${data.ten_danhmuc}" required 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Link ảnh (VD: images/danhmuc/a.jpg)</label>
                    <input type="text" name="hinh_anh" value="${data.hinh_anh}" 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        ${isEdit ? 'Lưu Thay Đổi' : 'Thêm Mới'}
                    </button>
                </div>
            </form>
        `;

        document.getElementById('category-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const action = isEdit ? 'capNhatDanhmuc' : 'themDanhmuc';
            
            try {
                const res = await fetch(`${API_URL}?action=${action}`, { method: 'POST', body: formData });
                const result = await res.json();
                if (result.thanhcong) {
                    alert(result.thongbao);
                    closeModal();
                    renderCategories(); 
                } else {
                    alert(result.thongbao);
                }
            } catch (err) { console.error(err); }
        });

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    };

    // --- HÀM MỞ MODAL THUỘC TÍNH (MÀU HOẶC SIZE) ---
    window.openAttributeModal = (type) => {
        const modal = document.getElementById('app-modal');
        const modalTitle = document.getElementById('modal-title');
        const modalBody = document.getElementById('modal-body');
        
        const isColor = (type === 'color');
        
        modalTitle.innerText = isColor ? "Thêm Màu Sắc Mới" : "Thêm Kích Thước Mới";

        // Giao diện Form sẽ thay đổi tùy theo loại (Màu thì có chọn màu, Size thì không)
        modalBody.innerHTML = `
            <form id="attr-form" class="space-y-4">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        ${isColor ? 'Tên màu (Vd: Xanh Dương)' : 'Tên kích thước (Vd: XL, 42)'}
                    </label>
                    <input type="text" name="${isColor ? 'ten_mau' : 'ten_kich_thuoc'}" required 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary">
                </div>

                ${isColor ? `
                <div>
                    <label class="block text-sm font-medium text-gray-700">Mã màu (Chọn màu)</label>
                    <div class="flex items-center mt-1 space-x-2">
                        <input type="color" id="color-picker" class="h-10 w-10 border border-gray-300 rounded cursor-pointer" value="#000000">
                        <input type="text" name="ma_hex" id="hex-input" value="#000000" 
                            class="block w-full border border-gray-300 rounded-md shadow-sm p-2 uppercase">
                    </div>
                </div>` : ''}

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Thêm Mới
                    </button>
                </div>
            </form>
        `;

        // Logic đồng bộ giữa Color Picker và Input Text (Chỉ chạy khi là Màu)
        if (isColor) {
            const picker = document.getElementById('color-picker');
            const input = document.getElementById('hex-input');
            picker.addEventListener('input', (e) => input.value = e.target.value);
            input.addEventListener('input', (e) => picker.value = e.target.value);
        }

        // Xử lý Submit
        document.getElementById('attr-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const action = isColor ? 'themMau' : 'themSize';
            
            try {
                const res = await fetch(`${API_URL}?action=${action}`, { method: 'POST', body: formData });
                const result = await res.json();
                if (result.thanhcong) {
                    alert(result.thongbao);
                    closeModal();
                    renderAttributes(); // Tải lại bảng
                } else {
                    alert(result.thongbao);
                }
            } catch (err) { console.error(err); }
        });

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    };

    // Init
    window.onload = () => navigateTo('dashboard');
    </script>
</body>

</html>