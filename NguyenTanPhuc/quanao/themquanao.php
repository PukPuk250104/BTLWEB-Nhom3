<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Quần Áo Mới</title>
    <style>
        main{
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
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <main>
        <h1>Thêm Quần Áo Mới</h1>
        <form action="admin.php?page_layout=themquanao" method="post" enctype="multipart/form-data">
            
            <div>
                <p>Mã sản phẩm</p>
                <input name="ma_sp" type="text" required>
            </div>

            <div>
                <p>Loại sản phẩm</p>
                <select name="loai_sp_id" required>
                    <option value="">-- Chọn loại sản phẩm --</option>
                    <?php
                        // Giả sử tên bảng là loai_sp và cột hiển thị là ten_loai_sp
                        $sqlLoai = "SELECT * FROM loai_sp";
                        $resultLoai = mysqli_query($conn, $sqlLoai);
                        while($rowLoai = mysqli_fetch_array($resultLoai)){
                            echo "<option value='{$rowLoai['id']}'>{$rowLoai['ten_loai_sp']}</option>";
                        }
                    ?>
                </select>
            </div>

            <div>
                <p>Thương hiệu</p>
                <select name="thuong_hieu_id" required>
                    <option value="">-- Chọn thương hiệu --</option>
                    <?php
                        // Giả sử bạn có bảng thuong_hieu
                        $sqlTH = "SELECT * FROM thuong_hieu";
                        $resultTH = mysqli_query($conn, $sqlTH);
                        while($rowTH = mysqli_fetch_array($resultTH)){
                            // Bạn cần thay 'ten_thuong_hieu' bằng tên cột thực tế trong bảng thuong_hieu
                            echo "<option value='{$rowTH['id']}'>{$rowTH['ten_thuong_hieu']}</option>"; 
                        }
                    ?>
                </select>
            </div>

            <div>
                <p>Size</p>
                <select name="size_id" required>
                    <option value="">-- Chọn Size --</option>
                    <?php
                        // Giả sử bạn có bảng size
                        $sqlSize = "SELECT * FROM size ";
                        $resultSize = mysqli_query($conn, $sqlSize);
                        while($rowSize = mysqli_fetch_array($resultSize)){
                            // Thay 'ten_size' bằng cột thực tế (ví dụ: size_number, size_text...)
                            echo "<option value='{$rowSize['id']}'>{$rowSize['size']}</option>";
                        }
                    ?>
                </select>
            </div>

            <div>
                <p>Giá (Price)</p>
                <input name="price" type="number" required>
            </div>

            <div>
                <p>Màu sắc (Color)</p>
                <input name="color" type="text">
            </div>

            <div>
                <p>Chất liệu</p>
                <input name="chat_lieu" type="text">
            </div>

            <div>
                <p>Form dáng</p>
                <input name="form_dang" type="text">
            </div>

            <div>
                <p>Độ đàn hồi</p>
                <input name="do_dan_hoi" type="text">
            </div>

            <div>
                <p>Độ thoáng khí</p>
                <input name="do_thoang_khi" type="text">
            </div>
             <div>
                <p>Tiêu đề</p>
                <select name="title" required>
                    <option value="">-- Chọn title --</option>
                    <?php
                        $sqltitle = "SELECT * FROM title";
                        $resulttitle = mysqli_query($conn, $sqltitle);
                        while($rowtitle = mysqli_fetch_array($resulttitle)){
                            echo "<option value='{$rowtitle['id']}'>{$rowtitle['title']}</option>";
                        }
                    ?>
                </select>
            </div>           
            <div>
                <p>Thông tin ngắn (Infor)</p>
                <input name="infor" type="text">
            </div>

             <div>
                <p>Mô tả chi tiết</p>
                <textarea name="mo_ta" rows="5" style="width:100%"></textarea>
            </div>

            <div>
                <p>Ảnh sản phẩm (Pic)</p>
                <input type="file" name="fileToUpload" id="fileToUpload" required>
            </div>

            <br>
            <div>
                <input type="submit" name="btn_submit" value="Thêm Sản Phẩm">
            </div>
        </form>

        <?php
    // Kiểm tra xem người dùng đã nhập đủ các thông tin quan trọng chưa
    if( !empty($_POST['ma_sp']) && 
        !empty($_POST['loai_sp_id']) &&
        !empty($_POST['thuong_hieu_id']) &&
        !empty($_POST['size_id']) &&
        !empty($_POST['price']) &&
        !empty($_POST['color']) &&
        !empty($_POST['chat_lieu']) &&
        !empty($_POST['form_dang']) &&
        !empty($_POST['do_dan_hoi']) &&
        !empty($_POST['do_thoang_khi']) &&
        !empty($_POST['title']) &&
        !empty($_POST['infor']) &&
        !empty($_POST['mo_ta']) ){

            $maSp = $_POST['ma_sp'];
            $loaiSpId = $_POST['loai_sp_id'];
            $thuongHieuId = $_POST['thuong_hieu_id'];
            $sizeId = $_POST['size_id'];
            $price = $_POST['price'];
            $color = $_POST['color'];
            $chatLieu = $_POST['chat_lieu'];
            $formDang = $_POST['form_dang'];
            $doDanHoi = $_POST['do_dan_hoi'];
            $doThoangKhi = $_POST['do_thoang_khi'];
            $title = $_POST['title'];
            $infor = $_POST['infor'];
            $moTa = $_POST['mo_ta'];

            echo "1"; 

            // --- BẮT ĐẦU XỬ LÝ ẢNH ---
            $target_dir = "../quanao/uploads/";
            // Thêm time() để tránh trùng tên file nếu file đã tồn tại
            $target_file = $target_dir . time() . "_" . basename($_FILES["fileToUpload"]["name"]);
            
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            // 1. Kiểm tra file có phải là ảnh thật không
            if(isset($_POST["btn_submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
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
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "webp") {
                echo "Chỉ những file JPG, JPEG, PNG, GIF & WEBP mới được chấp nhận.";
                $uploadOk = 0;
            }
            
            echo "3";

            // --- KẾT THÚC KIỂM TRA, BẮT ĐẦU UPLOAD ---
            if($uploadOk == 0){
                echo "File của bạn chưa được tải lên";
            }
            else{
                // Nếu uploadOk = 1 hoặc = 2 (tồn tại) thì vẫn thực hiện upload
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    
                    echo '<h2>Sản phẩm đã được tải lên:</h2>';
                    echo '<img src="' . $target_file . '" style="max-width: 200px; height: auto; border: 2px solid green;">';
                    echo '<p>Đang chuyển hướng sau 3 giây...</p>';
                    
                    // Câu lệnh INSERT cho bảng quan_ao
                    $sql = "INSERT INTO `quan_ao` 
                        (`loai_sp_id`,`ma_sp`, `thuong_hieu_id`, `size_id`, `color`,`mo_ta`,`chat_lieu`,  
                         `do_dan_hoi`, `do_thoang_khi`,`form_dang`,`price`, `title_id`, `pic`, `infor`) 
                        VALUES 
                        ('$loaiSpId','$maSp', '$thuongHieuId', '$sizeId','$color', '$moTa','$chatLieu',
                          '$doDanHoi', '$doThoangKhi','$formDang','$price', 
                          '$title','$target_file', '$infor')";
                    
                    // In ra SQL để kiểm tra (có thể xóa sau khi chạy xong)
                    echo $sql; 
                    
                    mysqli_query($conn, $sql);

                    // Chuyển hướng về trang quản lý quần áo
                    echo '<script>window.location.href = "admin.php?page_layout=quanlyquanao";</script>';
                    
                }   
            }

    }
    else{
        echo " Vui lòng nhập đủ thông tin ";
    }
?>
    </main>
</body>
</html>
