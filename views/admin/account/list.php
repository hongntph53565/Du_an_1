<?php include_once "views/admin/header.php" ?>
<div>
    <div class="title1"><h2>Quản lý tài khoản</h2></div>
    <form action="" method="post">
        <div style="color: red;">
        </div>
        <table class="table table-striped">
            <a href="index.php?ctl=add-account"><button type="button" class="btn btn-primary">Thêm mới</button></a> <br> <br>
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Vai trò</th>
                    <th scope="col">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($account as $acc): ?>
                    <tr>
                        <th scope="row"><?= $acc['acc_id'] ?></th>
                        <th><?= $acc['fullname'] ?></th>
                        <th><img src="<?= $acc['image'] ?>" alt="" width="60"></th>
                        <th><?= $acc['email'] ?></th>
                        <th><?= $acc['phone'] ?></th>
                        <th><?= $acc['address'] ?></th>
                        <th><?= $acc['cre_date'] ?></th>
                        <th><?= $acc['role'] ?></th>
                        <th><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?ctl=delete-account&acc_id=<?= $acc['acc_id']?>"><button type="button" class="btn btn-outline-danger">Xóa</button></a></th>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </form>
</div>