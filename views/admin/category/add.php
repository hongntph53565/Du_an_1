<?php include_once "views/admin/header.php" ?>
<div class="content">
  <div class="title1">
    <h3>THÊM MỚI DANH MỤC HÀNG HÓA</h3>
  </div>
  <div class="content form_content ">
    <form action="index.php?ctl=store-categories" method="post">
      <div class="content mb">
        <div style="color: red;"><?= $message ?? ""; ?></div>
        <div class="content mb">
          <label>Tên danh mục </label> <br>
          <input type="text" name="cate_name" placeholder="nhập tên danh mục" required>
        </div>

        <label> Danh mục cha </label> <br>
        <select name="parent_id" required>
          <option value="">Chọn</option>
          <?php foreach ($getParentCategory as $cate): ?>
            <option value="<?= $cate['cate_id']; ?>">
              <?= $cate['cate_name']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="content mb">
        <input type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">
        <a href="index.php?ctl=list-categories"><input type="button" value="Danh sách"></a>
      </div>
    </form>
  </div>
</div>
<?php include_once "views/admin/footer.php" ?>