<?php
session_start();


//commons

require_once "commons/env.php";
require_once "commons/function.php";

//models

require_once "models/Category.php";
require_once "models/Product.php";
require_once "models/Account.php";
require_once "models/Comment.php";
require_once "models/Cart.php";
require_once "models/Order.php";



//controller

require_once "controllers/admin/AdminController.php";
require_once "controllers/admin/CategoryController.php";
require_once "controllers/admin/ProductController.php";
require_once "controllers/admin/AccountController.php";
require_once "controllers/admin/CommentController.php";
require_once "controllers/admin/CartController.php";
require_once "controllers/admin/OrderController.php";



require_once "controllers/user/HomeController.php";
require_once "controllers/user/AuthController.php";
require_once "controllers/user/UserCategoryController.php";


// --------------------------Them---------------------------
if (isset($_GET['ctl']) && $_GET['ctl'] === 'cart') {
    include_once "models/Cart.php"; // Đảm bảo bạn có file model này
    $order_id = $_GET['order_id']?? null;

    $cart = new Cart();

    // Lấy dữ liệu từ form
    $pro_id = $_POST['pro_id'] ?? null; // Mã sản phẩm từ form
    $quantity = 1; // Số lượng mặc định

    // Lấy `acc_id` từ session
    $acc_id = $_SESSION['user']['acc_id'] ?? null;

    // Kiểm tra điều kiện
    if (!$acc_id) {
        echo "<script>alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');</script>";
        header("Location: index.php?ctl=login");
        exit;
    }

    if ($pro_id) { // Sửa thành $pro_id
        try {
            // Gọi phương thức thêm sản phẩm vào giỏ hàng
            $cart->addItemToCart($acc_id, $pro_id, $quantity);

            // Chuyển hướng về giỏ hàng
            header("Location: index.php?ctl=cart");
            exit;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
 
    }
}
// ------------------------ Xoa----------------------------
if (isset($_GET['ctl']) && $_GET['ctl']) {
    include_once "models/Cart.php";

    $cart = new Cart();
    $cart_id = $_POST['cart_id'] ?? null;

    if ($cart_id) {
        try {
            $cart->removeFromCart($cart_id);
            header("Location: index.php?ctl=cart");
            exit;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
    
    }
}




$ctl = $_GET['ctl'] ?? "";
$order_id = $_GET['order_id'] ?? "";

match ($ctl) {
    //admin
    'admin' => (new AdminController)->trangchu(),

    'add-product' => (new ProductController)->add(),
    'list-product' => (new ProductController)->list(),
    'store-product' => (new ProductController)->store(),
    'delete-product' => (new ProductController)->delete(),
    'edit-product' => (new ProductController)->edit(),
    
   


    'list-categories' => (new CategoryController)->list(),
    'add-categories' => (new CategoryController)->add(),
    'store-categories' => (new CategoryController)->store(),
    'delete-categories' => (new CategoryController)->delete(),
    'edit-categories' => (new CategoryController)->edit(),

    'register' => (new AuthController)->register(),
    'login' => (new AuthController)->login(),
    'myaccount' => (new AuthController)->myaccount(),
    'logout' => (new AuthController)->logout(),

    'edit-account' => (new AccountController)->edit(),
    'add-account' => (new AccountController)->add(),
    'list-account' => (new AccountController)->list(),
    'delete-account' => (new AccountController)->delete(),


    'list-comment' => (new CommentController)->list(),
    'delete-comment' => (new CommentController)->delete(),


    'list-order' => (new OrderController)->getAllOrders(),
    'update-status' => (new OrderController)->editStatus($order_id),
    'status-update' => (new OrderController)->updateStatus(),
    // //client
    '' => (new HomeController)->index(),
    'cart' => (new HomeController)->giohang(),
    'checkout' => (new HomeController)->donhang(),
    'success' => (new HomeController)->success(),
    
 'product' => (new UserCategoryController)->list(),
 'detail' => (new UserCategoryController)->detail(),
    
    default => view('404'),
};
