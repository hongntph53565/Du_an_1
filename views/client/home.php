<?php include_once "views/client/header.php" ?>
<div id="main">
    <div class="slider">
        <div class="baner">
            <img id="img" src="" alt="" width="100%">
        </div>
        <script>
            var imgs = [
                "images/banner_1.webp",
                "images/banner_2.webp",
                "images/banner_3.webp",
                "images/banner_4.webp"
            ]
            var img = document.getElementById('img');
            img.setAttribute('src', imgs[0]);

            var i = 0;
            var len = imgs.length;

            auto_slide = function() {
                img.setAttribute('src', imgs[i]);
                i++;
                if (i == len) i = 0;
            }
            setInterval(auto_slide, 2000);
        </script>
    </div>
    <div class="main-content">
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
        <h4>Sản phẩm mới</h4>
        <div class="product">
            <a href="index.php?ctl=product&parent_id=&cate_id=2"><img src="images/nu_spmoi-04Oct.webp" alt=""></a>
            <a href="index.php?ctl=product&parent_id=&cate_id=1"><img src="images/nam_spmoi-04Oct.webp" alt=""></a>
            <a href="index.php?ctl=product&parent_id=&cate_id=3"><img src="images/girl_spmoi-04Oct.webp" alt=""></a>
            <a href="index.php?ctl=product&parent_id=&cate_id=4"><img src="images/boy_spmoi-04Oct.webp" alt=""></a>
        </div>
        <a href=""><img src="images/1.MacNha.webp" alt=""></a>
        <!-- <div class="product">
            
           <?php foreach ($product as $pro): ?>
            <a href="index.php?ctl=detail&pro_id=<?= $pro['pro_id'] ?>">
            <div >
                <img style="" src="<?= $pro['image'] ?>" alt="<?= $pro['ten_sp'] ?>">
                <div ><?= $pro['ten_sp'] ?></div>
                <div class="item-price"><?= number_format($pro['price'], 0, ',', '.') ?> VND</div>
                <div class="sale">
                    <del><?= number_format($pro['price'], 0, ',', '.'); ?> VND</del>
                    <p style="color:red; font-weight:bold;">-30%</p>
                </div>
            </div>
            </a>
            </div>
             <?php endforeach ?> 


           
        </div><br><br> -->

        <a href=""><img src="images/ni.webp" alt=""></a>
        <div class="product">
            <a href=""><img src="images/nu_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/nam_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/girl_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/boy_spmoi-04Oct.webp" alt=""></a>
        </div>
        <a href=""><img src="images/2.AoPhong.webp" alt=""></a>
        <div class="product">
            <a href=""><img src="images/nu_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/nam_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/girl_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/boy_spmoi-04Oct.webp" alt=""></a>
        </div>
        <a href=""><img src="images/3.Jean.webp" alt=""></a>
        <div class="product">
            <a href=""><img src="images/nu_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/nam_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/girl_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/boy_spmoi-04Oct.webp" alt=""></a>
        </div>
        <h4>Áo khoác gió</h4>
        <a href=""><img src="images/4.AoGio.webp" alt=""></a>
        <div class="product">
            <a href=""><img src="images/nu_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/nam_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/girl_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/boy_spmoi-04Oct.webp" alt=""></a>
        </div>
        <h4>SẢN PHẨM BÁN CHẠY</h4>
        <div class="product">
            <a href=""><img src="images/nu_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/nam_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/girl_spmoi-04Oct.webp" alt=""></a>
            <a href=""><img src="images/boy_spmoi-04Oct.webp" alt=""></a>
        </div>


    </div>
</div>
<?php include_once "views/client/footer.php" ?>