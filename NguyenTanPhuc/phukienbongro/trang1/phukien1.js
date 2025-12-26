let listIcon = [
  { id: 1, pic: "/BTLWEB/phukienbongro/trang1/images/pic-1-con-2.webp" },
  { id: 2, pic: "/BTLWEB/phukienbongro/trang1/images/pic-2-con-2.webp" },
  { id: 3, pic: "/BTLWEB/phukienbongro/trang1/images/pic-3-con-2.webp" },
];

let iconElement = document.querySelector('.content-image'); // đúng class
let iconImg = document.getElementById('iconImg');
let currentIcon = null;

function chooseIcon(iconId) {
  let selectIcon = listIcon.find(icon => icon.id === iconId);
  if (!selectIcon) {
      console.error("Không tìm thấy ảnh với ID:", iconId);
      return;
  }

  currentIcon = selectIcon;
  iconImg.src = selectIcon.pic; 

}

