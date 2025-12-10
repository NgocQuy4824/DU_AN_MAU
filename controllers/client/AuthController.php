<?php
class AuthController
{
    public $modelUser;

    public function __construct()
    {
        $this->modelUser = new User();
    }

    public function login()
    {
        $view = 'auth/login';
        $title = 'Đăng nhập';
        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function handleLogin()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin!';
            header("Location: " . BASE_URL . "?action=login");
            exit;
        }

        $user = $this->modelUser->findByEmail($email);

        if (!$user || $user['password'] != $password) {
            $_SESSION['error'] = 'Email hoặc mật khẩu không đúng!';
            header("Location: " . BASE_URL . "?action=login");
            exit;
        }

         $_SESSION['user'] = $user;

    if ($user['is_admin'] == 1) {
        header("Location: " . BASE_URL);
        exit;
    }

    header("Location: " . BASE_URL);
    exit;
    }

    public function register()
    {
        $view = 'auth/register';
        $title = 'Đăng ký tài khoản';
        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function handleRegister()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!$name || !$email || !$password) {
            $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin!';
            header("Location: " . BASE_URL . "?action=register");
            exit;
        }

        $exists = $this->modelUser->findByEmail($email);

        if ($exists) {
            $_SESSION['error'] = 'Email đã tồn tại!';
            header("Location: " . BASE_URL . "?action=register");
            exit;
        }

        $this->modelUser->createUser($name, $email, $password);

        $_SESSION['success'] = 'Đăng ký thành công, vui lòng đăng nhập!';
        header("Location: " . BASE_URL . "?action=login");
        exit;
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: " . BASE_URL . "?action=login");
        exit;
    }
}
