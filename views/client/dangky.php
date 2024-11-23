<?php include_once "views/client/header.php" ?>
<div id="main" style="background-color: #f7f7f7;">
  <form class="login">
    <h3>Đăng ký tài khoản</h3>
    <div class="mb-3">
      <label class="form-label">Họ tên</label>
      <input type="text" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Tên tài khoản</label>
      <input type="text" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Mật khẩu</label>
      <input type="password" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Hìsnh ảnh</label>
      <input type="file" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Số điện thoại</label>
      <input type="text" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Địa chỉ</label>
      <input type="text" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Đăng ký</button>
  </form>
</div>

<?php include_once "views/client/footer.php" ?>

<!--<?php if (!isset($_SESSION['user'])) { ?>
                    <form action="index.php?act=login" method="post" id="login-form">
                        <div class="row mb10">
                            Tên Đăng Nhập <br>
                            <input  type="text" id="email" name="user_login" required>
                        </div>
                        <div class="row mb10">
                            Mật Khẩu <br>
                            <input type="password" id="password" name="password_login">
                        </div>
                        <div class="row mb10">
                           <input type="checkbox" name="" id="" > Ghi Nhớ Tài Khoản ?
                        </div>
                        <div class="row mb10">
                           <input name="login_sbm" type="submit" value="Đăng Nhập"> 
                        </div>
                    </form>
                    <li>
                        <a href="index.php?act=forgot_pass">Quên Mật Khẩu ?</a>
                    </li>
                    <li>
                        <a href="index.php?act=sign_up">Đăng Kí Tài Khoản ? </a>
                    </li>
                    <?php } else { ?>
                    <div style="text-align: center;">
                        <h1>Chào Mừng</h1>
                    </div>
                    <? if (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == "ACTIVE") { ?>
                            <hr>
                            <a href="admin/" style="font-weight: bold; font-size: 20px; color: black;">
                                <li>Quản Trị</li>
                            </a>
                        <? } ?>
                    <hr style="margin-top: 10px;height: 3px;background-color: gray;">
                    <div style="width: 100%;margin: 10px 0px;text-align: center;"><?= $_SESSION['user']['user'] ?> </div>
                    <hr style="height: 2px;background-color: gray;">
                    <div style="height: 200px;">        
                    </div>
                    <hr>
                        <a style="float:right;  text-decoration: none; "  href="index.php?act=log_out">đăng xuất</a>
                        <a style="float:left;  text-decoration: none; "   href="">đổi password</a>
                <?php } ?>
                </div>
            </div>-->