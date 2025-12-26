<h1>Xoa</h1>
<?php
    $id = $_GET['id'];
    $sql="DELETE FROM `bong_ro` WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header('location: admin.php?page_layout=quanlybongro');
?>