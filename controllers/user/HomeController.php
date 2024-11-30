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
        // Lấy danh mục cha
        $categories = (new Category)->getParentCategory();
    
        // Trả về view và truyền danh mục
        return view('client/cart', compact('categories'));
    }

    
}
