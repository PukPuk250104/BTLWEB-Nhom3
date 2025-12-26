<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Giày</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; font-size: 11px; }
        th, td { padding: 4px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .btn {
            text-decoration: none; color: black; border: 1px solid #ccc;
            padding: 2px 4px; border-radius: 3px; display: inline-block;
        }
        .thumb-img { width: 50px; height: auto; }
    </style>
</head>
<body>
    <h1>Danh sách Sản Phẩm Giày</h1>
    <div style="margin-bottom: 10px;">
        <a href="admin.php?page_layout=themgiay" style="background-color: #4CAF50; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">+ Thêm mới</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã SP</th>
                <th>Loại SP</th>
                <th>Thương hiệu</th>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Size</th>
                <th>Mô tả</th>
                <th>Tình trạng</th>
                <th>Chất liệu đế</th>
                <th>Chức năng</th>
                <th>Loại đế</th>
                <th>Độ cao đế</th>
                <th>Kiểu mũi</th>
                <th>Ứng dụng</th>
                <th>Mặt sân</th>
                <th>Giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Câu SQL JOIN khớp với các ID khóa ngoại trong ảnh của bạn
                $sql = "SELECT g.*, 
                               lsp.ten_loai_sp, 
                               th.ten_thuong_hieu, 
                               t.title,
                               s.size
                        FROM `giay` g
                        LEFT JOIN `loai_sp` lsp ON g.loai_sp_id = lsp.id 
                        LEFT JOIN `thuong_hieu` th ON g.thuong_hieu_id = th.id
                        LEFT JOIN `title` t ON g.title_id = t.id
                        LEFT JOIN `size` s ON g.size_id = s.id";

                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ma_sp']; ?></td>
                <td><?php echo $row['ten_loai_sp']; ?></td>
                <td><?php echo $row['ten_thuong_hieu']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td>
                    <?php if (!empty($row['pic'])): ?>
                        <img class="thumb-img" src="../giay/uploads/<?php echo $row['pic']; ?>">
                    <?php endif; ?>
                </td>
                <td><?php echo $row['size']; ?></td>
                <td><?php echo (mb_strlen($row['mo_ta']) > 20) ? mb_substr($row['mo_ta'], 0, 20) . "..." : $row['mo_ta']; ?></td>
                <td><?php echo $row['tinh_trang']; ?></td>
                <td><?php echo $row['chat_lieu_de']; ?></td>
                <td><?php echo $row['chuc_nang']; ?></td>
                <td><?php echo $row['loai_de']; ?></td>
                <td><?php echo $row['do_cao_de_giay']; ?></td>
                <td><?php echo $row['kieu_mui_giay']; ?></td>
                <td><?php echo $row['ung_dung']; ?></td>
                <td><?php echo $row['mat_san_phu_hop']; ?></td>
                <td style="color: red; font-weight: bold;"><?php echo number_format($row['price'], 0, ',', '.'); ?>đ</td>
                <td>
                    <a class="btn" href="admin.php?page_layout=suagiay&id=<?php echo $row['id']; ?>">Sửa</a>
                    <a class="btn" onclick="return confirm('Xóa?');" href="admin.php?page_layout=xoagiay&id=<?php echo $row['id']; ?>" style="color: red;">Xóa</a>
                </td>
            </tr>      
            <?php } ?>
        </tbody>
    </table>
</body>
</html>