// File: /js/admin/customers.js

// 1. Render danh sách khách hàng
const renderCustomers = async () => {
    const customers = await fetchData('getCustomers') || [];

    const rows = customers.map(c => `
        <tr class="hover:bg-gray-50 border-b transition-colors">
            <td class="px-6 py-4 text-gray-500">#${c.id}</td>
            <td class="px-6 py-4">
                <div class="font-medium text-gray-800">${c.ho_ten}</div>
                <div class="text-xs text-gray-500">ĐK: ${c.ngay_dang_ky}</div>
            </td>
            <td class="px-6 py-4 text-gray-600">${c.email}</td>
            <td class="px-6 py-4 text-gray-600">${c.so_dien_thoai || '---'}</td>
            <td class="px-6 py-4 text-gray-600 truncate max-w-xs" title="${c.dia_chi}">${c.dia_chi || '---'}</td>
            <td class="px-6 py-4 text-right space-x-2">
                <button onclick='openCustomerModal(${JSON.stringify(c)})' class="text-blue-600 hover:bg-blue-50 p-2 rounded" title="Sửa">
                    <i class="fas fa-edit"></i>
                </button>
                <button onclick="deleteCustomer(${c.id})" class="text-red-600 hover:bg-red-50 p-2 rounded" title="Xóa">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    `).join('');

    const html = `
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Quản lý Khách hàng</h2>
            <button onclick='openCustomerModal()' class="px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-green-700 transition-colors">
                <i class="fas fa-plus mr-2"></i> Thêm Khách hàng
            </button>
        </div>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Họ tên</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">SĐT</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Địa chỉ</th>
                        <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    ${rows.length > 0 ? rows : '<tr><td colspan="6" class="text-center py-4 text-gray-500">Chưa có khách hàng nào</td></tr>'}
                </tbody>
            </table>
        </div>
    `;
    document.getElementById('content-container').innerHTML = html;
};

// 2. Mở Modal
window.openCustomerModal = (customer = null) => {
    const isEdit = !!customer;
    const title = isEdit ? 'Cập nhật Khách hàng' : 'Thêm Khách hàng mới';
    
    const modalHtml = `
        <form onsubmit="handleSaveCustomer(event, ${isEdit ? customer.id : null})">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Họ tên</label>
                    <input type="text" name="ho_ten" value="${customer?.ho_ten || ''}" class="mt-1 w-full p-2 border rounded focus:ring-primary" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="${customer?.email || ''}" class="mt-1 w-full p-2 border rounded focus:ring-primary" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <input type="text" name="so_dien_thoai" value="${customer?.so_dien_thoai || ''}" class="mt-1 w-full p-2 border rounded focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Mật khẩu ${isEdit ? '(Trống nếu không đổi)' : '*'}</label>
                    <input type="password" name="mat_khau" ${!isEdit ? 'required' : ''} class="mt-1 w-full p-2 border rounded focus:ring-primary">
                </div>
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                    <input type="text" name="dia_chi" value="${customer?.dia_chi || ''}" class="mt-1 w-full p-2 border rounded focus:ring-primary">
                </div>
            </div>
            <div class="mt-6 flex justify-end pt-4 border-t">
                 <button type="button" onclick="closeModal()" class="mr-3 px-4 py-2 text-gray-700 bg-gray-100 rounded hover:bg-gray-200">Hủy</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded hover:bg-green-700">
                    ${isEdit ? 'Lưu thay đổi' : 'Tạo mới'}
                </button>
            </div>
        </form>
    `;

    document.getElementById('modal-title').innerText = title;
    document.getElementById('modal-body').innerHTML = modalHtml;
    document.getElementById('modal-footer').style.display = 'none';
    
    document.getElementById('app-modal').classList.remove('hidden');
    document.getElementById('app-modal').classList.add('flex');
};

// 3. Lưu (Gọi API)
window.handleSaveCustomer = async (e, id) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const action = id ? 'updateCustomer' : 'addCustomer';
    if (id) formData.append('id', id);

    try {
        const response = await fetch(`${API_URL}?action=${action}`, { method: 'POST', body: formData });
        const result = await response.json();
        
        if (result.success) {
            alert(result.message);
            closeModal();
            renderCustomers();
        } else {
            alert('Lỗi: ' + result.message);
        }
    } catch (error) {
        console.error(error);
        alert('Lỗi kết nối');
    }
};

// 4. Xóa (Gọi API)
window.deleteCustomer = async (id) => {
    if (!confirm('Bạn chắc chắn muốn xóa khách hàng này?')) return;
    try {
        const response = await fetch(`${API_URL}?action=deleteCustomer&id=${id}`);
        const result = await response.json();
        if (result.success) renderCustomers();
        else alert(result.message);
    } catch (err) { console.error(err); }
};