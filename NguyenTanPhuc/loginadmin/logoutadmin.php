<?php
session_start();
session_unset();
session_destroy();
// Quay về trang login
header('Location: loginadmin.php');
exit();
?>