<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">Thêm sản phẩm mới</h4>
    </div>
    <div class="card-body">
        <form action="index.php?page=product-store" method="POST">
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Giá (VNĐ)</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Link Hình ảnh</label>
                    <input type="text" name="image" class="form-control" placeholder="https://example.com/anh.jpg">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
            <a href="index.php?page=product-list" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>