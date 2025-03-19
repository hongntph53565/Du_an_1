<?php

class OrderController
{


    private $orderModel;

    // Constructor để khởi tạo các mô hình cần thiết
    public function __construct()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
            // Nếu không phải admin, chuyển hướng về trang đăng nhập hoặc trang lỗi
            header("location: index.php?ctl=login");
            die();
        }
        // Tạo đối tượng OrderModel
        $this->orderModel = new Order();
        // Khởi tạo cartModel nếu có
    }

    // Tạo đơn hàng
    public function createOrder($acc_id, $status, $other_addr, $pay, $cartItems)
    {
        try {
            if (empty($cartItems)) {
                throw new Exception("Giỏ hàng rỗng, không thể tạo đơn hàng.");
            }

            // Bắt đầu transaction
            $this->conn->beginTransaction();

            // Thêm dữ liệu vào bảng `order`
            $sql = "INSERT INTO `order` (acc_id, status, other_addr, pay) 
                    VALUES (:acc_id, :status, :other_addr, :pay)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':acc_id' => $acc_id,
                ':status' => $status,
                ':other_addr' => $other_addr,
                ':pay' => $pay,
            ]);

            // Lấy ID của đơn hàng vừa được tạo
            $orderId = $this->conn->lastInsertId();

            // Thêm chi tiết sản phẩm vào bảng `detail_order`
            foreach ($cartItems as $item) {
                if (!isset($item['pro_id'], $item['quantity'], $item['price'])) {
                    throw new Exception("Dữ liệu sản phẩm không đầy đủ: " . json_encode($item));
                }

                $sqlDetail = "INSERT INTO detail_order (order_id, pro_id, quantity, price) 
                              VALUES (:order_id, :pro_id, :quantity, :price)";
                $stmtDetail = $this->conn->prepare($sqlDetail);
                $result = $stmtDetail->execute([
                    ':order_id' => $orderId,
                    ':pro_id' => $item['pro_id'],
                    ':quantity' => $item['quantity'],
                    ':price' => $item['price'],
                ]);

                if (!$result) {
                    throw new Exception("Lỗi thêm sản phẩm vào detail_order: " . implode(", ", $stmtDetail->errorInfo()));
                }
            }

            // Commit transaction
            $this->conn->commit();

            // Xóa giỏ hàng sau khi đặt hàng thành công
            $this->cartModel->clearCart($acc_id);

            // Lưu `order_id` vào session
            $_SESSION['order_id'] = $orderId;

            // Thông báo đặt hàng thành công
            echo "<script>alert('Đặt hàng thành công!');</script>";
            exit;
        } catch (Exception $e) {
            $this->conn->rollBack();
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Lấy chi tiết đơn hàng
    public function getOrderDetails($orderId)
    {
        return $this->orderModel->getOrderDetails($orderId);
    }

    // Lấy các sản phẩm trong đơn hàng
    public function getOrderItems($orderId)
    {
        $sql = "SELECT * FROM detail_order WHERE order_id = :order_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':order_id' => $orderId]);

        // Kiểm tra xem có dữ liệu trả về không
        $orderItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($orderItems);  // Kiểm tra dữ liệu trả về
        return $orderItems;
    }


    // Hiển thị danh sách đơn hàng
    public function listOrders($acc_id)
    {
        return $this->orderModel->getOrdersByAccount($acc_id);
    }

    // Chỉnh sửa trạng thái đơn hàng
    public function editStatus($order_id)
    {
        if (!$order_id) {
            echo "Không tìm thấy đơn hàng!";
            exit();
        }

        $orderDetails = $this->orderModel->getOrderDetails($order_id);

        if (!$orderDetails) {
            echo "Không tìm thấy chi tiết đơn hàng!";
            exit();
        }

        // Truyền dữ liệu vào view
        return view('admin/cart/status', compact('orderDetails'));
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $order_id = $_POST['order_id'];
            $status = $_POST['status'];

            $this->orderModel->updateOrderStatus($order_id, $status);

            header("Location: index.php?ctl=list-order");
            exit();
        }
    }

    // Xóa đơn hàng
    public function deleteOrder($order_id)
    {
        $this->orderModel->deleteOrder($order_id);
    }

    // Lấy tất cả đơn hàng
    public function getAllOrders()
    {
        $orders = (new Order)->getAllOrders();
        view("admin/cart/list", compact('orders'));
    }
}
