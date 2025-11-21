// File: /js/admin/users.js

// 1. Hiển thị danh sách User
const renderUsers = async () => {
    const users = await fetchData('getUsers') || [];

    const rows = users.map(u => `
        <tr class="hover:bg-gray-50 border-b transition-colors">
            <td class="px-6 py-4 text-gray-500">#${u.id}</td>
            <td class="px-6 py-4 font-medium text-gray-800">${u.ten_dang_nhap}</td>
            <td class="px-6 py-4 text-gray-600">${u.ho_ten}</td>
            <td class="px-6 py-4">
                <span class="px-3 py-1 rounded-full text-xs font-bold ${
                    u.quyen === 'Quản trị viên' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'
                }">
                    ${u.quyen}
                </span>
            </td>
            <td class="px-6 py-4 text-right space-x-2">
                <button onclick='openUserModal(${JSON.stringify(u)})' class="text-blue-600 hover:bg-blue-50 p-2 rounded" title="Sửa">
                    <i class="fas fa-edit"></i>
                </button>
                <button onclick="deleteUser(${u.id})" class="text-red-600 hover:bg-red-50 p-2 rounded" title="Xóa">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    `).join('');

    const html = `
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Quản lý Tài khoản nội bộ</h2>
            <button onclick='openUserModal()' class="px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-green-700 transition-colors">
                <i class="fas fa-plus mr-2"></i> Thêm Tài khoản
            </button>
        </div>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Tên đăng nhập</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Họ tên</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Quyền</th>
                        <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    ${rows.length > 0 ? rows : '<tr><td colspan="5" class="text-center py-4 text-gray-500">Chưa có dữ liệu</td></tr>'}
                </tbody>
            </table>
        </div>
    `;
    document.getElementById('content-container').innerHTML = html;
};

// 2. Mở Modal
window.openUserModal = (user = null) => {
    const isEdit = !!user;
    const title = isEdit ? 'Cập nhật Tài khoản' : 'Thêm Tài khoản mới';
    
    const modalHtml = `
        <form id="userForm" onsubmit="handleSaveUser(event, ${isEdit ? user.id : null})">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tên đăng nhập</label>
                    <input type="text" name="ten_dang_nhap" value="${user?.ten_dang_nhap || ''}" 
                        ${isEdit ? 'readonly class="mt-1 w-full p-2 bg-gray-100 border rounded cursor-not-allowed"' : 'class="mt-1 w-full p-2 border rounded focus:ring-primary focus:border-primary" required'}>
                    ${isEdit ? '<p class="text-xs text-gray-500 mt-1">Không thể thay đổi tên đăng nhập</p>' : ''}
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Họ và tên</label>
                    <input type="text" name="ho_ten" value="${user?.ho_ten || ''}" class="mt-1 w-full p-2 border rounded focus:ring-primary focus:border-primary" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Mật khẩu ${isEdit ? '<span class="text-gray-400 font-normal">(Để trống nếu không đổi)</span>' : '<span class="text-red-500">*</span>'}
                    </label>
                    <input type="password" name="mat_khau" ${!isEdit ? 'required' : ''} class="mt-1 w-full p-2 border rounded focus:ring-primary focus:border-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phân quyền</label>
                    <select name="quyen" class="mt-1 w-full p-2 border rounded focus:ring-primary focus:border-primary">
                        <option value="Nhân viên" ${user?.quyen === 'Nhân viên' ? 'selected' : ''}>Nhân viên</option>
                        <option value="Quản trị viên" ${user?.quyen === 'Quản trị viên' ? 'selected' : ''}>Quản trị viên</option>
                    </select>
                </div>
            </div>
            <div class="mt-6 flex justify-end pt-4 border-t">
                <button type="button" onclick="closeModal()" class="mr-3 px-4 py-2 text-gray-700 bg-gray-100 rounded hover:bg-gray-200">Hủy</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded hover:bg-green-700 shadow">
                    ${isEdit ? '<i class="fas fa-save mr-1"></i> Lưu thay đổi' : '<i class="fas fa-plus mr-1"></i> Tạo tài khoản'}
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

// 3. Xử lý Lưu
window.handleSaveUser = async (e, id) => {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    const action = id ? 'updateUser' : 'addUser';
    if (id) formData.append('id', id);

    try {
        // Lưu ý: API_URL được lấy từ file cha (dashboard.php)
        const response = await fetch(`${API_URL}?action=${action}`, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();

        if (result.success) {
            alert(result.message);
            closeModal();
            renderUsers();
        } else {
            alert('Lỗi: ' + result.message);
        }
    } catch (error) {
        console.error(error);
        alert('Có lỗi xảy ra khi kết nối Server');
    }
};

// 4. Xử lý Xóa
window.deleteUser = async (id) => {
    if (!confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')) return;
    try {
        const response = await fetch(`${API_URL}?action=deleteUser&id=${id}`);
        const result = await response.json();
        if (result.success) renderUsers();
        else alert('Không thể xóa: ' + result.message);
    } catch (error) {
        console.error(error);
    }
};