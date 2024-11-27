<?php
class UserCategoryController
{
    public function list()
    {
        $cate_id = $_GET['cate_id'];
        $getParentCategory = (new Category)->getParentCategory();
        $getChildrenByParent = (new Category)->getChildrenByParent($cate_id);
        // var_dump($getChildrenByParent);
        $categories = (new Category)->getParentCategory();

        $id = $getChildrenByParent[0]['cate_id'];

        $product = (new Product)->getProductInCategory($cate_id);
        // var_dump($product);
        // exit;

        return view("client/category", compact('getChildrenByParent', 'categories', 'product', 'getParentCategory'));
    }
}
