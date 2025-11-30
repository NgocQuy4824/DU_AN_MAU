<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Thêm sản phẩm</h5>
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

        <form action="<?= BASE_URL_ADMIN ?>&action=store-product" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Danh mục</label>
                    <select name="category_id" class="form-select">
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach ($categories as $cate): ?>
                            <option value="<?= $cate['id'] ?>" 
                                <?= (isset($old['category_id']) && $old['category_id'] == $cate['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cate['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" 
                           placeholder="Nhập tên sản phẩm..."
                           value="<?= htmlspecialchars($old['name'] ?? '') ?>">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Mô tả</label>
                <textarea name="description" class="form-control" rows="4"
                          placeholder="Nhập mô tả sản phẩm..."><?= htmlspecialchars($old['description'] ?? '') ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Giá</label>
                    <input type="text" name="price" class="form-control"
                           placeholder="VD: 150000"
                           value="<?= htmlspecialchars($old['price'] ?? '') ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Số lượng</label>
                    <input type="text" name="quantily" class="form-control"
                           placeholder="VD: 10"
                           value="<?= htmlspecialchars($old['quantily'] ?? '') ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Ảnh sản phẩm</label>
                    <input type="file" name="image" accept="image/*" class="form-control" id="imageInput">

                    <div class="mt-2 text-center">
                        <img id="imagePreview" src="" alt="Preview" 
                             class="rounded border" 
                             style="max-width:120px; display:none;" />
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button class="btn btn-primary px-4">Lưu</button>
                <a href="<?= BASE_URL_ADMIN ?>&action=list-product" class="btn btn-secondary px-4">Hủy</a>
            </div>

        </form>
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
