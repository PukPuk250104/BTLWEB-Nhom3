let listIcon = [
  { id: 1, pic: "/BTLWEB/procombat/quan/images/con-1.png"},
  { id: 2, pic: "/BTLWEB/procombat/quan/images/pic-1-con-2.jpg"},
  { id: 3, pic: "/BTLWEB/procombat/quan/images/pic-2-con-2.png"},
  { id: 4, pic: "/BTLWEB/procombat/quan/images/pic-3-con-2.png"},

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

