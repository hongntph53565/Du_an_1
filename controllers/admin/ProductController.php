<?php
class ProductController
{
    // Hiển thị danh sách sản phẩm
    public function list()
    {
        $products = (new Product)->all();
        view("admin/sanpham/list", ['products' => $products]);
    }


    public function add()
    {
        $categories = (new Category)->all();
        view("admin/sanpham/add", ['categories' => $categories]);
    }

    public function store()
    {
        $data = $_POST;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $data['image'] = $target_file;
        }

        (new Product)->insert($data);
        $_SESSION['message'] = "Thêm sản phẩm thành công";
        header('location: index.php?ctl=add-product');
    }

    public function delete()
    {
        $pro_id = $_GET['pro_id'];
        (new Product)->delete($pro_id);
        $_SESSION['message'] = "Xóa sản phẩm thành công";
        header('location: index.php?ctl=list-product');
    }


    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $product = new Product;
            $data['image'] = $product->findOne($data['pro_id'])['image'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $data['image'] = $target_file;
            }

            (new Product)->update($data, $data['pro_id']);
            $message = "Cập nhật sản phẩm thành công";
        }

        $pro_id = $_GET['pro_id'];
        $product = (new Product)->findOne($pro_id);
        $categories = (new Category)->all();
        view("admin/sanpham/edit", [
            'product' => $product,
            'categories' => $categories,
            'message' => $message ?? ''
        ]);
    }
  
}

