<div class="card">
    <div class="card-header">
        <h5>Tạo danh mục mới</h5>
    </div>
    <div class="card-body">
        <?php if (!empty($errors) && is_array($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $err): ?>
                        <li><?= htmlspecialchars($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tạo danh mục mới</h5>
        </div>
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN ?>&action=store-category" method="post">
                <div class="mb-3">
                    <label for="category-name" class="form-label fw-semibold">Tên danh mục</label>
                    <input type="text" id="category-name" name="name" class="form-control <?= !empty($errors['name']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($old['name'] ?? ($_POST['name'] ?? '')) ?>" placeholder="Nhập tên danh mục">
                    <?php if (!empty($errors['name'])): ?>
                        <div class="invalid-feedback"><?= htmlspecialchars($errors['name']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="category-description" class="form-label fw-semibold">Mô tả</label>
                    <textarea id="category-description" name="description" class="form-control <?= !empty($errors['description']) ? 'is-invalid' : '' ?>" rows="4" placeholder="Nhập mô tả danh mục"><?= htmlspecialchars($old['description'] ?? ($_POST['description'] ?? '')) ?></textarea>
                    <?php if (!empty($errors['description'])): ?>
                        <div class="invalid-feedback"><?= htmlspecialchars($errors['description']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <a href="<?= BASE_URL_ADMIN ?>&action=list-category" class="btn btn-outline-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>

</div>

