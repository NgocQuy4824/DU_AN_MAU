<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Trang chủ') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


    <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <a href="<?= BASE_URL ?>" class="navbar-brand">
                    <img src="<?= BASE_ASSETS_UPLOADS . 'products/logoFPT.png' ?>" alt="logo" width="50" height="50">
                </a>
                <ul class="navbar-nav">
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $cate): ?>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>?action=category&id=<?= $cate['id'] ?>" class="nav-link"><?= htmlspecialchars($cate['name']) ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div>
                <ul class="navbar-nav">
                    <?php if (!empty($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><?= htmlspecialchars($_SESSION['user']['name']) ?></a>
                        </li>
                        <?php if ($_SESSION['user']['is_admin'] == 1): ?>
                            <li class="nav-item">
                                <a href="?mode=admin&action=list-product" class="nav-link text-danger fw-bold">Quản trị</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="?action=logout" class="nav-link">Đăng xuất</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <button class="btn btn-outline-primary me-2" onclick="location.href='?action=login'">
                                Đăng nhập
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-primary" onclick="location.href='?action=register'">
                                Đăng ký
                            </button>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php
        if (!empty($view)) {
            require_once PATH_VIEW_CLIENT . $view . '.php';
        }
        ?>
    </div>

</body>

</html>