<h2>Danh sách sản phẩm</h2>
<a href="index.php?controller=product&action=create">Thêm sản phẩm</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Tên</th><th>Giá</th><th>Mô tả</th><th>Ảnh</th><th>Hành động</th>
    </tr>
    <?php foreach ($products as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['name'] ?></td>
        <td><?= $p['price'] ?></td>
        <td><?= $p['description'] ?></td>
        <td><img src="<?= $p['image'] ?>" width="80"></td>
        <td>
            <a href="index.php?controller=product&action=edit&id=<?= $p['id'] ?>">Sửa</a> |
            <a href="index.php?controller=product&action=delete&id=<?= $p['id'] ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
