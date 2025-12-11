<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;
    public function __construct()
    {
        $this->modelProduct = new Product();
    }
    public function dashboad()
    {
        $title = 'Đây là trang quản trị';
        require_once PATH_VIEW_MAIN_ADMIN;
    }
    public function index()
    {
        $view = 'product/index';
        $title = 'Danh sách Sản phẩm';
        $data = $this->modelProduct->getAll();
        require_once PATH_VIEW_MAIN_ADMIN;
    }
    public function create()
    {
        $title = "Thêm sản phẩm";
        $view = "product/create";
        $categories = (new Category())->getAllCategories();
        require PATH_VIEW_MAIN_ADMIN;
    }

   
    public function store()
    {
        $errors = [];
        $old = [];

        $old['category_id'] = isset($_POST['category_id']) ? trim($_POST['category_id']) : '';
        $old['name'] = isset($_POST['name']) ? trim($_POST['name']) : '';
        $old['description'] = isset($_POST['description']) ? trim($_POST['description']) : '';
        $old['price'] = isset($_POST['price']) ? trim($_POST['price']) : '';
        $old['quantily'] = isset($_POST['quantily']) ? trim($_POST['quantily']) : '';
        $old['img'] = '';

        if ($old['name'] === '') {
            $errors['name'] = 'Tên sản phẩm là bắt buộc.';
        }
        if ($old['category_id'] === '' || !is_numeric($old['category_id'])) {
            $errors['category_id'] = 'Danh mục không hợp lệ.';
        }
        if ($old['price'] === '' || !is_numeric($old['price']) || floatval($old['price']) < 0) {
            $errors['price'] = 'Giá phải là số không âm.';
        }
        if ($old['quantily'] === '' || !ctype_digit($old['quantily'])) {
            $errors['quantily'] = 'Số lượng phải là số nguyên không âm.';
        }

        if (!empty($errors)) {
            $title = "Thêm sản phẩm";
            $view = "product/create";
            $categories = (new Category())->getAllCategories();
            require PATH_VIEW_MAIN_ADMIN;
            return;
        }

        $uploadedFileName = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $file = $_FILES['image'];
            if ($file['error'] === UPLOAD_ERR_OK) {
                $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $file['tmp_name']);
                finfo_close($finfo);
                if (!in_array($mime, $allowed)) {
                    $errors['image'] = 'File ảnh không hợp lệ. Chỉ chấp nhận JPG, PNG, GIF, WEBP.';
                } else {
                    if (!is_dir(PATH_ASSETS_UPLOADS)) {
                        mkdir(PATH_ASSETS_UPLOADS, 0755, true);
                    }
                    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $uploadedFileName = time() . '_' . bin2hex(random_bytes(6)) . '.' . $ext;
                    $dest = rtrim(PATH_ASSETS_UPLOADS, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $uploadedFileName;
                    if (!move_uploaded_file($file['tmp_name'], $dest)) {
                        $errors['image'] = 'Không thể lưu file ảnh.';
                    }
                }
            } else {
                $errors['image'] = 'Lỗi khi upload ảnh.';
            }
        }

        if (!empty($errors)) {
            $title = "Thêm sản phẩm";
            $view = "product/create";
            $categories = (new Category())->getAllCategories();
            require PATH_VIEW_MAIN_ADMIN;
            return;
        }

        $data = [
            'category_id' => $old['category_id'],
            'name'        => $old['name'],
            'description' => $old['description'],
            'price'       => $old['price'],
            'quantily'    => $old['quantily'],
            'img'         => $uploadedFileName
        ];

        $this->modelProduct->store($data);
        header("Location: " . BASE_URL_ADMIN . "&action=list-product");
        exit();
    }

    public function delete()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id > 0) {
            $this->modelProduct->delete($id);
        }
        header("Location: " . BASE_URL_ADMIN . "&action=list-product");
        exit;
    }

    // Hiển thị chi tiết sản phẩm
    public function show()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id <= 0) {
            header("Location: " . BASE_URL_ADMIN . "&action=list-product");
            exit;
        }
        $product = $this->modelProduct->find($id);
        $view = 'product/show';
        $title = 'Chi tiết sản phẩm';
        require PATH_VIEW_MAIN_ADMIN;
    }

    // Hiển thị form sửa
    public function edit()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id <= 0) {
            header("Location: " . BASE_URL_ADMIN . "&action=list-product");
            exit;
        }
        $product = $this->modelProduct->find($id);
        $categories = (new Category())->getAllCategories();
        $view = 'product/edit';
        $title = 'Sửa sản phẩm';
        require PATH_VIEW_MAIN_ADMIN;
    }

    // Lưu cập nhật
    public function update()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id <= 0) {
            header("Location: " . BASE_URL_ADMIN . "&action=list-product");
            exit;
        }

        $errors = [];
        $old = [];
        $old['category_id'] = isset($_POST['category_id']) ? trim($_POST['category_id']) : '';
        $old['name'] = isset($_POST['name']) ? trim($_POST['name']) : '';
        $old['description'] = isset($_POST['description']) ? trim($_POST['description']) : '';
        $old['price'] = isset($_POST['price']) ? trim($_POST['price']) : '';
        $old['quantily'] = isset($_POST['quantily']) ? trim($_POST['quantily']) : '';

        if ($old['name'] === '') {
            $errors['name'] = 'Tên sản phẩm là bắt buộc.';
        }
        if ($old['category_id'] === '' || !is_numeric($old['category_id'])) {
            $errors['category_id'] = 'Danh mục không hợp lệ.';
        }

        if (!empty($errors)) {
            $product = $this->modelProduct->find($id);
            $categories = (new Category())->getAllCategories();
            $view = 'product/edit';
            $title = 'Sửa sản phẩm';
            require PATH_VIEW_MAIN_ADMIN;
            return;
        }

        // Handle optional image upload
        $uploadedFileName = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $file = $_FILES['image'];
            if ($file['error'] === UPLOAD_ERR_OK) {
                $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $file['tmp_name']);
                finfo_close($finfo);
                if (!in_array($mime, $allowed)) {
                    $errors['image'] = 'File ảnh không hợp lệ. Chỉ chấp nhận JPG, PNG, GIF, WEBP.';
                } else {
                    if (!is_dir(PATH_ASSETS_UPLOADS)) {
                        mkdir(PATH_ASSETS_UPLOADS, 0755, true);
                    }
                    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $uploadedFileName = time() . '_' . bin2hex(random_bytes(6)) . '.' . $ext;
                    $dest = rtrim(PATH_ASSETS_UPLOADS, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $uploadedFileName;
                    if (!move_uploaded_file($file['tmp_name'], $dest)) {
                        $errors['image'] = 'Không thể lưu file ảnh.';
                    } else {
                        // optionally delete old file
                        $oldProduct = $this->modelProduct->find($id);
                        if (!empty($oldProduct['img'])) {
                            $oldPath = PATH_ASSETS_UPLOADS . $oldProduct['img'];
                            if (is_file($oldPath)) @unlink($oldPath);
                        }
                    }
                }
            } else {
                $errors['image'] = 'Lỗi khi upload ảnh.';
            }
        }

        if (!empty($errors)) {
            $product = $this->modelProduct->find($id);
            $categories = (new Category())->getAllCategories();
            $view = 'product/edit';
            $title = 'Sửa sản phẩm';
            require PATH_VIEW_MAIN_ADMIN;
            return;
        }

        $data = [
            'category_id' => $old['category_id'],
            'name' => $old['name'],
            'description' => $old['description'],
            'price' => $old['price'],
            'quantily' => $old['quantily'],
            'id' => $id
        ];
        if ($uploadedFileName !== null) $data['img'] = $uploadedFileName;

        $this->modelProduct->update($data);
        header("Location: " . BASE_URL_ADMIN . "&action=list-product");
        exit;
    }
}
