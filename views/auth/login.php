<div class="container mt-5">
    <h2 class="text-center">Đăng Nhập</h2>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'];
                                        unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form action="?action=handle-login" method="POST" class="mx-auto" style="max-width:400px;">
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mật khẩu:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Đăng nhập</button>

        <div class="mt-3 text-center">
            <a href="?action=register">Chưa có tài khoản? Đăng ký</a>
        </div>
    </form>
</div>