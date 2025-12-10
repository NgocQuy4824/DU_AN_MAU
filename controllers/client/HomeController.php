<?php

class HomeController
{
    public function index() 
    {
        $categoryModel = new Category();
        $productModel = new Product();
        $categories = $categoryModel->getAllCategories();
        $products = $productModel->getAll();
        $title = 'Trang chủ';
        $view = 'trang-chu';
        require_once PATH_VIEW_CLIENT . 'main.php';
    }

    // Hiển thị sản phẩm theo danh mục
    public function category()
    {
        $catId = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($catId <= 0) {
            header('Location: ' . BASE_URL);
            exit;
        }

        $productModel = new Product();
        $categoryModel = new Category();

        $categories = $categoryModel->getAllCategories();

        $products = $productModel->getByCategory($catId);
        $category = $categoryModel->find($catId);

        $title = 'Danh mục: ' . ($category['name'] ?? '');
        $view = 'category';
        require_once PATH_VIEW_CLIENT . 'main.php';
    }
}