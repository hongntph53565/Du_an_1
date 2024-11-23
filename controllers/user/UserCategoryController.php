<?php
class UserCategoryController{
    public function newproduct(){

        $categories = (new DanhMuc)->getParentCategory();
        return view("client/newproduct",compact('categories'));
    }
    public function list(){
        
    }
}
?>