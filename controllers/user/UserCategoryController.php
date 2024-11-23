<?php
class UserCategoryController{
    public function newproduct(){

        $categories = (new DanhMuc)->all();
        return view("client/newproduct",compact('categories'));
    }
    public function list(){
        
    }
}
?>