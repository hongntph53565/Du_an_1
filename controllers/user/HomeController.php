<?php
class HomeController
{
    public function index()
    {
        $categories = (new Category)->getParentCategory();
        view("client/home", compact('categories'));
    }

    public function giohang()
    {
        view("client/cart");
    }

    
}
