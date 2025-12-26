<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Quần Áo Mới</title>
    <style>
        main {
            width: 60%;
            margin: auto;
            font-family: Arial, sans-serif;
        }

        div {
            margin-bottom: 15px;
        }

        p {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <main>
        <h1>Sửa Đơn Hàng</h1>
        <form action="admin.php?page_layout=themdonhang" method="post" enctype="multipart/form-data">

            <div>
                <p>Họ Tên</p>
                <input name="ho_ten" type="text" >
            </div>

            <div>
                <p>Số Điện Thoại</p>
                <select name="so_dien_thoai" type="number">
                </select>
            </div>

            <div>
                <p>Email</p>
                <select name="email" type="text"x>
                </select>
            </div>

            <div>
                <p>Địa Chỉ</p>
                <select name="dia_chi" type="text" >
                </select>
            </div>

            <div>
                <p>Ghi Chú</p>
                <input name="ghi_chu" type="text" >
            </div>

            <div>
                <p>Tên Sản Phẩm</p>
                <input name="ten_san_pham" type="text">
            </div>

            <div>
                <p>Ảnh Sản Phẩm</p>
                <input name="anh_san_pham " type="file">
            </div>

            <div>
                <p>Size</p>
                <input name="size" type="text">
            </div>

            <div>
                <p>Sô Lượng</p>
                <input name="so_luong" type="text">
            </div>

            <div>
                <p>Đơn Giá</p>
                <input name="don_gia" type="text">
            </div>
            <div>
                <p>Tổng Tiền</p>
                <select name="tong_tien" type="number">
                </select>
            </div>
            <div>
                <p>Hình Thức Thanh Toán</p>
                <input name="hinh_thuc_thanh_toan" type="text">
            </div>

            <div>
                <p>Ngày Đặt</p>
                <input name="ngay_dat" type="date">
            </div>

            <div>
                <p>Trạng Thái</p>
                <input name="trang_thai" type="text">
            </div>

            <br>
            <div>
                <input type="submit" name="btn_submit" value="Thêm Đơn Hàng">
            </div>
        </form>

        <?php
        // Kiểm tra xem người dùng đã nhập đủ các thông tin quan trọng chưa
        if (
            !empty($_POST['ho_ten']) &&
            !empty($_POST['so_dien_thoai']) &&
            !empty($_POST['email']) &&
            !empty($_POST['dia_chi']) &&
            !empty($_POST['ghi_chu']) &&
            !empty($_POST['ten_san_pham']) &&
            !empty($_POST['anh_san_pham']) &&
            !empty($_POST['size']) &&
            !empty($_POST['so_luong']) &&
            !empty($_POST['don_gia']) &&
            !empty($_POST['tong_tien']) &&
            !empty($_POST['hinh_thuc_thanh_toan']) &&
            !empty($_POST['ngay_dat']) &&
            !empty($_POST['trang_thai'])
        ) {

            $hoTen = $_POST['ho_ten'];
            $soDienThoai = $_POST['so_dien_thoai'];
            $email = $_POST['email'];
            $diaChi = $_POST['dia_chi'];
            $ghiChu = $_POST['ghi_chu'];
            $tenSanPham = $_POST['ten_san_pham'];
            $anhSanPham = $_POST['anh_san_pham'];
            $size = $_POST['size'];
            $soLuong = $_POST['so_luong'];
            $donGia = $_POST['don_gia'];
            $tongTien = $_POST['tong_tien'];
            $hinhThucThanhToan = $_POST['hinh_thuc_thanh_toan'];
            $ngayDat = $_POST['ngay_dat'];
            echo "1";

            // --- BẮT ĐẦU XỬ LÝ ẢNH ---
            $target_dir = "../bongro/uploads/";
            // Thêm time() để tránh trùng tên file nếu file đã tồn tại
            $target_file = $target_dir . time() . "_" . basename($_FILES["fileToUpload"]["name"]);

            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // 1. Kiểm tra file có phải là ảnh thật không
            if (isset($_POST["btn_submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File không phải là ảnh.";
                    $uploadOk = 0;
                }
            }

            // 2. Kiểm tra nếu file đã tồn tại
            if (file_exists($target_file)) {
                echo "File này đã tồn tại trên hệ thống";
                $uploadOk = 2; // Mã 2: Đã tồn tại (vẫn cho phép ghi đè ở logic dưới)
            }

            // 3. Kiểm tra kích thước file (ví dụ 5MB)
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
                echo "File quá lớn";
                $uploadOk = 0;
            }

            // 4. Cho phép các định dạng file (Thêm WEBP vào đây)
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" && $imageFileType != "webp"
            ) {
                echo "Chỉ những file JPG, JPEG, PNG, GIF & WEBP mới được chấp nhận.";
                $uploadOk = 0;
            }

            echo "3";

            // --- KẾT THÚC KIỂM TRA, BẮT ĐẦU UPLOAD ---
            if ($uploadOk == 0) {
                echo "File của bạn chưa được tải lên";
            } else {
                // Nếu uploadOk = 1 hoặc = 2 (tồn tại) thì vẫn thực hiện upload
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    echo '<h2>Sản phẩm đã được tải lên:</h2>';
                    echo '<img src="' . $target_file . '" style="max-width: 200px; height: auto; border: 2px solid green;">';
                    echo '<p>Đang chuyển hướng sau 3 giây...</p>';

                    // Câu lệnh INSERT cho bảng quan_ao
                    $sql = "UPDATE `don_hang` SET `ho_ten`='$hoTen',`so_dien_thoai`='$soDienThoai', `email`='$email',`dia_chi`='$diaChi',`ghi_chu`='$ghiChu',
                    `ten_san_pham`='$tenSanPham',`size`='$size',`so_luong`='$soLuong',`don_gia`='$donGia',`tong_tien`='$tongTien',`hinh_thuc_thanh_toan`='$hinhThucThanhToan',`ngay_dat`='ngayDat',`trang_thai`='$trangThai' WHERE id = $id";
                    // In ra SQL để kiểm tra (có thể xóa sau khi chạy xong)
                    echo $sql;

                    mysqli_query($conn, $sql);

                    // Chuyển hướng về trang quản lý quần áo
                    echo '<script>window.location.href = "admin.php?page_layout=quanlydonghang";</script>';

                }
            }

        } else {
            echo " Vui lòng nhập đủ thông tin ";
        }
        ?>
    </main>
</body>

</html>