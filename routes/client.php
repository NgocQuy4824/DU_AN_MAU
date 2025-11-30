<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'category'  => (new HomeController)->category(), // Hiển thị sản phẩm theo danh mục
    'product'  => (new ProductController)->product(), // Hiển thị chi tiết sản phẩm
};