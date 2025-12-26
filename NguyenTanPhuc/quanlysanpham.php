<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        select,
        ::picker(select) {
            appearance: base-select;
            width: 200px;
            overflow: hidden;

        }
        ::picker(select){
            border:0;
            margin:.4rem 0;
            box-shadow:0 0 5px rgb(0,0,0, .15);

        }
        option{
            font-size: 14px;
            padding:12px;
        }
        a{
            text-decoration:none;
            color:black;
        }
    </style>
</head>
<body>
    
    <button><a href="admin.php?page_layout=quanlygiaychinhhang">Quản lý giày</a></button>
    <button><a href="admin.php?page_layout=quanlybongro">Bóng</a></button>
    <button><a href="admin.php?page_layout=quanlybalo">Balo</a></button>
    <button><a href="admin.php?page_layout=quanlyquanao">Quần áo</a></button>
    <button><a href="admin.php?page_layout=quanlyphukien">Phụ kiện</a></button>
</body>
</html>