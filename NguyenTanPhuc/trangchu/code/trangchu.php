<?php
    session_set_cookie_params(0); 
    session_start();
    include('../../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="trangchu.css">
</head>
<body>
    <div style="opacity: 0; position: absolute; top: 0; left: 0; height: 0; width: 0; z-index: -1;">
        <input type="text" name="fake_username_to_trap_browser">
        <input type="password" name="fake_password_to_trap_browser">
    </div>
     
    
    <header>
        <div class="trangchu_top">
            <div class="top">
                <a href="https://shopee.vn/cbrvn">Shopee</a>
                <a href="https://www.tiktok.com/@choibongrovn">Tiktok</a>
                <a href="https://web.facebook.com/choibongro?_rdc=1&_rdr#">Facebook</a>

            </div>
            <div class="mid">
              
                    <a href="trangchu.php?page_layout=trangchu" class="logo"><img src="../images/logo.jpg" alt="logo"></a>
                    <form action="trangchu.php" method="GET" style="display: flex; align-items: center; position: relative;">
                        <input type="hidden" name="page_layout" value="timkiem">
                        
                        <input type="text" name="tu_khoa" id="timKiem" placeholder="Tìm kiếm sản phẩm..." 
                            value="<?php echo isset($_GET['tu_khoa']) ? $_GET['tu_khoa'] : ''; ?>">
                            
                        <button type="submit" style="border: none; background: transparent; cursor: pointer; position: absolute; right: 10px;">
                            
                        </button>
                    </form>
                
                    <div class="open-time-container">
                        <a href="#" class="open-time" data-tooltip="09:00 - 18:00" style="text-decoration: none; color: rgba(74,74,74,.85) ">9:00 - 18:00</a>
                    </div>
                    <a href="#" class="gach">|</a>
                    <div class="contact-container">
                        <a href="#" class="contact" data-tooltip="0899.178.993" style="text-decoration: none; color: rgba(74,74,74,.85) ">0899.178.993</a>
                    </div>
                    
                    <button class="gioHang"><a href="trangchu.php?page_layout=giohang">Giỏ hàng</a></button>
                    <div class="Log-in" >
                        
                        <button class="sign-in" ><a href="trangchu.php?page_layout=login" data-tooltip="Ưu đãi lớn">Đăng nhập/Đăng ký</a></button>
                    </div>
                
            </div>  
            <div class="menu">
                 <button  class="menu-button">
                    ☰ Danh mục sản phẩm
                 </button>
                <div id="dropdownMenu" class="dropdown-content">
                   
                    <div class="menu-item">
                        <a href="trangchu.php?page_layout=giaybongro" class="menu-link has-arrow">
                            Giày bóng rổ <span class="arrow-menuitem">›</span>
                        </a>
                        
                        <div class="menu-side">
                            <a href="trangchu.php?page_layout=giaybongrochinhhang">Chính hãng</a>
                            <a href="trangchu.php?page_layout=giaybongro2hand">Like-New & Đã qua sử dụng</a>
                        </div>
                    </div>
                        <a href="trangchu.php?page_layout=giaybongronu">Giày Bóng Rổ Nữ</a>
                        <a href="trangchu.php?page_layout=giaybongrotreem">Giày Bóng Rổ Trẻ Em</a>
                    <div class="menu-item">
                        <a href="trangchu.php?page_layout=quabongro" class="menu-link has-arrow">
                            Quả bóng rổ <span class="arrow-menuitem">›</span>
                        </a>
                        
                        <div class="menu-side">
                            
                            <a href="trangchu.php?page_layout=gerustarball">Geru Star</a>
                            <a href="trangchu.php?page_layout=jagarbola">Jogarbola</a>
                            <a href="trangchu.php?page_layout=moltenball">Molten</a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a href="trangchu.php?page_layout=balobongro" class="menu-link has-arrow">
                            Balo bóng rổ <span class="arrow-menuitem">›</span>
                        </a>
                        
                        <div class="menu-side">
                            <a href="#">Air Hoop Elite</a>
                            <a href="#">Utility Speed</a>
                            <a href="#">Chính hãng</a>
                            <a href="#">Replica</a>
                            <a href="#">Khác</a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a href="trangchu.php?page_layout=quanao" class="menu-link has-arrow">
                            Quần áo <span class="arrow-menuitem">›</span>
                        </a>
                        
                        <div class="menu-side">
                            <a href="trangchu.php?page_layout=quanaonba">Bộ NBA</a>
                            <a href="trangchu.php?page_layout=aobongro">Áo bóng rổ</a>
                            <a href="trangchu.php?page_layout=quanbongro">Quần bóng rổ</a>
                            <a href="trangchu.php?page_layout=quanaotreem">Trẻ em</a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a href="trangchu.php?page_layout=procombat" class="menu-link has-arrow">
                            Procombat <span class="arrow-menuitem">›</span>
                        </a>
                        
                        <div class="menu-side">
                            <a href="trangchu.php?page_layout=aoprocombat">Áo</a>
                            <a href="trangchu.php?page_layout=quanprocomat">Quần</a>
                        </div>
                    </div>
                        <a href="trangchu.php?page_layout=phukienbongro">Phụ kiện bóng rổ</a>
                   
                </div>
            </div>
         </div>
        
    </header>
    <main>
        <?php
            
            $content_included = false;

            if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                    case 'quanao':
                        include "../../quanao/code/quanao.php";
                        $content_included = true; 
                        break;
                    case 'aoprocombat':
                        include "../../procombat/ao/code/aoprocombat.php";
                        $content_included = true; 
                        break;
                    case 'quanbongro':
                        include "../../quanbongro/code/quanbongro.php";
                        $content_included = true; 
                        break;
                    case 'quanaotreem':
                        include "../../quanaotreem/code/quanaotreem.php";
                        $content_included = true; 
                        break;
                    case 'quanaonba':
                        include "../../quanaonba/codeS/quanaonba.php";
                        $content_included = true; 
                        break;
                    case 'quanao':
                        include "../../quanao/code/quanao.php";
                        $content_included = true; 
                        break;
                    case 'procombat':
                        include "../../procombat/code/procombat.php";
                        $content_included = true; 
                        break;
                    case 'quanprocombat':
                        include "../../procombat/quan/code/quanprocombat.php";
                        $content_included = true; 
                        break;
                    case 'phukienbongro':
                        include "../../phukienbongro/trang1/phukien1.php";
                        $content_included = true; 
                        break;
                    case 'muahang':
                        include "../../muahangquanao/code/muahang.php";
                        $content_included = true; 
                        break;
                    case 'chinhsachbaove':
                        include "../../chinhsachbaove/code/csbaove.php";
                        $content_included = true; 
                        break;
                    case 'bannerball':
                        include "../../bannerproduct/ball/bannerball.php";
                        $content_included = true; 
                        break;
                    case 'bannershose':
                        include "../../bannerproduct/shose/bannershose.php";
                        $content_included = true; 
                        break;
                    case 'aobongro':
                        include "../../aobongro/code/aobongro.php";
                        $content_included = true; 
                        break;
                    case 'giaybongro':
                        include "../../giaybongro/code/giaybongro.php";
                        $content_included = true; 
                        break;
                    case 'giaybongro2hand':
                        include "../../giaybongro2hand/code/giaybongro2hand.php";
                        $content_included = true; 
                        break;
                    case 'giaybongrochinhhang':
                        include "../../giaybongrochinhhang/code/giaybongrochinhhang.php";
                        $content_included = true; 
                        break;
                    case 'giaybongronu':
                        include "../../giaybongronu/code/giaybongronu.php";
                        $content_included = true; 
                        break;
                    case 'chinhsachbaohanh':
                        include "../../chinhsachbaohanh/baohanh.php";
                        $content_included = true; 
                        break;
                    case 'chinhsachdoitra':
                        include "../../chinhsachdoitra/doitra.php";
                        $content_included = true;
                        break;
                    case 'sanpham1':
                        include "../../sanpham1/code/sanpham1.php";
                        $content_included = true; 
                        break;
                    case 'quabongro':
                        include "../../quabongro/quabongro.php";
                        $content_included = true; 
                        break;
                    case 'moltenball':
                        include "../../moltenball/moltenball.php";
                        $content_included = true; 
                        break;
                    case 'giaytreem':
                        include "../../giaytreem/giaytreem.php";
                        $content_included = true; 
                        break;
                    case 'gerustarball':
                        include "../../gerustarball/gerustarball.php";
                        $content_included = true; 
                        break;
                    case 'dieukhoan':
                        include "../../dieukhoansudung/dieukhoansudung.php";
                        $content_included = true; 
                        break;
                    case 'chinhsachquyenriengtu':
                        include "../../chinhsachquyenriengtu/chinhsachquyenriengtu.php";
                        $content_included = true; 
                        break;
                    case 'jogarbola':
                        include "../../jogarbola/jogarbola.php";
                        $content_included = true; 
                        break;
                     case 'timkiem':
                        include "../../timkiem/timkiem.php";
                        $content_included = true; 
                        break;
                    case 'donhang':
                        include "../../donhang/don_hang.php";
                        $content_included = true; 
                        break;
                    case 'thanhtoan':
                        include "../../thanhtoan/thanhtoan.php";
                        $content_included = true; 
                        break;
                    case 'chitietsp':
                        include "../../chitietsp/code/chitietsp.php";
                        $content_included = true; 
                        break;
                    case 'giohang':
                        
                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                            
                            include "../../giohang/giohang.php"; 
                        } else {
                            
                            include "../../giohang/giohangtrong.php";
                        }
                        $content_included = true;
                        break;
                    case 'login':
                        include "../../login/login.php";
                        $content_included = true; 
                        break;
                    case 'logout':
                        session_unset();
                        session_destroy();
                        echo "<script>
                                alert('Đăng xuất thành công!');
                                window.location.href = 'trangchu.php';
                              </script>";
                        break;
                }
            }
        ?>
        <?php if (!$content_included): ?>
        <div class="banner-container">
            <div class="banner-wrapper">
                <div class="banner-slide">
                    <!-- ball -->
                <a href="trangchu.php?page_layout=bannerball"><img src="../images/banner.webp" alt="Banner 1"></a> 
                </div>
                <div class="banner-slide">
                    <!-- Shose -->
                <a href="trangchu.php?page_layout=bannershose"><img src="../images/banner-2.webp" alt="Banner 2"></a>
                </div>
                <div class="banner-slide">
                    <!-- Shose 2-->
                <a href="trangchu.php?page_layout=bannershose2"><img src="../images/banner3.jpg" alt="Banner 3"></a>
                </div>
                
            </div>

            <!-- Nút mũi tên -->
            <button class="arrow prev" onclick="prevSlide()">&#10094;</button>
            <button class="arrow next" onclick="nextSlide()">&#10095;</button>
        </div>

        <div class="fact-post">
        <div class="fact">
            <div class="fact-item">
                <h2> Sẵn hàng</h2>
                <p>Tất cả sản phẩm tại Website đều có sẵn</p>
            </div>

            <div class="fact-item">
                <h2> Ship toàn quốc</h2>
                <p>Phí ship chỉ từ 18K trong 2 – 4 ngày</p>
            </div>

            <div class="fact-item">
                <h2>Bảo hành, đổi trả</h2>
                <p>Với mọi sản phẩm chúng tôi bán ra</p>
            </div>
            </div>
        <div class="post">
            <div class="post-item">
                <a href="#"><img src="../images/post-img1.webp" alt="1"></a>
                <a href="#" class="post-title">Đánh giá chi tiết giày bóng rổ Li-Ning Wade All City 12: Đệm Boom và Hiệu Suất Vượt Trội</a>
                <div class="is-post small"></div>
            </div>
            <div class="post-item">
                <a href="#"><img src="../images/post-img2.webp" alt="2"></a>
                <a href="#" class="post-title">Đánh giá chi tiết – Giày bóng rổ Rigorer AR Battle 2</a>
                <div class="is-post small"></div>
            </div>
            <div class="post-item">
                <a href="#"><img src="../images/post-img3.webp" alt="3"></a>
                <a href="#" class="post-title">Đánh Giá Li-Ning Wade All City 12 “Encore” – Tối Ưu Cho Hậu Vệ Dẫn Bóng</a>
                <div class="is-post small"></div>
            </div>
        </div>
        </div>
        <?php endif; ?>
    </main>
    <footer>
        <div class="footer-widgets">
            <div class="widgets">
                <span>Thông tin cửa hàng</span>
                <div class="is-divider small"></div>
                
                <ul>
                    <li>Hộ kinh doanh Giày bóng rổ – Choibongro.vn</li>
                    <li>Giấy phép đăng ký kinh doanh: 01F8015621</li>
                    <li>Đăng ký lần đầu ngày: 12-06-2020</li>
                    <li>Địa điểm: Số 22 Ngõ 332 đường Nguyễn Trãi, Phường Thanh Xuân Trung, Quận Thanh Xuân, Thành Phố Hà Nội – 
                        <a href="https://www.google.com/maps/place/Choibongro.vn/@20.9961786,105.8079656,17z/data=!4m6!3m5!1s0x3135ad1a6cd1b5b7:0xf883a571870a86e4!8m2!3d20.996121!4d105.808508!16s%2Fg%2F11h3cwfrzc?coh=219816&entry=tts&g_ep=EgoyMDI0MDgxMi4wKgBIAVAD"> Xem Google Maps chỉ đường</a></li>
                    <li>Người đại diện: Phạm Anh Tuấn</li>
                    <li>Mã số thuế: 0109376875</li>
                    <li>Ngày cấp: 13-10-2020</li>
                    <li>Quản lý bởi: Chi cục Thuế Quận Thanh Xuân</li>
                </ul>
                
                
            </div>
            <div class="widgets">
                <span>Hướng dẫn mua hàng</span>
                <div class="is-divider small"></div>
                <ul>
                    <li><a href="trangchu.php?page_layout=chinhsachthanhtoan">Chính sách thanh toán</a></li>
                    <li><a href="#">Chính sách giao hàng</a></li>
                    <li><a href="trangchu.php?page_layout=chinhsachdoitra">Chính sách đổi trả</a></li>
                    <li><a href="trangchu.php?page_layout=chinhsachbaohanh">Chính sách bảo hành</a></li>
                </ul>

            </div>
            <div class="widgets">
                <span>Hỗ trợ người dùng</span>
                <div class="is-divider small"></div>
                <ul>
                    <li><a href="trangchu.php?page_layout=dieukhoan">Điều khoản sử dụng Website</a></li>
                    <li><a href="trangchu.php?page_layout=chinhsachquyenriengtu">Chính sách quyền riêng tư</a></li>
                    <li><a href="trangchu.php?page_layout=chinhsachbaove">Chính sách bảo vệ thông tin cá nhân của người tiêu dùng</a></li>
                </ul>
            </div>
            <div class="widgets">
                <span>Thông báo bộ công thương</span>
                <div class="is-divider small"></div>
                <ul>
                    <li><a href="http://online.gov.vn/Home/WebDetails/120822?AspxAutoDetectCookieSupport=1"><img src="../images/da-thong-bao-bo-cong-thuong.png" alt="bct"></a></li>
                </ul>
            </div>
        </div>
        <div class="copy-right"><br>Copyright 2025 <b>© CHOIBONGRO.VN</b></div>
    </footer>
    <script src="trangchu.js"></script>
</body>

</html>