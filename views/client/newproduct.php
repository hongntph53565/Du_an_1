<?php include_once "views/client/header.php" ?>
<div id="category">
    <!-- <div class="sidebar">
            <ul>
                <li><a href="#">Danh mục sản phẩm</a></li>
                <li><a href="#">Hàng mới</a></li>
                <li><a href="#">Nổi bật</a></li>
                <li><a href="#">Phụ kiện</a></li>
            </ul>
        </div> -->
    <div class="sidebar" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Danh mục sản phẩm
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <?php foreach ($getChildrenByParent as $cate) : ?>
                            <li>
                                <a href="index.php?ctl=newproduct&cate_id=<?= $cate['cate_id'] ?>">
                                    <?= $cate['cate_name'] ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>

            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Hàng mới
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <li><a href="#">Sản phẩm mới</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Nổi bật
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <li><a href="#">Giá tốt</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Phụ kiện
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                data-bs-parent="#accordionFlushExample">
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

        <div class="item">
            <a href="#">
                <img src="images/Ao_phong_tat_ca_Nu.jpg" alt="">
                <div class="item-title">Áo phông/ Áo thun</div>
                <div class="item-price">279.00đ</div>
                <div class="sale">
                    <del>500.000đ</del>
                    <p>-30%</p>
                </div>
            </a>
        </div>
        <div class="item">
            <a href="">
                <img src="images/Ao_phong_tat_ca_Nu.jpg" alt="">
                <div class="item-title">Áo phông/ Áo thun</div>
            </a>
        </div>
        <div class="item">
            <a href="">
                <img src="images/Ao_phong_tat_ca_Nu.jpg" alt="">
                <div class="item-title">Áo phông/ Áo thun</div>
            </a>
        </div>
    </div>
</div>
<?php include_once "views/client/footer.php" ?>