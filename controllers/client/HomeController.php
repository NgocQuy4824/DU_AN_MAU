<?php

class HomeController
{
    public function index() 
    {
        // Load categories and latest products for homepage
        $categoryModel = new Category();
        $productModel = new Product();
        $categories = $categoryModel->getAllCategories();
        $products = $productModel->getAll();
        $title = 'Trang chủ';
        $view = 'trang-chu';
        require_once PATH_VIEW_CLIENT . 'main.php';
    }

    // Hiển thị sản phẩm theo danh mục (client)
    public function category()
    {
        $catId = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($catId <= 0) {
            // redirect về trang chủ nếu id không hợp lệ
            header('Location: ' . BASE_URL);
            exit;
        }

        $productModel = new Product();
        $categoryModel = new Category();

        // load all categories for navbar
        $categories = $categoryModel->getAllCategories();

        $products = $productModel->getByCategory($catId);
        $category = $categoryModel->find($catId);

        $title = 'Danh mục: ' . ($category['name'] ?? '');
        $view = 'category';
        require_once PATH_VIEW_CLIENT . 'main.php';
    }
}