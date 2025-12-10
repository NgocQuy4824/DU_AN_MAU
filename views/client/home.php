
<div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= BASE_ASSETS_UPLOADS ?>products/slide1.jpg" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="<?= BASE_ASSETS_UPLOADS ?>products/slide2.jpg" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="<?= BASE_ASSETS_UPLOADS ?>products/slide3.jpg" class="d-block w-100" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>


<h3 class="mt-4">Sản phẩm mới</h3>
<div class="row">
    <?php foreach ($products as $product): ?>
        <div class="col-3">
            <div class="border rounded mb-4">
                <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                    <img src="<?= BASE_ASSETS_UPLOADS . $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="mw-100 mh-100">
                </div>
                <div class="p-2 d-flex align-items-center justify-content-around">
                    <div>
                        <h5><?= htmlspecialchars($product['name']) ?></h5>
                        <span class="fw-bold"><?= number_format($product['price']) ?></span>
                    </div>
                    <a href="index.php?controller=home&action=detail&id=<?= $product['id'] ?>" class="btn btn-danger">Mua ngay</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>