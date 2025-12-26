let listIcon = [
  { id: 1, pic: "../anh/quabong1.jpg"},
  { id: 2, pic: "../anh/quabong2.jpg"},
  { id: 3, pic: "../anh/quabong3.jpg"},
  { id: 4, pic: "../anh/quabong4.jpg"},
  { id: 5, pic: "../anh/quabong5.jpg"},
];

let iconElement = document.querySelector('.content-image'); 
let iconImg = document.getElementById('iconImg');
let currentIcon = null;

function chooseIcon(iconId, element) {
  let selectIcon = listIcon.find(icon => icon.id === iconId);
  if (!selectIcon) return;

  let parentContent = element.closest('.content');
  let mainImg = parentContent.querySelector('.content-image img');
  mainImg.src = selectIcon.pic;
}


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
