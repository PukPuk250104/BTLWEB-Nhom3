<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Giày</title>
    <style>
        main{ width: 60%; margin: auto; font-family: Arial, sans-serif; }
        div { margin-bottom: 15px; }
        p { font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="number"], select { width: 100%; padding: 8px; box-sizing: border-box; }
    </style>
</head>
<body>
    <?php
        $id = $_GET['id'];
        // Lấy dữ liệu cũ của sản phẩm để hiển thị lên form
        $sql_old = "SELECT * FROM giay WHERE id = $id";
        $query_old = mysqli_query($conn, $sql_old);
        $row_old = mysqli_fetch_array($query_old);
    ?>
    <main>
        <h1>Sửa Giày</h1>
        <form action="admin.php?page_layout=suagiay&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
            
            <div>
                <p>Mã sản phẩm</p>
                <input name="ma_sp" type="text" value="<?php echo $row_old['ma_sp']; ?>" required>
            </div>

            <div>
                <p>Loại sản phẩm</p>
                <select name="loai_sp_id" required>
                    <?php
                        $sqlLoai = "SELECT * FROM loai_sp";
                        $resultLoai = mysqli_query($conn, $sqlLoai);
                        while($rowLoai = mysqli_fetch_array($resultLoai)){
                            $selected = ($rowLoai['id'] == $row_old['loai_sp_id']) ? "selected" : "";
                            echo "<option value='{$rowLoai['id']}' $selected>{$rowLoai['ten_loai_sp']}</option>";
                        }
                    ?>
                </select>
            </div>

            <div>
                <p>Thương hiệu</p>
                <select name="thuong_hieu_id" required>
                    <?php
                        $sqlTH = "SELECT * FROM thuong_hieu";
                        $resultTH = mysqli_query($conn, $sqlTH);
                        while($rowTH = mysqli_fetch_array($resultTH)){
                            $selected = ($rowTH['id'] == $row_old['thuong_hieu_id']) ? "selected" : "";
                            echo "<option value='{$rowTH['id']}' $selected>{$rowTH['ten_thuong_hieu']}</option>"; 
                        }
                    ?>
                </select>
            </div>

            <div>
                <p>Tiêu đề</p>
                <select name="title_id" required>
                    <?php
                        $sqltitle = "SELECT * FROM title";
                        $resulttitle = mysqli_query($conn, $sqltitle);
                        while($rowtitle = mysqli_fetch_array($resulttitle)){
                            $selected = ($rowtitle['id'] == $row_old['title_id']) ? "selected" : "";
                            echo "<option value='{$rowtitle['id']}' $selected>{$rowtitle['title']}</option>";
                        }
                    ?>
                </select>
            </div>

            <div>
                <p>Size</p>
                <select name="size_id" required>
                    <?php
                        $sqlSize = "SELECT * FROM size";
                        $resultSize = mysqli_query($conn, $sqlSize);
                        while($rowSize = mysqli_fetch_array($resultSize)){
                            $selected = ($rowSize['id'] == $row_old['size_id']) ? "selected" : "";
                            echo "<option value='{$rowSize['id']}' $selected>{$rowSize['size']}</option>";
                        }
                    ?>
                </select>
            </div>

            <div><p>Tình trạng</p><input name="tinh_trang" type="text" value="<?php echo $row_old['tinh_trang']; ?>"></div>
            <div><p>Chất liệu đế</p><input name="chat_lieu_de" type="text" value="<?php echo $row_old['chat_lieu_de']; ?>"></div>
            <div><p>Chức năng</p><input name="chuc_nang" type="text" value="<?php echo $row_old['chuc_nang']; ?>"></div>
            <div><p>Loại đế</p><input name="loai_de" type="text" value="<?php echo $row_old['loai_de']; ?>"></div>
            <div><p>Độ cao đế</p><input name="do_cao_de_giay" type="text" value="<?php echo $row_old['do_cao_de_giay']; ?>"></div>
            <div><p>Kiểu mũi giày</p><input name="kieu_mui_giay" type="text" value="<?php echo $row_old['kieu_mui_giay']; ?>"></div>
            <div><p>Ứng dụng</p><input name="ung_dung" type="text" value="<?php echo $row_old['ung_dung']; ?>"></div>
            <div><p>Mặt sân phù hợp</p><input name="mat_san_phu_hop" type="text" value="<?php echo $row_old['mat_san_phu_hop']; ?>"></div>

            <div>
                <p>Giá (Price)</p>
                <input name="price" type="number" value="<?php echo $row_old['price']; ?>" required>
            </div>

            <div>
                <p>Mô tả chi tiết</p>
                <textarea name="mo_ta" rows="5" style="width:100%"><?php echo $row_old['mo_ta']; ?></textarea>
            </div>

            <div>
                <p>Ảnh sản phẩm (Để trống nếu không muốn đổi ảnh)</p>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <br><br>
                <img src="img/<?php echo $row_old['pic']; ?>" width="100">
            </div>

            <div>
                <input type="submit" name="btn_submit" value="Cập Nhật Sản Phẩm">
            </div>
        </form>

        <?php
        if(isset($_POST['btn_submit'])){
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

            // Xử lý ảnh (Nếu người dùng chọn ảnh mới thì lấy ảnh mới, không thì giữ ảnh cũ)
            if($_FILES['fileToUpload']['name'] == ""){
                $pic = $row_old['pic'];
            } else {
                $pic = $_FILES['fileToUpload']['name'];
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "img/".$pic);
            }

            // Câu lệnh UPDATE khớp với database 17 cột
            $sql_update = "UPDATE `giay` SET 
                            `ma_sp` = '$maSp',
                            `loai_sp_id` = '$loaiSpId',
                            `thuong_hieu_id` = '$thuongHieuId',
                            `title_id` = '$titleId',
                            `pic` = '$pic',
                            `size_id` = '$sizeId',
                            `mo_ta` = '$moTa',
                            `tinh_trang` = '$tinhTrang',
                            `chat_lieu_de` = '$chatLieuDe',
                            `chuc_nang` = '$chucNang',
                            `loai_de` = '$loaiDe',
                            `do_cao_de_giay` = '$doCaoDe',
                            `kieu_mui_giay` = '$kieuMui',
                            `ung_dung` = '$ungDung',
                            `mat_san_phu_hop` = '$matSan',
                            `price` = '$price'
                          WHERE `id` = '$id'";

            if(mysqli_query($conn, $sql_update)){
                echo '<script>alert("Cập nhật thành công!"); window.location.href = "admin.php?page_layout=giay";</script>';
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        }
        ?>
    </main>
</body>
</html>