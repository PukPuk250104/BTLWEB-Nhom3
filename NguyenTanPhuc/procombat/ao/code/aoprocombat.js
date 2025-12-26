let listIcon = [
  { id: 1, pic: "/BTLWEB/procombat/ao/images/con-5.png"},
  { id: 2, pic: "/BTLWEB/procombat/ao/images/pic-1-con-6.png"},
  { id: 3, pic: "/BTLWEB/procombat/ao/images/pic-2-con-6.png"},
  { id: 4, pic: "/BTLWEB/procombat/ao/images/pic-3-con-6.png"},
  { id: 5, pic: "/BTLWEB/procombat/ao/images/con-3.jpg"},
  { id: 6, pic: "/BTLWEB/procombat/ao/images/pic-2-con-4.jpg"},
  { id: 7, pic: "/BTLWEB/procombat/ao/images/con-4.jpg"},
];

let iconElement = document.querySelector('.content-image'); // đúng class
let iconImg = document.getElementById('iconImg');
let currentIcon = null;

function chooseIcon(iconId, element) {
  let selectIcon = listIcon.find(icon => icon.id === iconId);
  if (!selectIcon) return;

  let parentContent = element.closest('.content');
  let mainImg = parentContent.querySelector('.content-image img');
  mainImg.src = selectIcon.pic;
}

