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

                    <?php foreach ($categories as $cate): ?>
                        <li>
                            <a href="index.php?ctl=product&parent_id=<?= $cate['parent_id'] ?>&cate_id=<?= $cate['cate_id'] ?>">
                                <?= $cate['cate_name'] ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="right">
                <div class="search-box">

                    <svg id="btnSearch" type="submit" name="sbm_filler" xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24"
                        stroke="#aaa">
                        <circle cx="10" cy="10" r="6.5" stroke="#aaa" stroke-width="2" />
                        <line x1="14.5" y1="14.5" x2="20" y2="20" stroke="#aaa" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                    <form method="get">
                        <input type="search" id="keyword" placeholder="Tìm kiếm" />
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

                </div>
            </div>
        </div>
    </div>