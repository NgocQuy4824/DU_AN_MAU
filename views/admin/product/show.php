<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Chi tiết sản phẩm</h5>
    </div>

    <div class="card-body p-4">

        <?php if (!empty($product)): ?>

            <div class="row align-items-start">

                <!-- Ảnh sản phẩm -->
                <div class="col-md-4 mb-3 text-center">
                    <?php 
                        $img = !empty($product['img']) 
                            ? BASE_ASSETS_UPLOADS . $product['img'] 
                            : BASE_URL . 'assets/no-image.png';
                    ?>
                    <img src="<?= $img ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>" 
                         class="img-fluid rounded border shadow-sm"
                         style="max-height: 300px; object-fit: cover;">
                </div>

                <!-- Thông tin chi tiết -->
                <div class="col-md-8">

                    <h3 class="fw-bold mb-3"><?= htmlspecialchars($product['name']) ?></h3>

                    <div class="mb-2">
                        <strong>Danh mục:</strong> 
                        <span class="text-muted"><?= htmlspecialchars($product['cat_name'] ?? '') ?></span>
                    </div>

                    <div class="mb-2">
                        <strong>Giá:</strong> 
                        <span class="text-danger fw-bold"><?= number_format($product['price']) ?> VNĐ</span>
                    </div>

                    <div class="mb-2">
                        <strong>Số lượng:</strong> 
                        <span><?= htmlspecialchars($product['quantily']) ?></span>
                    </div>

                    <div class="mt-3">
                        <strong>Mô tả:</strong>
                        <div class="mt-2 bg-light p-3 rounded border" style="white-space: pre-line;">
                            <?= nl2br(htmlspecialchars($product['description'])) ?>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <a href="<?= BASE_URL_ADMIN ?>&action=list-product" class="btn btn-secondary px-4">
                            Quay lại
                        </a>
                        <a href="<?= BASE_URL_ADMIN ?>&action=edit-product&id=<?= $product['id'] ?>" 
                           class="btn btn-warning px-4">
                            Sửa
                        </a>
                    </div>
                </div>

            </div>

        <?php else: ?>
            <p class="text-danger fw-bold">Sản phẩm không tồn tại.</p>
        <?php endif; ?>

    </div>
</div>
