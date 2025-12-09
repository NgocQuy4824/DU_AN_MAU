<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'category'  => (new HomeController)->category(), 
    'product'  => (new ProductController)->product(), 
    'users'  => (new UserController)->users(),
};