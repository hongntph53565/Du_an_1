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