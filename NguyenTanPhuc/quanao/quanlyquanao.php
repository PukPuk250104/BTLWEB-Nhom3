<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Quần Áo</title>
    <style>
        /* CSS giữ nguyên như cũ, thêm chút style cho bảng rộng dễ nhìn */
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th, td { padding: 5px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .btn {
            text-decoration: none;
            color: black;
            border: 1px solid #ccc;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 12px;
            margin-right: 3px;
            display: inline-block;
            margin-bottom: 2px;
        }
        .btn:hover { background-color: #eee; }
        .thumb-img {
            width: 60px; /* Ảnh nhỏ lại chút cho bảng đỡ vỡ */
            height: auto;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Danh sách Sản Phẩm</h1>
    <div style="margin-bottom: 10px;">
        <a href="admin.php?page_layout=themquanao" 
           style="background-color: #4CAF50; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">
           + Thêm sản phẩm mới
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>                
                <th>Loại SP</th>            
                <th>Mã SP</th>              
                <th>Thương hiệu</th>        
                <th>Size</th>               
                <th>Màu sắc</th>            
                <th>Mô tả</th>              
                <th>Chất liệu</th>          
                <th>Độ đàn hồi</th>         
                <th>Độ thoáng khí</th>      
                <th>Form dáng</th>          
                <th>Giá</th>                
                <th>Ảnh</th> 
                <th>Tiêu đề</th>                
                <th>Thông tin</th>          
                <th style="min-width: 80px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT qa.*, 
                               lsp.ten_loai_sp, 
                               th.ten_thuong_hieu, 
                               tt.title,
                               s.size
                        FROM `quan_ao` qa 
                        JOIN `loai_sp` lsp ON qa.loai_sp_id = lsp.id 
                        JOIN `thuong_hieu` th ON qa.thuong_hieu_id = th.id
                        JOIN `title` tt ON qa.title_id = tt.id
                        JOIN `size` s ON qa.size_id = s.id";
                $result = mysqli_query($conn, $sql);
                
                if (!$result) {
                    die("Lỗi truy vấn SQL: " . mysqli_error($conn));
                }

                while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>

                <td><?php echo $row['ten_loai_sp']; ?></td>

                <td><?php echo $row['ma_sp']; ?></td>

                <td><?php echo $row['ten_thuong_hieu']; ?></td>

                <td><?php echo $row['size']; ?></td>

                <td><?php echo $row['color']; ?></td>

                <td>
                    <?php 
                        // Chỉ hiện 30 ký tự đầu cho gọn bảng
                        echo (strlen($row['mo_ta']) > 30) ? substr($row['mo_ta'], 0, 30) . "..." : $row['mo_ta']; 
                    ?>
                </td>

                <td><?php echo $row['chat_lieu']; ?></td>

                <td><?php echo $row['do_dan_hoi']; ?></td>

                <td><?php echo $row['do_thoang_khi']; ?></td>

                <td><?php echo $row['form_dang']; ?></td>

                <td style="color: red; font-weight: bold;">
                    <?php echo number_format($row['price']); ?> đ
                </td>

                <td>
                    <?php if (!empty($row['pic'])): ?>
                        <img class="thumb-img" src="<?php echo $row['pic']; ?>" alt="Ảnh">
                    <?php else: ?>
                        <span>No img</span>
                    <?php endif; ?>
                </td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['infor']; ?></td>

                <td>
                    <a class="btn" href="admin.php?page_layout=suaquanao&id=<?php echo $row['id']; ?>">Sửa</a>
                    <a class="btn" onclick="return confirm('Bạn chắc chắn muốn xóa?');" 
                       href="admin.php?page_layout=xoaquanao&id=<?php echo $row['id']; ?>" 
                       style="color: red; border-color: red;">Xóa</a>
                </td>
            </tr>      
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>