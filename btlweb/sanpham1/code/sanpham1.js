// ---- Chọn size ----
let sizeItems = document.querySelectorAll("#sizeList li");
sizeItems.forEach(item => {
  item.addEventListener("click", function() {
    sizeItems.forEach(el => el.classList.remove("active"));
    this.classList.add("active");
  });
});

// ---- Tăng/giảm số lượng ----
let quantityInput = document.getElementById("quantity");
document.getElementById("increase").addEventListener("click", () => {
  quantityInput.value = parseInt(quantityInput.value) + 1;
});
document.getElementById("decrease").addEventListener("click", () => {
  if (parseInt(quantityInput.value) > 1)
    quantityInput.value = parseInt(quantityInput.value) - 1;
});

// ---- Thêm vào giỏ hàng ----
document.querySelector(".add-cart-btn").addEventListener("click", () => {
  const size = document.querySelector(".size li.active");
  const qty = quantityInput.value;

  if (!size) {
    alert("Vui lòng chọn size trước khi thêm vào giỏ hàng!");
    return;
  }
  alert(`Đã thêm vào giỏ hàng:\nSize: ${size.textContent}\nSố lượng: ${qty}`);
});
 let nutDangNhapList = document.getElementsByClassName("Log-in");
  // nếu có nhiều phần tử cùng class, ta lấy phần tử đầu tiên [0]
  if (nutDangNhapList.length > 0) {
    var nutDangNhap = nutDangNhapList[0];
    nutDangNhap.onclick = function() {
      document.getElementById("hopForm").style.display = "block";
      document.getElementById("nen").style.display = "block";
      // focus vào ô username để tiện nhập
      var u = document.getElementById("login-username");
      if (u) u.focus();
    };
  }

  // Hàm đóng form
  function dongForm() {
    document.getElementById("hopForm").style.display = "none";
    document.getElementById("nen").style.display = "none";
  }

  // Ví dụ xử lý đăng nhập (bạn có thể thay bằng gửi form lên server)
  function submitLogin() {
    var user = document.getElementById("login-username").value;
    var pass = document.getElementById("login-password").value;
    // ví dụ kiểm tra đơn giản:
    if (!user || !pass) {
      alert("Vui lòng nhập tài khoản và mật khẩu.");
      return;
    }
    // TODO: thay bằng gửi AJAX hoặc submit form thực tế
    alert("Gửi dữ liệu đăng nhập:\n" + user);
    dongForm();
  }

  // Ví dụ xử lý đăng ký
  function submitRegister() {
    var email = document.getElementById("reg-email").value;
    var pass = document.getElementById("reg-password").value;
    if (!email || !pass) {
      alert("Vui lòng nhập email và mật khẩu đăng ký.");
      return;
    }
    // TODO: gửi dữ liệu đăng ký lên server
    alert("Gửi dữ liệu đăng ký:\n" + email);
    dongForm();
  }
