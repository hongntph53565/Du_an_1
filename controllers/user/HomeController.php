<?php
class HomeController
{
    public function index()
    {
        $danh_muc = (new DanhMuc)->getParentCategory();
        view("client/home", compact('danh_muc'));
    }

    public function giohang()
    {
        view("client/cart");
    }

    
}
