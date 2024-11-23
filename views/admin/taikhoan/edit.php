<?php include_once "views/admin/header.php" ?>
<div class="content">
  <div class="title1">
    <h3>THÊM MỚI TÀI KHOẢN</h3>

  </div>
  <div class="content form_content ">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="ngang">
        <div class="danhang mr5">
          <div class="content mb">
            <div style="color: red;">
              
            </div>
            <label> Tên đăng nhập </label> <br>
            <input type="text" name="user" placeholder="user">
          </div>
          <div class="content mb">
            <label>Mật khẩu</label> <br>
            <input type="password" name="pass" placeholder="password">
          </div>

        </div>
        <div class="danhang ">
          <div class="content mb">
            <label>Họ và tên</label> <br>
            <input type="text" name="ho_ten" placeholder="Họ và tên">
          </div>
          <div class="content mb">
            <label> Email</label> <br>
            <input type="text" name="email" placeholder="email">
          </div>
          <div class="content mb">
            <label>Vai trò</label> <br>
            <input type="text" name="vai_tro">
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