<?php include_once "views/admin/header.php" ?>

<div class="content">
  <div class="title1">
    <h3>THÊM MỚI SẢN PHẨM</h3>
  </div>

  <div class="content form_content">
    <form action="index.php?ctl=store-product" method="post" enctype="multipart/form-data">
      <div class="ngang">
        <div class="danhang mr5">
          <div style="color: red;">
            <!-- Thông báo lỗi nếu có -->
          </div>
          <div class="content mb">
            <label>Tên sản phẩm </label> <br>
            <input type="text" name="ten_sp" placeholder="Nhập tên sản phẩm" required>
          </div>
          <div class="content mb">
            <label>Đơn giá</label> <br>
            <input type="number" name="price" placeholder="Nhập đơn giá" required>
          </div>
          <div class="content mb">
            <label>Hình ảnh</label> <br>
            <input type="file" name="image" required>
          </div>
        </div>
        <div class="danhang">
          <div class="content mb">
            <label>Danh mục</label> <br>
            <select name="cate_id" id="category" required>
              <option value="">Chọn danh mục</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?= $category['cate_id']; ?>"><?= $category['cate_name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="content mb">
            <label>Số Lượng</label> <br>
            <input type="number" name="quantity" placeholder="Nhập Số Lượng " required>
          </div>
          <div class="content mb">
            <label>Sale Prce</label> <br>
            <input type="number" name="sale" placeholder="Nhập đơn giá" required>
          </div>
          <div class="content mb">
            <label>Số lượt xem</label> <br>
            <input type="number" name="view" value="0" disabled placeholder="0">
          </div>
        </div>
      </div>

      <div class="content mb">
        <label>Mô tả</label> <br>
        <textarea name="description" placeholder="Nhập mô tả" required></textarea>
      </div>

      <div class="content mb">
        <input type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">
        <a href="index.php?ctl=list-product"><input type="button" value="Danh sách"></a>
      </div>
    </form>
  </div>

</div>

<?php include_once "views/admin/footer.php" ?>