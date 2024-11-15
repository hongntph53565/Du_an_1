<?php
class HomeController{
    public function index()
    {
        view("client/home");
    }
    public function dangky()
    {
        view("client/dangky");
    }
    public function dangnhap()
    {
        view("client/dangnhap");
    }
    public function giohang()
    {
        view("client/giohang");
    }
}
?>