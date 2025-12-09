<?php
class UserController {
    public $modelUser;

    public function __construct(){
        $this->modelUser = new User();
    }

    public function list(){
        $view = 'user/index';
        $title = 'Danh sách người dùng';
        $data = $this->modelUser->getAllUsers();
        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function delete(){
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id > 0) {
            $this->modelUser->delete($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=list-user');
        exit;
    }

    public function toggle(){   
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $status = isset($_GET['status']) ? intval($_GET['status']) : 1;

        if ($id > 0) {
            $this->modelUser->toggleActive($id, $status);
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=list-user');
        exit;
    }

    public function show(){
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id <= 0) {
            header('Location: ' . BASE_URL_ADMIN . '&action=list-user');
            exit;
        }

        $data = $this->modelUser->find($id);
        if (!$data) {
            header('Location: ' . BASE_URL_ADMIN . '&action=list-user');
            exit;
        }

        $view = 'user/show';
        $title = 'Thông tin người dùng: ' . ($data['name'] ?? '');
        require_once PATH_VIEW_MAIN_ADMIN;
    }
}
?>
