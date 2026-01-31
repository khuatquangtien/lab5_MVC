<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">Chỉnh sửa sản phẩm</h4>
    </div>
    <div class="card-body">
        <form action="index.php?page=product-update&id=<?= $product->id ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?= $product->name ?>" required>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Giá (VNĐ)</label>
                    <input type="number" name="price" class="form-control" value="<?= $product->price ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Link Hình ảnh</label>
                    <input type="text" name="image" class="form-control" value="<?= $product->image ?>">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="3"><?= $product->description ?></textarea>
            </div>

            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <a href="index.php?page=product-list" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>