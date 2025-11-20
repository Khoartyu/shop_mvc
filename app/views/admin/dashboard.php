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
        const API_URL = '/shop_mvc/api/index.php';
        const formatCurrency = (amount) => new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(amount);

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

        window.closeModal = () => {
            document.getElementById('app-modal').classList.add('hidden');
            document.getElementById('app-modal').classList.remove('flex');
        };

        window.handleLogout = async () => {
            if (confirm('Bạn có chắc chắn muốn đăng xuất?')) {
                await fetchData('logout');
                window.location.href = '/shop_mvc/baocao/logout.php';
            }
        };
    </script>
    <script src="/shop_mvc/js/admin/customers.js"></script>
    <script src="/shop_mvc/js/admin/user.js"></script>
    <script>
        // --- RENDER: DASHBOARD ---
        const renderDashboard = async () => {
            const kpis = await fetchData('adminKPIs') || {
                revenueToday: 0,
                ordersPending: 0,
                stockAlerts: 0
            };
            const html = `
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-primary flex items-center justify-between">
                        <div><p class="text-sm font-medium text-gray-500">Doanh thu hôm nay</p><p class="text-2xl font-bold text-gray-800 mt-1">${formatCurrency(kpis.revenueToday)}</p></div>
                        <div class="p-3 bg-green-100 rounded-full text-primary"><i class="fas fa-dollar-sign fa-lg"></i></div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-secondary flex items-center justify-between">
                        <div><p class="text-sm font-medium text-gray-500">Đơn chờ xử lý</p><p class="text-2xl font-bold text-gray-800 mt-1">${kpis.ordersPending}</p></div>
                        <div class="p-3 bg-orange-100 rounded-full text-secondary"><i class="fas fa-box-open fa-lg"></i></div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500 flex items-center justify-between">
                        <div><p class="text-sm font-medium text-gray-500">Cảnh báo Tồn kho</p><p class="text-2xl font-bold text-gray-800 mt-1">${kpis.stockAlerts}</p></div>
                        <div class="p-3 bg-red-100 rounded-full text-red-500"><i class="fas fa-exclamation-triangle fa-lg"></i></div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-8 text-center border border-gray-200">
                    <img src="/shop_mvc/images/Assets/logo/logochinh.png" class="h-16 mx-auto mb-4" alt="Logo">
                    <h3 class="text-lg font-medium text-gray-600">Chào mừng đến với Hệ thống Quản trị Fashion Store</h3>
                    <p class="text-gray-400 mt-2">Vui lòng chọn chức năng từ menu bên trái để bắt đầu.</p>
                </div>`;
            document.getElementById('content-container').innerHTML = html;
        };

        // --- RENDER: SẢN PHẨM (Vẫn giữ inline tạm thời, sau này nên tách ra products.js) ---
        const renderProducts = async () => {
            const products = await fetchData('adminProducts') || [];
            if (products.length === 0) {
                document.getElementById('content-container').innerHTML = `<div class="text-center p-12">Chưa có dữ liệu sản phẩm.</div>`;
                return;
            }
            const rows = products.map(p => {
                const rawImg = p.anh_dai_dien ? p.anh_dai_dien.split(',')[0].trim() : '';
                const imgSrc = rawImg ? `/shop_mvc/${rawImg}` : '/shop_mvc/images/placeholder.jpg';
                const stockBadge = p.totalStock < 10 ?
                    `<span class="px-2 py-1 text-xs font-bold text-red-700 bg-red-100 rounded-full">Sắp hết: ${p.totalStock}</span>` :
                    `<span class="px-2 py-1 text-xs font-bold text-green-700 bg-green-100 rounded-full">Kho: ${p.totalStock}</span>`;

                return `<tr class="hover:bg-gray-50 border-b transition-colors">
                    <td class="px-6 py-4 text-gray-500">#${p.id}</td>
                    <td class="px-6 py-4"><div class="flex items-center"><div class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-md border border-gray-200"><img class="h-full w-full object-cover" src="${imgSrc}" onerror="this.src='/shop_mvc/images/placeholder.jpg'"></div><div class="ml-4"><div class="text-sm font-semibold text-gray-900">${p.name}</div><div class="text-xs text-gray-500">${p.category}</div></div></div></td>
                    <td class="px-6 py-4 text-sm text-primary font-bold">Từ ${formatCurrency(p.basePrice)}</td>
                    <td class="px-6 py-4">${stockBadge}</td>
                    <td class="px-6 py-4 text-sm text-gray-600"><i class="fas fa-layer-group mr-1"></i> ${p.variantCount} biến thể</td>
                    <td class="px-6 py-4 text-right space-x-2"><button class="text-blue-600 bg-blue-50 p-2 rounded"><i class="fas fa-edit"></i></button><button class="text-red-600 bg-red-50 p-2 rounded"><i class="fas fa-trash"></i></button></td>
                </tr>`;
            }).join('');

            document.getElementById('content-container').innerHTML = `
                <div class="flex justify-between items-center mb-6"><h2 class="text-2xl font-bold text-gray-800">Danh sách Sản phẩm</h2><button class="px-4 py-2 bg-primary text-white rounded-lg shadow"><i class="fas fa-plus mr-2"></i> Thêm Mới</button></div>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200"><table class="min-w-full divide-y divide-gray-200"><thead class="bg-gray-50"><tr><th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">ID</th><th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Thông tin</th><th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Giá</th><th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Kho</th><th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Biến thể</th><th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase">Hành động</th></tr></thead><tbody class="bg-white divide-y divide-gray-200">${rows}</tbody></table></div>`;
        };

        // --- RENDER: Placeholder ---
        const renderPlaceholder = (title, icon) => {
            document.getElementById('content-container').innerHTML = `
                <h2 class="text-2xl font-bold text-gray-800 mb-6">${title}</h2>
                <div class="flex flex-col items-center justify-center h-96 bg-white rounded-xl border-2 border-dashed border-gray-300">
                    <div class="text-6xl text-gray-300 mb-4"><i class="${icon}"></i></div>
                    <h3 class="text-xl font-semibold text-gray-600">Chức năng đang phát triển</h3>
                </div>`;
        };

        // --- ĐIỀU HƯỚNG CHÍNH ---
        const navigateTo = async (page) => {
            // Update UI Active
            document.querySelectorAll('.menu-item').forEach(item => item.classList.remove('active-link'));
            const activeItem = document.querySelector(`.menu-item[data-page="${page}"]`);
            if (activeItem) {
                activeItem.classList.add('active-link');
                document.getElementById('page-title').innerText = activeItem.textContent.trim();
            }

            // Loading...
            document.getElementById('content-container').innerHTML = '<div class="flex justify-center items-center h-full pt-20"><div class="loader"></div></div>';
            await new Promise(r => setTimeout(r, 200));

            // Router
            switch (page) {
                case 'dashboard':
                    await renderDashboard();
                    break;
                case 'products':
                    await renderProducts();
                    break;

                    // [QUAN TRỌNG] Gọi hàm từ file users.js
                case 'users':
                    await renderUsers();
                    break;

                case 'categories':
                    renderPlaceholder('Quản lý Danh mục', 'fas fa-tags');
                    break;
                case 'attributes':
                    renderPlaceholder('Quản lý Thuộc tính', 'fas fa-ruler-combined');
                    break;
                case 'orders':
                    renderPlaceholder('Quản lý Đơn hàng', 'fas fa-file-invoice-dollar');
                    break;
                case 'customers': 
                    await renderCustomers();
                    break; // Gọi từ customers.js
                default:
                    await renderDashboard();
            }
        };

        // Init Events
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                navigateTo(item.getAttribute('data-page'));
            });
        });

        window.onload = () => navigateTo('dashboard');
    </script>
</body>

</html>