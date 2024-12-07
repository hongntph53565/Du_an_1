<?php include_once "views/admin/header.php"; ?>
<div class="content form_content">
    <form action="index.php?ctl=status-update" method="post">
        <!-- Thêm trường ẩn order_id -->
        <input type="hidden" name="order_id" value="<?php echo $orderDetails['order_id']; ?>">

        <div class="content mb">
            <h2>Sửa trạng thái đơn hàng</h2>
            <div>
                <label for="status"><strong>Trạng thái:</strong></label>
                <select name="status" id="status" required>
                    <option value="pending" <?php echo ($orderDetails['status'] == 'Chờ Xử Lý') ? 'selected' : ''; ?>>Chờ xử lý</option>
                    <option value="shipped" <?php echo ($orderDetails['status'] == 'Đang Vận Chuyển') ? 'selected' : ''; ?>>Đã giao</option>
                    <option value="delivered" <?php echo ($orderDetails['status'] == 'Đã Giao Thành Công') ? 'selected' : ''; ?>>Đã giao thành công</option>
                    <option value="cancelled" <?php echo ($orderDetails['status'] == 'Đã Hủy') ? 'selected' : ''; ?>>Đã hủy</option>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
            </div>
        </div>
    </form>
</div>

<?php include_once "views/admin/footer.php"; ?>
