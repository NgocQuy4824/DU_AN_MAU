<div class="card">
    <div class="card-header">
        <h5>Sửa danh mục</h5>
    </div>
    <div class="card-body">
        <?php if (!empty($errors)): ?>
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
        <h5 class="mb-0">Sửa danh mục</h5>
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
    <form action="<?= BASE_URL_ADMIN ?>&action=update-category" method="post">
        <input type="hidden" name="id" value="<?= $category['id'] ?>">

        <div class="mb-3">
            <label for="category-name" class="form-label fw-semibold">Tên danh mục</label>
            <input type="text" id="category-name" name="name" class="form-control <?= !empty($errors['name']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($category['name'] ?? '') ?>" placeholder="Nhập tên danh mục">
            <?php if (!empty($errors['name'])): ?>
                <div class="invalid-feedback"><?= htmlspecialchars($errors['name']) ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="category-description" class="form-label fw-semibold">Mô tả</label>
            <textarea id="category-description" name="description" class="form-control <?= !empty($errors['description']) ? 'is-invalid' : '' ?>" rows="4" placeholder="Nhập mô tả danh mục"><?= htmlspecialchars($category['description'] ?? '') ?></textarea>
            <?php if (!empty($errors['description'])): ?>
                <div class="invalid-feedback"><?= htmlspecialchars($errors['description']) ?></div>
            <?php endif; ?>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=list-category" class="btn btn-outline-secondary">Hủy</a>
        </div>
    </form>
</div>

</div>

    </div>
</div>
