// ---- Chọn size ----
let sizeItems = document.querySelectorAll("#sizeList li");
sizeItems.forEach(item => {
  item.addEventListener("click", function() {
    sizeItems.forEach(el => el.classList.remove("active"));
    this.classList.add("active");
  });
});

// ---- Tăng/giảm số lượng ----
let quantityInput = document.getElementById("quantity");
document.getElementById("increase").addEventListener("click", () => {
  quantityInput.value = parseInt(quantityInput.value) + 1;
});
document.getElementById("decrease").addEventListener("click", () => {
  if (parseInt(quantityInput.value) > 1)
    quantityInput.value = parseInt(quantityInput.value) - 1;
});

// ---- Thêm vào giỏ hàng ----
document.querySelector(".add-cart-btn").addEventListener("click", () => {
  const size = document.querySelector(".size li.active");
  const qty = quantityInput.value;

  if (!size) {
    alert("Vui lòng chọn size trước khi thêm vào giỏ hàng!");
    return;
  }
  alert(`Đã thêm vào giỏ hàng:\nSize: ${size.textContent}\nSố lượng: ${qty}`);
});
 