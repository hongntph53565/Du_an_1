<?php include_once "views/admin/header.php" ?>
<div class="content">
    <div class="title1">
        <h3>QUẢN LÝ LOẠI HÀNG</h3>
    </div>
    <div class="content form_content ">
        <form action="" method="post">
            <div class="content mb">
                <div style="color: red;"><?= $message ?? ""; ?></div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Parent ID</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    <?php foreach ($categories as $cate): ?>
                        <tr>
                            <td><?= $cate['cate_id'] ?></td>
                            <td><?= $cate['parent_id'] ?></td>
                            <td><?= $cate['cate_name'] ?></td>
                            <td><a href="index.php?ctl=edit-categories&cate_id=<?= $cate['cate_id'] ?>" class="crud">Sửa</a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?ctl=delete-categories&cate_id=<?= $cate['cate_id'] ?>" class="crud">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </table>
            </div>
            <div class="content mb">
                <a href="index.php?ctl=add-categories"> <input type="button" value="Nhập thêm"></a>
            </div>
        </form>
    </div>
</div>