<?php include_once "views/client/header.php" ?>
<div id="detail">
    <div id="main-detail">
        <div class="images">
            <img style="width: 470px;height: 600px; padding:20px;  " src="<?=$productDetails['image']?>" alt="">
        </div>
        <div class="product-detail">
            <div class="product-title"> <?=$productDetails['ten_sp']?>  </div>
            <div class="product-id">Mã sp: <p><?=$productDetails['pro_id']?></p>
            </div>
            <div class="product-price"><?= number_format($productDetails['sale'], 0, ',', '.'); ?> VND</div>
            <div class="product-sale"><del><?= number_format($productDetails['price'], 0, ',', '.'); ?> VND</del>-20%</div>
            <div class="product-size">
                <p>Kích cỡ:</p>
                <span>XS</span>
                <span>S</span>
                <span>M</span>
                <span>L</span>
            </div>
            <form action="index.php?ctl=cart" method="post">
    <input type="hidden" name="pro_id" value="<?= $productDetails['pro_id'] ?>">
    <button type="submit" class="product-button">Thêm vào giỏ hàng</button>
    
</form>


            <hr>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne">
                            Mô tả
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                        <?=$productDetails['description']?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                            aria-controls="flush-collapseTwo">
                            Chất liệu
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            60% cotton 40% polyester.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Hướng dẫn sử dụng
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Giặt máy ở chế độ nhẹ, nhiệt độ thường. <br>
                            Không sử dụng hóa chất tẩy có chứa Clo. <br>
                            Phơi trong bóng mát. <br>
                            Sấy thùng, chế độ nhẹ nhàng. <br>
                            Là ở nhiệt độ trung bình 150 độ C. <br>
                            Giặt với sản phẩm cùng màu. <br>
                            Không là lên chi tiết trang trí. <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contents">
        <div class="content">
            <img src="images/service1.png" alt="">
            <div>
                <span>Thanh toán khi nhận hàng (COD)</span><br>
                <p>Giao hàng toàn quốc.</p>
            </div>
        </div>
        <div class="content">
            <img src="images/service2.png" alt="">
            <div>
                <span>Miễn phí giao hàng</span><br>
                <p>Với đơn hàng trên 599.000đ.</p>
            </div>
        </div>
        <div class="content">
            <img src="images/service3.png" alt="">
            <div>
                <span>Đổi hàng miễn phí</span><br>
                <p>Trong 30 ngày kể từ ngày mua.</p>
            </div>
        </div>
    </div>
    <div class="products">
        <h4>SẢN PHẨM CÙNG LOẠI</h4>
        <div class="product">
            <a href=""><img src="images/nu_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/nam_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/girl_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/boy_spmoi-04Oct.webp" alt=""></a>
        </div>
    </div>
</div>
<?php include_once "views/client/footer.php" ?>