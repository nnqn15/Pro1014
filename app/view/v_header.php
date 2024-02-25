<?php
$danhmuc = $data["danhmuc"];
$danhmucmuc = $data["danhmucmuc"];
if (isset($_SESSION['user'])) {
    $info_user = $data["info_user"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $titlepage ?>
    </title>
    <meta name="description" content="Website bán hàng">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>public/upload/icons/favicon.png">
    <!-- linh cdn fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/fontawsome.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style23.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/demo23.min.css">
    <!-- <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/all.min.css"> -->

    <!-- Js -->
    <script src="<?= BASE_URL ?>public/assets/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>public/assets/js/validate.js"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2P2HKGGNHM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-2P2HKGGNHM');
    </script>

    <style>
        html {
            font-family: Arial, Helvetica, sans-serif;
        }

        .product-default .details {
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

        .product-default .details a {
            font-size: 16px;
            transition: all 0.25s ease;
        }

        .details a:hover {
            color: white;
        }

        .product-default :hover .details {
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
                Code:&nbsp;<b class="text-uppercase">km10</b>&nbsp;| Hạn chế áp dụng.&nbsp;<a href="<?= BASE_URL ?>discount" class="text-dark">Xem tất cả ưu đãi</a>
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
                        <a href="<?= BASE_URL ?>" class="logo">
                            <img src="<?= BASE_URL ?>public/upload/logo.png" alt="Porto Logo" width="113" height="48">
                        </a>
                    </div>

                    <div class="header-right">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <a href="<?= BASE_URL ?>user" class="header-icon d-lg-block d-none">
                                <div class="header-user">
                                    <img src="<?= BASE_URL ?>public/upload/avatar/<?= $info_user['HinhAnh'] ?>" alt="Avatar">
                                    <div class="header-userinfo">
                                        <span class="d-inline-block font2 line-height-1">Xin chào!</span>
                                        <h4 class="mb-0">
                                            <?= $info_user['HoTen'] ?>
                                        </h4>
                                    </div>
                                </div>
                            </a>
                        <?php else : ?>
                            <a href="<?= BASE_URL ?>user/register" class="btn btn-outline-primary p-3 mr-2 line-height-1">Đăng ký</a>
                            <a href="<?= BASE_URL ?>user/login" class="btn btn-outline-primary p-3 mr-4 line-height-1">Đăng
                                nhập</a>
                        <?php endif; ?>

                        <a href="<?= BASE_URL ?>wishlist" class="header-icon">
                            <i class="fa-regular fa-heart"></i>
                        </a>

                        <!-- menu mobile -->
                        <div class="dropdown cart-dropdown">
                            <a href="#" title="Cart" class="dropdown-toggle cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="minicart-icon"></i>
                                <span class="cart-count badge-circle">
                                    <?php

                                    if (isset($_SESSION['user'])) {
                                        $count_cart = $data["count_cart"];
                                        echo $count_cart;
                                    } else {
                                        if (isset($_SESSION['giohang'])) {
                                            echo count($_SESSION['giohang']);
                                        } else {
                                            echo 0;
                                        }
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

                                    if (isset($_SESSION['user'])) :
                                        $show_cart_for_user = $data["show_cart_for_user"];
                                        if (!$show_cart_for_user) : ?>
                                            <h3 class="text-center">Giỏ hàng trống!</h3>
                                        <?php else : ?>
                                            <?php foreach ($show_cart_for_user as $value) :
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
                                                                <img src="<?= BASE_URL ?>public/upload/products/<?= $AnhSP ?>" alt="product" width="80" height="80">
                                                            </a>

                                                            <a href="<?= BASE_URL ?>delete_cart&MaSP=<?= $MaSP ?>" class="btn-remove" title="Remove Product"><span>×</span></a>
                                                        </figure>
                                                    </div>
                                                </div>
                                        <?php endforeach;
                                        endif; ?>

                                    <?php else : ?>
                                        <?php
                                        if (!isset($_SESSION['giohang'])) {
                                            echo '<h3 class="text-center">Giỏ hàng trống!</h3>';
                                        } else { ?>
                                            <?php foreach ($_SESSION['giohang'] as $value) :
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
                                                                <img src="<?= BASE_URL ?>public/upload/products/<?= $AnhSP ?>" alt="product" width="80" height="80">
                                                            </a>

                                                            <a href="<?= BASE_URL ?>delete_cart&MaSP=<?= $MaSP ?>" class="btn-remove" title="Remove Product"><span>×</span></a>
                                                        </figure>
                                                    </div>
                                                </div>
                                        <?php endforeach;
                                        } ?>
                                    <?php endif;
                                    ?>
                                    <div class="dropdown-cart-action">
                                        <a href="<?= BASE_URL ?>cart" class="btn btn-gray btn-block view-cart">Xem
                                            giỏ hàng</a>
                                    </div>

                                    <!-- <div class="dropdown-cart-total">
                                        <span>TỔNG PHỤ:</span>

                                        <span class="cart-total-price float-right">Giá tiền</span>
                                    </div> -->


                                </div>
                            </div>
                        </div>

                        <!-- mobile -->
                        <div class="header-search header-search-popup header-search-category text-right d-flex d-lg-none">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i><span>Tìm
                                    kiếm</span></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="" id="" placeholder="Nhập tên sản phẩm..." required>
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
                                <li class="">
                                    <a href="<?= BASE_URL ?>">Trang chủ</a>
                                </li>
                                <li class="d-none d-xl-block">
                                    <a href="">Danh mục</a>
                                    <ul>
                                        <?php
                                        $danhmuc = $danhmucmuc;
                                        foreach ($danhmucmuc as $item_dmmuc) {
                                            // Điêu kiện để lấy danh mục cha
                                            if ($item_dmmuc['MaDMC'] == 0) {
                                        ?>

                                                <li><a href="<?= BASE_URL ?>danhmuc/<?=create_slug($item_dmmuc['TenDM'])?>"><?= $item_dmmuc['TenDM'] ?></a>
                                                    <ul>
                                                        <?php foreach ($danhmuc as $item_dm) {
                                                            if ($item_dm['MaDMC'] != 0 && $item_dm['MaDMC'] == $item_dmmuc['MaDM']) {
                                                        ?>
                                                                <li><a href="<?= BASE_URL ?>danhmuc/<?=create_slug($item_dmmuc['TenDM'])?>"><?= $item_dm['TenDM'] ?></a></li>
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
                                <li class="">
                                    <a href="<?= BASE_URL ?>product">Sản phẩm</a>
                                </li>
                                <li class="">
                                    <a href="<?= BASE_URL ?>contact">Liên hệ</a>
                                </li>
                                <li class="">
                                    <a href="<?= BASE_URL ?>aboutUs">Về chúng tôi</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- search -->
                    <div class="d-flex pr-0">
                        <div class="header-search-main header-search header-search-category text-right">
                            <form id="form_search" action="<?= BASE_URL ?>linksearch" method="post">
                                <div class="input-group input-group-main input-focus">
                                    <input autocomplete="off" class="form-input" id="search_ajax" type="text" name="keyword" placeholder="Nhập sản phẩm cần tìm...">
                                    <div id="search_result" class="row input-search">
                                    </div>
                                    <input type="submit" name="search" value="Tìm ngay" class="btn-primary" style="border-radius: 0 5px 5px 0;">

                                </div>
                            </form>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#search_ajax').keyup(function() {
                                    $('#search_result').addClass('d-flex');
                                });
                                $(document).click(function(e) {
                                    var t = $(e.target);
                                    if (!t.is('#search_ajax') && !t.is('#search_result') && !t.closest('#search_result').length) {
                                        $('#search_result').removeClass('d-flex').hide();
                                    }
                                });
                            })
                        </script>

                    </div>
                </div>
        </header>

        <main class="main">
            <!-- ruot cua WEBSITE -->