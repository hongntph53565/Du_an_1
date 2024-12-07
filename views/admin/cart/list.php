<?php include_once "views/admin/header.php"; ?>

<div class="content form_content">
    <form action="" method="post">
        <div class="content mb">
            <div style="color: red;"></div>

            <!-- Table displaying the orders -->
            <table class="cmt">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>ID Account</th>
                        <th>Trạng Thái </th>
                        <th>Địa Chỉ</th>
                        <th>Thanh Toán</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php $stt = 1; ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                                <td><?php echo htmlspecialchars($order['acc_id']); ?></td>
                                <td><?php echo htmlspecialchars($order['status']); ?></td>
                                <td><?php echo htmlspecialchars($order['other_addr']); ?></td>
                                <td><?php echo htmlspecialchars($order['pay']); ?></td>
                                <td>
                                    <!-- Edit button: link to an edit page or show a form to edit the order -->
                                    <a href="index.php?ctl=update-status&order_id=<?php echo urlencode($order['order_id']); ?>" class="btn btn-primary">Sửa</a>
                                </td>
                            </tr>
                            <?php $stt++; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" style="text-align: center;">Không có đơn hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
