<?php
class Cart
{
    public $conn;

    public function __construct()
    {
        $this->conn = connection();
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    public function findItemInCart($user_id, $pro_id)
    {
        $sql = "SELECT * FROM cart WHERE acc_id = :acc_id AND pro_id = :pro_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':acc_id' => $user_id, ':pro_id' => $pro_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về kết quả nếu có
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addItemToCart($acc_id, $pro_id, $quantity)
    {
        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
        $stmt = $this->conn->prepare("SELECT * FROM cart WHERE acc_id = :acc_id AND pro_id = :pro_id");
        $stmt->execute([':acc_id' => $acc_id, ':pro_id' => $pro_id]);
        $existingItem = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingItem) {
            // Nếu đã tồn tại, cập nhật số lượng
            $newQuantity = $existingItem['quantity'] + $quantity;
            $updateStmt = $this->conn->prepare("UPDATE cart SET quantity = :quantity WHERE acc_id = :acc_id AND pro_id = :pro_id");
            $updateStmt->execute([':quantity' => $newQuantity, ':acc_id' => $acc_id, ':pro_id' => $pro_id]);
        } else {
            // Nếu chưa tồn tại, thêm mới
            $insertStmt = $this->conn->prepare("INSERT INTO cart (acc_id, pro_id, quantity) VALUES (:acc_id, :pro_id, :quantity)");
            $insertStmt->execute([':acc_id' => $acc_id, ':pro_id' => $pro_id, ':quantity' => $quantity]);
        }
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateItemQuantity($user_id, $pro_id, $quantity)
    {
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        $existingItem = $this->findItemInCart($user_id, $pro_id);

        if ($existingItem) {
            // Nếu có sản phẩm, cập nhật số lượng
            $sql = "UPDATE cart SET quantity = :quantity WHERE acc_id = :acc_id AND pro_id = :pro_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':quantity' => $quantity, ':acc_id' => $user_id, ':pro_id' => $pro_id]);
        } else {
            // Nếu sản phẩm không có trong giỏ, trả về thông báo lỗi hoặc có thể thêm vào giỏ hàng
            throw new Exception("Sản phẩm không tồn tại trong giỏ hàng.");
        }
    }

    // Lấy các sản phẩm trong giỏ hàng của người dùng
    public function getCartItems($user_id)
    {
        $sql = "SELECT c.cart_id, p.ten_sp, p.price, p.image, c.quantity
                FROM cart c
                JOIN product p ON c.pro_id = p.pro_id
                WHERE c.acc_id = :acc_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':acc_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm phương thức getCartTotal trong Cart.php
    public function getCartTotal($user_id)
    {
        $sql = "SELECT SUM(p.price * c.quantity) AS total
                FROM cart c
                JOIN product p ON c.pro_id = p.pro_id
                WHERE c.acc_id = :acc_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':acc_id' => $user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total'] : 0;
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function clearCart($acc_id)
    {
        $sql = "DELETE FROM cart WHERE acc_id = :acc_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':acc_id' => $acc_id]);
    }
    public function removeFromCart($cart_id)
    {
        $sql = "DELETE FROM cart WHERE cart_id = :cart_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cart_id' => $cart_id]);
    }
}
