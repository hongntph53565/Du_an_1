<?php
class CategoryController{
    public function list()
    {
        $categories = (new DanhMuc)->all();
        view("admin/danhmuc/list", ['categories' => $categories]);
    }
    public function add()
    {
        $danhmuc = (new DanhMuc)->all();
        view("admin/danhmuc/add", ['danhmuc' => $danhmuc]);
    }
    public function store()
    {
        $data = $_POST;
        (new DanhMuc)->insert($data);
        $_SESSION['message'] = "Thêm dữ liệu thành công";
        header('location: index.php?ctl=add-categories');
    }
    public function delete()
    {
        $ma_dm = $_GET['ma_dm'];
        (new DanhMuc)->delete($ma_dm);
        $_SESSION['message'] = "Xóa dữ liệu thành công";
        header('location: index.php?ctl=list-categories');
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            // dd($data);
            (new DanhMuc)->update($data, $data['ma_dm']);
            $message = "Cập nhật dữ liệu thành công";
        }
        $danhmuc = (new DanhMuc)->all();
        $ma_dm = $_GET['ma_dm'];
        $danhmuc = (new DanhMuc)->findOne($ma_dm);
        view(
            "admin/danhmuc/edit",
            [
                'danhmuc' => $danhmuc,
                'message' => $message ?? ''
            ]
        );
    }
    }

?>