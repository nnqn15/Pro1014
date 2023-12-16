<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $title ?>
    </title>
    <meta name="description" content="Website bán hàng">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= $base_url ?>upload/icons/favicon.png">
    <!-- linh cdn fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/fontawsome.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/style23.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/demo23.min.css">
    <!-- <link rel="stylesheet" href="<?= $base_url ?>assets/css/all.min.css"> -->

    <!-- Js -->
    <script src="<?= $base_url ?>assets/js/jquery.min.js"></script>
    <script src="<?= $base_url ?>assets/js/validate.js"></script>

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2P2HKGGNHM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2P2HKGGNHM');
</script>

    <style>
        html {
            font-family: Arial, Helvetica, sans-serif;
        }
       
     .product-default .details{
                                    position: absolute;
                                    bottom: -40px;
                                    width: 100%;
                                    height: 40px;
                                    background-color: pink;
                                    color: white;
                                    font-weight: bold;
                                    display: none;
                                    justify-content: center;
                                    align-items: center;
                                    cursor: pointer;
                                
                                    transition: all 0.25s ease;
                                }
                                .product-default .details a{
                                   font-size: 16px;
                                   transition: all 0.25s ease;
                                }
                                .details a:hover{
                                    color: white;
                                }
                                .product-default :hover .details{
                                    bottom: 0;
                                    display: flex;
                                  
                                    
                                }
  
    </style>
</head>

