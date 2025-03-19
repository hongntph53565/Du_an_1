<?php include_once "views/client/header.php" ?>
<div id="main" style="background-color: #f7f7f7;">
  <form class="login" method="post" enctype="multipart/form-data" action="<?= BASE_URL . '?ctl=register' ?>">
    <h3>Đăng ký tài khoản</h3>

    <div class="mb-3">
      <label class="form-label">Họ tên</label>
      <input type="text" class="form-control" name="fullname"
        value="<?= htmlspecialchars($_POST['fullname'] ?? '') ?>">
      <span style="color: red;"><?= $errors['fullname'] ?? '' ?></span>
    </div>

    <div class="mb-3">
      <label class="form-label">Tên tài khoản</label>
      <input type="text" class="form-control" name="username"
        value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
      <span style="color: red;"><?= $errors['username'] ?? '' ?></span>
    </div>

    <div class="mb-3">
      <label class="form-label">Mật khẩu</label>
      <input type="password" class="form-control" name="password">
      <span style="color: red;"><?= $errors['password'] ?? '' ?></span>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email"
        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
      <span style="color: red;"><?= $errors['email'] ?? '' ?></span>
    </div>

    <div class="mb-3">
      <label class="form-label">Số điện thoại</label>
      <input type="text" class="form-control" name="phone"
        value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
      <span style="color: red;"><?= $errors['phone'] ?? '' ?></span>
    </div>

    <div class="mb-3">
      <label class="form-label">Địa chỉ</label>
      <input type="text" class="form-control" name="address"
        value="<?= htmlspecialchars($_POST['address'] ?? '') ?>">
      <span style="color: red;"><?= $errors['address'] ?? '' ?></span>
    </div>

    <button type="submit" class="btn btn-primary">Đăng ký</button>
  </form>
</div>
<?php include_once "views/client/footer.php" ?>
