<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Phụ kiện</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { padding: 6px; border: 1px solid #ddd; text-align: left; }
        th { background: #f2f2f2; }
        .btn {
            text-decoration: none;
            padding: 3px 6px;
            border: 1px solid #ccc;
            border-radius: 3px;
            color: black;
        }
    </style>
</head>
<body>

<h1>Danh sách Sản Phẩm Phụ Kiện</h1>

<div style="margin-bottom:10px">
    <a href="admin.php?page_layout=themphukien"
       style="background:#4CAF50;color:white;padding:8px 15px;
              text-decoration:none;border-radius:4px">
        + Thêm mới
    </a>
</div>

<table>
<thead>
<tr>
    <th>ID</th>
    <th>Mã SP</th>
    <th>Loại SP</th>
    <th>Thương hiệu</th>
    <th>Title</th>
    <th>Chức năng</th>
    <th>Mô tả</th>
    <th>Giá</th>
    <th>Thao tác</th>
</tr>
</thead>

<tbody>
<?php
$sql = "SELECT p.*,
               lsp.ten_loai,
               th.ten_thuong_hieu,
               t.ten_title
        FROM phukien p
        LEFT JOIN loai_sp lsp ON p.loai_sp_id = lsp.id
        LEFT JOIN thuong_hieu th ON p.thuong_hieu_id = th.id
        LEFT JOIN title t ON p.title_id = t.id";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['ma_sp'] ?></td>
    <td><?= $row['ten_loai'] ?></td>
    <td><?= $row['ten_thuong_hieu'] ?></td>
    <td><?= $row['ten_title'] ?></td>
    <td><?= $row['chuc_nang'] ?></td>
    <td><?= $row['mo_ta'] ?></td>

    <td style="color:red;font-weight:bold">
        <?= number_format($row['price'],0,',','.') ?>đ
    </td>

    <td>
        <a class="btn" href="admin.php?page_layout=suaphukien&id=<?= $row['id'] ?>">Sửa</a>
        <a class="btn"
           onclick="return confirm('Xóa phụ kiện này?')"
           href="admin.php?page_layout=xoaphukien&id=<?= $row['id'] ?>"
           style="color:red">
           Xóa
        </a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>

</body>
</html>
