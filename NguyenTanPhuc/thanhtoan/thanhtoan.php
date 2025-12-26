<link rel="stylesheet" href="/BTLWEB/thanhtoan/thanhtoan.css">

<?php
// =======================================================================
// PHẦN 1: XỬ LÝ LƯU ĐƠN HÀNG (KHI NGƯỜI DÙNG BẤM NÚT "ĐẶT HÀNG NGAY")
// =======================================================================
if (isset($_POST['btn_buynow'])) {
    // 1. Nhận thông tin KHÁCH HÀNG
    $ho_ten = $_POST['ho_ten'];
    $sdt = $_POST['so_dien_thoai'];
    $email = $_POST['email'];
    $dia_chi = $_POST['dia_chi'];
    $ghi_chu = $_POST['ghi_chu'];
    $pt_tt = $_POST['payment_method'];

    // 2. Nhận thông tin SẢN PHẨM (từ input hidden)
    $ten_sp = $_POST['ten_san_pham'];
    $anh_sp = $_POST['anh_san_pham'];
    $gia = $_POST['don_gia'];
    
    // --- SỬA: Lấy size và số lượng từ form (do trang trước truyền sang) ---
    $size = isset($_POST['size']) ? $_POST['size'] : 'Freesize';
    $so_luong = isset($_POST['so_luong']) ? $_POST['so_luong'] : 1; 
    
    // Tính tổng tiền
    $tong_tien = $gia * $so_luong;

    // 3. Insert vào Database
    $sql_insert = "INSERT INTO don_hang 
            (ho_ten, so_dien_thoai, email, dia_chi, ghi_chu, 
             ten_san_pham, anh_san_pham, size, so_luong, don_gia, tong_tien, hinh_thuc_thanh_toan)
            VALUES 
            ('$ho_ten', '$sdt', '$email', '$dia_chi', '$ghi_chu', 
             '$ten_sp', '$anh_sp', '$size', '$so_luong', '$gia', '$tong_tien', '$pt_tt')";

    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>
                alert('Đặt hàng thành công! Cảm ơn bạn đã mua hàng.');
                window.location.href='trangchu.php';
              </script>";
        exit(); // Dừng trang web để chuyển hướng
    } else {
        echo "<script>alert('Lỗi hệ thống: " . mysqli_error($conn) . "');</script>";
    }
}

// =======================================================================
// PHẦN 2: LẤY THÔNG TIN SẢN PHẨM ĐỂ HIỂN THỊ (KHI MỚI VÀO TRANG)
// =======================================================================
if (isset($_GET['id']) && isset($_GET['loai'])) {
    $id_sp = $_GET['id'];
    $loai_bang = $_GET['loai']; 

    // --- SỬA: Nhận Size và Số lượng từ URL (do trang don_hang gửi sang) ---
    $size_url = isset($_GET['size']) ? $_GET['size'] : 'Freesize';
    $sl_url = isset($_GET['sl']) ? $_GET['sl'] : 1;

    // CHỌN ĐÚNG BẢNG DỮ LIỆU
    switch ($loai_bang) {
        case 'giay': $table = 'giay'; break;
        case 'quanao': $table = 'quan_ao'; break;
        case 'bong': $table = 'bong_ro'; break;
        case 'balo': $table = 'balo'; break;
        case 'phukien': $table = 'phu_kien'; break;
        default: $table = 'giay'; break;
    }

    // Truy vấn lấy thông tin sản phẩm
    $sql_get = "SELECT * FROM $table WHERE id = $id_sp";
    $result = mysqli_query($conn, $sql_get);
    $product = mysqli_fetch_array($result);

    if ($product) {
        $ten_sp_show = $product['title_id'];
        $gia_sp_show = $product['price'];
        
        // --- SỬA: Tính tổng tiền hiển thị ---
        $tong_tien_show = $gia_sp_show * $sl_url; 
        
        // Xử lý đường dẫn ảnh
        $anh_tho = $product['pic'];
        $anh_sp_show = "/BTLWEB/admin/" . str_replace('../', '', $anh_tho);
    } else {
        echo "<div style='padding:50px; text-align:center;'><h3>Sản phẩm không tồn tại!</h3></div>"; exit();
    }
} else {
    echo "<script>window.location.href='trangchu.php';</script>"; exit();
}
?>

<div class="checkout-container">
    <div class="billing-details">
        <h3>Thông tin giao hàng</h3>
        
        <form action="" method="POST">
            
            <div class="form-group"><label>Họ tên người nhận *</label><input type="text" name="ho_ten" class="form-control" placeholder="Nguyễn Văn A" required></div>
            <div class="form-group"><label>Số điện thoại *</label><input type="text" name="so_dien_thoai" class="form-control" placeholder="09xxxxxxx" required></div>
            <div class="form-group"><label>Email *</label><input type="email" name="email" class="form-control" placeholder="email@example.com" required></div>
            <div class="form-group"><label>Địa chỉ nhận hàng *</label><input type="text" name="dia_chi" class="form-control" placeholder="Số nhà, Đường, Quận/Huyện, Tỉnh/TP" required></div>
            <div class="form-group"><label>Ghi chú đơn hàng</label><textarea name="ghi_chu" class="form-control" rows="2" placeholder="Ví dụ: Giao hàng giờ hành chính..."></textarea></div>

            <input type="hidden" name="ten_san_pham" value="<?php echo $ten_sp_show; ?>">
            <input type="hidden" name="anh_san_pham" value="<?php echo $anh_sp_show; ?>">
            <input type="hidden" name="don_gia" value="<?php echo $gia_sp_show; ?>">
            
            <input type="hidden" name="so_luong" value="<?php echo $sl_url; ?>">
            <input type="hidden" name="size" value="<?php echo $size_url; ?>"> 
            
            <div class="form-group">
                <label>Kích thước đã chọn:</label>
                <input type="text" class="form-control" value="<?php echo $size_url; ?>" disabled style="background-color: #eee;">
            </div>

    </div>

    <div class="order-summary">
        <h3>Sản phẩm đặt mua</h3>
        <div class="order-item">
            <img src="<?php echo $anh_sp_show; ?>" style="width: 70px; height: 70px; object-fit: cover; border: 1px solid #ddd; border-radius: 5px;">
            <div>
                <div style="font-weight: bold; font-size: 15px; margin-bottom: 5px;"><?php echo $ten_sp_show; ?></div>
                <div style="color: #d93025; font-weight: bold;"><?php echo number_format($gia_sp_show, 0, ',', '.'); ?>₫</div>
                
                <div style="font-size: 13px; color: gray;">Số lượng: <?php echo $sl_url; ?></div>
                <div style="font-size: 13px; color: gray;">Size: <?php echo $size_url; ?></div>
            </div>
        </div>

        <div class="order-total">
            <span>Tổng thanh toán:</span>
            <span style="color: #d93025; font-size: 20px;"><?php echo number_format($tong_tien_show, 0, ',', '.'); ?>₫</span>
        </div>

        <div class="payment-methods">
            <div style="margin-bottom: 10px;">
                <input type="radio" id="cod" name="payment_method" value="Thanh toán khi nhận hàng (COD)" checked>
                <label for="cod">Thanh toán khi nhận hàng (COD)</label>
            </div>
            <div>
                <input type="radio" id="ck" name="payment_method" value="Chuyển khoản">
                <label for="ck">Chuyển khoản ngân hàng</label>
            </div>
        </div>

        <button type="submit" name="btn_buynow" class="btn-order">ĐẶT HÀNG NGAY</button>
        </form>
    </div>
</div>