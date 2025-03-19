<div id="footer">
    <div class="footer-top">
        <div class="congty">
            <div class="footer-title">
                <h6>CÔNG TY CỔ PHẦN CANIFA</h6>
            </div>
            <span>Số ĐKKD: 0107574310, ngày cấp: 23/09/2016, Nơi cấp: Sở Kế hoạch và đầu tư Hà Nội <br>

                Địa chỉ trụ sở tại số 688 Đường Quang Trung, Phường La Khê, Quận Hà Đông, Thành phố Hà Nội. <br>

                Địa chỉ liên hệ: P301, tầng 3, tòa nhà GP Invest, số 170 La Thành, Phường Ô Chợ Dừa, Quận Đống
                Đa, Thành Phố
                Hà Nội. <br>

                Điện thoại: +8424 - 7303.0222 <br>

                Fax: +8424 - 6277.6419 <br>

                Email: hello@canifa.com <br>

                <div class="logo">
                    <img src="images/fb.png" alt="" width="12%;">
                    <img src="images/ins.jpg" alt="" width="12%;">
                    <img src="images/yt.jpg" alt="" width="12%;">
                    <img src="images/tiktok.png" alt="" width="12%;">
                </div>
            </span>
        </div>
        <div class="thuonghieu">
            <div class="footer-title">
                <h6>THƯƠNG HIỆU</h6>
            </div>
            <div class="menu-phu">
                <ul>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="">Tin tức</a></li>
                    <li><a href="">Tuyển dụng</a></li>
                    <li><a href="">Với cộng đồng</a></li>
                    <li><a href="">Hệ thống cửa hàng</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
            </div>
        </div>

        <div class="hotro">
            <div class="footer-title">
                <h6>HỖ TRỢ</h6>
            </div>

            <div class="menu-phu">
                <ul>
                    <li><a href="">Hỗ trợ</a></li>
                    <li><a href="">Chính sách KHTT</a></li>
                    <li><a href="">Điều kiện - Điều khoản Chính sách KHTT</a></li>
                    <li><a href="">Chính sách vận chuyển</a></li>
                    <li><a href="">Gợi ý tìm size</a></li>
                    <li><a href="">Kiểm tra đơn hàng</a></li>
                    <li><a href="">Tra cứu điểm thẻ</a></li>
                    <li><a href="">Chính sách bảo mật thông tin KH</a></li>
                </ul>
            </div>
        </div>
        <div class="down">
            <div class="footer-title">
                <h6>TẢI ỨNG DỤNG</h6>
            </div>

            <div class="contact">
                <div class="application">
                    <img src="images/bancode.png" alt="" style="width: 100px;">
                    <ul>
                        <li class="li1">
                            <a href="https://play.google.com/store/apps">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/playstore.svg"
                                    alt="">
                            </a>
                        </li>
                        <li>
                            <a href=" https://www.apple.com/in/app-store/">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/appstore.svg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="payment">
                    <div class="footer-title">
                        <h6>PHƯƠNG THỨC THANH TOÁN</h6>
                    </div>
                    <img src="images/pay.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="footer-bottom">
        <div class="text-content">
            <h6>© 2024 CANIFA</h6>
        </div>
        <div class="chungnhan">
            <img src="images/fb1.png" alt="">
            <img src="images/fb2.png" alt="">
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cartNotification = document.getElementById('cart-notification');
        const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

        // Hiển thị thông báo khi thêm vào giỏ hàng
        addToCartButtons.forEach(button => {
            button.addEventListener('click', () => {
                cartNotification.style.display = 'flex'; // Hiển thị thông báo

                // Tự động ẩn sau 3 giây
                setTimeout(() => {
                    cartNotification.style.display = 'none';
                }, 3000);
            });
        });
    });
</script>
<script>
    btnSearch = document.getElementById('btnSearch')
    keyword = document.getElementById('keyword')
    btnSearch.addEventListener('click', () => {
        location.href = "<?= BASE_URL . '?ctl=search&keyword=' ?>" + keyword.value;
    });

    keyword.addEventListener('keypress', (event) => {
        if (event.key == 'Enter') {
            location.href = "<?= BASE_URL . '?ctl=search&keyword=' ?>" + keyword.value;
            event.preventDefault();
        }
    });
</script>
</body>

</html>