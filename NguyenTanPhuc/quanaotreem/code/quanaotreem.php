<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang 1: Quần áo</title>
    <link rel="stylesheet" href="/BTLWEB/quanaotreem/code/quanaotreem.css">
</head>
<body>
        <div class="top-main">
            <div class="danhmuc">
                <a href="trangchu.php?page_layout=trangchu">Trang chủ</a> / <a href="trangchu.php?page_layout=quanaobongro">Quần áo bóng rổ</a> / <b>Bộ quần áo bóng rổ trẻ em</b>
            </div>
            <div class="arrange">
                <span>Hiển thị 2 kết quả  </span>  
                <select name="type-arrange" id="sapxep">
                    <option value="">Sắp xếp theo mới nhất</option>
                    <option value="">Sắp xếp theo mức độ phổ biến</option>
                    <option value="">Sắp xếp theo xếp hạng trung bình</option>
                    <option value="">Sắp xếp theo giá: Thấp đến cao</option>
                    <option value="">Sắp xếp theo giá: Cao đến thấp</option>
                </select>
            </div>
        </div>
        <div class="bot-main">
            <div class="left-bot-main">
                <span class="danhmucsanpham">Danh mục sản phẩm</span>
                <div class="is-divider small"></div>
                <div class="sidebar">

                    <div class="category">
                        <div class="category-header">
                        <span class="title"><a href="trangchu.php?page_layout=giaybongro">Giày bóng rổ</a></span>
                        <span class="arrow_cate">&#9662;</span>
                        </div>
                        <ul class="category-list">
                        <li><a href="trangchu.php?page_layout=giaybongrochinhhang">Chính hãng</a></li>
                        <li><a href="trangchu.php?page_layout=giaybongro2hand">Like-New & Đã qua sử dụng</a></li>

                        </ul>
                    </div>

                    <div class="category">
                        <div class="category-header">
                        <span class="title"><a href="trangchu.php?page_layout=giaybongronu">Giày Bóng Rổ Nữ</a></span>
                        </div>
                        <ul class="category-list"></ul>
                        
                    </div>

                    <div class="category">
                        <div class="category-header">
                        <span class="title"><a href="#">Giày bóng rổ trẻ em</a></span>
                        </div>
                        <ul class="category-list">
                        </ul>
                    </div>

                    <div class="category">
                        <div class="category-header">
                        <span class="title"><a href="trangchu.php?page_layout=quabongro">Quả bóng rổ</a></span>
                        <span class="arrow_cate">&#9662;</span>
                        </div>
                        <ul class="category-list">
                            <li><a href="trangchu.php?page_layout=gerustarball">Geru Star</a></li>
                            <li><a href="trangchu.php?page_layout=jogarbola">Jogarbola</a></li>
                            <li><a href="trangchu.php?page_layout=moltenball">Molten</a></li>
                        </ul>
                    </div>
                    <div class="category">
                        <div class="category-header">
                        <span class="title"><a href="#">Balo bóng rổ</a></span>
                        <span class="arrow_cate">&#9662;</span>
                        </div>
                        <ul class="category-list">
                            <li><a href="#">Air Hoop Elite</a></li>
                            <li><a href="#">Utility Speed</a></li>
                            <li><a href="#">Chính hãng</a></li>
                            <li><a href="#">Replica</a></li>
                            <li><a href="#">Khác</a></li>
                        </ul>
                    </div>
                    <div class="category">
                        <div class="category-header">
                        <span class="title"><a href="trangchu.php?page_layout=quanao">Quần áo</a></span>
                        <span class="arrow_cate">&#9662;</span>
                        </div>
                        <ul class="category-list">
                            <li><a href="trangchu.php?page_layout=quanaonba">Bộ NBA</a></li>
                            <li><a href="trangchu.php?page_layout=aobongro">Áo bóng rổ</a></li>
                            <li><a href="trangchu.php?page_layout=quanbongro">Quần bóng rổ</a></li>
                            <li><a href="trangchu.php?page_layout=quanaotreem">Trẻ em</a></li>
                        </ul>
                    </div>
                    <div class="category">
                        <div class="category-header">
                        <span class="title"><a href="trangchu.php?page_layout=procombat">Pro combat</a></span>
                        <span class="arrow_cate">&#9662;</span>
                        </div>
                        <ul class="category-list">
                            <li><a href="trangchu.php?page_layout=aoprocombat">Áo</a></li>
                            <li><a href="trangchu.php?page_layout=quanprocombat">Quần</a></li>
                        </ul>
                    </div>
                    <div class="category">
                        <div class="category-header">
                        <span class="title"><a href="trangchu.php?page_layout=phukienbongro">Phụ kiện bóng rổ</a></span>
                        </div>
                        <ul class="category-list">
                        </ul>
                    </div>
                </div>
                <div class="size-range">
                    <span style="font-size: large;"><b>Kích cỡ</b> </span>  
                    <div class="is-divider small"></div>
                    <select name="size-arrange" id="size" >
                        <option value="">Bất kỳ size</option>
                        <option value="">L</option>
                        <option value="">XL</option>
                        <option value="">2XL</option>
                        <option value="">3XL</option>
                        
                    </select>
                </div>
                <div class="brand-range">
                    <span style="font-size: large;"><b>Hãng</b></span> </span>  
                    <div class="is-divider small"></div>
                    <select name="brand-arrange" id="brand" >
                        <option value="">Bất kỳ </option>
                        <option value="">Nike</option>
                        <option value="">Adidas</option>
                        <option value="">Puma</option>
                        
                    </select>
                </div>               
            </div>
            <div class="right-bot-main">
                <div class="right-bot-content">
                    <?php
                        $sql = "SELECT qa.*, t.title 
                                FROM `quan_ao` qa 
                                JOIN `title` t 
                                ON qa.title_id = t.id 
                                WHERE loai_sp_id = 4
                                ORDER BY id DESC";
                        $result=mysqli_query($conn, $sql);
                         while($quan_ao= mysqli_fetch_array($result)){ 
                        ?>
                    <div class="content">
                        <div class="content-image">
                             <?php
                                    // 1. Lấy đường dẫn từ CSDL (Ví dụ: ../quanao/uploads/anh1.jpg)
                                    $picDB = $quan_ao['pic'];

                                    // 2. Xóa bỏ đoạn "../" thừa ở đầu đi -> thành: quanao/uploads/anh1.jpg
                                    $picClean = str_replace('../', '', $picDB);

                                    // 3. Nối thêm đường dẫn gốc để trỏ đúng vào thư mục admin
                                    // Kết quả sẽ là: /BTLWEB/admin/quanao/uploads/anh1.jpg
                                    $finalSrc = "/BTLWEB/admin/" . $picClean;
                                ?>
                                
                                <a href="#">
                                    <img id="iconImg" src="<?php echo $finalSrc; ?>" alt="NBA" style="width: 100%; height: auto;">   
                                 </a>
                        </div>
                        <div class="content-infor">
                            <span style="color: gray; font-size: small;"><?php echo $quan_ao['title']?></span>
                            <br><span><a href="#" class="type"><?php echo $quan_ao['infor']?></a></span>
                        </div>
                        <div class="price-tag">
                            <span class="price"><b><?php echo $quan_ao['price']." "."VND"?></b></span>
                        </div>
                        <div class="content-colorway">
                            <div class="icon-pic" onclick="chooseIcon(1,this)">
                                <img src="../images/con1.jpg"alt="pic">
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>

                </div>
            </div>
        </div>
        <script> // Đóng - mở danh sách
            document.addEventListener("DOMContentLoaded", function() {
            const"arrow_cates = document.querySelectorAll(".category "arrow_cate");

        "arrow_cates.forEach"arrow_cate => {
            "arrow_cate.addEventListener("click", function() {
                    const category = this.closest(".category");
                     category.classList.toggle("open");
                    });
                });
            });
        </script>
    <script src="trang1.js"></script>
</body>
</html> 