<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thêm Phụ Kiện Mới</title>
<style>
    main{width:60%;margin:auto;font-family:Arial}
    div{margin-bottom:12px}
    p{font-weight:bold}
    input,select,textarea{width:100%;padding:8px}
</style>
</head>

<body>
<main>
<h1>Thêm Phụ Kiện Mới</h1>

<form method="post">

<div>
    <p>Mã sản phẩm</p>
    <input name="ma_sp" required>
</div>

<div>
    <p>Loại sản phẩm</p>
    <select name="loai_sp_id" required>
        <option value="">-- Chọn loại --</option>
        <?php
        $q = mysqli_query($conn,"SELECT * FROM loai_sp");
        while($r = mysqli_fetch_assoc($q)){
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
        $q = mysqli_query($conn,"SELECT * FROM thuong_hieu");
        while($r = mysqli_fetch_assoc($q)){
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
        $q = mysqli_query($conn,"SELECT * FROM title");
        while($r = mysqli_fetch_assoc($q)){
            echo "<option value='{$r['id']}'>{$r['ten_title']}</option>";
        }
        ?>
    </select>
</div>

<div>
    <p>Chức năng</p>
    <textarea name="chuc_nang" rows="3"></textarea>
</div>

<div>
    <p>Mô tả</p>
    <textarea name="mo_ta" rows="4"></textarea>
</div>

<div>
    <p>Giá</p>
    <input type="number" name="price" required>
</div>

<br>
<input type="submit" name="btn_submit" value="Thêm Phụ Kiện">

</form>

<?php
if(isset($_POST['btn_submit'])){
    $ma_sp = $_POST['ma_sp'];
    $loai_sp_id = $_POST['loai_sp_id'];
    $thuong_hieu_id = $_POST['thuong_hieu_id'];
    $title_id = $_POST['title_id'];
    $chuc_nang = $_POST['chuc_nang'];
    $mo_ta = $_POST['mo_ta'];
    $price = $_POST['price'];

    $sql = "INSERT INTO phukien
            (ma_sp, loai_sp_id, thuong_hieu_id, title_id, chuc_nang, mo_ta, price)
            VALUES
            ('$ma_sp','$loai_sp_id','$thuong_hieu_id','$title_id','$chuc_nang','$mo_ta','$price')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Thêm phụ kiện thành công');
              location='admin.php?page_layout=phukien';</script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>

</main>
</body>
</html>
