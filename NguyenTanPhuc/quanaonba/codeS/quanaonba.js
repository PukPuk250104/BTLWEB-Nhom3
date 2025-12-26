let listIcon = [
  { id: 1, pic: "/BTLWEB/quanaonba/images/pic-1-con-1.jpg"},
  { id: 2, pic: "/BTLWEB/quanaonba/images/pic-2-con-1.jpg"},
  { id: 3, pic: "/BTLWEB/quanaonba/images/pic-3-con-1.jpg"},
  { id: 4, pic: "/BTLWEB/quanaonba/images/pic-1-con-2.jpg"},
  { id: 5, pic: "/BTLWEB/quanaonba/images/pic-2-con-2.jpg"},
  { id: 6, pic: "/BTLWEB/quanaonba/images/pic-3-con-2.jpg"},
  { id: 7, pic: "/BTLWEB/quanaonba/images/pic-1-con-3.png"},
  { id: 8, pic: "/BTLWEB/quanaonba/images/pic-2-con-3.jpg"},
  { id: 9, pic: "/BTLWEB/quanaonba/images/pic-3-con-3.jpg"},
  { id: 10, pic: "/BTLWEB/quanaonba/images/pic-1-con-4.jpg"},
  { id: 11, pic: "/BTLWEB/quanaonba/images/pic-2-con-4.jpg"},
  { id: 12, pic: "/BTLWEB/quanaonba/images/pic-3-con-4.jpg"},
  { id: 13, pic: "/BTLWEB/quanaonba/images/pic-1-con-5.jpg"},
  { id: 14, pic: "/BTLWEB/quanaonba/images/pic-2-con-5.jpg"},
  { id: 15, pic: "/BTLWEB/quanaonba/images/pic-3-con-5.jpg"},
  { id: 16, pic: "/BTLWEB/quanaonba/images/pic-1-con-6.jpg"},
  { id: 17, pic: "/BTLWEB/quanaonba/images/pic-2-con-6.jpg"},
  { id: 18, pic: "/BTLWEB/quanaonba/images/pic-3-con-6.jpg"},
  { id: 19, pic: "/BTLWEB/quanaonba/images/pic-1-con-7.jpg"},
  { id: 20, pic: "/BTLWEB/quanaonba/images/pic-2-con-7.jpg"},
  { id: 21, pic: "/BTLWEB/quanaonba/images/pic-3-con-7.jpg"},
  { id: 22, pic: "/BTLWEB/quanaonba/images/pic-1-con-8.jpg"},
  { id: 23, pic: "/BTLWEB/quanaonba/images/pic-2-con-8.jpg"},
  { id: 24, pic: "/BTLWEB/quanaonba/images/pic-3-con-8.jpg"},
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

