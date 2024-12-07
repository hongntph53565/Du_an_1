<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <title>CANIFA</title>
</head>
<body>
    <div id="header">
        <div class="header-top">ĐỔI HÀNG MIỄN PHÍ - TẠI TẤT CẢ CỬA HÀNG TRONG VÒNG 30 NGÀY</div>
        <div class="menu">
            <div class="left">
                <a href="index.php">
                    <img src="images/logo.svg" alt="" width="70px">
                </a>
                <ul class="menu-button">
                    <!-- <li><a href="index.php?ctl=newproduct">Sản phẩm mới</a></li>
                    <li><a href="index.php?ctl=nu">Nữ</a></li>
                    <li><a href="index.php?ctl=nam">Nam</a></li>
                    <li><a href="index.php?ctl=girl">Bé gái</a></li>
                    <li><a href="index.php?ctl=boy">Bé trai</a></li> -->
                    <?php foreach ($categories as $cate): ?>
                        <li>
                            <a href="index.php?ctl=product&parent_id=<?= $cate['parent_id'] ?>&cate_id=<?= $cate['cate_id'] ?>">
                                <?= $cate['cate_name'] ?>
                            </a>
                        </li>
                    <?php endforeach?>
                </ul>
            </div>
            <div class="right">
                <div class="search-box">
                   <form  method="post"action=""> 
                    <svg type="submit" name="sbm_filler" xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24"
                        stroke="#aaa">
                        <!-- Vòng tròn kính lúp -->
                        <circle cx="10" cy="10" r="6.5" stroke="#aaa" stroke-width="2" />
                        <!-- Tay cầm kính lúp -->
                        <line x1="14.5" y1="14.5" x2="20" y2="20" stroke="#aaa" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                    <input type="search" name="search_all"  placeholder="Tìm kiếm" />
                </form>
                </div>
                <div class="icon">
                <a href="index.php?ctl=login">
                        <img src="images/taikhoan.jpg" alt="" width="20px" style="color: red;">
                        <p>Tài khoản</p>
                    </a>
                </div>
                <div class="icon" style="margin-bottom: 2px; position: relative;">
    <a href="index.php?ctl=cart">
        <img src="images/shop.jpg" alt="" width="25px">
        <p>Giỏ hàng</p>
    </a>
    <!-- Thông báo thêm vào giỏ hàng
    <div id="cart-notification" style=" display: none; /* Ẩn mặc định */
    position: absolute;
    top: 50px; /* Điều chỉnh vị trí dưới giỏ hàng */
    right: 0;
    width: 300px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px;
    z-index: 1000;
    display: flex;
    align-items: center;
    gap: 10px;">
        <img  src="images/chamtron.avif" alt="Sản phẩm" style="    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;">
        <div style="  margin: 0;
    font-size: 14px;
    color: #333;">
            <p>Đã thêm sản phẩm vào giỏ hàng</p>
            <button style=" padding: 5px 10px;
  background-color: #fff;
  border: 1px solid #333;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;">Xem giỏ hàng</button>
        </div>
    </div> -->
</div>
</div>
</div>
</div>