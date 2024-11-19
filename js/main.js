// Lấy phần tử giỏ hàng
const cartSummary = document.querySelector('.cart-summary');

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