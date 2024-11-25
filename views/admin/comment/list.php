<?php include_once "views/admin/header.php" ?>
<div>
    <div class="title1">
        <h3>TỔNG HỢP BÌNH LUẬN</h3>
    </div>
    <div class="content>
        <form action="" method=" post">
        <div>
            <div style="color: red;">
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">ID user</th>
                        <th scope="col">ID product </th>
                        <th scope="col">Ngày BL</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comment as $cmt): ?>
                        <tr>
                            <th scope="row"><?= $cmt['cmt_id'] ?></th>
                            <th><?= $cmt['content'] ?></th>
                            <th><?= $cmt['acc_id'] ?></th>
                            <th><?= $cmt['pro_id'] ?></th>
                            <th><?= $cmt['cmt_date'] ?></th>

                            <th><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?ctl=delete-comment&cmt_id=<?= $cmt['cmt_id'] ?>"><button type="button" class="btn btn-outline-danger">Xóa</button></a></th>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>

        </form>
        <div class="content mb">
            <input type="button" value="Chọn tất cả ">
            <input type="button" value="Bỏ chọn tất cả ">
            <input type="button" value="Xóa các mục đã chọn">
        </div>
    </div>
</div>