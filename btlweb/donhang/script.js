function capNhatGia() {
    // 1. Giá mặc định
    const giaGoc = 1960000;

    // 2. Lấy số lượng từ ô nhập
    let soLuong = document.getElementById('o-so-luong').value;

    // 3. Nếu số lượng trống hoặc < 1 thì mặc định là 1
    if (soLuong < 1 || soLuong == "") soLuong = 1;

    // 4. Phép tính nhân
    let ketQua = giaGoc * soLuong;

    // 5. Định dạng tiền có dấu chấm
    let tienDinhDang = ketQua.toLocaleString('vi-VN') + "đ";

    // 6. Đưa kết quả vào các thẻ HTML tương ứng
    document.getElementById('tien-tam-tinh').innerText = tienDinhDang;
    document.getElementById('tien-phu').innerText = tienDinhDang;
    document.getElementById('tien-tong-cuoi').innerText = tienDinhDang;
}