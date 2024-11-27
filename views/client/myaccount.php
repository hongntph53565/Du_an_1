<?php include_once "views/client/header.php" ?>
<div id="content">
    <?php
    if (!isset($_SESSION['user'])) {
        header("location: index.php?ctl=login");
        exit;
    }
    $user = $_SESSION['user'];
    // print_r($user);
    ?>
    <div class="sidebar">
        <div class="avt">
            <img src="<?= $user['image'] ?>" alt=""> <br>
            <span><?= $user['username'] ?></span>
        </div>
        <div class="sbcon">
            <a href="">
                <img src="images/ticket-voucher-svgrepo-com.svg" alt="">
                <span>Mã ưu đãi</span>
            </a>
        </div>
        <div class="sbcon">
            <a href="">
                <img src="images/shopping-bag.svg" alt="">
                <span>Đơn hàng</span>
            </a>
        </div>
        <div class="sbcon">
            <a href="">
                <img src="images/creditcardoutline-svgrepo-com.svg" alt="">
                <span>Thẻ thành viên</span>
            </a>
        </div>
        <div class="sbcon">
            <a href="">
                <img src="images/book-svgrepo-com.svg" alt="">
                <span>Sổ địa chỉ</span>
            </a>
        </div>
        <div class="sbcon">
            <a href="">
                <img src="images/heart.svg" alt="">
                <span>Yêu thích</span>
            </a>
        </div>
        <div class="sbcon">
            <a href="">
                <img src="images/eye.svg" alt="">
                <span>Đã xem gần đây</span>
            </a>
        </div>
        <div class="sbcon">
            <a href="<?= BASE_URL . '?ctl=logout' ?>">
                <img src="images//logout.svg" alt="">
                <span>Đăng xuất</span>
            </a>
        </div>
    </div>
    <div class="main-myacc">
        <p>Thông tin tài khoản</p>
        <form action="" method="post">
            <div>
                <span>Họ tên</span> <br>
                <input type="text"  name="fullname" value="<?= $account['fullname'] ?>">
            </div>
            <div>
                <span>Số điện thoại</span><br>
                <input type="text" value="<?= $account['phone'] ?>" name="phone">
            </div>
            <div>
                <span>Email</span><br>
                <input type="text" value="<?= $account['email'] ?>" name="email">
            </div>
            <div>
                <span>Sinh nhật</span><br>
                <input type="date" value="<?= $account['birthday'] ?>" name="birthday">
                <span class="uudai">Cập nhật ngày sinh để hưởng các ưu đãi trong tháng sinh nhật.</span>
            </div><br>
            <input type="hidden" name="acc_id" value="<?= $account['acc_id'] ?>">
            <div class="edit-acc">
                <button style="width: 100%; padding: 10px;">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "views/client/footer.php" ?>