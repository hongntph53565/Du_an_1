<?php


//commons
require_once "commons/env.php";
require_once "commons/function.php";
//models
require_once "models/DanhMuc.php";
//controller
require_once "controllers/user/HomeController.php";
require_once "controllers/admin/AdminController.php";
require_once "controllers/admin/CategoryControler.php";



$ctl = $_GET['ctl'] ?? "";

match ($ctl) {
    //admin
    'admin' => (new AdminController)->trangchu(),
    
    'list-comment' => (new AdminController)->binhluan(),
    'admin-statistical' => (new AdminController)->thongke(),
    'add-product' => (new AdminController)->addsp(),
    'list-product' => (new AdminController)->listsp(),

    'list-categories' => (new CategoryController)->list(),
    'add-categories' => (new CategoryController)->add(),
    'store-categories' => (new CategoryController)->store(),
    'delete-categories' => (new CategoryController)->delete(),
    'edit-categories' => (new CategoryController)->edit(),

    'add-account' => (new AdminController)->addacc(),
    'list-account' => (new AdminController)->listacc(),

    'donhang' => (new AdminController)->donhang(),
    //client
    '' => (new HomeController)->index(),
    'dangky' => (new HomeController)->dangky(),
    'dangnhap' => (new HomeController)->dangnhap(),
    'cart' => (new HomeController)->giohang(),
    default => "Không tìm thấy file"
};
