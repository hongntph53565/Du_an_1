<?php
class UserCategoryController{
    public function newproduct(){

        $getParentCategory = (new Category)->getParentCategory();
        return view("client/newproduct",compact('getParentCategory'));
    }
    public function nu(){
        $parent_id= 2;
        $getChildrenByParent = (new Category)->getChildrenByParent($parent_id);
        return view("client/nu", compact('getChildrenByParent'));
    }
    public function list(){
        $cate_id = $_GET['cate_id'];
        $getChildrenByParent = (new Category)->getChildrenByParent($cate_id);
        var_dump($getChildrenByParent);
        $danh_muc = (new Category)->getParentCategory();

        $id = $getChildrenByParent[0]['cate_id'];
        
        $san_pham = (new SanPham)->getProductInCategory($id);
        
        return view("client/nu", compact('getChildrenByParent', 'danh_muc', 'san_pham'));
    }
   
   

}
?>