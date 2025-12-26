<?php
    // Thử các cách sau cho đến khi hết lỗi Warning dòng 2:
    include('../../connect.php');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang 1: Quần áo</title>
    <link rel="stylesheet" href="/BTLWEB/uniti/codeS/uniti.css">
</head>

<body>
    <div class="top-main">
        <div class="danhmuc">
            <a href="trangchu.php?page_layout=trangchu"> Trang chủ</a> / <a href="trangchu.php?page_layout=phukienbongro"> phụ kiện bóng rổ</a> /<a href="trangchu.php?page_layout=uniti"> Kết quả tìm kiếm "uniti"</a> 

        </div>
        <div class="arrange">
            <span>Hiển thị 1 kết quả </span>
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
                        <span class="title"><a href="#">Giày bóng rổ</a></span>
                        <span class="arrow">&#9662;</span>
                    </div>
                    <ul class="category-list">
                        <li><a href="trangchu.php?page_layout=giaybongrochinhhang">Chính hãng</a></li>
                        <li><a href="trangchu.php?page_layout=giaybongro2hand">Like-New & Đã qua sử dụng</a></li>
                        <li><a href="#">Replica</a></li>
                        <li><a href="#">Cơ bản giá rẻ</a></li>
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
                        <span class="title"><a href="#">Quả bóng rổ</a></span>
                        <span class="arrow">&#9662;</span>
                    </div>
                    <ul class="category-list">
                        <li><a href="#">Geru Star</a></li>
                        <li><a href="#">Jogarbola</a></li>
                        <li><a href="#">Molten</a></li>
                        <li><a href="#">Chất liệu cao su</a></li>
                        <li><a href="#">Chất liệu da</a></li>
                    </ul>
                </div>
                <div class="category">
                    <div class="category-header">
                        <span class="title"><a href="trangchu.php?page_layout=balobongro">Balo bóng rổ</a></span>
                        <span class="arrow">&#9662;</span>
                    </div>
                    <ul class="category-list">
                        <li><a href="trangchu.php?page_layout=airhoopelite">Air Hoop Elite</a></li>
                        <li><a href="trangchu.php?page_layout=uniti">Utility Speed</a></li>
                        <li><a href="trangchu.php?page_layout=chinhhang">Chính hãng</a></li>
                        <li><a href="trangchu.php?page_layout=rephica">Replica</a></li>
                        <li><a href="trangchu.php?page_layout=balobongro">Khác</a></li>
                    </ul>
                </div>
                <div class="category">
                    <div class="category-header">
                        <span class="title"><a href="trangchu.php?page_layout=quanao">Quần áo</a></span>
                        <span class="arrow">&#9662;</span>
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
                        <span class="arrow">&#9662;</span>
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
                <select name="size-arrange" id="size">
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
                <select name="brand-arrange" id="brand">
                    <option value="">Bất kỳ </option>
                    <option value="">Nike</option>
                    <option value="">Adidas</option>
                    <option value="">Puma</option>

                </select>




            </div>
            <br>

        </div>
        <div class="right-bot-main">
            <div class="right-bot-content">
                   <?php
                    // Câu lệnh SQL lấy thông tin từ bảng balo và bảng title
                    $sql = "SELECT b.*, t.ten_title 
                            FROM balo b
                            JOIN title t ON b.title_id = t.id
                            -- WHERE b.loai_sp_id = 2
                            ORDER BY b.id DESC";
                    // $sql = "SELECT * FROM balo ";

                    $result = mysqli_query($conn, $sql);

                    // Kiểm tra nếu có dữ liệu
                  if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Xử lý đường dẫn ảnh: nối folder chứa ảnh với tên file trong DB
            $picName = $row['pic']; // pic-4-con-1.webp
            $finalSrc = "/BTLWEB/balo/img/" . $picName;
    ?>
                      


                  
                         <div class="content">
                             <div class="content-image">
                                 <a href="#">
                                     <img src="<?php echo $finalSrc; ?>" alt="NBA" style="width: 100%; height: auto;">
                                 </a>
                             </div>

                             <div class="content-infor">
                                 <span style="color: gray; font-size: small; text-transform: uppercase;">
                                     BA LÔ BÓNG RỔ
                                 </span>
                                 <br>
                                 <span>
                                     <a href="#" class="type"><?php echo $row['ma_sp']; ?></a>
                                 </span>
                                 <br><br>
                                 <span><b><?php echo number_format($row['price'], 0, ',', '.'); ?> VND</b></span>

                                  <div class="content-colorway">
                            <div class="icon-pic" onclick="chooseIcon(1,this)">
                                <img src="/BTLWEB/uniti/images/pic-1-con-1.webp"alt="pic">
                            </div>
                            <div class="icon-pic" onclick="chooseIcon(2,this)">
                                <img src="/BTLWEB/uniti/images/pic-1-con-2.webp" alt="pic">
                            </div>
                            <div class="icon-pic" onclick="chooseIcon(3,this)">
                                <img src="/BTLWEB/uniti/images/pic-1-con-3.webp" alt="pic">
                            </div>
                        </div>
                             </div>
                         </div>
                 <?php
                        }
                    } else {
                        echo "<p>Không tìm thấy sản phẩm nào.</p>";
                    }
                    ?>
                    </div>
             
                 <div class="content">


                        <div class="content-image">


                            <a href="#">

                                <img src="/BTLWEB/uniti/codeS/ảnh 2/Balo-Nike-Utility-speed-White-CZ1247-104-1.webp" alt="NBA"></a>

                        </div>
                        <div class="content-infor">
                            <span style="color: gray; font-size: small;">BA LÔ BÓNG RỔ</span>
                            <br><span><a href="#" class="type">Balo Nike Utility Speed Backpack ‘White’ CZ1247-104 chính
                                    hãng – Be Nike
                                </a></span>
                            <br><span><b>2,100,000VND</b></span>
                            <br>
                             <div class="content-colorway">
                            <div class="icon-pic" onclick="chooseIcon(1,this)">
                                <img src="/BTLWEB/uniti/images/pic-1-con-1.webp"alt="pic">
                            </div>
                            <div class="icon-pic" onclick="chooseIcon(2,this)">
                                <img src="/BTLWEB/uniti/images/pic-1-con-2.webp" alt="pic">
                            </div>
                            <div class="icon-pic" onclick="chooseIcon(3,this)">
                                <img src="/BTLWEB/uniti/images/pic-1-con-3.webp" alt="pic">
                            </div>
                        </div>
                            


                </div>




           
    </div>


    <script>
        // Đóng - mở danh sách
        document.addEventListener("DOMContentLoaded", function() {
            const arrows = document.querySelectorAll(".category .arrow");

            arrows.forEach(arrow => {
                arrow.addEventListener("click", function() {
                    const category = this.closest(".category");
                    category.classList.toggle("open");
                });
            });
        });
    </script>
    <script src="/BTLWEB/uniti/codeS/uniti.js"></script>
</body>

</html>