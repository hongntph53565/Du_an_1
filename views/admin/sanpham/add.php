<?php include_once "views/admin/header.php" ?>
<div class="content">
  <div class="title1">

    <h3>THÊM MỚI SẢN PHẨM</h3>
  </div>
  <div class="content form_content ">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="ngang">
        <div class="danhang mr5">
          <div style="color: red;">
            
          </div>
          <div class="content mb">
            <label>Tên sản phẩm </label> <br>
            <input type="text" name="ten_hh" placeholder="nhập tên sản phẩm">
          </div>
          <div class="content mb">
            <label>Đơn giá</label> <br>
            <input type="number" name="don_gia" placeholder="nhập đơn giá">
          </div>
          <div class="content mb">
            <label>Hình ảnh</label> <br>
            <input type="file" name="hinh">
          </div>
        </div>
        <div class="danhang ">
          <div class="content mb">
            <label>Danh mục</label> <br>
            <select name="ma_dm" id="">
             
                <option value="">
                  
                </option>
             
            </select>
          </div>
          <div class="content mb">
            <label>Ngày nhập</label> <br>
            <input type="date" name="ngay_nhap" placeholder="nhập ngày nhập">
          </div>
          <div class="content mb">
            <label>Số lượt xem</label> <br>
            <input type="text" name="so_luot_xem" disabled placeholder="0">
          </div>
        </div>
      </div>
      <div class="content mb">
        <label>Mô tả</label> <br>
        <textarea name="mo_ta" id=""></textarea>
      </div>
      <div class="content mb">
        <input type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">

        <a href="index.php?ctl=list-product"><input type="button" value="Danh sách"></a>
      </div>

    </form>
  </div>

  <?php include_once "views/admin/footer.php" ?>