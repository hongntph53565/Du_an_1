<?php
$hinhpath = "../upload/" . $hinh;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinh = "Không có hình ảnh";
}
?>
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">Tài khoản</li>
            </ul>
        </div>
    </div>
</div>
<!-- my account start -->
<div class="myaccount-area pb-80 pt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-1">Sửa thông tin
                                        tài khoản</a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <!-- <h4>My Account Information</h4> -->
                                            <h5>Thông tin tài khoản</h5>
                                        </div>
                                        <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Tên đăng nhập</label>
                                                        <input type="text" name="tendn" value="<?= $tendn ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Ảnh đại diện</label>
                                                        <input type="file" name="hinh">
                                                        <?= $hinh ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Địa chỉ</label>
                                                        <input type="text" name="dc" value="<?= $dc ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="<?= $email ?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" name="sdt" value="<?= $sdt ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="ion-arrow-up-c"></i> Trở lại</a>
                                                </div>
                                                <div class="btn-submit w80">
                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                    <input type="submit" name="capnhat" value="Sửa">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

