<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Quần Áo</title>
    <style>
        /* CSS giữ nguyên như cũ, thêm chút style cho bảng rộng dễ nhìn */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

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

        .btn:hover {
            background-color: #eee;
        }

        .thumb-img {
            width: 60px;
            /* Ảnh nhỏ lại chút cho bảng đỡ vỡ */
            height: auto;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <h1>Danh sách Đơn hàng</h1>
    <div style="margin-bottom: 10px;">
        <div style="margin-bottom: 10px;">
            <a href="admin.php?page_layout=themdonhang"
                style="background-color: #4CAF50; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">+
                Thêm mới</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Ghi chú</th>
                <th>Tên sản phẩm</th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng tiền</th>
                <th>Hình thức thanh toán</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th style="min-width: 100px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `don_hang`";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Lỗi truy vấn SQL: " . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_array($result))  {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['ho_ten']; ?></td>

                    <td><?php echo $row['so_dien_thoai']; ?></td>

                    <td><?php echo $row['email']; ?></td>

                    <td><?php echo $row['dia_chi']; ?></td>

                    <td><?php echo $row['ghi_chu']; ?></td>

                    <td><?php echo $row['ten_san_pham']; ?></td>

                    <td><?php echo $row['size']; ?></td>

                    <td><?php echo $row['so_luong']; ?></td>

                    <td><?php echo $row['don_gia']; ?></td>

                    <td><?php echo $row['tong_tien']; ?></td>

                    <td><?php echo $row['hinh_thuc_thanh_toan']; ?></td>

                    <td><?php echo $row['ngay_dat']; ?></td>

                    <td><?php echo $row['trang_thai']; ?></td>

                    <td>
                        <a class="btn" href="admin.php?page_layout=suadonhang&id=<?php echo $row['id']; ?>">Sửa</a>
                        <a class="btn" onclick="return confirm('Bạn chắc chắn muốn xóa?');"
                            href="admin.php?page_layout=xoadonhang&id=<?php echo $row['id']; ?>"
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