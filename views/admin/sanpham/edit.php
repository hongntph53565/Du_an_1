<?php include_once "views/admin/header.php" ?>

<div class="content">
  <div class="title1">
    <h3>CHỈNH SỬA SẢN PHẨM</h3>
  </div>

  <div class="content form_content">
    <form action="index.php?ctl=edit-product&ma_sp=<?= $product['ma_sp']; ?>" method="POST" enctype="multipart/form-data">
      <div class="ngang">
        <div class="danhang mr5">
          <div style="color: red;">
          </div>
          <div class="content mb">
            <label>Tên sản phẩm </label> <br>
            <input type="text" name="ten_sp" value="<?= $product['ten_sp']; ?>" required>
          </div>
          <div class="content mb">
            <label>Đơn giá</label> <br>
            <input type="number" name="gia" value="<?= $product['gia']; ?>" required>
          </div>
          <div class="content mb">
            <label>Hình ảnh hiện tại</label> <br>
            <img src="<?= $product['anh']; ?>" alt="Hình sản phẩm" width="100">
          </div>
          <div class="content mb">
            <label>Hình ảnh mới (nếu có)</label> <br>
            <input type="file" name="anh">
          </div>
        </div>
        <div class="danhang">
          <div class="content mb">
            <label>Danh mục</label> <br>
            <select name="ma_dm" required>
              <option value="">Chọn danh mục</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?= $category['ma_dm']; ?>" <?= $category['ma_dm'] == $product['ma_dm'] ? 'selected' : ''; ?>>
                  <?= $category['ten_dm']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="content mb">
            <label>Số lượng</label> <br>
            <input type="number" name="so_luong" value="<?= $product['so_luong']; ?>" required>
          </div>
          <div class="content mb">
            <label> Sale Price</label> <br>
            <input type="number" name="gia_giam" value="<?= $product['gia_giam']; ?>" required>
          </div>
        </div>
      </div>

      <div class="content mb">
        <label>Mô tả</label> <br>
        <textarea name="mo_ta" required><?= $product['mo_ta']; ?></textarea>
      </div>

      <input type="hidden" name="ma_sp" value="<?= $product['ma_sp']?>">
      <div class="content mb">
        <input type="submit" value="Cập nhật">
        <a href="index.php?ctl=list-product"><input type="button" value="Danh sách"></a>
      </div>
    </form>
  </div>
</div>

<?php include_once "views/admin/footer.php" ?>
