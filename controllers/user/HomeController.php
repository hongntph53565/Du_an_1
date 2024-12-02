<?php
class HomeController
{
    public function index()
    {
        $categories = (new Category)->getParentCategory();
        view("client/home", compact('categories'));
    }

    public function giohang()
{
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user'])) {
        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        header("Location: index.php?ctl=login");
        exit();
    }

    // Lấy acc_id từ session để truy cập giỏ hàng của người dùng
    $acc_id = $_SESSION['user']['acc_id'];

    // Lấy danh mục sản phẩm cha để hiển thị trong giỏ hàng
    $categories = (new Category)->getParentCategory();

    // Lấy các sản phẩm trong giỏ hàng của người dùng từ cơ sở dữ liệu
    $cartItems = (new Cart)->getCartItems($acc_id);

    // Tính tổng giá trị giỏ hàng
    $total = (new Cart)->getCartTotal($acc_id);
    

    // Truyền dữ liệu vào view để hiển thị giỏ hàng
    return view('client/cart', compact('categories', 'cartItems', 'total'));
}




    
}
