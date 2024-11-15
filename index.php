<?php


//commons
require_once "commons/env.php";
require_once "commons/function.php";
//models

//controller
require_once "controllers/HomeController.php";



$ctl = $_GET['ctl'] ?? "";

match ($ctl) {
    //client
    '' => (new HomeController)->index(),
    'dangky' => (new HomeController)->dangky(),
    'dangnhap' => (new HomeController)->dangnhap(),
    'giohang' => (new HomeController)->giohang(),
    default => "Không tìm thấy file"
};
