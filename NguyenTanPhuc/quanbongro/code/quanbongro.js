let listIcon = [
  { id: 1, pic: "/BTLWEB/quanbongro/images/con-17.webp"},
  { id: 2, pic: "/BTLWEB/quanbongro/images/pic-2-con-17.webp"},
  { id: 3, pic: "/BTLWEB/quanbongro/images/pic-3-con-17.webp"},
  { id: 4, pic: "/BTLWEB/quanbongro/images/con-18.png"},
  { id: 5, pic: "/BTLWEB/quanbongro/images/pic-2-con-18.png"},
  { id: 6, pic: "/BTLWEB/quanbongro/images/pic-3-con-18.png"},
  { id: 7, pic: "/BTLWEB/quanbongro/images/con-21.png"},
  { id: 8, pic: "/BTLWEB/quanbongro/images/pic-2-con-21.png"},
  { id: 9, pic: "/BTLWEB/quanbongro/images/con-22.jpg"},
  { id: 10, pic:"/BTLWEB/quanbongro/images/pic-2-con-22.png"},
  { id: 11, pic:"/BTLWEB/quanbongro/images/pic-3-con-22.png"},
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

