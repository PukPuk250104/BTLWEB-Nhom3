let listIcon = [
  { id: 1, pic: "/BTLWEB/uniti/images/pic-1-con-1.webp"},
  { id: 2, pic: "/BTLWEB/uniti/images/pic-1-con-2.webp"},
  { id: 3, pic: "/BTLWEB/uniti/images/pic-1-con-3.webp"},
  { id: 4, pic: "/BTLWEB/uniti/images/pic-2-con-1.webp"},
  { id: 5, pic: "/BTLWEB/uniti/images/pic-2-con-2.webp"},
  { id: 6, pic: "/BTLWEB/uniti/images/pic-2-con-3.webp"},
 
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
