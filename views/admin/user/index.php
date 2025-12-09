<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Danh sách người dùng</h5>
    </div>

    <div class="card-body p-3">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Họ & Tên</th>
                    <th>Email</th>
                    <th>Quyền</th>
                    <th width="220">Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($data as $user) : ?>
                <tr>
                    <td><?= $user["id"] ?></td>

                    <td class="fw-semibold">
                        <?= htmlspecialchars($user["name"]) ?>
                    </td>

                    <td><?= htmlspecialchars($user["email"]) ?></td>

                    <td>
                        <?php if($user["is_admin"] == 1): ?>
                            <span class="badge bg-success">Admin</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">User</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <a class="btn btn-info btn-sm" 
                           href="<?= BASE_URL_ADMIN ?>&action=show-user&id=<?= $user["id"] ?>">
                            Xem
                        </a>
                        <a class="btn btn-danger btn-sm" 
                           href="<?= BASE_URL_ADMIN ?>&action=delete-user&id=<?= $user["id"] ?>"
                           onclick="return confirm('Xác nhận xóa: <?= htmlspecialchars($user['name']) ?>?')">
                            Xóa
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
