<?php include_once "views/client/header.php" ?>
<div id="content">
    <?php
    if (!isset($_SESSION['user'])) {
        header("location: index.php?ctl=login");
        exit;
    }
    $user = $_SESSION['user'];
    ?>

    <div class="sidebar">
    <div class="avt">
                <img src="images/user.png" alt="Avatar">
            <br>
            <span><?= $user['username'] ?></span>
        </div>
      
        <div class="sbcon">
            <a href="index.php?ctl=donhang">
                <img src="images/shopping-bag.svg" alt="">
                <span>Đơn hàng</span>
            </a>
        </div>
       
   
   
        <div class="sbcon">
            <a href="<?= BASE_URL . '?ctl=logout' ?>">
                <img src="images/logout.svg" alt="">
                <span>Đăng xuất</span>
            </a>
        </div>

        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1): ?>
            <div class="sbcon">
                <a href="<?= BASE_URL . '?ctl=admin'?>"> <!-- Cập nhật URL quản trị -->
                    <img src="images/taikhoan.jpg" alt=""/>
                    <span>Quản Trị</span>
                </a>
            </div>
        <?php endif; ?>
    </div>

    <div class="main-myacc">
        <p>Thông tin tài khoản</p>
        <form action="" method="post">
            <div>
                <span>Họ tên</span> <br>
                <input type="text"  name="fullname" value="<?= $account['fullname'] ?>">
                <?php if ($errors['fullname'] != ''): ?>
                    <span class="text-danger"><?= $errors['fullname']?></span>
                <?php endif ?>
            </div>
            <div>
                <span>Số điện thoại</span><br>
                <input type="text" value="<?= $account['phone'] ?>" name="phone">
                <?php if ($errors['phone'] != ''): ?>
                    <span class="text-danger"><?= $errors['phone']?></span>
                <?php endif ?>
            </div>
            <div>
                <span>Email</span><br>
                <input type="email" value="<?= $account['email'] ?>" name="email">
                <?php if ($errors['email'] != ''): ?>
                    <span class="text-danger"><?= $errors['email']?></span>
                <?php endif ?>
            </div>
            <br>
            <input type="hidden" name="acc_id" value="<?= $account['acc_id'] ?>">
            <div class="edit-acc">
                <button style="width: 100%; padding: 10px;">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "views/client/footer.php" ?>
