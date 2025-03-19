<?php
class CategoryController
{
    public function __construct()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
            // Nếu không phải admin, chuyển hướng về trang đăng nhập hoặc trang lỗi
            header("location: index.php?ctl=login");
            die();
        }
    }
    public function list()
    {
        $categories = (new Category)->all();
        view("admin/category/list", compact('categories'));
    }
    public function add()
    {
        $categories = (new Category)->all();
        $getParentCategory = (new Category)->getParentCategory();
        view("admin/category/add", compact('categories', 'getParentCategory'));
    }
    public function store()
    {
        $data = $_POST;

        // Khởi tạo mảng chứa lỗi
        $errors = [];

        // Validate từng trường
        if (empty($data['cate_name'])) {
            $errors['cate_name'] = "Tên danh mục không được để trống.";
        }
        if (empty($data['parent_id'])) {
            $errors['parent_id'] = "Vui lòng chọn danh mục cha.";
        }

        // Nếu có lỗi, trả về view với thông báo lỗi
        if (!empty($errors)) {
            $categories = (new Category)->all();
            $getParentCategory = (new Category)->getParentCategory();
            return view("admin/category/add", compact('errors', 'categories', 'getParentCategory'));
        }

        // Nếu không có lỗi, thêm dữ liệu vào cơ sở dữ liệu
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
        return view("admin/category/list", compact('categories', 'message'));
    }
    public function edit()
    {
        $message = "";
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;

            // Validate từng trường
            if (empty($data['cate_name'])) {
                $errors['cate_name'] = "Tên danh mục không được để trống.";
            }

            // Nếu có lỗi, trả về view với thông báo lỗi
            if (!empty($errors)) {
                $categories = (new Category)->all();
                $cate_id = $data['cate_id'];
                $category = (new Category)->findOne($cate_id);
                return view("admin/category/edit", compact('errors', 'category'));
            }

            // Nếu không có lỗi, cập nhật dữ liệu
            (new Category)->update($data, $data['cate_id']);
            $message = "Cập nhật dữ liệu thành công";
        }

        $categories = (new Category)->all();
        $cate_id = $_GET['cate_id'];
        $category = (new Category)->findOne($cate_id);
        view("admin/category/edit", compact('category', 'message'));
    }
}
