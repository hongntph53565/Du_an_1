<?php


//commons
require_once "commons/env.php";
require_once "commons/function.php";
//models
require_once "models/DanhMuc.php";
require_once "models/SanPham.php";
require_once "models/TaiKhoan.php";
//controller
require_once "controllers/user/HomeController.php";
require_once "controllers/admin/AdminController.php";
require_once "controllers/admin/CategoryControler.php";
require_once "controllers/admin/ProductController.php";
require_once "controllers/admin/AccountController.php";



$ctl = $_GET['ctl'] ?? "";

match ($ctl) {
    //admin
    'admin' => (new AdminController)->trangchu(),
    
    'list-comment' => (new AdminController)->binhluan(),
    'admin-statistical' => (new AdminController)->thongke(),
    'add-product' => (new ProductController)->addsp(),
    'list-product' => (new ProductController)->list(),
    'store-product' => (new ProductController)->store(),
    'delete-product' => (new ProductController)->delete(),
    'edit-product' => (new ProductController)->edit(),


    'list-categories' => (new CategoryController)->list(),
    'add-categories' => (new CategoryController)->add(),
    'store-categories' => (new CategoryController)->store(),
    'delete-categories' => (new CategoryController)->delete(),
    'edit-categories' => (new CategoryController)->edit(),

    'list-account' => (new AccountController)->list(),
   
    'delete-account' => (new AccountController)->delete(),

    'donhang' => (new AdminController)->donhang(),
    //client
    '' => (new HomeController)->index(),
    'dangky' => (new HomeController)->dangky(),
    'dangnhap' => (new HomeController)->dangnhap(),
    'cart' => (new HomeController)->giohang(),
    default => "Không tìm thấy file"
};
