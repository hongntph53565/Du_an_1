<?php

class Order {
    private $conn;

    // Constructor để lấy kết nối cơ sở dữ liệu
    public function __construct() {
        $this->conn = connection(); // Giả sử connection() trả về đối tượng PDO
    }

    // Tạo đơn hàng mới
    public function createOrder($acc_id, $status, $other_addr, $pay) {
        $sql = "INSERT INTO `order` (acc_id, status, other_addr, pay) VALUES (:acc_id, :status, :other_addr, :pay)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':acc_id' => $acc_id,
            ':status' => $status,
            ':other_addr' => $other_addr,
            ':pay' => $pay,
        ]);
        return $this->conn->lastInsertId(); // Trả về ID của đơn hàng vừa tạo
    }

    // Lấy danh sách đơn hàng của tài khoản
    public function getOrdersByAccount($acc_id) {
        $sql = "SELECT * FROM `order` WHERE acc_id = :acc_id ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':acc_id' => $acc_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết đơn hàng theo order_id
    public function getOrderDetails($order_id) {
        $sql = "SELECT * FROM `order` WHERE order_id = :order_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':order_id' => $order_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy các sản phẩm trong đơn hàng
    public function getOrderItems($order_id) {
        $sql = "SELECT oi.*, p.ten_sp, p.price 
                FROM detail_order oi 
                JOIN product p ON oi.pro_id = p.pro_id
                WHERE oi.order_id = :order_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':order_id' => $order_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách sản phẩm trong đơn hàng
    }

    // Cập nhật trạng thái của đơn hàng
    public function updateOrderStatus($order_id, $status) {
        // SQL để cập nhật trạng thái đơn hàng
        $sql = "UPDATE `order` SET status = :status WHERE order_id = :order_id";
        $stmt = $this->conn->prepare($sql);
        
        // Thực thi câu lệnh SQL
        $stmt->execute([
            ':status' => $status,
            ':order_id' => $order_id
        ]);
    }

    // Xóa đơn hàng theo order_id
    public function deleteOrder($order_id) {
        $sql = "DELETE FROM `order` WHERE order_id = :order_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':order_id' => $order_id]);
    }

    // Lấy tất cả đơn hàng
    public function getAllOrders() {
        $sql = "SELECT * FROM `order`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

?>
