<?php
class HomeController
{
    public function index()
{
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

  

    // Trả về view với các dữ liệu cần thiết
    return view("client/home", compact('getChildrenByParent', 'categories', 'product', 'getParentCategory', 'parent_id'));
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
public function donhang() {
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user'])) {
        header("Location: index.php?ctl=login");
        exit();
    }

    $user = $_SESSION['user'];
    $acc_id = $user['acc_id'];

    // Lấy các sản phẩm trong giỏ hàng
    $cartItems = (new Cart)->getCartItems($acc_id);

    // Nếu không có sản phẩm trong giỏ hàng, thông báo lỗi và dừng xử lý
    if (empty($cartItems)) {
        echo "<script>alert('Mời bạn thêm sản phẩm vào giỏ hàng trước khi thanh toán.'); window.history.back();</script>";
        exit();
    }

    // Lấy danh mục sản phẩm cha để hiển thị
    $categories = (new Category)->getParentCategory();

    // Tính tổng giá trị giỏ hàng
    $total = (new Cart)->getCartTotal($acc_id);

    // Truyền dữ liệu vào view checkout
    return view('client/checkout', compact('categories', 'cartItems', 'total', 'user'));
}

public function success() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?ctl=login");
            exit();
        }

        $user = $_SESSION['user'];
        $acc_id = $user['acc_id'];

        // Kiểm tra nếu "other_addr" bị bỏ trống
        if (empty($_POST['other_addr'])) {
            echo "<script>alert('Vui lòng nhập địa chỉ giao hàng.'); window.history.back();</script>";
            exit();
        }

        // Lấy giá trị từ form
        $other_addr = $_POST['other_addr'];
        $pay = $_POST['pay'] ?? 'COD';  
        $status = 'pending';

        // Tạo đơn hàng
        $orderId = (new Order)->createOrder($acc_id, $status, $other_addr, $pay);
        $_SESSION['order_id'] = $orderId;

        // Xóa sản phẩm trong giỏ hàng
        $cartModel = new Cart(); // Khởi tạo đối tượng Cart
        $cartModel->clearCart($acc_id); // Gọi phương thức xóa giỏ hàng

        // Lấy thông tin đơn hàng
        $orderDetails = (new Order)->getOrderDetails($orderId);
        $orderItems = (new Order)->getOrderItems($orderId);

       
        
        // Lấy danh mục sản phẩm cha
        $categories = (new Category)->getParentCategory();

       // Tính tổng giá trị giỏ hàng
       $total = (new Cart)->getCartTotal($acc_id);
          // Lấy các sản phẩm trong giỏ hàng của người dùng từ cơ sở dữ liệu


        // Truyền dữ liệu vào view
        return view('client/success', compact('categories', 'orderDetails', 'total', 'orderItems', 'user'));
    }
    
}
public function Bill() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_order'])) {
        $orderId = $_POST['cancel_order'];

        // Cập nhật trạng thái đơn hàng thành "Đã hủy"
        (new Order)->updateOrderStatus($orderId, 'Đã hủy');

        // Xóa order_id khỏi session
        unset($_SESSION['order_id']);

        // Thông báo cho người dùng và chuyển hướng về trang index
        echo "<script>alert('Đơn hàng đã được hủy.'); window.location.href = 'index.php';</script>";
        exit();
    }

    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user'])) {
        header("Location: index.php?ctl=login");
        exit();
    }

    $user = $_SESSION['user'];
    $acc_id = $user['acc_id'];

    // Lấy order_id đã lưu trong session từ hàm success
    $orderId = $_SESSION['order_id'];
    
    // Kiểm tra nếu đơn hàng có tồn tại
    if (!$orderId) {
        echo "Không tìm thấy thông tin đơn hàng!";
        exit();
    }

    // Lấy thông tin chi tiết đơn hàng
    $orderDetails = (new Order)->getOrderDetails($orderId);
  
    // Kiểm tra nếu không có thông tin đơn hàng
    if (!$orderDetails) {
        echo "Không tìm thấy thông tin đơn hàng!";
        exit();
    }

    // Kiểm tra trạng thái đơn hàng, nếu đã hủy thì chuyển hướng về trang chính
    if ($orderDetails['status'] == 'Đã hủy') {
        header("Location: index.php");
        exit();
    }

    // Lấy danh mục sản phẩm cha
    $categories = (new Category)->getParentCategory();
    // Tính tổng giá trị đơn hàng (nếu cần thiết)
    $total = (new Cart)->getCartTotal($acc_id);

    // Truyền dữ liệu vào view để hiển thị
    return view('client/donhang', compact('categories', 'orderDetails', 'total', 'user'));
}
















 
    

    
    
    
    
}



    

