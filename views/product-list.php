<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Danh sách sản phẩm</h3>
    
    <form action="index.php" method="GET" class="d-flex">
        <input type="hidden" name="page" value="product-search">
        <input type="text" name="keyword" class="form-control me-2" placeholder="Tìm tên sản phẩm..." required>
        <button type="submit" class="btn btn-outline-primary">Tìm</button>
    </form>

    <a href="index.php?page=product-add" class="btn btn-success">Thêm mới</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $p): ?>
        <tr>
            <td><?= $p->id ?></td>
            <td><img src="<?= $p->image ?>" width="60" class="img-thumbnail"></td>
            <td><?= $p->name ?></td>
            <td><?= number_format($p->price) ?> VNĐ</td>
            <td>
                <a href="index.php?page=product-detail&id=<?= $p->id ?>" class="btn btn-sm btn-info">Xem</a>
                <a href="index.php?page=product-edit&id=<?= $p->id ?>" class="btn btn-sm btn-warning">Sửa</a>
                <a href="index.php?page=product-delete&id=<?= $p->id ?>" 
                   onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-sm btn-danger">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>