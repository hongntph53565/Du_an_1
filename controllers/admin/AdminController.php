<?php
class AdminController{
    public function trangchu()
    {
        view("admin/home");
    }

    public function cart()
    {
        view("admin/cart/list");
    }
    
}
?>