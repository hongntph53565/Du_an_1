<?php include_once "views/client/header.php" ?>
<div id="main" style="background-color: #f7f7f7;">
  <form class="login" method="post" enctype="multipart/form-data">
    <h3>Đăng ký tài khoản</h3>
    <div class="mb-3">
      <label class="form-label">Họ tên</label>
      <input type="text" class="form-control" name="fullname">
    </div>
    <div class="mb-3">
      <label class="form-label">Tên tài khoản</label>
      <input type="text" class="form-control" name="username">
    </div>
    <div class="mb-3">
      <label class="form-label">Mật khẩu</label>
      <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3">
      <label class="form-label">Hình ảnh</label>
      <input type="file" class="form-control" name="image">
    </div>
    <div class="mb-3">
      <label class="form-label">Ngày sinh</label>
      <input type="date" class="form-control" name="birthday">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
      <label class="form-label">Số điện thoại</label>
      <input type="text" class="form-control" name="phone">
    </div>
    <div class="mb-3">
      <label class="form-label">Địa chỉ</label>
      <input type="text" class="form-control" name="address">
    </div>

    <button type="submit" class="btn btn-primary">Đăng ký</button>
  </form>
</div>

<?php include_once "views/client/footer.php" ?>

              