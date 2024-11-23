<?php

require_once __DIR__ . "/env.php";
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
require_once "controllers/admin/AccountController.php";


require_once "controllers/user/HomeController.php";
require_once "controllers/user/UserCategoryController.php";





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

<<<<<<< HEAD
    'myacc' => (new HomeController)->myacc(),

    'add-account' => (new AdminController)->addacc(),
    'list-account' => (new AdminController)->listacc(),
=======
    'list-account' => (new AccountController)->list(),
   
    'delete-account' => (new AccountController)->delete(),
>>>>>>> d94815778be4591ff54cc0b6c2fc8f058c0b4ae1

    'donhang' => (new AdminController)->donhang(),
    //client
    '' => (new HomeController)->index(),
    'dangky' => (new HomeController)->dangky(),
    'dangnhap' => (new HomeController)->dangnhap(),
    'cart' => (new HomeController)->giohang(),
    'newproduct' => (new UserCategoryController)->newproduct(),
    'newproduct-nu' => (new UserCategoryController)->list(),
    'nu' => (new HomeController)->categorynu(),
    'nam' => (new HomeController)->categorynam(),
    'boy' => (new HomeController)->categoryboy(),
    'girl' => (new HomeController)->categorygirl(),
    default => "Không tìm thấy file"
};
