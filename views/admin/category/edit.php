<?php include_once "views/admin/header.php" ?>
<div class="content">
  <div class="title1">
    <h3>CẬP NHẬT DANH MỤC HÀNG HÓA</h3>
  </div>
  <div class="content form_content ">
    <form action="" method="post">
      <div style="color: red;"><?= $message ?? '' ?></div> <br>
      <div class="content mb">
        <label>Tên danh mục </label> <br>
        <input type="text" name="cate_name" value="<?= $category['cate_name'] ?>">
      </div>
      <div style="color: red;">
        <?= $errors['cate_name'] ?? ''; ?>
      </div>
      <div class="content mb">
        <input type="hidden" name="cate_id" value="<?= $category['cate_id'] ?>">
        <input type="submit" value="Cập nhật">
        <a href="index.php?ctl=list-categories"><input type="button" value="Danh sách">
        </a>
      </div>
    </form>
  </div>
</div>
<?php include_once "views/admin/footer.php" ?>