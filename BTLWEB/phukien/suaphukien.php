<?php
include "connect.php";

$id = $_GET['id'];

// lấy dữ liệu cũ
$sql_old = "SELECT * FROM phukien WHERE id = '$id'";
$query_old = mysqli_query($conn, $sql_old);
$row_old = mysqli_fetch_assoc($query_old);

// UPDATE
if(isset($_POST['btn_submit'])){
    $ma_sp = $_POST['ma_sp'];
    $loai_sp_id = $_POST['loai_sp_id'];
    $thuong_hieu_id = $_POST['thuong_hieu_id'];
    $title_id = $_POST['title_id'];
    $chuc_nang = $_POST['chuc_nang'];
    $mo_ta = $_POST['mo_ta'];
    $price = $_POST['price'];

    $sql_update = "UPDATE phukien SET
        ma_sp = '$ma_sp',
        loai_sp_id = '$loai_sp_id',
        thuong_hieu_id = '$thuong_hieu_id',
        title_id = '$title_id',
        chuc_nang = '$chuc_nang',
        mo_ta = '$mo_ta',
        price = '$price'
        WHERE id = '$id'";

    if(mysqli_query($conn,$sql_update)){
        echo "<script>alert('Cập nhật phụ kiện thành công');
              location='admin.php?page_layout=phukien';</script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Sửa Phụ Kiện</title>
<style>
    main{width:60%;margin:auto;font-family:Arial}
    div{margin-bottom:12px}
    p{font-weight:bold}
    input,select,textarea{width:100%;padding:8px}
</style>
</head>

<body>
<main>
<h1>Sửa Phụ Kiện</h1>

<form method="post">

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
    <p>Chức năng</p>
    <textarea name="chuc_nang" rows="3"><?= $row_old['chuc_nang'] ?></textarea>
</div>

<div>
    <p>Mô tả</p>
    <textarea name="mo_ta" rows="4"><?= $row_old['mo_ta'] ?></textarea>
</div>

<div>
    <p>Giá</p>
    <input type="number" name="price" value="<?= $row_old['price'] ?>" required>
</div>

<input type="submit" name="btn_submit" value="Cập nhật">
</form>
</main>
</body>
</html>
