<?php include_once "views/client/header.php" ?>
<div id="main">
    <div id="main">
        <div class="border">
            <form action="<?= BASE_URL . '?ctl=login'?>" class="login" method="post">
                <img src="images/dangnhap.png" alt=""> <br><br>
                <h3>Đăng nhập</h3>
                <div class="mb-3">
                    <label class="form-label">Tên tài khoản</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div style="color: red;">
                    <?php if (isset($error)) {
                        echo $error;
                    } ?></div>
                <a href="index.php?ctl=register">Đăng ký tại đây</a><br> <br>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;" name="submit">Đăng nhập</button>

            </form>
        </div>

    </div>
</div>
<?php include_once "views/client/footer.php" ?>