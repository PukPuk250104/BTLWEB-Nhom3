let listIcon = [
  { id: 1, pic: "../images/con1.jpg"},
  { id: 2, pic: "../images/con2.jpg"},
  { id: 3, pic: "../images/pic-2-con-2.jpg"},
  { id: 4, pic: "../images/pic-3-con-3.jpg"},
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
