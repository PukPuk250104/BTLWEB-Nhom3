<h1>Xoa</h1>
<?php
    $id = $_GET['id'];
    $sql="DELETE FROM `quan_ao` WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header('location: admin.php?page_layout=quanlyquanao');
?>