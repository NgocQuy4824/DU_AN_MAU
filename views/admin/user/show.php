<div class="card shadow-sm border-0 w-75 mx-auto">
    <div class="card-header bg-info text-white">
        <h5 class="mb-0">Chi tiết người dùng</h5>
    </div>

    <div class="card-body">

        <div class="row mb-3">
            <label class="col-sm-3 fw-bold">ID:</label>
            <div class="col-sm-9">
                <?= $data["id"] ?>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 fw-bold">Họ & Tên:</label>
            <div class="col-sm-9">
                <?= htmlspecialchars($data["name"]) ?>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 fw-bold">Email:</label>
            <div class="col-sm-9">
                <?= htmlspecialchars($data["email"]) ?>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 fw-bold">Quyền:</label>
            <div class="col-sm-9">
                <?php if($data["is_admin"] == 1): ?>
                    <span class="badge bg-success">Admin</span>
                <?php else: ?>
                    <span class="badge bg-secondary">User</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="text-end mt-4">
            <a href="<?= BASE_URL_ADMIN ?>&action=list-user" class="btn btn-secondary">
                Quay lại
            </a>
        </div>
    </div>
</div>
