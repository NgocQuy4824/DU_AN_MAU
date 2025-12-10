<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'category'  => (new HomeController)->category(),
    'detail'    => (new HomeController)->detail(),
    'product'  => (new ProductController)->product(),
    'users'  => (new UserController)->users(),
    'login'         => (new AuthController)->login(),
    'handle-login'  => (new AuthController)->handleLogin(),
    'register'      => (new AuthController)->register(),
    'handle-register' => (new AuthController)->handleRegister(),
    'logout'        => (new AuthController)->logout(),
};
