<?php
class UserCategoryController{
    public function newproduct(){

        $getParentCategory = (new DanhMuc)->getParentCategory();
        return view("client/newproduct",compact('getParentCategory'));
    }
    public function nu(){
        $parent_id= 2;
        $getChildrenByParent = (new DanhMuc)->getChildrenByParent($parent_id);
        return view("client/nu", compact('getChildrenByParent'));
    }
    public function list(){
        $ma_dm = $_GET['ma_dm'];
        $getChildrenByParent = (new DanhMuc)->getChildrenByParent($ma_dm);
        // var_dump($getChildrenByParent);
        $danh_muc = (new DanhMuc)->getParentCategory();

        $id = $getChildrenByParent[0]['ma_dm'];
        
        $san_pham = (new SanPham)->getProductInCategory($id);
        
        return view("client/nu", compact('getChildrenByParent', 'danh_muc', 'san_pham'));
    }
   
   

}
?>