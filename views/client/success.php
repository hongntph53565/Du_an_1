<?php include_once "views/client/header.php" ?>
<div class="container" style=" text-align: center;
    max-width: 450px;
    width: 100%;
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 25px 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);" >
    <div class="success-icon" style=" margin-bottom: 20px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
        <path d="M9 12l2 2 4-4"></path>
        <circle cx="12" cy="12" r="10"></circle>
      </svg>
    </div>
    <h1 style="   font-size: 22px;
    font-weight: bold;
    color: #4CAF50;
    margin: 10px 0;">Đặt hàng thành công</h1>
    <p class="thank-you" style="  font-size: 16px;
    color: #555;
    margin-bottom: 20px;">Cảm ơn bạn đã mua sắm tại Canifa.</p>
    <div class="order-info" style="   text-align: left;
    margin: 20px 0;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;">
      <h2 style=" font-size: 18px;
    margin-bottom: 10px;
    color: #333;
    border-bottom: 1px solid #ddd;
    padding-bottom: 8px;">Thông tin đơn hàng</h2>
      <ul style="  list-style: none;
    padding: 0;
    margin: 0;">
        <li style=" font-weight: bold;  font-size: 14px;
    color: #555;
    margin: 8px 0;
    display: flex;
    justify-content: space-between;"><span>Mã đơn hàng:</span> <?= $orderDetails['order_id'] ?></li>
        <li style=" font-weight: bold;  font-size: 14px;
    color: #555;
    margin: 8px 0;
    display: flex;
    justify-content: space-between;"><span>Người nhận:</span> <?= $user['fullname'] ?></li>
        <li style=" font-weight: bold;  font-size: 14px;
    color: #555;
    margin: 8px 0;
    display: flex;
    justify-content: space-between;"><span>Địa chỉ:</span> <?= $orderDetails['other_addr'] ?></li>
        <li style=" font-weight: bold;  font-size: 14px;
    color: #555;
    margin: 8px 0;
    display: flex;
    justify-content: space-between;"><span>Thanh toán:</span> <?= $orderDetails['pay'] ?></li>
   
      </ul>
    </div>
    <div class="buttons" style="    display: flex;
    justify-content: space-between;
    margin-top: 20px;">
      <button style="    padding: 10px 20px;
    font-size: 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold; " class="btn btn-primary">Tiếp tục mua sắm</button>
      <button class="btn btn-secondary">Theo dõi đơn hàng</button>
    </div>
</div>

<?php include_once "views/client/footer.php" ?>
