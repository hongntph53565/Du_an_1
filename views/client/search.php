<?php include_once "views/client/header.php" ?>
<div id="category">
    <span style="margin-right: 70px;
    font-size: 22px;
    ">Từ khóa tìm kiếm: <br>
        <strong> <?= $keyword ?> </strong>
    </span>
    <div class="main">
        <?php
        $check = $_GET['cate_id'] ?? "";
        if ($product):
            foreach ($product as $pro):
        ?>
                <div class="item">
                    <a href="index.php?ctl=detail&pro_id=<?= $pro['pro_id'] ?>">
                        <img src="<?= $pro['image'] ?>" alt="">
                        <div class="item-title"><?= $pro['ten_sp'] ?></div>
                        <div class="item-price"><?= number_format($pro['price'], 0, ',', '.'); ?> VND</div>
                        <div class="sale">
                            <del><?= $pro['sale'] ?></del>
                            <p style="color:red; font-weight:bold;">-30%</p>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <div>Không tìm thấy sản phẩm có tên <b><?= $keyword ?></b></div>
        <?php endif ?>

    </div>

</div>