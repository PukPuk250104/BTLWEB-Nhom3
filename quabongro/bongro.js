let listIcon = [
  { id: 1, pic: "../anh/bong6.jpg"},
  { id: 2, pic: "../anh/bong7.jpg"},
  { id: 3, pic: "../anh/bong8.jpg"},
  { id: 4, pic: "../anh/bong9.jpg"},
  { id: 5, pic: "../anh/bong10.jpg"},
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


