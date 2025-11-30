<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Sửa sản phẩm</h5>
    </div>

    <div class="card-body p-4">

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $err): ?>
                        <li><?= htmlspecialchars($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (empty($product)): ?>
            <p class="text-danger fw-bold">Sản phẩm không tồn tại.</p>
        <?php else: ?>

        <form action="<?= BASE_URL_ADMIN ?>&action=update-product&id=<?= $product['id'] ?>" 
              method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Danh mục</label>
                    <select name="category_id" class="form-select">
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach ($categories as $cate): ?>
                            <option value="<?= $cate['id'] ?>" 
                                <?= ($product['category_id'] == $cate['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cate['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control"
                           value="<?= htmlspecialchars($product['name']) ?>">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Mô tả</label>
                <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($product['description']) ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Giá</label>
                    <input type="text" name="price" class="form-control" 
                           value="<?= htmlspecialchars($product['price']) ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Số lượng</label>
                    <input type="text" name="quantily" class="form-control" 
                           value="<?= htmlspecialchars($product['quantily']) ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Ảnh sản phẩm (để trống nếu không muốn thay)</label>
                    <input type="file" name="image" accept="image/*" class="form-control" id="imageInput">

                    <div class="mt-2 text-center">
                        <?php if (!empty($product['img'])): ?>
                            <img id="imagePreview" 
                                 src="<?= BASE_ASSETS_UPLOADS . $product['img'] ?>" 
                                 class="rounded border"
                                 style="max-width:120px; display:block;" />
                        <?php else: ?>
                            <img id="imagePreview" 
                                 src="<?= BASE_URL ?>assets/no-image.png" 
                                 class="rounded border"
                                 style="max-width:120px; display:block;" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <script>
            document.getElementById('imageInput')?.addEventListener('change', function(e){
                const f = e.target.files[0];
                const img = document.getElementById('imagePreview');
                if (!f) { img.style.display='none'; img.src=''; return; }
                const url = URL.createObjectURL(f);
                img.src = url;
                img.style.display = 'block';
            });
            </script>

            <div class="d-flex gap-2 mt-4">
                <button class="btn btn-primary px-4">Lưu</button>
                <a href="<?= BASE_URL_ADMIN ?>&action=list-product" class="btn btn-secondary px-4">Hủy</a>
            </div>

        </form>

        <?php endif; ?>
    </div>
</div>
