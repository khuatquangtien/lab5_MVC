<h3>Chi tiết sản phẩm</h3>
<div class="row mt-4">
    <div class="col-md-4">
        <img src="<?= $product->image ?>" class="img-fluid rounded shadow">
    </div>
    <div class="col-md-8">
        <h2><?= $product->name ?></h2>
        <p class="text-danger fw-bold fs-4"><?= number_format($product->price) ?> VNĐ</p>
        <p><?= $product->description ?></p>
        <a href="index.php?page=product-list" class="btn btn-secondary">Quay về danh sách</a>
    </div>
</div>