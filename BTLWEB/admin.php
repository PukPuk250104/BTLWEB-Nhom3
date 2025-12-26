
<?php
    session_set_cookie_params(0); 
    session_start();
    
    // Kết nối CSDL
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống Quản Trị - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        /* CSS Cơ bản nếu bạn chưa tạo file admin.css */
        body { margin: 0; font-family: Arial, sans-serif; display: flex; height: 100vh; }
        .sidebar { width: 250px; background: #2c3e50; color: white; display: flex; flex-direction: column; }
        .sidebar-header { padding: 20px; text-align: center; background: #1a252f; border-bottom: 1px solid #34495e; }
        .menu { list-style: none; padding: 0; margin: 0; }
        .menu li a { display: block; padding: 15px 20px; color: #bdc3c7; text-decoration: none; border-bottom: 1px solid #34495e; transition: 0.3s; }
        .menu li a:hover { background: #1abc9c; color: white; padding-left: 30px; }
        .content { flex: 1; background: #ecf0f1; padding: 20px; overflow-y: auto; }
        .logout-btn { margin-top: auto; background: #e74c3c; color: white; text-align: center; padding: 15px; text-decoration: none; }
        .logout-btn:hover { background: #c0392b; }
        
    </style>
</head>
<body>
    
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>ADMIN PANEL</h3>
            <p>Xin chào, <?php echo $_SESSION['admin_user']; ?></p>
        </div>
        <ul class="menu">
            <li><a href="admin.php"> Trang chủ Admin</a></li>
            <li><a href="admin.php?page_layout=quanlysanpham">Quản lý Sản phẩm</a></li>
            <li><a href="admin.php?page_layout=nguoidung">Quản lý Người dùng</a></li>
            <li><a href="admin.php?page_layout=donhang">Quản lý Đơn hàng</a></li>
            <li><a href="admin.php?page_layout=thuonghieu">Quản lý Thương hiệu</a></li>
            <li><a href="../../trangchu/code/trangchu.php" target="_blank">Xem trang web</a></li>
        </ul>
        <a href="../loginadmin/logoutadmin.php" class="logout-btn" onclick="return confirm('Bạn muốn đăng xuất?')">Đăng xuất</a>
    </div>

    <div class="content">
        <?php
            // Logic chuyển đổi nội dung
            if (isset($_GET['page_layout'])) {
                switch ($_GET['page_layout']) {
                    case 'quanlysanpham':
                        include 'quanlysanpham.php'; 
                        break;
                    case 'nguoidung':
                        include '../nguoidung.php';
                        break;
                    case 'donhang':
                        include '../donhang.php';
                        break;
                    case 'thuonghieu':
                        echo "<h2>Chức năng quản lý thương hiệu đang cập nhật...</h2>";
                        break;
                    case'loginadmin':
                        include '../admin/loginadmin/loginadmin.php';
                        break;
                    case'logoutadmin':
                        include '../admin/loginadmin/logoutadmin.php';
                        break;
                    case'themquanao':
                        include '../../admin/quanao/themquanao.php';
                        break;
                    case'quanlyquanao':
                        include '../../admin/quanao/quanlyquanao.php';
                        break;
                    case'xoaquanao':
                        include '../../admin/quanao/xoaquanao.php';
                        break;
                    case'suaquanao':
                        include '../../admin/quanao/suaquanao.php';
                        break;
                    case'suagiay':
                        include 'suagiay.php';
                        break;
                    case'themgiay':
                        include 'themgiay.php';
                        break;
                    case'xoagiay':
                        include 'xoagiay.php';
                    break;
                    case'quanlygiaychinhhang':
                        include 'quanlygiaychinhhang.php';
                    break;
                    case'quanlybalo':
                        include 'balo/quanlybalo.php';
                    break;
                     case'thembalo':
                        include 'balo/thembalo.php';
                    break;
                      case'xoabalo':
                        include 'balo/xoabalo.php';
                    break;
                     case'suabalo':
                        include 'balo/suabalo.php';
                    break;
                    case'quanlyphukien':
                        include 'phukien/quanlyphukien.php';
                    break;

                    case'themphukien':
                        include 'phukien/themphukien.php';
                    break;
                    case'suaphukien':
                        include 'phukien/suaphukien.php';
                    break;
                   case'xoaphukien':
                        include 'phukien/xoaphukien.php';
                    break;
                   

                    default:
                        echo "<h2>Chào mừng đến trang quản trị!</h2>";
                }
            } else {
                // Mặc định khi mới vào trang admin
                echo "<h2>Dashboard thống kê</h2>";
                echo "<p>Chọn một chức năng bên menu trái để bắt đầu.</p>";
            }
        ?>
    </div>

</body>
</html>