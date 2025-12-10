<div class="row mt-4">
    <div class="col-md-6">
        <img src="<?= BASE_ASSETS_UPLOADS . $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid">
    </div>
    <div class="col-md-6">
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <h4 class="text-danger"><?= number_format($product['price']) ?>₫</h4>
        <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
        <form action="index.php?controller=cart&action=add" method="POST">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control" style="width: 100px;">
            </div>
            <button type="submit" class="btn btn-success">Thêm vào giỏ hàng</button>
        </form>
        <a href="<?= BASE_URL ?>" class="btn btn-secondary mt-2">Quay lại trang chủ</a>
    </div>
</div>
