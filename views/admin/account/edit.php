<?php include_once "views/admin/header.php" ?>

<div class="content">
  <div class="title1">
    <h3>CẬP NHẬT TÀI KHOẢN</h3>
  </div>
  <div class="content form_content">
    <form action="" method="post" enctype="multipart/form-data">
      <div style="color: red;">
        <?= isset($message) ? $message : ''; ?>
      </div>
      <?php if (!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message ?>
        </div>
      <?php endif; ?>
      <div class="ngang">
        <div class="danhang mr5">
          <div class="content mb">
            <label> Tên đăng nhập </label> <br>
            <input type="text" name="username" value="<?= $account['username'] ?>" placeholder="username" readonly>
          </div>
          <div class="content mb">
            <label>Mật khẩu</label> <br>
            <input type="password" name="password" value="<?= $account['password'] ?>" placeholder="password" readonly>
          </div>
          <div class="content mb">
            <label>Họ và tên</label> <br>
            <input type="text" name="fullname" value="<?= $account['fullname'] ?>" placeholder="Họ và tên" readonly>
          </div>


        </div>
        <div class="danhang">
          <div class="content mb">
            <label> Email</label> <br>
            <input type="text" name="email" value="<?= $account['email'] ?>" placeholder="email" readonly>
          </div>
          <div class="content mb">
            <label>Số điện thoại</label> <br>
            <input type="text" name="phone" value="<?= $account['phone'] ?>" placeholder="phone" readonly>
          </div>
          <div class="content mb">
            <label>Địa chỉ</label> <br>
            <input type="text" name="address" value="<?= $account['address'] ?>" placeholder="address" readonly>
          </div>

          <div class="content mb">
            <label>Vai trò</label> <br>
            <input type="number" name="role" value="<?= $account['role'] ?>">
          </div>

        </div>
      </div>

      <div class="content mb">
        <input type="submit" value="Cập nhật">
        <input type="reset" value="Nhập lại">

        <a href="index.php?ctl=list-account"><input type="button" value="Danh sách"></a>
      </div>
    </form>
  </div>

  <?php include_once "views/admin/footer.php" ?>