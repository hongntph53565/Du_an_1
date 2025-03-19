<?php include_once "views/client/header.php" ?>
<div id="header-checkout">

    <div class="menu">
        <span class="number">1 </span> <span>Giỏ hàng</span>
        <svg width="60" height="53">
            <line x1="0" y1="50" x2="200" y2="50" stroke="#ddd" stroke-width="1" />
        </svg>
        <span class="number">2 </span> <span>Thanh toán</span>
        <svg width="60" height="53">
            <line x1="0" y1="50" x2="200" y2="50" stroke="#ddd" stroke-width="1" />
        </svg>
        <span class="number">3 </span> <span>Hoàn tất</span>
    </div>
    <a href="index.html">Tiếp tục mua sắp</a>
</div>
<div id="checkout">
    <div class="main">
        <div class="thongtin">
            <div>
                <img src="images/vitri.png" alt="">
                <h3>Tùy chọn giao hàng</h3>
            </div>
            <div class="border">
                <div class="icon">
                    <img src="images/chamtron.avif" alt="">
                    <h3>Giao đến địa chỉ</h3>
                </div>
                <p>
                    Cập nhật thông tin giao hàng để xem chi phí và thời gian giao hàng. Thời gian giao hàng tùy thuộc
                    vào điều kiện của đơn vị vận chuyển. Dự kiến giao hàng 2 - 5 ngày.
                </p>

            </div>
            <div class="thongtin1">
                <div class="thongtin1-1">
                    <p>Họ tên</p>
                    <input type="text" name="fullname" value="<?= $user['fullname'] ?>" ?>
                </div>
                <div class="thongtin1-1">
                    <p>Số điện thoại</p>
                    <input type="text" name="phone" value="<?= $user['phone'] ?>" ?>
                </div>
            </div>
            <div class="thongtin2">
                <div class="thongtin1-1">
                    <p>Tỉnh / Thành phố</p>
                    <input type="text" name="address" value="<?= $user['address'] ?>" ?>
                </div>
            </div>
            <form method="post" action="index.php?ctl=success">
                <div class="thongtin1-1">
                    <p>Địa Chỉ Giao Hàng Cụ Thể</p>
                    <input type="text" name="other_addr" placeholder="Nhập địa chỉ giao hàng khác" required>
                </div>
        </div>
        <div class="vanchuyen">
            <!-- <div>
                    <img src="images/pttt.png" alt="">
                    <h4>Phương thức vận chuyển</h4>
                </div>
                <br>
                <div class="checkbox1">
                <input type="checkbox">
                <p>Giao siêu tốc 2-4h <br>
                Đơn hàng có thể giao nhanh trong 2 - 4h. Quý khách giữ liên lạc để nhận hàng.</p>
                <p>30.000₫</p>
            </div>
            <br>
            <div class="checkbox1">
                <input type="checkbox" name="" id="">
                <p>Giao tiêu chuẩn 2-5 ngày <br>
                Thời gian giao hàng tùy thuộc vào điều kiện của đơn vị vận chuyển. Dự kiến giao hàng: 2-5 ngày.</p>
                <p>30.000₫</p>
            </div> -->
        </div>
        <div class="thanhtoan">
            <div class="icon">
                <img src="images/wallet-icon.svg" alt="">
                <h4>Phương thức thanh toán</h4>
            </div>
            <div class="checkbox">
                <input name="pay" value="COD" checked type="checkbox"><img src="images/cod.svg" alt=""> Thanh toán khi nhận hàng (COD) <br>
            </div>
            <!-- <div class="checkbox">
                    <input name="pay" value="VN Pay" type="checkbox"><img src="images/vnpay.svg" alt=""> Thanh toán bằng VNPAY <br>
                </div>
                <div class="checkbox">
                    <input name="pay" value="Shoppe Pay"  type="checkbox"><img src="images/shopeepay.svg" alt=""> Thanh toán bằng ShopeePay <br>
                </div> -->
            <input type="hidden" name="id" value="<? $user['acc_id'] ?>">

        </div>
        <div class="product-container">
            <?php if (count($cartItems) == 0): ?>
                <p>Giỏ hàng của bạn hiện tại đang trống.</p>
            <?php else: ?>
                <?php foreach ($cartItems as $item): ?>
                    <div class="product-item">
                        <img src="<?= $item['image'] ?>" alt="<?= $item['ten_sp'] ?>">
                        <div class="product-info">
                            <div class="product-title"><?= $item['ten_sp'] ?>

                            </div>
                            <div class="product-quantity">X1</div>
                            <div class="product-price">
                                <span class="current-price"><?= number_format($item['price'], 0, ',', '.') ?>đ</span>
                                <span class="discount">-30%</span>
                                <del class="original-price"><?= number_format($item['price'] * 1.5, 0, ',', '.') ?>đ</del>
                            </div>
                        </div>
                    </div>



                    <hr style="border: none; border-top: 1px dashed #ccc; width: 100%;">
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="sidebar">
        <h3>Chi tiết đơn hàng</h3>
        <ul>
            <li>Giá trị đơn hàng <span style="color:red;font-weight:bold;"><?= number_format($total ?? 0, 0, ',', '.') ?>đ</span></li>


            <li>Phí giao hàng <span>Free Ship Toàn Quốc</span></li>
        </ul>
        <div class="total">
            <div>
                <p>Tổng tiền thanh toán</p>
                <p class="total-amount"><?= number_format($total ?? 0, 0, ',', '.') ?>đ</p>
            </div>
            <p class="note">(Đã bao gồm thuế VAT)</p>
        </div>


        <button class="pay-button" type="submit">Đặt Hàng</button>
        </form>
    </div>

</div>
<?php include_once "views/client/footer.php" ?>