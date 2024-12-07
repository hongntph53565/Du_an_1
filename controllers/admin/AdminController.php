<?php
class AdminController{
    public function trangchu()
    {
        view("admin/home");
    }

    public function cart()
    {
        view("admin/cart/list");
    }
    public function manageOrders() {
        // Lấy danh sách đơn hàng
        $orders = (new Order)->getAllOrders();

        // Dữ liệu cho view
        $data = ['orders' => $orders];
        return view('admin/manage_orders', $data);
    }

    public function updateOrderStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $order_id = $_POST['order_id'];
            $status = $_POST['status'];
            (new Order)->updateOrderStatus($order_id, $status);
            header("Location: index.php?ctl=manageOrders");
            exit();
        }
    }
    
}
?>