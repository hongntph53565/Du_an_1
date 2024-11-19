<?php include_once "views/admin/header.php" ?>
<div class="content">
    <div class="title1">
        <h3>QUẢN LÝ LOẠI HÀNG</h3>
    </div>
    <div class="content form_content ">
        <form action="" method="post">
            <div class="content mb">
                <div style="color: red;">

                </div>
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ DANH MỤC</th>
                        <th>TÊN DANH MỤC</th>
                        <th></th>
                    </tr>

                    <?php foreach ($categories as $cate): ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?= $cate['ma_dm'] ?></td>
                            <td><?= $cate['ten_dm'] ?></td>
                            <td><a href="index.php?ctl=edit-categories&ma_dm=<?= $cate['ma_dm'] ?>" class="crud">Sửa</a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?ctl=delete-categories&ma_dm=<?= $cate['ma_dm'] ?>" class="crud">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </table>
            </div>
            <div class="content mb">
                <input type="button" value="Chọn tất cả ">
                <input type="button" value="Bỏ chọn tất cả ">
                <a href="index.php?ctl=add-categories"> <input type="button" value="Nhập thêm"></a>
            </div>
        </form>
    </div>
</div>