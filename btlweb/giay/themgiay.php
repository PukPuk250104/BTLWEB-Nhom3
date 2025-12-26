<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Giày Mới</title>
    <style>
        main{ width: 60%; margin: auto; font-family: Arial, sans-serif; }
        div { margin-bottom: 15px; }
        p { font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="number"], select { width: 100%; padding: 8px; box-sizing: border-box; }
    </style>
</head>
<body>
    <main>
        <h1>Thêm giày mới</h1>
        <form action="admin.php?page_layout=themgiay" method="post" enctype="multipart/form-data">
            
            <div>
                <p>Mã sản phẩm</p>
                <input name="ma_sp" type="text" required>
            </div>

            <div>
                <p>Loại sản phẩm</p>
                <select name="loai_sp_id" required>
                    <option value="">-- Chọn loại sản phẩm --</option>
                    <?php
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
                        $sqlTH = "SELECT * FROM thuong_hieu";
                        $resultTH = mysqli_query($conn, $sqlTH);
                        while($rowTH = mysqli_fetch_array($resultTH)){
                            echo "<option value='{$rowTH['id']}'>{$rowTH['ten_thuong_hieu']}</option>"; 
                        }
                    ?>
                </select>
            </div>

            <div>
                <p>Tiêu đề (Title)</p>
                <select name="title_id" required>
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
                <p>Size</p>
                <select name="size_id" required>
                    <option value="">-- Chọn Size --</option>
                    <?php
                        $sqlSize = "SELECT * FROM size";
                        $resultSize = mysqli_query($conn, $sqlSize);
                        while($rowSize = mysqli_fetch_array($resultSize)){
                            echo "<option value='{$rowSize['id']}'>{$rowSize['size']}</option>";
                        }
                    ?>
                </select>
            </div>

            <div><p>Tình trạng</p><input name="tinh_trang" type="text"></div>
            <div><p>Chất liệu đế</p><input name="chat_lieu_de" type="text"></div>
            <div><p>Chức năng</p><input name="chuc_nang" type="text"></div>
            <div><p>Loại đế</p><input name="loai_de" type="text"></div>
            <div><p>Độ cao đế giày</p><input name="do_cao_de_giay" type="text"></div>
            <div><p>Kiểu mũi giày</p><input name="kieu_mui_giay" type="text"></div>
            <div><p>Ứng dụng</p><input name="ung_dung" type="text"></div>
            <div><p>Mặt sân phù hợp</p><input name="mat_san_phu_hop" type="text"></div>

            <div>
                <p>Giá (Price)</p>
                <input name="price" type="number" required>
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
    if(isset($_POST['btn_submit'])){
        if(!empty($_POST['ma_sp']) && !empty($_POST['price'])){

            $maSp = $_POST['ma_sp'];
            $loaiSpId = $_POST['loai_sp_id'];
            $thuongHieuId = $_POST['thuong_hieu_id'];
            $titleId = $_POST['title_id'];
            $sizeId = $_POST['size_id'];
            $tinhTrang = $_POST['tinh_trang'];
            $chatLieuDe = $_POST['chat_lieu_de'];
            $chucNang = $_POST['chuc_nang'];
            $loaiDe = $_POST['loai_de'];
            $doCaoDe = $_POST['do_cao_de_giay'];
            $kieuMui = $_POST['kieu_mui_giay'];
            $ungDung = $_POST['ung_dung'];
            $matSan = $_POST['mat_san_phu_hop'];
            $price = $_POST['price'];
            $moTa = $_POST['mo_ta'];

            // XỬ LÝ ẢNH
            $target_dir = "../giay/uploads/"; // Đường dẫn folder ảnh
            $target_file = basename($_FILES["fileToUpload"]["name"]);
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $target_file);

            // CÂU LỆNH INSERT (Khớp 17 cột)
            $sql = "INSERT INTO `giay` 
                    (`ma_sp`, `loai_sp_id`, `thuong_hieu_id`, `title_id`, `pic`, `size_id`, `mo_ta`, 
                    `tinh_trang`, `chat_lieu_de`, `chuc_nang`, `loai_de`, `do_cao_de_giay`, `kieu_mui_giay`, `ung_dung`, `mat_san_phu_hop`, `price`)

                    VALUES 
                    ('$maSp', '$loaiSpId', '$thuongHieuId', '$titleId', '$target_file', '$sizeId', '$moTa', 
                    '$tinhTrang', '$chatLieuDe', '$chucNang', '$loaiDe', '$doCaoDe', '$kieuMui', '$ungDung', '$matSan', '$price')";
            
            if(mysqli_query($conn, $sql)){
                echo '<script>alert("Thêm thành công!"); window.location.href = "admin.php?page_layout=giay";</script>';
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        } else {
            echo "Vui lòng nhập đủ thông tin quan trọng.";
        }
    }
?>
    </main>
</body>
</html>