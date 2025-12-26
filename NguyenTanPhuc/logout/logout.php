<?php
    session_start();
    session_unset(); 
    session_destroy(); 
    echo "<script>
            alert('Đăng xuất thành công!');
            window.location.href ='/BTLWEB/login/login.php';
          </script>";
    exit();
?>