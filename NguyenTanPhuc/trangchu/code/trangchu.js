
let currentSlide = 0;
let slides = document.getElementsByClassName("banner-slide"); 
let totalSlides = slides.length;

function showSlide(index) {
  // Ẩn tất cả slide
  for (let i = 0; i < totalSlides; i++) {
    slides[i].style.display = "none";
    slides[i].style.transition = "none";
    slides[i].style.transform = "translateX(0)";
  }

  // Hiện slide được chọn
  slides[index].style.display = "block";
  slides[index].style.opacity = "1";
}

// Chuyển sang slide tiếp theo
function nextSlide() {
  let current = currentSlide;
  currentSlide = (currentSlide + 1) % totalSlides;

  // Hiệu ứng lướt sang phải
  slides[current].style.transition = "transform 0.5s ease-in-out";
  slides[current].style.transform = "translateX(-100%)";

  slides[currentSlide].style.display = "block";
  slides[currentSlide].style.transform = "translateX(100%)";
  setTimeout(function() {
    slides[currentSlide].style.transition = "transform 0.5s ease-in-out";
    slides[currentSlide].style.transform = "translateX(0)";
  }, 20);

  // Ẩn slide cũ sau khi hoàn thành hiệu ứng
  setTimeout(function() {
    slides[current].style.display = "none";
    slides[current].style.transform = "translateX(0)";
  }, 500);
}

// Quay lại slide trước
function prevSlide() {
  let current = currentSlide;
  currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;

  // Hiệu ứng lướt sang trái
  slides[current].style.transition = "transform 0.5s ease-in-out";
  slides[current].style.transform = "translateX(100%)";

  slides[currentSlide].style.display = "block";
  slides[currentSlide].style.transform = "translateX(-100%)";
  setTimeout(function() {
    slides[currentSlide].style.transition = "transform 0.5s ease-in-out";
    slides[currentSlide].style.transform = "translateX(0)";
  }, 20);

  // Ẩn slide cũ
  setTimeout(function() {
    slides[current].style.display = "none";
    slides[current].style.transform = "translateX(0)";
  }, 500);
}

// Hiển thị slide đầu tiên
showSlide(currentSlide);
