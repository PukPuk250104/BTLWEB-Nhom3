<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thêm Balo Mới</title>
<style>
    main{width:60%;margin:auto;font-family:Arial}
    div{margin-bottom:12px}
    p{font-weight:bold}
    input,select{width:100%;padding:8px}
</style>
</head>

<body>
<main>
<h1>Thêm Balo Mới</h1>

<form method="post" enctype="multipart/form-data">

<div>
    <p>Mã sản phẩm</p>
    <input name="ma_sp" required>
</div>

<div>
    <p>Loại sản phẩm</p>
    <select name="loai_sp_id" required>
        <option value="">-- Chọn loại --</option>
        <?php
        $q=mysqli_query($conn,"SELECT * FROM loai_sp");
        while($r=mysqli_fetch_assoc($q)){
            echo "<option value='{$r['id']}'>{$r['ten_loai']}</option>";
        }
        ?>
    </select>
</div>

<div>
    <p>Thương hiệu</p>
    <select name="thuong_hieu_id" required>
        <option value="">-- Chọn thương hiệu --</option>
        <?php
        $q=mysqli_query($conn,"SELECT * FROM thuong_hieu");
        while($r=mysqli_fetch_assoc($q)){
            echo "<option value='{$r['id']}'>{$r['ten_thuong_hieu']}</option>";
        }
        ?>
    </select>
</div>

<div>
    <p>Title</p>
    <select name="title_id" required>
        <option value="">-- Chọn title --</option>
        <?php
        $q=mysqli_query($conn,"SELECT * FROM title");
        while($r=mysqli_fetch_assoc($q)){
            echo "<option value='{$r['id']}'>{$r['ten_title']}</option>";
        }
        ?>
    </select>
</div>

<div>
    <p>Size</p>
    <select name="size_id" required>
        <option value="">-- Chọn size --</option>
        <?php
        $q=mysqli_query($conn,"SELECT * FROM size");
        while($r=mysqli_fetch_assoc($q)){
            echo "<option value='{$r['id']}'>{$r['ten_size']}</option>";
        }
        ?>
    </select>
</div>

<div><p>Tình trạng</p><input name="tinh_trang"></div>
<div><p>Màu sắc</p><input name="color"></div>
<div><p>Chất liệu</p><input name="chat_lieu"></div>
<div><p>Ứng dụng</p><input name="ung_dung"></div>

<div>
    <p>Giá</p>
    <input type="number" name="price" required>
</div>

<div>
    <p>Ảnh sản phẩm</p>
    <input type="file" name="fileToUpload" required>
</div>

<br>
<input type="submit" name="btn_submit" value="Thêm Sản Phẩm">

</form>

<?php
if(isset($_POST['btn_submit'])){
    $ma_sp = $_POST['ma_sp'];
    $loai_sp_id = $_POST['loai_sp_id'];
    $thuong_hieu_id = $_POST['thuong_hieu_id'];
    $title_id = $_POST['title_id'];
    $size_id = $_POST['size_id'];
    $tinh_trang = $_POST['tinh_trang'];
    $color = $_POST['color'];
    $chat_lieu = $_POST['chat_lieu'];
    $ung_dung = $_POST['ung_dung'];
    $price = $_POST['price'];

    // upload ảnh
    $pic = $_FILES['fileToUpload']['name'];
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "balo/img/".$pic);

    $sql = "INSERT INTO balo
            (ma_sp, loai_sp_id, thuong_hieu_id, size_id, title_id,
             tinh_trang, color, chat_lieu, pic, price, ung_dung)
            VALUES
            ('$ma_sp','$loai_sp_id','$thuong_hieu_id','$size_id','$title_id',
             '$tinh_trang','$color','$chat_lieu','$pic','$price','$ung_dung')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Thêm thành công');location='admin.php?page_layout=balo';</script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>

</main>
</body>
</html>
