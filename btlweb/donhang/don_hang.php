<?php
// 1. NHẬN DỮ LIỆU TỪ TRANG CHI TIẾT
if (isset($_GET['id']) && isset($_GET['loai'])) {
    $id = $_GET['id'];
    $loai = $_GET['loai'];
    $size = isset($_GET['size']) ? $_GET['size'] : 'Freesize';
    $sl = isset($_GET['sl']) ? $_GET['sl'] : 1;

    // 2. KẾT NỐI CSDL ĐỂ LẤY TÊN VÀ GIÁ (Không tin tưởng giá từ URL)
    switch ($loai) {
        case 'giay': $table = 'giay'; break;
        case 'quanao': $table = 'quan_ao'; break;
        case 'bong': $table = 'bong_ro'; break;
        case 'balo': $table = 'balo'; break;
        case 'phukien': $table = 'phu_kien'; break;
        default: $table = 'giay'; break;
    }

    $sql = "SELECT * FROM $table WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    if ($product) {
        $ten_sp = $product['title_id'];
        $gia_sp = $product['price'];
        $anh_sp = "/BTLWEB/admin/" . str_replace('../', '', $product['pic']);
        $tong_tien = $gia_sp * $sl;
    } else {
        echo "Sản phẩm không tồn tại"; exit();
    }
} else {
    echo "Giỏ hàng trống"; exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đơn Hàng</title>
    <link rel="stylesheet" href="/BTLWEB/donhang/style.css">
</head>
<body>

    <div class="khung-ngoai" style="margin-top: 50px;">
        <h1 class="tieu-de-trang">GIỎ HÀNG CỦA BẠN</h1>

        <div class="bo-cuc-chinh">
            <div class="cot-trai">
                <div class="thanh-tieu-de">
                    <div class="cot-ten">SẢN PHẨM</div>
                    <div class="cot-gia">GIÁ</div>
                    <div class="cot-so-luong">SỐ LƯỢNG</div>
                    <div class="cot-tam-tinh">TẠM TÍNH</div>
                </div>

                <div class="dong-san-pham">
                    <div class="cot-ten">
                        <a href="trangchu.php" class="nut-xoa" style="text-decoration:none; color:black;">×</a>
                        <img src="<?php echo $anh_sp; ?>" class="anh-san-pham">
                        <div style="display:flex; flex-direction:column; margin-left: 10px;">
                            <a href="#" class="link-san-pham"><?php echo $ten_sp; ?></a>
                            <span style="font-size: 13px; color: gray;">Size: <?php echo $size; ?></span>
                        </div>
                    </div>
                    <div class="cot-gia" id="gia-goc" data-price="<?php echo $gia_sp; ?>">
                        <?php echo number_format($gia_sp, 0, ',', '.'); ?>đ
                    </div>
                    <div class="cot-so-luong">
                        <input type="number" value="<?php echo $sl; ?>" min="1" class="o-nhap-so-luong" id="o-so-luong" onchange="capNhatGia()">
                    </div>
                    <div class="cot-tam-tinh" id="tien-tam-tinh">
                        <?php echo number_format($tong_tien, 0, ',', '.'); ?>đ
                    </div>
                </div>

                <div class="nhom-nut-bam">
                    <a href="trangchu.php" class="nut-bam nut-quay-lai" style="text-decoration:none;">← Tiếp tục xem sản phẩm</a>
                </div>
            </div>

            <div class="cot-phai">
                <h3 class="tieu-de-phu">TỔNG CỘNG ĐƠN HÀNG</h3>
                <div class="dong-thong-tin">
                    <span>Tạm tính</span>
                    <span id="tien-phu"><?php echo number_format($tong_tien, 0, ',', '.'); ?>đ</span>
                </div>
                <div class="dong-thong-tin">
                    <span>Vận chuyển</span>
                    <small>Miễn phí vận chuyển</small>
                </div>
                <div class="dong-thong-tin tong-cong">
                    <span>Tổng</span>
                    <span id="tien-tong-cuoi"><?php echo number_format($tong_tien, 0, ',', '.'); ?>đ</span>
                </div>
                
                <a id="btn-thanh-toan" href="#" class="nut-thanh-toan" style="display:block; text-align:center; text-decoration:none; margin-top:15px;">
                    Tiến hành thanh toán
                </a>
            </div>
        </div>
    </div>

    <script>
        // Hàm cập nhật giá và link khi đổi số lượng
        function capNhatGia() {
            var soLuong = document.getElementById('o-so-luong').value;
            var giaGoc = document.getElementById('gia-goc').getAttribute('data-price');
            
            // Tính tổng mới
            var tongTien = soLuong * giaGoc;
            
            // Format tiền tệ (VD: 1.000.000đ)
            var tienFormat = new Intl.NumberFormat('vi-VN').format(tongTien) + 'đ';

            // Cập nhật giao diện
            document.getElementById('tien-tam-tinh').innerText = tienFormat;
            document.getElementById('tien-phu').innerText = tienFormat;
            document.getElementById('tien-tong-cuoi').innerText = tienFormat;

            // CẬP NHẬT LINK SANG TRANG THANH TOÁN
            var id = "<?php echo $id; ?>";
            var loai = "<?php echo $loai; ?>";
            var size = "<?php echo $size; ?>";
            
            var linkMoi = "trangchu.php?page_layout=thanhtoan&id=" + id + "&loai=" + loai + "&size=" + size + "&sl=" + soLuong;
            document.getElementById('btn-thanh-toan').href = linkMoi;
        }

        // Chạy 1 lần khi tải trang để gán link ban đầu
        capNhatGia();
    </script>
</body>
</html>