<body>
    <div class="page-wrapper">
        <div class="top-notice font2">
            <div class="container-fluid text-center m-auto text-dark">
                <i class="fa-solid fa-truck"></i> <b class="text-uppercase">Miễn phí vận chuyển</b>&nbsp;hóa đơn từ
                0Đ VND!
                Code:&nbsp;<b class="text-uppercase">km10</b>&nbsp;| Hạn chế áp dụng.&nbsp;<a href=""
                    class="text-dark">Xem tất cả ưu đãi</a>
            </div>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>

        <header class="header">
            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container-fluid">
                    <div class="header-center ml-0 ml-lg-auto">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="<?= $base_url ?>page/home" class="logo">
                            <img src="<?= $base_url ?>upload/logo.png" alt="Porto Logo" width="113" height="48">
                        </a>
                    </div>

                    <div class="header-right">
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="<?= $base_url ?>user/dashboard" class="header-icon d-lg-block d-none">
                                <div class="header-user">
                                    <img src="<?= $base_url ?>upload/avatar/<?= $info_user['HinhAnh'] ?>"
                                        alt="Avatar">
                                    <div class="header-userinfo">
                                        <span class="d-inline-block font2 line-height-1">Xin chào!</span>
                                        <h4 class="mb-0">
                                            <?= $info_user['HoTen'] ?>
                                        </h4>
                                    </div>
                                </div>
                            </a>
                        <?php else: ?>
                            <a href="<?= $base_url ?>user/register"
                                class="btn btn-outline-primary p-3 mr-2 line-height-1">Đăng ký</a>
                            <a href="<?= $base_url ?>user/login" class="btn btn-outline-primary p-3 mr-4 line-height-1">Đăng
                                nhập</a>
                        <?php endif; ?>

                        <a href="<?= $base_url ?>page/wishlist" class="header-icon">
                            <i class="fa-regular fa-heart"></i>
                        </a>

                        <!-- menu mobile -->
                        <div class="dropdown cart-dropdown">
                            <a href="#" title="Cart" class="dropdown-toggle cart-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="minicart-icon"></i>
                                <span class="cart-count badge-circle">
                                    <?php

                                    if (isset($_SESSION['user'])) {
                                        echo $count_cart;
                                    } else {
                                        echo "0";
                                    }

                                    ?>
                                </span>
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="active  dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>

                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Giỏ hàng</div>

                                    <?php

                                    if (isset($_SESSION['user'])):
                                        foreach ($show_cart_for_user as $value):
                                            extract($value)
                                                ?>
                                            <div class="dropdown-cart-products">
                                                <div class="product">
                                                    <div class="product-details">
                                                        <h4 class="product-title">
                                                            <a href="">
                                                                <?= $TenSP ?>
                                                            </a>
                                                        </h4>

                                                        <span class="cart-product-info">
                                                            <span class="cart-product-qty">Số lượng:
                                                                <?= $SoLuongSP ?> sản phẩm
                                                            </span>
                                                            <p>Tổng giá
                                                                <?= number_format($SoLuongSP * $Gia, 0, ",", ".") ?> VNĐ
                                                            </p>
                                                        </span>
                                                    </div>

                                                    <figure class="product-image-container">
                                                        <a href="" class="product-image">
                                                            <img src="<?= $base_url ?>upload/products/<?= $AnhSP ?>"
                                                                alt="product" width="80" height="80">
                                                        </a>

                                                        <a href="<?= $base_url ?>delete_cart/<?= $MaSP ?>" class="btn-remove"
                                                            title="Remove Product"><span>×</span></a>
                                                    </figure>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                        <div class="dropdown-cart-action">
                                            <a href="<?= $base_url ?>gio-hang" class="btn btn-gray btn-block view-cart">Xem
                                                giỏ hàng</a>
                                        </div>
                                    <?php else: ?>
                                        <?php
                                        echo
                                            '<div class="alert alert-rounded alert-danger">
                                        <i class="fa fa-exclamation-circle" style="color: #ef8495;"></i>
                                        <p class="text-heading">Vui lòng đăng nhập để xem sản phẩm.</p>
                                    </div>';
                                    endif;
                                    ?>


                                    <!-- <div class="dropdown-cart-total">
                                        <span>TỔNG PHỤ:</span>

                                        <span class="cart-total-price float-right">Giá tiền</span>
                                    </div> -->


                                </div>
                            </div>
                        </div>

                        <!-- mobile -->
                        <div
                            class="header-search header-search-popup header-search-category text-right d-flex d-lg-none">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i><span>Tìm
                                    kiếm</span></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="" id=""
                                        placeholder="Nhập tên sản phẩm..." required>
                                    <div class="select-custom">

                                    </div>
                                    <button class="btn p-0" type="submit"><i class="icon-magnifier"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom sticky-header" data-sticky-options="{'mobile': false}">
                <div class="container-fluid">
                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="<?= (strpos($view_name, 'home')) ? 'active' : '' ?>">
                                    <a href="<?= $base_url ?>page/home">Trang chủ</a>
                                </li>
                                <li class="d-none d-xl-block <?= (strpos($view_name, 'danhmuc')) ? 'active' : '' ?>">
                                    <a href="<?= $base_url ?>">Danh mục</a>
                                    <ul>
                                        <?php
                                            $danhmuc = $danhmucmuc;
                                            foreach ($danhmucmuc as $item_dmmuc) {
                                                // Điêu kiện để lấy danh mục cha
                                                if ($item_dmmuc['MaDMC'] == 0) {
                                        ?>

                                                <li><a href="<?= $base_url ?>category/detail/<?= $item_dmmuc['MaDM'] ?>"><?=$item_dmmuc['TenDM']?></a>
                                                    <ul>
                                                        <?php foreach ($danhmuc as $item_dm) {
                                                            if ($item_dm['MaDMC'] != 0 && $item_dm['MaDMC'] == $item_dmmuc['MaDM']) {
                                                        ?>
                                                                <li><a href="<?= $base_url ?>category/detail/<?= $item_dm['MaDM'] ?>"><?=$item_dm['TenDM']?></a></li>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>

                                        <?php
                                            } 
                                        }
                                        ?>

                                    </ul>

                                </li>
                                <li class="<?= (strpos($view_name, 'shop')) ? 'active' : '' ?>">
                                    <a href="<?= $base_url ?>page/shop">Sản phẩm</a>
                                </li>
                                <li class="<?= (strpos($view_name, 'contact')) ? 'active' : '' ?>">
                                    <a href="<?= $base_url ?>page/contact">Liên hệ</a>
                                </li>
                                <li class="<?= (strpos($view_name, 'aboutUs')) ? 'active' : '' ?>">
                                    <a href="<?= $base_url ?>page/aboutUs">Về chúng tôi</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- search -->
                    <div class="d-flex pr-0">
                        <div class="header-search-main header-search header-search-category text-right">
                            <form id="form_search" action="<?= $base_url ?>page/search" method="post">

                                <div class="input-group input-group-main input-focus">
                                    <input autocomplete="off" class="form-input" id="search_ajax" type="text"
                                        name="search_key" placeholder="Nhập sản phẩm cần tìm...">
                                    <div id="search_result" class="row input-search">
                                    </div>
                                    <input type="submit" name="search" value="Tìm ngay" class="btn-primary"
                                        style="border-radius: 0 5px 5px 0;">

                                </div>
                            </form>
                        </div>

                        <script>
                            $(document).ready(function () {
                                $('#search_ajax').focus(function () {
                                    $('#search_result').addClass('d-flex');
                                });

                                $(document).click(function (e) {
                                    var t = $(e.target);

                                    if (!t.is('#search_ajax') && !t.is('#search_result')) {
                                        $('#search_result').hide();
                                    }
                                });
                            })
                        </script>

                    </div>
                </div>
        </header>

        <main class="main">
            <!-- ruot cua WEBSITE -->
            <?php include_once 'view/v_' . $view_name . '.php'; ?>
        </main>

        <footer class="footer">
            <div class="footer-middle">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <a href="#">
                                <img class="logo mb-3" src="<?= $base_url ?>upload/logo.png" alt="SHop bé yêu"
                                    width="113" height="48"></a>

                            <div class="row">
                                <div class="col-sm-6 pr-sm-0">
                                    <div class="contact-widget m-b-3">
                                        <h4 class="widget-title font2">ĐỊA CHỈ:</h4>
                                        <a href="#">Cao đẳng FPT</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 pl-sm-0">
                                    <div class="contact-widget m-b-3">
                                        <h4 class="widget-title font2">PHONE:</h4>
                                        <a href="#">19001010</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 pr-sm-0">
                                    <div class="contact-widget m-b-3">
                                        <h4 class="widget-title font2">EMAIL:</h4>
                                        <a href=""><span class="__cf_email__" data-cfemail="">
                                                shopbeyeu@contact.com</span></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 pl-sm-0">
                                    <div class="contact-widget m-b-3">
                                        <h4 class="widget-title font2">
                                            NGÀY/GIỜ LÀM VIỆC:
                                        </h4>
                                        <a href="#">Thứ hai - Chủ nhật: 8:00 - 21:00</a>
                                    </div>
                                </div>
                            </div>
                            <div class="social-icons mt-1 mb-3">
                                <a href="#" class="social-icon social-facebook" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon social-twitter" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon social-linkedin" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-2">
                            <div class="widget">
                                <h4 class="widget-title">Tài khoản</h4>
                                <div class="row link-lg link-parts">
                                    <ul class="links mb-0">
                                        <li>
                                            <a href="dashboard.html">Tài khoản của tôi</a>
                                        </li>
                                        <li><a href="#">Theo dõi đơn hàng của bạn</a></li>
                                        <li><a href="#">Phương thức thanh toán</a></li>
                                        <li><a href="#">Hướng dẫn vận chuyển</a></li>
                                        <li><a href="#">Câu hỏi thường gặp</a></li>
                                        <li><a href="#">Hỗ trợ sản phẩm</a></li>
                                        <li><a href="#">Quyền riêng tư</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="widget">
                                <h4 class="widget-title">VỀ CHÚNG TÔI</h4>
                                <div class="row">
                                    <ul class="links mb-0">
                                        <li>
                                            <a href="about.html">Về BEYEU</a>
                                        </li>
                                        <li><a href="#">Cam kết của chúng tôi</a></li>
                                        <li><a href="#">Điều khoản và điều kiện</a></li>
                                        <li><a href="#">Chính sách quyền riêng tư</a></li>
                                        <li><a href="#">Chính sách đổi trả</a></li>
                                        <li>
                                            <a href="#">Yêu cầu quyền sở hữu trí tuệ</a>
                                        </li>
                                        <li><a href="#">Bản đồ trang Web</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-2">
                            <div class="widget">
                                <h4 class="widget-title">BẢN TIN</h4>
                                <div class="widget-newsletter">
                                    <div class="widget-newsletter-info">
                                        <p class="widget-newsletter-content m-b-4">Nhận thông tin mới nhất về Sự kiện,
                                            Khuyến mãi và Ưu đãi. Đăng ký nhận bản tin ngay hôm nay.</p>
                                    </div>
                                    <form action="#">
                                        <div class="footer-submit-wrapper d-flex">
                                            <input type="email" class="form-control mb-0" placeholder="Địa chỉ Email"
                                                size="40" required>
                                            <button type="submit" class="btn btn-primary btn-sm ls-0">Đăng ký</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container-fluid d-sm-flex align-items-center">
                    <div class="footer-left">
                        <span class="footer-copyright">© Cửa hàng bé yêu. 2023. Đã đăng ký.</span>
                    </div>

                    <div class="footer-right ml-auto mt-1 mt-sm-0">
                        <img src="<?= $base_url ?>upload/payment-icon.png" alt="payment">
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- loading -->
    <!-- <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div> -->

    <div class="mobile-menu-overlay"></div>

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="<?= $base_url ?>page/home">Trang chủ</a></li>
                    <li>
                        <a href="">Danh mục</a>
                        <ul>
                            <?php
                            $kiemtra_dm = null; // Biến để theo dõi TenDM hiện tại
                            foreach ($danhmuc as $item_dm):
                                if ($item_dm['TenDM'] != $kiemtra_dm): // Kiểm tra nếu TenDM thay đổi
                                    if ($kiemtra_dm != null): // Kiểm tra nếu không phải là lần đầu tiên
                                        echo '</ul></li>'; // Đóng các thẻ ul và li trước đó
                                    endif;
                                    $kiemtra_dm = $item_dm['TenDM']; // Cập nhật TenDM hiện tại
                                    ?>
                                    <li>
                                        <a href="<? $base_url ?>'category/detail/'<? $item_dm['MaDM'] ?>" class="nolink">
                                            <?= $item_dm['TenDM'] ?>
                                        </a>
                                        <ul>
                                        <?php endif; ?>
                                        <li><a
                                                href="<?= $base_url ?>category/detail/<?= $item_dm['MaDM'] ?>/<?= $item_dm['MaDMC'] ?>">
                                                <?= $item_dm['TenDMC'] ?>
                                            </a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Sản phẩm</a></li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="blog.html">Liên hệ</a></li>
                    <li><a href="contact.html">Về chúng tôi</a></li>
                    <li><a href="wishlist.html">My Wishlist</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="login.html" class="login-link">Log In</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="<?= $base_url ?>page/home">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div>
    </div>

    <!-- popup  -->
    <!-- <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form"
        style="background: #f1f1f1 no-repeat center/cover url(<?= $base_url ?>upload/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="<?= $base_url ?>upload/logo-black.png" alt="Logo" class="logo-newsletter" width="111" height="44">
            <h2 class="ls-n-25">Subscribe to newsletter</h2>

            <p class="font2">
                Subscribe to the Porto mailing list to receive updates on new
                arrivals, special offers and our promotions.
            </p>

            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email"
                        placeholder="Your email address" required />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                    <label for="show-again" class="custom-control-label font2">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div>

        <button title="Close (Esc)" type="button" class="mfp-close">
            ×
        </button>
    </div> -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="fa-solid fa-arrow-up"></i></a>

    <!-- Messenger Plugin chat Code -->

    <!-- Plugins JS File -->
    <script src="<?= $base_url ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $base_url ?>assets/js/plugins.min.js"></script>
    <script src="<?= $base_url ?>assets/js/optional/isotope.pkgd.min.js"></script>
    <script src="<?= $base_url ?>assets/js/jquery.appear.min.js"></script>
    <script src="<?= $base_url ?>assets/js/jquery.plugin.min.js"></script>
    <script src="<?= $base_url ?>assets/js/main.min.js"></script>
    <script src="<?= $base_url ?>assets/js/map.js"></script>

    <script script>
        function ThemSPYT(MaSP) {
            $.ajax({
                type: "POST",
                url: "<?= $base_url ?>controller/ajax.php?act=addwish",
                data: {
                    MaSP: MaSP
                },
                success: function (response) {
                    console.log('Success:', response);
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            })
        }
    </script>

    <script>
        
        $(document).ready(function () {
            $("#search_ajax").keyup(function () {
                var search_item = $(this).val();
                if (search_item != "") {
                    $.ajax({
                        url: '<?= $base_url ?>controller/ajax.php?act=ajax_search',
                        method: 'POST',
                        data: {
                            keyword: search_item
                        },
                        success: function (data) {
                            // // console.log(result);
                            $("#search_result").html(data)
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    })
                }
            })
            function data_option() {
                var data = $('#select_data').val();
                $.ajax({
                    url: "<?= $base_url ?>controller/ajax.php?act=select_option",
                    type: "POST",
                    data: {
                        search_key: data
                    },
                    success: function (data) {
                        $('.product-default_option').html(data);
                    }
                });
            }
            $('#select_data').on('change', function () {
                data_option();
            })
        })

    </script>
</body>



</html>