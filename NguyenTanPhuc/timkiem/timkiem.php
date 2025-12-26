<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang 1: Quần áo</title>
    <link rel="stylesheet" href="/BTLWEB/timkiem/timkiem.css">
</head>
<body>
        <?php
            // 1. LẤY TỪ KHÓA VÀ XỬ LÝ SQL
            if (isset($_GET['tu_khoa']) && !empty($_GET['tu_khoa'])) {
                $tu_khoa = $_GET['tu_khoa'];
                $tu_khoa_sql = mysqli_real_escape_string($conn, $tu_khoa);
                $sql = "    
                    SELECT id, title_id, price, pic, infor, 'Quần áo' as category_name FROM quan_ao WHERE infor LIKE '%$tu_khoa_sql%'
                    UNION ALL
                    SELECT id, title_id, price, pic, infor, 'Bóng' as category_name FROM bong_ro WHERE infor LIKE '%$tu_khoa_sql%'
                "; 
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result); // Đếm số kết quả
            } else {
                $tu_khoa = "";
                $count = 0;
                $result = null;
            }
        ?>
        <div class="top-main">
            <div class="danhmuc">
                <a href="trangchu.php?page_layout=trangchu">Trang chủ</a> / <a href="trangchu.php?page_layout=quanaobongro">Quần áo bóng rổ</a> / <b> Quần bóng rổ</b>
            </div>
            <div class="arrange">
                <span>Hiển thị 30 kết quả  </span>  
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
                                if ($count > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                    $picDB = $row['pic'];
                                    $picClean = str_replace('../', '', $picDB);
                                    $finalSrc = "/BTLWEB/admin/" . $picClean;
                                ?>
                                    <div class="content">
                                        <div class="content-image">
                                            <a href="#">
                                                <img src="<?php echo $finalSrc; ?>" style="width: 100%; height: 100%; object-fit: contain;">   
                                            </a>
                                        </div>
                                        <div class="content-infor">
                                            <span><a href="#" class="type"><?php echo $row['title']; ?></a></span>
                                            <span style="color: gray; font-size: small;"><?php echo $row['infor']; ?></span>
                                            <br>
                                            
                                        </div>
                                        <div class="price-tag">
                                            <span class="price"><b><?php $row['price']." "."VND"?></b></span>
                                        </div>
                                        <div class="content-colorway">
                                            </div>
                                    </div>
                             <?php
                                 } // End While
                             } else {
                                    echo "<div style='width:100%; text-align:center; padding:50px;'><h3>Không tìm thấy sản phẩm nào phù hợp với từ khóa: '$tu_khoa'</h3></div>";
                             }
                            ?>      
                </div>
            </div>
        </div>
        <script> // Đóng - mở danh sách
            document.addEventListener("DOMContentLoaded", function() {
            const arrows = document.querySelectorAll(".category .arrow_cate");

            arrows.forEach(arrow_cate => {
                arrow_cate.addEventListener("click", function() {
                    const category = this.closest(".category");
                     category.classList.toggle("open");
                    });
                });
            });
        </script>
    <script src="/BTLWEB/quanbongro/code/quanbongro.js"></script>
</body>
</html> 