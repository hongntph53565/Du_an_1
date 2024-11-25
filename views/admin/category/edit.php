<?php include_once "views/admin/header.php" ?>
<div class="content">
  <div class="title1">
    <h3>CẬP NHẬT DANH MỤC HÀNG HÓA</h3>
  </div>
  <div class="content form_content ">
    <form action="" method="post">
      <div class="content mb">
        <div style="color: red;"><?= $message ?></div> <br>
        <label> Mã danh mục </label> <br>
        <input type="text" name="cate_id" placeholder="auto number" disabled>
      </div>
      <div class="content mb">
        <label>Tên danh mục </label> <br>
        <input type="text" name="cate_name" value="<?= $categories['cate_name'] ?>">
      </div>
      <div class="content mb">
        <input type="hidden" name="cate_id" value="<?= $categories['cate_id'] ?>">
        <input type="submit" value="Cập nhật">
        <a href="index.php?ctl=list-categories"><input type="button" value="Danh sách"></a>
      </div>
    </form>
  </div>
</div>
<?php include_once "views/admin/footer.php" ?>