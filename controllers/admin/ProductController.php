<?php
class ProductController {
    // Hiển thị danh sách sản phẩm
     public function list()
    {
        $products = (new SanPham)->all(); // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        view("admin/sanpham/list", ['products' => $products]);
    }

    // Hiển thị form thêm sản phẩm
    public function addsp()
    {
        $categories = (new DanhMuc)->all(); // Lấy tất cả danh mục để lựa chọn cho sản phẩm
        view("admin/sanpham/add", ['categories' => $categories]);
    }

    // Xử lý thêm sản phẩm mới
    public function store()
    {
        $data = $_POST;
        
        // Xử lý ảnh nếu có
        if (isset($_FILES['anh']) && $_FILES['anh']['error'] === 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["anh"]["name"]);
            move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
            $data['anh'] = $target_file; // Lưu đường dẫn ảnh
        }
        
        (new SanPham)->insert($data);
        $_SESSION['message'] = "Thêm sản phẩm thành công";
        header('location: index.php?ctl=add-product');
    }

    // Xóa sản phẩm
    public function delete()
    {
        $ma_sp = $_GET['ma_sp'];
        (new SanPham)->delete($ma_sp);
        $_SESSION['message'] = "Xóa sản phẩm thành công";
        header('location: index.php?ctl=list-product');
    }

    // Hiển thị form chỉnh sửa sản phẩm
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            (new SanPham)->update($data, $data['ma_sp']);
            $message = "Cập nhật sản phẩm thành công";
        }
        
        $ma_sp = $_GET['ma_sp'];
        $product = (new SanPham)->findOne($ma_sp);
        $categories = (new DanhMuc)->all(); // Lấy tất cả danh mục để lựa chọn cho sản phẩm
        view("admin/sanpham/edit", [
            'product' => $product,
            'categories' => $categories,
            'message' => $message ?? ''
        ]);
    }
}
?>
