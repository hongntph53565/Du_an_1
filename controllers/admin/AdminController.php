<?php
class AdminController{
    public function trangchu()
    {
        view("admin/home");
    }

    public function donhang()
    {
        view("admin/donhang/list");
    }
}
?>