<h2>Thêm sản phẩm mới</h2>

<form action="index.php?controller=product&action=store" method="POST">
    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" step="0.01" required><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Link hình ảnh (URL hoặc đường dẫn):</label><br>
    <input type="text" name="image"><br><br>

    <button type="submit">Lưu sản phẩm</button>
</form>
