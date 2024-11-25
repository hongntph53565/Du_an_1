<?php
class CategoryController
{
    public function list()
    {
        $categories = (new Category)->all();
        view("admin/category/list", compact('categories'));
    }
    public function add()
    {
        $categories = (new Category)->all();
        $getParentCategory = (new Category)->getParentCategory();
        view("admin/category/add", compact('categories','getParentCategory'));
    }
    public function store()
    {
        $data = $_POST;
        (new Category)->insert($data);
        $message = "Thêm dữ liệu thành công";
        return view("admin/category/add", compact('message'));
    }
    public function delete()
    {
        $cate_id = $_GET['cate_id'];
        $categories = (new Category)->all();
        (new Category)->delete($cate_id);
        $message = "Xóa dữ liệu thành công";
        return view("admin/category/list", compact('categories','message'));
    }
    public function edit()
    {
        $message="";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            (new Category)->update($data, $data['cate_id']);
            $message = "Cập nhật dữ liệu thành công";
        }
        $categories = (new Category)->all();
        $cate_id = $_GET['cate_id'];
        $categories = (new Category)->findOne($cate_id);
        view(
            "admin/category/edit",
            compact('categories', 'message')
        );
    }
}
