<?php include_once "views/admin/header.php" ?>
<div class="content">
  <div class="title1">
    <h3>THÊM MỚI TÀI KHOẢN</h3>
  </div>
  <div class="content form_content ">
    <form action="" method="post" enctype="multipart/form-data">
      <div style="color: red;">
        <?php $message; ?>
      </div>
      <div class="ngang">
        <div class="danhang mr5">
          <div class="content mb">

            <label> Tên đăng nhập </label> <br>
            <input type="text" name="username" placeholder="username" required>
          </div>
          <div class="content mb">
            <label>Mật khẩu</label> <br>
            <input type="password" name="password" placeholder="password" required>
          </div>
          <div class="content mb">
            <label>Họ và tên</label> <br>
            <input type="text" name="fullname" placeholder="Họ và tên" required>
          </div>
          <div class="content mb">
            <label>Ngày tạo</label> <br>
            <input type="date" name="cre_date" required>
          </div>
          <div class="content mb">
            <label>Hình ảnh</label> <br>
            <input type="file" name="image" required>
          </div>
        </div>
        <div class="danhang ">

          <div class="content mb">
            <label> Email</label> <br>
            <input type="text" name="email" placeholder="email" required>
          </div>
          <div class="content mb">
            <label>Số điện thoại</label> <br>
            <input type="text" name="phone" placeholder="phone" required>
          </div>
          <div class="content mb">
            <label>Địa chỉ</label> <br>
            <input type="text" name="address" placeholder="address" required>
          </div>
          <div class="content mb">
            <label>Sinh nhật</label> <br>
            <input type="date" name="birthday" placeholder="birthday" required>
          </div>
          <div class="content mb">
            <label>Vai trò</label> <br>
            <input type="number" name="role" required>
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