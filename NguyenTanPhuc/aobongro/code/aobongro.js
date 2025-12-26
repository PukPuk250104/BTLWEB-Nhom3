let listIcon = [
  { id: 1, pic: "/BTLWEB/aobongro/images/pic-1-con-3.jpg"},
  { id: 2, pic: "/BTLWEB/aobongro/images/pic-2-con-3.jpg"},
  { id: 3, pic: "/BTLWEB/aobongro/images/pic-3-con-pic-3.jpg"},
  { id: 4, pic: "/BTLWEB/aobongro/images/pic-1-con-4.jpg"},
  { id: 5, pic: "/BTLWEB/aobongro/images/pic-2-con-4.jpg"},
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


