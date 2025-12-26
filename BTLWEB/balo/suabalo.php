<?php
include "connect.php";

$id = $_GET['id'];

// Lấy dữ liệu cũ
$sql_old = "SELECT * FROM balo WHERE id = $id";

$query_old = mysqli_query($conn, $sql_old);
$row_old = mysqli_fetch_assoc($query_old);

// UPDATE
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

    // xử lý ảnh
    if($_FILES['fileToUpload']['name'] == ""){
        $pic = $row_old['pic'];
    } else {
        $pic = $_FILES['fileToUpload']['name'];
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "balo/img".$pic);
    }

    $sql_update = "UPDATE balo SET
        ma_sp='$ma_sp',
        loai_sp_id='$loai_sp_id',
        thuong_hieu_id='$thuong_hieu_id',
        title_id='$title_id',
        size_id='$size_id',
        tinh_trang='$tinh_trang',
        color='$color',
        chat_lieu='$chat_lieu',
        ung_dung='$ung_dung',
        price='$price',
        pic='$pic'
        WHERE id='$id'";

    if(mysqli_query($conn, $sql_update)){
        echo "<script>alert('Cập nhật thành công');location='admin.php?page_layout=balo';</script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Sửa Balo</title>
<style>
    main{width:60%;margin:auto;font-family:Arial}
    div{margin-bottom:12px}
    p{font-weight:bold}
    input,select{width:100%;padding:8px}
</style>
</head>

<body>
<main>
<h1>Sửa Balo</h1>

<form method="post" enctype="multipart/form-data">

<div>
    <p>Mã sản phẩm</p>
    <input name="ma_sp" value="<?= $row_old['ma_sp'] ?>" required>
</div>

<div>
    <p>Loại sản phẩm</p>
    <select name="loai_sp_id">
        <?php
        $q = mysqli_query($conn,"SELECT * FROM loai_sp");
        while($r=mysqli_fetch_assoc($q)){
            $sl = ($r['id']==$row_old['loai_sp_id'])?'selected':'';
            echo "<option value='{$r['id']}' $sl>{$r['ten_loai']}</option>";
        }
        ?>
    </select>
</div>

<div>
    <p>Thương hiệu</p>
    <select name="thuong_hieu_id">
        <?php
        $q = mysqli_query($conn,"SELECT * FROM thuong_hieu");
        while($r=mysqli_fetch_assoc($q)){
            $sl = ($r['id']==$row_old['thuong_hieu_id'])?'selected':'';
            echo "<option value='{$r['id']}' $sl>{$r['ten_thuong_hieu']}</option>";
        }
        ?>
    </select>
</div>

<div>
    <p>Title</p>
    <select name="title_id">
        <?php
        $q = mysqli_query($conn,"SELECT * FROM title");
        while($r=mysqli_fetch_assoc($q)){
            $sl = ($r['id']==$row_old['title_id'])?'selected':'';
            echo "<option value='{$r['id']}' $sl>{$r['ten_title']}</option>";
        }
        ?>
    </select>
</div>

<div>
    <p>Size</p>
    <select name="size_id">
        <?php
        $q = mysqli_query($conn,"SELECT * FROM size");
        while($r=mysqli_fetch_assoc($q)){
            $sl = ($r['id']==$row_old['size_id'])?'selected':'';
            echo "<option value='{$r['id']}' $sl>{$r['ten_size']}</option>";
        }
        ?>
    </select>
</div>

<div><p>Tình trạng</p><input name="tinh_trang" value="<?= $row_old['tinh_trang'] ?>"></div>
<div><p>Màu sắc</p><input name="color" value="<?= $row_old['color'] ?>"></div>
<div><p>Chất liệu</p><input name="chat_lieu" value="<?= $row_old['chat_lieu'] ?>"></div>
<div><p>Ứng dụng</p><input name="ung_dung" value="<?= $row_old['ung_dung'] ?>"></div>

<div>
    <p>Giá</p>
    <input type="number" name="price" value="<?= $row_old['price'] ?>">
</div>

<div>
    <p>Ảnh</p>
    <input type="file" name="fileToUpload"><br><br>
    <img src="img/<?= $row_old['pic'] ?>" width="100">
</div>

<input type="submit" name="btn_submit" value="Cập nhật">
</form>
</main>
</body>
</html>
