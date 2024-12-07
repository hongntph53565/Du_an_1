<?php
class CartController {

// Hiển thị giỏ hàng
public function showCart($acc_id) {
    $cartModel = new Cart();
    $cartItems = $cartModel->getCartItems($acc_id);
    $total = $cartModel->getCartTotal($acc_id);
    include 'views/cart.php';
}

// Thêm sản phẩm vào giỏ hàng
public function addToCart($acc_id,$pro_id, $quantity) {
    $cartModel = new Cart();
    $cartModel->addItemToCart($acc_id,$pro_id, $quantity);
    header("Location: index.php?ctl=cart"); // Chuyển hướng về giỏ hàng sau khi thêm sản phẩm
    exit();
}

// Cập nhật số lượng sản phẩm trong giỏ hàng
public function updateQuantity($cart_id, $quantity) {
    $cartModel = new Cart();
    $cartModel->updateItemQuantity($cart_id, $quantity);
    header("Location: index.php?ctl=cart"); // Chuyển hướng về giỏ hàng sau khi cập nhật
    exit();
}

    // Xóa tất cả sản phẩm trong giỏ hàng của người dùng
    public function clearCart($acc_id) {
        $sql = "DELETE FROM cart WHERE acc_id = :acc_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':acc_id', $acc_id);
        $stmt->execute();
        
    }
public function removeFromCart($cart_id) {
    $cartModel = new Cart();
    $cartModel->removeFromCart($cart_id);
    header("Location: index.php?ctl=cart"); // Chuyển hướng về giỏ hàng sau khi xóa
    exit();
}

}
?>