<?php
// 1. LẤY ID VÀ LOẠI SẢN PHẨM TỪ URL
if (isset($_GET['id']) && isset($_GET['loai'])) {
    $id = $_GET['id'];
    $loai = $_GET['loai'];

    // 2. XÁC ĐỊNH BẢNG DỮ LIỆU
    switch ($loai) {
        case 'giay': $table = 'giay'; $ten_loai = "Giày bóng rổ"; break;
        case 'quanao': $table = 'quan_ao'; $ten_loai = "Quần áo bóng rổ"; break;
        case 'bong': $table = 'bong_ro'; $ten_loai = "Quả bóng rổ"; break;
        case 'balo': $table = 'balo'; $ten_loai = "Balo bóng rổ"; break;
        case 'phukien': $table = 'phu_kien'; $ten_loai = "Phụ kiện"; break;
        default: $table = 'giay'; $ten_loai = "Sản phẩm"; break;
    }

    // 3. TRUY VẤN CSDL
    // Lưu ý: Đảm bảo biến $conn đã được include từ trangchu.php
    $sql = "SELECT * FROM $table WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    // Kiểm tra sản phẩm có tồn tại không
    if ($product) {
        $ten_sp = $product['title_id'];
        $gia_sp = $product['price'];
        $mo_ta = isset($product['infor']) ? $product['infor'] : "Đang cập nhật...";
        
        // Xử lý ảnh (Xóa ../ nếu có để đường dẫn đúng)
        $anh_goc = $product['pic'];
        $anh_sp = "/BTLWEB/admin/" . str_replace('../', '', $anh_goc);
    } else {
        echo "Sản phẩm không tồn tại!"; exit();
    }
} else {
    echo "Thiếu thông tin sản phẩm!"; exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết: <?php echo $ten_sp; ?></title>
    <link rel="stylesheet" href="/BTLWEB/chitietsp/code/muahang.css">
</head>
<body>
        <div class="top-main">
            <div class="danhmuc">
                <a href="trangchu.php?page_layout=trangchu">Trang chủ</a> / 
                <a href="#"> <?php echo $ten_loai; ?></a> / 
                <b> <?php echo $ten_sp; ?></b>
            </div>
        </div>
        
        <div class="product">
            <div class="product-left">
                <div class="product-pic">
                    <img src="<?php echo $anh_sp; ?>" alt="<?php echo $ten_sp; ?>">
                </div>
                
            </div>

            <div class="product-right">
                <div class="infor">
                    <p><?php echo $ten_sp; ?></p>
                </div>
                <div class="is-divider small"></div>
                
                <div class="price"><?php echo number_format($gia_sp, 0, ',', '.'); ?> VND</div>

                <div class="size-guide">
                    <div class="title-size">Size / Kích cỡ</div>
                    <div class="guide"><a href="#"><u>(Hướng dẫn chọn size)</u></a></div>
                </div>

                <div class="size">
                    <ul id="sizeList">
                        <?php if($loai == 'quanao' || $loai == 'giay'): ?>
                            <li onclick="chonSize(this)">S</li>
                            <li onclick="chonSize(this)">M</li>
                            <li onclick="chonSize(this)">L</li>
                            <li onclick="chonSize(this)">XL</li>
                            <li onclick="chonSize(this)">2XL</li>
                        <?php else: ?>
                            <li class="selected">Freesize</li>
                        <?php endif; ?>
                    </ul>
                    <input type="hidden" id="selectedSize" value="<?php echo ($loai == 'quanao' || $loai == 'giay') ? '' : 'Freesize'; ?>">
                </div>

                <div class="quantity-cart">
                    <div class="quantity-box">
                        <button class="qty-btn" onclick="giamSoLuong()">−</button>
                        <input type="text" id="quantity" value="1" readonly>
                        <button class="qty-btn" onclick="tangSoLuong()">+</button>
                    </div>
                    
                    <a href="javascript:void(0)" onclick="muaNgay()" class="add-cart-btn" style="text-decoration: none; text-align: center; line-height: 40px; display: inline-block;">
                        Mua Ngay
                    </a>
                </div>

                <div class="support-buttons">
                    <button class="support-zalo">
                        <p>Tư vấn qua</p> <img src="../images/logo-zalo.png" alt="Zalo">
                    </button>
                    <button class="support-facebook">
                        <p>Tư vấn qua</p> <img src="../images/logo-fb.png" alt="Facebook">
                    </button>
                </div>
            </div>
        </div>

        <div class="detail-product">
            <div class="title-detail">Chi tiết sản phẩm</div>
            <div class="detail">
                <div class="description">
                    <p><b>Mô tả:</b> <?php echo $mo_ta; ?></p>
                </div>
            </div>
        </div>

    <script>
        // 1. Tăng giảm số lượng
        function tangSoLuong() {
            var qty = document.getElementById('quantity');
            qty.value = parseInt(qty.value) + 1;
        }

        function giamSoLuong() {
            var qty = document.getElementById('quantity');
            if (parseInt(qty.value) > 1) {
                qty.value = parseInt(qty.value) - 1;
            }
        }

        // 2. Chọn Size (Hiệu ứng viền đen)
        function chonSize(element) {
            // Xóa class selected ở các thẻ li khác
            var items = document.querySelectorAll('#sizeList li');
            items.forEach(function(item) {
                item.style.border = "1px solid #ddd";
                item.style.backgroundColor = "white";
            });
            
            // Thêm style cho thẻ được chọn
            element.style.border = "2px solid black";
            
            // Lưu giá trị vào input ẩn
            document.getElementById('selectedSize').value = element.innerText;
        }

        // 3. Chức năng Mua Ngay (Chuyển hướng sang trang thanhtoan)
        function muaNgay() {
            var size = document.getElementById('selectedSize').value;
            var qty = document.getElementById('quantity').value;
            var id = "<?php echo $id; ?>";
            var loai = "<?php echo $loai; ?>";

            if (size === "") {
                alert("Vui lòng chọn Size trước khi mua!");
                return;
            }

            // Chuyển hướng sang trang thanh toán kèm các tham số
            // Lưu ý: Trang thanhtoan.php của bạn cần sửa một chút để nhận thêm tham số &sl (số lượng) và &size nếu muốn hoàn hảo
            window.location.href = "trangchu.php?page_layout=donhang&id=" + id + "&loai=" + loai + "&size=" + size + "&sl=" + qty;
        }
    </script>
</body>
</html>