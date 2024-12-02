<?php include_once "views/client/header.php" ?>

<div id="main">
    <p class="cart-summary">Giỏ hàng (<?= count($cartItems) ?>)</p>
   
    <hr style="border: none; border-top: 1px dashed #ccc; width: 100%;"> 

    <?php if (count($cartItems) == 0): ?>
        <p>Giỏ hàng của bạn hiện tại đang trống.</p>
    <?php else: ?>
        <?php foreach ($cartItems as $item): ?>
            <div class="item mb-4">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="<?= $item['image'] ?>" alt="<?= $item['ten_sp'] ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item['ten_sp'] ?></h5>
                            <p class="card-text" style="font-weight: 500;"><?= number_format($item['price'], 0, ',', '.') ?>đ</p>
                            <p class="card-text"><del><?= number_format($item['price'] * 1.5, 0, ',', '.') ?>đ</del><small style="color: red;"> 30%</small></p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark">-</button>
                            <button type="button" class="btn btn-outline-dark"><?= $item['quantity'] ?></button>
                            <button type="button" class="btn btn-outline-dark">+</button>
                        </div>
                        <form action="index.php?ctl=cart-remove" method="post" style="margin-top: 10px;">
        <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">
        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
    </form>
                    </div>
                </div>
            </div>
            <hr style="border: none; border-top: 1px dashed #ccc; width: 100%;">
        <?php endforeach; ?>
    <?php endif; ?>

    <div id="footer-summary">
        <div class="footer-content">
            <div class="discount-code">
                <span>Mã ưu đãi</span>
                <a href="#">Chọn hoặc nhập mã</a>
            </div>
            <div class="subtotal">
                <span>Tạm tính</span>
                <span class="price"><?= number_format($total, 0, ',', '.') ?>đ</span>
            </div>
            <div class="savings">
                <span class="save-amount">(Tiết kiệm <?= number_format($total * 0.1, 0, ',', '.') ?> đ)</span>
            </div>
            <button class="checkout-button">Thanh toán</button>
        </div>
    </div>
</div>

<?php include_once "views/client/footer.php" ?>
