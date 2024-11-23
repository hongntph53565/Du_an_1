<?php include_once "views/admin/header.php" ?>

<div class="content">
    <div class="title1">
        <h3>QUẢN LÝ HÀNG HÓA</h3>
    </div>
    <div class="content form_content">
        <form action="index.php?ctl=delete-products" method="post">
            <div class="content mb">
                <div style="color: red;">
                    <!-- Hiển thị thông báo lỗi nếu có -->
                </div>
                <table class="hanghoa">
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Mã sp</th>
                        <th>Tên sp</th>
                        <th>Giá</th>
                        <th>Hình</th>
                        <th>Số Lượng</th>
                        <th>Sale Price</th>
                        <th>Mô tả</th>
                        <th>Mã dm</th>
                        <th>Thao tác</th>
                    </tr>

                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><input type="checkbox" name="ma_sp[]" value="<?= $product['ma_sp']; ?>"></td>
                        <td><?= $product['ma_sp']; ?></td>
                        <td><?= $product['ten_sp']; ?></td>
                        <td><?= number_format($product['gia'], 0, ',', '.'); ?> VND</td>
                        <td><img src="<?= $product['anh']; ?>" alt="<?= $product['ten_sp']; ?>" width="100"></td>
                        <td><?= $product['so_luong']; ?></td>
                        <td><?= $product['gia_giam']; ?></td>
                        <td><?= $product['mo_ta']; ?></td>
                        <td><?= $product['ma_dm']; ?></td>
                        <td>
                            <a href="index.php?ctl=edit-product&ma_sp=<?= $product['ma_sp']; ?>" class="crud">Sửa</a><br><br>
                            <a href="index.php?ctl=delete-product&ma_sp=<?= $product['ma_sp']; ?>" class="crud" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                </table>
            </div>

            <div class="content mb">
                <input type="submit" value="Xóa các sản phẩm đã chọn">
                <input type="button" value="Chọn tất cả" id="selectAllBtn">
                <input type="button" value="Bỏ chọn tất cả" id="deselectAllBtn">
                <a href="index.php?ctl=add-product"><input type="button" value="Nhập thêm"></a>
            </div>
        </form>
    </div>
</div>
<?php include_once "views/admin/footer.php" ?>
