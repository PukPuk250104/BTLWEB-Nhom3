<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="/BTLWEB/login/login.css">

</head>
<body>
    <div style="opacity: 0; position: absolute; top: 0; left: 0; height: 0; width: 0; z-index: -1;">
        <input type="text" name="fake_username_to_trap_browser">
        <input type="password" name="fake_password_to_trap_browser">
    </div>
    <div class="form_login">
            <form method="post" action="" class="dang_nhap">
                <div class="col">
                    <h2>ĐĂNG NHẬP</h2>
                    
                    <label>Tên tài khoản hoặc địa chỉ email *</label>
                    <input type="text" 
                            name="username" 
                            placeholder="Tên tài khoản hoặc email" 
                            required 
                            readonly 
                            onfocus="this.removeAttribute('readonly');"
                            style="background-color: white;">
                    
                    <label>Mật khẩu *</label>
                    <input  type="password" 
                            name="password" 
                            placeholder="Mật khẩu" 
                            required 
                            readonly 
                            onfocus="this.removeAttribute('readonly');"
                            style="background-color: white;">
                    
                    <div class="checkbox-row">
                        <input type="checkbox" id="remember">
                        <label for="remember" style="margin:0; font-weight:normal;">Ghi nhớ mật khẩu</label>
                    </div>
                    
                    <div class="login-actions">
                        <button class="btn" name="btn_dangnhap" type="submit" value="Đăng nhập">Đăng nhập</button>
                    </div>
                    
                    <div>
                        <a class="forgot" href="#" onclick="return false;">Quên mật khẩu?</a>
                    </div>
                </div>
            </form>
            <form class="dang_ky" method="post" action="">
                <div class="col">
                        <h2>ĐĂNG KÝ</h2>
                        <label>Tên đăng nhập</label>
                        <input type="text" name="tendangnhap" placeholder="tên đăng nhập">
                       
                        <label>Mật khẩu</label>
                        <input type="text" name="matkhau" placeholder="Mật khẩu">

                        <label>Ngày/tháng/năm</label>
                        <input name="tuoi" type="date" placeholder="ngày/tháng/năm">

                        <label><br>Số điện thoại</label>
                        <input name="sdt" type="text"   placeholder="số điện thoại">
                        
                        <label>Địa chỉ email</label>
                        <input name="email" type="email" placeholder="email của bạn">

                        <div style="margin-top:10px;">
                            <button class="btn full" type="submit" name="btn_dangky" value="Đăng ký">Đăng ký</button>
                        </div>
                </div>
            </form>
       </div>
        <?php
            include('../../connect.php');

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Kiểm tra xem người dùng có ấn nút đăng nhập không
            if(isset($_POST["btn_dangnhap"])){   
                $tenDangNhap = $_POST['username'];
                $matKhau = $_POST['password'];
                
                if(empty($tenDangNhap) || empty($matKhau)){
                    echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');</script>";
                } else {
                    $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = '$tenDangNhap' AND mat_khau = '$matKhau'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);

                        $_SESSION["username"] = $tenDangNhap;
                        $_SESSION["role"] = $row['vai_tro_id']; 

                        if ($row['vai_tro_id'] == 1) { 
                            // Nếu là Admin -> ko cho đăng nhập, bắt nhập lại tk
                            echo "<script>
                                alert('Sai tên đăng nhập hoặc mật khẩu!');
                            </script>";
                        } else {
                            // Nếu là User -> Chuyển về trang chủ
                            echo "<script>
                                window.location.href = '/BTLWEB/trangchu/code/trangchu.php';
                            </script>";
                        }
                    } else {
                        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!');</script>";
                    }
                }
            }
            //  ĐĂNG KÝ 
            if(isset($_POST['btn_dangky'])){
                $tenDangNhap = $_POST['tendangnhap'];
                $matKhau = $_POST['matkhau'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                if(empty($tenDangNhap) || empty($matKhau) || empty($sdt) || empty($email) ){
                    echo "<script>alert('Vui lòng điền đầy đủ tất cả các thông tin!');</script>";
                } 
                else {
              
                $checkSQL = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = '$tenDangNhap'";
                $checkResult = mysqli_query($conn, $checkSQL);

                if(mysqli_num_rows($checkResult) > 0){
                    echo "<script>alert('Tên đăng nhập đã tồn tại!');</script>";
                } else {
                    $sql = "INSERT INTO `nguoi_dung`(`ten_dang_nhap`, `mat_khau`, `so_dien_thoai`, `email`, `vai_tro_id`) 
                            VALUES ('$tenDangNhap','$matKhau','$sdt','$email', 2)";
                    if(mysqli_query($conn, $sql)){
                        echo "<script>
                                alert('Đăng ký thành công! Vui lòng đăng nhập.');
                                window.location.href = '/BTLWEB/trangchu/code/trangchu.php?page_layout=login';
                            </script>";
                    } else {
                        echo "<script>alert('Lỗi đăng ký: " . mysqli_error($conn) . "');</script>";
                        }
                    }
                }
            }
            mysqli_close($conn);
            ?>
</body>
</html>