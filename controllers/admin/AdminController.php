<?php
class AdminController{
    public function trangchu()
    {
        view("admin/home");
    }

    public function binhluan()
    {
       
        view("admin/binhluan/list");
       
    }
    public function addsp()
    {
    
        view("admin/sanpham/add");
       
    }
    public function listsp()
    {
        view("admin/sanpham/list");
       
    }
    public function adddm()
    {
        view("admin/danhmuc/add");
    }
    public function listacc()
    {
        view("admin/taikhoan/list");
    }
    public function addacc()
    {
        view("admin/taikhoan/add");
    }
    public function donhang()
    {
        view("admin/donhang/list");
    }
}
?>