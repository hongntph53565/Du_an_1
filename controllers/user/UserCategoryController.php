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
public function listHome() {    
    // Đặt cate_id cố định là 1
    $cate_id = 1;

    // Lấy danh mục cha
    $getParentCategory = (new Category)->getParentCategory();

    // Lấy các danh mục con của danh mục hiện tại
    $getChildrenByParent = (new Category)->getChildrenByParent($cate_id);

    // Nếu không tìm thấy danh mục con, lấy danh mục con của danh mục cha
    if (empty($getChildrenByParent)) {
        $getChildrenByParent = (new Category)->getChildrenByParent($this->getParentIdByCateId($cate_id));
    }

    // Lấy danh sách danh mục cha
    $categories = (new Category)->getParentCategory();

    // Lấy thông tin danh mục cha của cate_id hiện tại
    $parent_id = (new Category)->findOne($cate_id);

    // Lấy danh sách sản phẩm theo cate_id
    $product = (new Product)->getProductInCategory($cate_id);
    
    // Trả về view với dữ liệu
    return view("client/home", compact('getChildrenByParent', 'categories', 'product', 'getParentCategory', 'parent_id'));
}



private function getParentIdByCateId($cate_id)
{
    $category = (new Category)->findOne($cate_id);
    return $category ? $category['parent_id'] : null;
}

public function detail()
{
    if (!isset($_GET['pro_id']) || empty($_GET['pro_id'])) {
        echo "ID sản phẩm không hợp lệ.";
        return;
    }

    $cate_id = $_GET['cate_id'] ?? null; 
    $pro_id = intval($_GET['pro_id']);  


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
