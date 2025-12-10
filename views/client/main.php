<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title ?? 'Trang chủ') ?></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>


<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng Nhập</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="?action=handle-login" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Mật khẩu:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary w-100">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng Ký</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="?action=handle-register" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Họ và tên:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Mật khẩu:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success w-100">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>


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
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link">Danh mục 1</a></li>
                        <li class="nav-item"><a class="nav-link">Danh mục 2</a></li>
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
                            <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Đăng nhập</button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng ký</button>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>

    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= BASE_ASSETS_UPLOADS . 'products/slide1.jpg' ?>" class="d-block w-100 h-50" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= BASE_ASSETS_UPLOADS . 'products/slide2.jpg' ?>" class="d-block w-100 h-50" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= BASE_ASSETS_UPLOADS . 'products/slide3.jpg' ?>" class="d-block w-100 h-50" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <h3 class="mt-3">Sản phẩm mới</h3>
        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <?php $img = !empty($product['image']) ? BASE_ASSETS_UPLOADS . $product['image'] : BASE_URL . 'assets/no-image.png'; ?>
                    <div class="col-3">
                        <div class="border rounded mb-4">
                            <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                                <img src="<?= $img ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="mw-100 mh-100">
                            </div>
                            <div class="p-2 d-flex align-items-center justify-content-around">
                                <div>
                                    <h5><?= htmlspecialchars($product['name']) ?></h5>
                                    <span class="fw-bold"> <?= number_format($product['price']) ?> </span>
                                </div>
                                <a href="index.php?controller=home&action=detail&id=<?= $product['id'] ?>" class="btn btn-danger">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-3">
                    <div class="border rounded mb-4">
                        <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                            <img src="<?= BASE_ASSETS_UPLOADS . 'products/san-pham_ao-blazer-01.webp' ?>" alt="" class="mw-100 mh-100">
                        </div>
                        <div class="p-2 d-flex align-items-center justify-content-around">
                            <div>
                                <h5>Tên sản phẩm 01</h5>
                                <span class="fw-bold"> 100.000 </span>
                            </div>
                            <button class="btn btn-danger">Mua ngay</button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>