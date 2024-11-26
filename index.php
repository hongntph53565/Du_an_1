<?php
session_start();
//commons
require_once "commons/env.php";
require_once "commons/function.php";
//models
require_once "models/Category.php";
require_once "models/Product.php";
require_once "models/Account.php";
require_once "models/Comment.php";
//controller
require_once "controllers/admin/AdminController.php";
require_once "controllers/admin/CategoryController.php";
require_once "controllers/admin/ProductController.php";
require_once "controllers/admin/AccountController.php";
require_once "controllers/admin/CommentController.php";

require_once "controllers/user/HomeController.php";
require_once "controllers/user/AuthController.php";
require_once "controllers/user/UserCategoryController.php";





$ctl = $_GET['ctl'] ?? "";

match ($ctl) {
    //admin
    'admin' => (new AdminController)->trangchu(),
    
    'add-product' => (new ProductController)->add(),
    'list-product' => (new ProductController)->list(),
    'store-product' => (new ProductController)->store(),
    'delete-product' => (new ProductController)->delete(),
    'edit-product' => (new ProductController)->edit(),


    'list-categories' => (new CategoryController)->list(),
    'add-categories' => (new CategoryController)->add(),
    'store-categories' => (new CategoryController)->store(),
    'delete-categories' => (new CategoryController)->delete(),
    'edit-categories' => (new CategoryController)->edit(),

    'dangky' => (new AuthController)->register(),
    'dangnhap' => (new AuthController)->login(),
    'myaccount' => (new AuthController)->myaccount(),

    'add-account' => (new AccountController)->add(),
    'list-account' => (new AccountController)->list(),
    'delete-account' => (new AccountController)->delete(),


    'list-comment' => (new CommentController)->list(),
    'delete-comment' => (new CommentController)->delete(),

    'donhang' => (new AdminController)->donhang(),
    //client
    '' => (new HomeController)->index(),
    
    'cart' => (new HomeController)->giohang(),
    'danh-muc' => (new UserCategoryController)->list(),
    
    default => view('404'),
};
