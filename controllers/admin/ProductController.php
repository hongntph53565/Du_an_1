<?php
class ProductController
{
    // Hiển thị danh sách sản phẩm
    public function list()
    {
        $products = (new SanPham)->all();
        view("admin/sanpham/list", ['products' => $products]);
    }


    public function addsp()
    {
        $categories = (new Category)->all();
        view("admin/sanpham/add", ['categories' => $categories]);
    }


    public function store()
    {
        $data = $_POST;

        if (isset($_FILES['anh']) && $_FILES['anh']['error'] === 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["anh"]["name"]);
            move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
            $data['anh'] = $target_file;
        }

        (new SanPham)->insert($data);
        $_SESSION['message'] = "Thêm sản phẩm thành công";
        header('location: index.php?ctl=add-product');
    }

    public function delete()
    {
        $ma_sp = $_GET['ma_sp'];
        (new SanPham)->delete($ma_sp);
        $_SESSION['message'] = "Xóa sản phẩm thành công";
        header('location: index.php?ctl=list-product');
    }


    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;


            $product = new SanPham;
            $data['anh'] = $product->findOne($data['ma_sp'])['anh'];

            if (isset($_FILES['anh']) && $_FILES['anh']['error'] === 0) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
                $data['anh'] = $target_file;
            }

            (new SanPham)->update($data, $data['ma_sp']);
            $message = "Cập nhật sản phẩm thành công";
        }

        $ma_sp = $_GET['ma_sp'];
        $product = (new SanPham)->findOne($ma_sp);
        $categories = (new Category)->all();
        view("admin/sanpham/edit", [
            'product' => $product,
            'categories' => $categories,
            'message' => $message ?? ''
        ]);
    }
  
}

