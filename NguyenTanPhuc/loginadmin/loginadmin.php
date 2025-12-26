<?php
    session_set_cookie_params(0); 
    session_start();
    include('../../connect.php'); 

    $error_msg = "";

    if (isset($_POST['btn_login'])) {
        $tenDangNhap = $_POST['username'];
        $matKhau = $_POST['password'];

        // 1. Kiểm tra rỗng
        if (empty($tenDangNhap) || empty($matKhau)) {
            $error_msg = "Vui lòng nhập đầy đủ thông tin đăng nhập!";
        } 
        else {
            // 2. Làm sạch dữ liệu đầu vào (Cơ bản)
            $tenDangNhap = mysqli_real_escape_string($conn, $tenDangNhap);
            $matKhau = mysqli_real_escape_string($conn, $matKhau);
           
            $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = '$tenDangNhap' AND mat_khau = '$matKhau' AND vai_tro_id = 1";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Lấy thông tin người dùng
                $row = mysqli_fetch_assoc($result);

                $_SESSION["admin_user"] = $tenDangNhap;
                $_SESSION["role"] = $row['vai_tro_id'];

                header('Location: /BTLWEB/admin/trangchuadmin/admin.php');
                exit();
            } else {
                $error_msg = "Sai tên đăng nhập, mật khẩu hoặc bạn không phải Admin!";
            }
        }
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Quản Trị Viên</title>
    <style>
        body {
            background-color: while;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .login-box {
            background: white;
            padding: 40px;
            width: 300px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            background-color: #f6af34ff;
            text-align: center;
        }
        .login-box h2 { margin-bottom: 20px; color: #333; }
        .login-box input {
            width: 100%; padding: 10px; margin: 10px 0;
            border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        .login-box button {
            width: 100%; padding: 10px; background: #27ae60;
            color: white; border: none; border-radius: 4px;
            font-weight: bold; cursor: pointer;
        }
        .login-box button:hover { background: #219150; }
        .error { color: red; margin-bottom: 10px; font-size: 14px; font-style: italic;}
        .back-link { display: block; margin-top: 15px; color: #7f8c8d; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>ADMIN LOGIN</h2>
        
        <?php if(!empty($error_msg)) { echo "<p class='error'>$error_msg</p>"; } ?>
        
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit" name="btn_login">ĐĂNG NHẬP</button>
        </form>
        <a href="../../trangchu/code/trangchu.php" class="back-link">← Về trang chủ bán hàng</a>
    </div>
</body>
</html>