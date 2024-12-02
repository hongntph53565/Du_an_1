<?php include_once "views/admin/header.php" ?>

<div class="content">
  <div class="title1">
    <h3>CHỈNH SỬA SẢN PHẨM</h3>
  </div>

  <div class="content form_content">
    <form action="index.php?ctl=edit-product&pro_id=<?= $product['pro_id']; ?>" method="POST" enctype="multipart/form-data">
      <div class="ngang">
        <div class="danhang mr5">
          <div style="color: red;">
          </div>
          <div class="content mb">
            <label>Tên sản phẩm </label> <br>
            <input type="text" name="name_pro" value="<?= $product['name_pro']; ?>" required>
          </div>
          <div class="content mb">
            <label>Đơn giá</label> <br>
            <input type="number" name="price" value="<?= $product['price']; ?>" required>
          </div>
          <div class="content mb">
            <label>Hình ảnh hiện tại</label> <br>
<<<<<<< HEAD:views/admin/sanpham/edit.php
            <img src="<?= $product['image']; ?>" alt="Hình sản phẩm" width="100">
=======
            <img src="<?= $product['image']; ?>" alt="<?= $product['name_pro']; ?>" width="80">
>>>>>>> 128849ba35a81e740625ad88b3e02274b49c551b:views/admin/product/edit.php
          </div>
          <div class="content mb">
            <label>Hình ảnh mới (nếu có)</label> <br>
            <input type="file" name="image">
          </div>
        </div>
        <div class="danhang">
          <div class="content mb">
            <label>Danh mục</label> <br>
            <select name="cate_id" required>
              <option value="">Chọn danh mục</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?= $category['cate_id']; ?>" <?= $category['cate_id'] == $product['cate_id'] ? 'selected' : ''; ?>>
                  <?= $category['cate_name']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="content mb">
            <label>Số lượng</label> <br>
            <input type="number" name="quantity" value="<?= $product['quantity']; ?>" required>
          </div>
          <div class="content mb">
            <label> Sale Price</label> <br>
            <input type="number" name="sale" value="<?= $product['sale']; ?>" required>
          </div>
        </div>
      </div>

      <div class="content mb">
        <label>Mô tả</label> <br>
<<<<<<< HEAD:views/admin/sanpham/edit.php
        <textarea name="description" required><?= $product['description']; ?></textarea>
      </div>

      <input type="hidden" name="pro_id" value="<?= $product['pro_id']?>">
=======
        <textarea name="describe" required><?= $product['describe']; ?></textarea>
      </div>

      <input type="hidden" name="pro_id" value="<?= $product['pro_id'] ?>">
>>>>>>> 128849ba35a81e740625ad88b3e02274b49c551b:views/admin/product/edit.php
      <div class="content mb">
        <input type="submit" value="Cập nhật">
        <a href="index.php?ctl=list-product"><input type="button" value="Danh sách"></a>
      </div>
    </form>
  </div>
</div>

<?php include_once "views/admin/footer.php" ?>