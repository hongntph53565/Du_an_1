<?php
class HomeController
{
    public function index()
    {
        view("client/home");
    }

    public function giohang()
    {
        view("client/cart");
    }

    public function categorynu()
    {
        view("client/categorynu");
    }
    public function categorynam()
    {
        view("client/categorynam");
    }
    public function categoryboy()
    {
        view("client/categoryboy");
    }
    public function categorygirl()
    {
        view("client/categorygirl");
    }
}
