<?php include_once "views/client/header.php" ?>
<div id="category">
    <div class="sidebar-cate accordion accordion-flush" id="accordionFlushExample">

        <!-- Accordion Item #1 -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Danh mục sản phẩm
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                    
                    <?php foreach ($getChildrenByParent as $child) : ?>
                            <li>
                                <a href="index.php?ctl=product&cate_id=<?= $child['cate_id'] ?> ">
                                    
                                    <?= $child['cate_name'] ?>
                                </a>
                            </li>
                        <?php endforeach ?>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Accordion Item #2 -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Hàng mới
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <li><a href="#">Sản phẩm mới</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Accordion Item #3 -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Nổi bật
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <li><a href="#">Giá tốt</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Accordion Item #4 -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Phụ kiện
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <li><a href="#">Chăn</a></li>
                        <li><a href="#">Khăn mặt</a></li>
                        <li><a href="#">Khăn tắm</a></li>
                        <li><a href="#">Khăn quàng cổ</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="main">
    <?php 
    $check = $_GET['cate_id'] ?? ""; 
    foreach ($product as $pro): 
        if (!empty($check) && $pro['cate_id'] == $check): ?>
            <div class="item">
                <a href="index.php?ctl=detail&pro_id=<?= $pro['pro_id'] ?>">
                    <img src="<?= $pro['image'] ?>" alt="">
                    <div class="item-title"><?= $pro['ten_sp'] ?></div>
                    <div class="item-price"><?= $pro['sale'] ?></div>
                    <div class="sale">
                        <del><?= number_format($pro['price'], 0, ',', '.'); ?> VND</del>
                        <p style="color:red; font-weight:bold;">-30%</p>
                    </div>
                </a>
            </div>
        <?php endif;
    endforeach ?>
</div>

</div>
<?php include_once "views/client/footer.php" ?>