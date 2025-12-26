<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=hq, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 100%;
        }
        
        .btn{
            color: black;
            border: 1px solid black;
            padding: 0 5px;
            border-radius: 5px;
        }
        a{
            text-decoration: none;
            color:black
        }
    </style>
</head>
<body>
    <h1>Người dùng</h1>
    <a href="index1.php?page_layout=themnguoidung">Thêm người dùng</a>
    <table border=1>
        <tr>
            <th>id</th>
            <th>Tên đăng nhập</th>
            <th>Tuổi</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Vai trò</th>
    </tr>
    <?php
        $sql="SELECT nd.*, vt.vai_tro FROM `nguoi_dung` nd join `vai_tro` vt on nd.vai_tro_id = vt.id;";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['ten_dang_nhap'] ?></td>
        <td><?php echo $row['tuoi'] ?></td>
        <td><?php echo $row['so_dien_thoai'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['vai_tro'] ?></td>
        <td>
            <a class="btn" href="index1.php?page_layout=capnhat&id=<?php echo $row['id'] ?>">Cập nhật</a>
            <a class="btn" href="index1.php?page_layout=xoa&id=<?php echo $row['id'] ?>">Xoa</a>
        </td>
    </tr>      
        <?php
        }
        ?>
        
    </table>

</body>
</html>