<?php include_once "views/admin/header.php" ?>
<div class="content">
    <div class="title1">
        <h3>QUẢN LÝ NGƯỜI DÙNG</h3>
    </div>
    <div class="content form_content ">
        <form action="" method="post">
            <div class="content mb">
                <div style="color: red;">
                </div>
                <table class="cmt">
                    <tr>
                        <th>ID</th>
                        <th>Tên Tài Khoản</th>
                        <th>Họ & Tên</th>
                        <th>EMAIL</th>
                        <th>Địa Chỉ</th>
                        <th>Mật Khẩu</th>
                        <th>ADMIN</th>
                        <th></th>
                    </tr>
                    
                    <?php foreach ($accounts as $account): ?>
    <tr>
        <td><?= $account['ma_tk'] ?></td>
        <td><?= $account['ten_tk'] ?></td>
        <td><?= $account['ho_ten'] ?></td>
        <td><?= $account['email'] ?></td>
        <td><?= $account['dia_chi'] ?></td>
        <td><?= $account['mat_khau'] ?></td>
        <td><?= $account['admin'] ?></td>
        <td>
            <a href="index.php?ctl=delete-account&ma_tk=<?= $account['ma_tk'] ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
                    
                </table>

            </div>

        </form>

    </div>
</div>