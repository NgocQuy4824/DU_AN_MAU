<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Danh sách sản phẩm</h5>
        <a href="<?= BASE_URL_ADMIN ?>&action=create-product" class="btn btn-light text-primary fw-semibold">
            + Thêm sản phẩm
        </a>
    </div>

    <div class="card-body p-3">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Danh mục</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th width="220">Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($data as $pro) :?>
                <tr>
                    <td><?= $pro["id"] ?></td>

                    <td>
                        <img src="<?= BASE_ASSETS_UPLOADS . $pro["img"] ?>" 
                             alt="<?= htmlspecialchars($pro['name']) ?>" 
                             width="50" height="50" 
                             class="rounded border">
                    </td>

                    <td class="fw-semibold"><?= $pro["name"] ?></td>
                    <td><?= $pro["cat_name"] ?></td>
                    
                    <td style="max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                        <?= htmlspecialchars($pro["description"]) ?>
                    </td>

                    <td class="text-danger fw-bold"><?= number_format($pro["price"]) ?> VNĐ</td>

                    <td><?= $pro["quantily"] ?></td>

                    <td>
                        <a class="btn btn-info btn-sm" 
                           href="<?= BASE_URL_ADMIN ?>&action=show-product&id=<?= $pro["id"] ?>">
                            Xem
                        </a>

                        <a class="btn btn-warning btn-sm" 
                           href="<?= BASE_URL_ADMIN ?>&action=edit-product&id=<?= $pro["id"] ?>">
                            Sửa
                        </a>

                        <a class="btn btn-danger btn-sm" 
                           href="<?= BASE_URL_ADMIN ?>&action=delete-product&id=<?= $pro["id"] ?>" 
                           onclick="return confirm('Xác nhận xóa: <?= $pro["name"] ?>?')">
                            Xóa
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
