document.addEventListener('DOMContentLoaded', () => {
  // Lấy phần tử giỏ hàng
  const cartSummary = document.querySelector('.cart-summary');

  // Kiểm tra phần tử có tồn tại hay không
  if (cartSummary) {
    // Lấy vị trí ban đầu của phần tử giỏ hàng
    const cartOffsetTop = cartSummary.offsetTop;

    // Lắng nghe sự kiện cuộn trang
    window.addEventListener('scroll', () => {
      if (window.scrollY >= cartOffsetTop) {
        // Thêm class "sticky" khi cuộn xuống
        cartSummary.classList.add('sticky');
      } else {
        // Xóa class "sticky" khi quay lại vị trí ban đầu
        cartSummary.classList.remove('sticky');
      }
    });
  } else {
    console.log("Không tìm thấy phần tử giỏ hàng.");
  }
});

document.querySelectorAll('.size-option').forEach(function(sizeElement) {
  sizeElement.addEventListener('click', function() {
    // Xóa lớp "selected" của tất cả các phần tử size
    document.querySelectorAll('.size-option').forEach(function(el) {
      el.classList.remove('selected');
    });

    // Thêm lớp "selected" cho phần tử đã click
    sizeElement.classList.add('selected');

    // Lưu kích cỡ đã chọn
    const selectedSize = sizeElement.textContent;
    console.log("Kích cỡ đã chọn: " + selectedSize);
    // Bạn có thể gửi thông tin này đến một form hoặc sử dụng nó cho các mục đích khác
  });
});

