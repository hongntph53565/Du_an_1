<?php

//commons
require_once "commons/env.php";
require_once "commons/function.php";
//models
require_once "models/DanhMuc.php";
require_once "models/SanPham.php";
require_once "models/TaiKhoan.php";
//controller
require_once "controllers/admin/AdminController.php";
require_once "controllers/admin/CategoryController.php";
require_once "controllers/admin/ProductController.php";

require_once "controllers/user/HomeController.php";
require_once "controllers/user/AuthController.php";
require_once "controllers/user/UserCategoryController.php";





$ctl = $_GET['ctl'] ?? "";

match ($ctl) {
    //admin
    'admin' => (new AdminController)->trangchu(),
    
    'list-comment' => (new AdminController)->binhluan(),
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

    'dangky' => (new AuthController)->dangky(),
    'dangnhap' => (new AuthController)->login(),
    'myacc' => (new AuthController)->myacc(),

    'add-account' => (new AdminController)->addacc(),
    'list-account' => (new AdminController)->listacc(),


    'donhang' => (new AdminController)->donhang(),
    //client
    '' => (new HomeController)->index(),
    
    'cart' => (new HomeController)->giohang(),
    'newproduct' => (new UserCategoryController)->newproduct(),
    'newproduct-nu' => (new UserCategoryController)->list(),
    'nu' => (new HomeController)->categorynu(),
    'nam' => (new HomeController)->categorynam(),
    'boy' => (new HomeController)->categoryboy(),
    'girl' => (new HomeController)->categorygirl(),
    default => "Không tìm thấy file"
};
