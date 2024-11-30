<?php include_once "views/client/header.php" ?>
<div class="search-container">
        <div class="search-box">
            <form method="post" action="search.php">
                <input type="text" name="q" placeholder="Tìm kiếm sản phẩm" value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>" />
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="#aaa">
                        <circle cx="10" cy="10" r="6.5" stroke="#aaa" stroke-width="2"/>
                        <line x1="14.5" y1="14.5" x2="20" y2="20" stroke="#aaa" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </form>
        </div>

        <div class="product-list">
            <?php
                // Kiểm tra nếu có từ khóa tìm kiếm
                if(isset($_GET['q']) && !empty($_GET['q'])){
                    $search_term = $_GET['q'];

                    // Truy vấn tìm kiếm sản phẩm theo tên sản phẩm
                    $products = $this->data->searchProduct($search_term); // Gọi hàm tìm kiếm từ model
                    
                    if ($products) {
                        foreach ($product as $pro) {
                            echo '<div class="product-item">';
                            echo '<img src="images/' . $product['image'] . '" alt="' . $pro['ten_sp'] . '" />';
                            echo '<h5>' . $pro['ten_sp'] . '</h5>';
                            echo '<p>' . number_format($product['price'], 0, ',', '.') . ' VNĐ</p>';
                            echo '<a href="product-detail.php?id=' . $pro['pro_id'] . '">Xem chi tiết</a>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Không tìm thấy sản phẩm nào.</p>';
                    }
                }
            ?>
        </div>
    </div>
<?php include_once "views/client/footer.php" ?>