<?php
class HomeController
{
    public function index()
    {
        $categories = (new Category)->getParentCategory();
        view("client/home", compact('categories'));
    }

    public function cart()
    {
        view("client/cart");
    }

    
}
