<?php
class UserCategoryController
{
    public function list()
{
    $cate_id = $_GET['cate_id'];
    $getParentCategory = (new Category)->getParentCategory();
    $getChildrenByParent = (new Category)->getChildrenByParent($cate_id);
    if (empty($getChildrenByParent)) {
        $getChildrenByParent = (new Category)->getChildrenByParent($this->getParentIdByCateId($cate_id));
    }
    
    $categories = (new Category)->getParentCategory();
    $parent_id = (new Category)->findOne($cate_id);
    $product = (new Product)->getProductInCategory($cate_id);
    return view("client/category", compact('getChildrenByParent', 'categories', 'product', 'getParentCategory', 'parent_id'));
}

private function getParentIdByCateId($cate_id)
{
    $category = (new Category)->findOne($cate_id);
    return $category ? $category['parent_id'] : null;
}

public function detail()
{
    // Lấy ID danh mục và sản phẩm từ URL
    if (!isset($_GET['pro_id']) || empty($_GET['pro_id'])) {
        echo "ID sản phẩm không hợp lệ.";
        return;
    }

    $cate_id = $_GET['cate_id'] ?? null; // Có thể null nếu không được truyền
    $pro_id = intval($_GET['pro_id']);  // ID sản phẩm

    // Lấy danh sách danh mục cha và con
    $getParentCategory = (new Category)->getParentCategory();
    $getChildrenByParent = (new Category)->getChildrenByParent($cate_id);
    if (empty($getChildrenByParent)) {
        $getChildrenByParent = (new Category)->getChildrenByParent($this->getParentIdByCateId($cate_id));
    }

    $categories = (new Category)->getParentCategory();
    $parent_id = (new Category)->findOne($cate_id);

    // Lấy thông tin chi tiết sản phẩm
    $productDetails = (new Product)->findOne($pro_id);
    if (!$productDetails) {
        echo "Không tìm thấy sản phẩm.";
        return;
    }

    // Truyền dữ liệu vào view
    view("client/detail", compact(
        'getChildrenByParent', 
        'categories', 
        'productDetails', 
        'getParentCategory', 
        'parent_id'
    ));
}


    
}
