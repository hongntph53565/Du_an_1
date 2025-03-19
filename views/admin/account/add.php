<?php include_once "views/admin/header.php" ?>
<div class="content">
  <div class="title1">
    <h3>THÊM MỚI TÀI KHOẢN</h3>
  </div>
  <div class="content form_content ">
    <form action="" method="post" enctype="multipart/form-data">
      <div style="color: red;">
        <?php $message ?? ''; ?>
      </div>
      <div class="ngang">
        <div class="danhang mr5">
          <div class="content mb">

            <label> Tên đăng nhập </label> <br>
            <input type="text" name="username" placeholder="username" >
            <span style="color: red;"><?= $errors['username'] ?? ''; ?></span>
          </div>
          <div class="content mb">
            <label>Mật khẩu</label> <br>
            <input type="password" name="password" placeholder="password">
            <span style="color: red;"><?= $errors['password'] ?? ''; ?></span>
          </div>
          <div class="content mb">
            <label>Họ và tên</label> <br>
            <input type="text" name="fullname" placeholder="Họ và tên">
            <span style="color: red;"><?= $errors['fullname'] ?? ''; ?></span>
          </div>
        </div>
        <div class="danhang ">

          <div class="content mb">
            <label> Email</label> <br>
            <input type="text" name="email" placeholder="email">
            <span style="color: red;"><?= $errors['email'] ?? ''; ?></span>
          </div>
          <div class="content mb">
            <label>Số điện thoại</label> <br>
            <input type="text" name="phone" placeholder="phone">
            <span style="color: red;"><?= $errors['phone'] ?? ''; ?></span>
          </div>
          <div class="content mb">
            <label>Địa chỉ</label> <br>
            <input type="text" name="address" placeholder="address">
            <span style="color: red;"><?= $errors['address'] ?? ''; ?></span>
          </div>

          <div class="content mb">
            <label>Vai trò</label> <br>
            <input type="number" name="role" min="0" max="1" placeholder="0">
            <span style="color: red;"><?= $errors['role'] ?? ''; ?></span>
          </div>
        </div>
      </div>

      <div class="content mb">
        <input type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">

        <a href="index.php?ctl=list-account"><input type="button" value="Danh sách"></a>
      </div>

    </form>
  </div>

  <?php include_once "views/admin/footer.php" ?>