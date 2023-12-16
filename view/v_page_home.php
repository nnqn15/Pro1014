<section class="intro-section mb-3">
    <div class="home-slider slide-animate owl-carousel owl-theme" data-owl-options="{
                        'nav': false,
                        'responsive': {
                            '1440': {
                                'nav': true
                            }
                        }
                    }">
        <?php foreach ($showbanner as $item_banner): ?>
            <div class="home-slide-1 banner">
                <img class="slide-bg" src="<?= $base_url ?>upload/banners/<?= $item_banner['AnhBanner'] ?>"
                    alt="slider image" width="1200" height="400">

                <div class="banner-layer banner-layer-middle banner-layer-left">
                    <div class="container-fluid">
                        <div class="appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                            <h2 class="font-weight-light ls-10 text-primary">Khám phá sự ra đời của chúng tôi</h2>
                            <a href="demo23-shop.html" class="btn btn-link"><i>Xem sản phẩm của chúng tôi</i><i
                                    class="fa-solid fa-angles-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- <div class="home-slide-2 banner">
            <img class="slide-bg" src="upload/2.png" alt="slider image" width="1200" height="575">

            <div class="banner-layer banner-layer-middle banner-layer-right w-100">
                <div class="container-fluid">
                    <div class="col-6 offset-6 appear-animate" data-animation-name="fadeInRightShorter"
                        data-animation-delay="200">
                        <h2 class="font-weight-light ls-10 text-primary">Bộ sưu tập hợp thời trang</h2>
                        <a href="demo23-shop.html" class="btn btn-link"><i>Xem sản phẩm đặc biệt của chúng tôi</i><i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>

<section class="welcome-section">
    <div class="container">
        <h2 class="section-title text-center text-uppercase appear-animate" data-animation-name="fadeInUpShorter"
            data-animation-delay="200">Chào mừng bạn đến với Cửa hàng bé yêu</h2>
        <p class="section-description text-center mb-3 appear-animate" data-animation-name="fadeInUpShorter"
            data-animation-delay="400">Tận hưởng chất lượng vượt trội trong tất cả các sản phẩm của chúng tôi
        </p>

        <div class="row mb-2">
            <div class="col-md-8 col-lg-6">
                <div class="banner banner1 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #d8d8d8;">
                    <figure>
                        <img src="<?= $base_url ?>upload/discount.png" alt="banner" width="580" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-end justify-content-center">
                        <div class="text-justify">
                            <h3 class="font4 font-weight-bold ls-n-25 text-uppercase mb-1">GIẢM GIÁ</h3>
                            <h4 class="ls-n-25 text-uppercase">Lên đến 70%</h4>
                            <a href="demo23-shop.html" class="btn btn-link"><i>Xem giao dịch của chúng tôi</i><i
                                    class="fa-solid fa-angles-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="banner banner2 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #f0f5f8;">
                    <figure>
                        <img src="<?= $base_url ?>upload/dobo.png" alt="banner" width="280" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-center justify-content-end">
                        <h2 class="ls-n-25 text-uppercase">Nổi bật mùa hè</h2>
                        <a href="demo23-shop.html" class="btn btn-link"><i>
                                Xem sản phẩm nổi bật của chúng tôi</i><i class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="banner banner3 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #ededed;">
                    <figure>
                        <img src="<?= $base_url ?>upload/mevabe.png" alt="banner" width="280" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-center justify-content-between">
                        <h2 class="font-weight-bold ls-n-25 text-center text-uppercase">Mẹ &amp;
                            Bé gái</h2>
                        <a href="demo23-shop.html" class="btn btn-link"><i>Xem trang phục của chúng tôi</i><i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="banner banner4 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #f5f6f8;">
                    <figure>
                        <img src="<?= $base_url ?>upload/doembe.png" alt="banner" width="560" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-center">
                        <h2 class="ls-n-25 text-uppercase">Trang phục cho bé</h2>
                        <a href="demo23-shop.html" class="btn btn-link"><i>Xem trang phục của chúng tôi</i><i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="banner banner5 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #f5ecef;">
                    <figure>
                        <img src="<?= $base_url ?>upload/dress.png" alt="banner" width="280" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-center justify-content-between">
                        <h2 class="ls-n-25 text-uppercase">Váy trẻ em</h2>
                        <a href="demo23-shop.html" class="btn btn-link"><i>Xem trang phục của chúng tôi</i><i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-6">
                <div class="banner banner6 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #e2e2e2;">
                    <figure>
                        <img src="<?= $base_url ?>upload/shoes.png" alt="banner" width="280" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-center justify-content-between">
                        <h2 class="ls-n-25 text-uppercase">Giày cho bé</h2>
                        <a href="demo23-shop.html" class="btn btn-link"><i>Xem ưu đãi của chúng tôi</i><i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="info-boxes-container appear-animate" data-animation-name="fadeInUpShorter"
            data-animation-delay="200">
            <div class="row m-0">
                <div class="info-box info-box-icon-left col-md-4">
                    <i class="fa-solid fa-truck-moving"></i>

                    <div class="info-box-content">
                        <h4 class="ls-n-25">MIỄN PHÍ GIAO HÀNG &amp; HOÀN TRẢ</h4>
                        <p class="font2 font-weight-light">Miễn phí giao hàng cho tất cả hóa đơn từ </p>
                    </div><!-- End .info-box-content -->
                </div><!-- End .info-box -->
                <div class="info-box info-box-icon-left col-md-4">
                    <i class="fa-solid fa-hand-holding-dollar"></i>

                    <div class="info-box-content">
                        <h4 class="ls-n-25">ĐẢM BẢO HOÀN TRẢ TIỀN</h4>
                        <p class="font2 font-weight-light">100% hoàn lại tiền</p>
                    </div><!-- End .info-box-content -->
                </div><!-- End .info-box -->
                <div class="info-box info-box-icon-left col-md-4">
                    <i class="fa-solid fa-headset"></i>

                    <div class="info-box-content">
                        <h4 class="ls-n-25">HỖ TRỢ TRỰC TIẾP 24/7</h4>
                        <p class="font2 font-weight-light">.</p>
                    </div><!-- End .info-box-content -->
                </div><!-- End .info-box -->
            </div>
        </div>

        <div class="row appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="400">
            <?php foreach ($dsMoi as $product): ?>
                <?php if (!$product['GiaGiam']): ?>
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>">
                                    <img src="<?= $base_url ?>upload/products/<?= $product['AnhSP']; ?>" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="<?= $base_url ?>product/detail/<?= $product['MaSP']; ?>"
                                        class="btn-icon btn-add-cart fa-solid fa-cart-shopping"></a>
                                </div>
                                <div  class="details">
                                <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>"title="Quick View">Xem chi tiết</a>
                                </div>
                                
                            </figure>
                           
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>"
                                            class="product-category">
                                            <?= $product['TenDM']; ?>
                                        </a>
                                    </div>
                                    <a href="<?= $base_url ?>page/wishlist" <?php if (isset($_SESSION['user'])) {
                                          $MaTK = $_SESSION['user']['MaTK'];
                                          $CheckWish = check_wishByProductAndUser($MaTK, $product['MaSP']);
                                          if ($CheckWish != "") {
                                              echo 'title="Đến trang yêu thích" class="btn-icon-wish added-wishlist" ';
                                          } else {
                                              echo 'onclick="ThemSPYT(' . $product['MaSP'] . ')" title="Yêu thích sản phẩm" class="btn-icon-wish"';
                                          }
                                      } ?>><i class="fa-solid fa-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>">
                                        <?= $product['TenSP']; ?>
                                    </a>
                                </h3>
                                <?php
                                $product['rating'] = ratings_trungbinh($product['MaSP']);
                                if ($product['rating']['SoSao'] != "" && $product['rating']['SoBinhLuan'] > 0) {
                                    $product['trungbinh_rating'] = ceil(($product['rating']['SoSao'] * 10) / ($product['rating']['SoBinhLuan'] / 2));
                                } else {
                                    $product['trungbinh_rating'] = 0;
                                }
                                ?>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:<?= $product['trungbinh_rating'] ?>%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">
                                        <?= number_format($product['Gia'], 0, ",", ".") ?>đ
                                    </span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>">
                                    <img src="<?= $base_url ?>upload/products/<?= $product['AnhSP']; ?>" alt="product"
                                        style="width: 207px; height: 220px;">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-
                                        <?= substr((($product['Gia'] - $product['GiaGiam']) / $product['Gia']) * 100, 0, 2) ?>%
                                    </div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="<?= $base_url ?>product/detail/<?= $product['MaSP']; ?>"
                                        class="btn-icon btn-add-cart fa-solid fa-cart-shopping"></a>
                                </div>
                                <div  class="details">
                                <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>"title="Quick View">Xem chi tiết</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>"
                                            class="product-category">
                                            <?= $product['TenDM']; ?>
                                        </a>
                                    </div>
                                    <a href="<?= $base_url ?>page/wishlist" <?php if (isset($_SESSION['user'])) {
                                          $MaTK = $_SESSION['user']['MaTK'];
                                          $CheckWish = check_wishByProductAndUser($MaTK, $product['MaSP']);
                                          if ($CheckWish != "") {
                                              echo 'title="Đến trang yêu thích" class="btn-icon-wish added-wishlist" ';
                                          } else {
                                              echo 'onclick="ThemSPYT(' . $product['MaSP'] . ')" title="Yêu thích sản phẩm" class="btn-icon-wish"';
                                          }
                                      } ?>><i class="fa-solid fa-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>">
                                        <?= $product['TenSP']; ?>
                                    </a>
                                </h3>
                                <?php
                                $product['rating'] = ratings_trungbinh($product['MaSP']);
                                if ($product['rating']['SoSao'] != "" && $product['rating']['SoBinhLuan'] > 0) {
                                    $product['trungbinh_rating'] = ceil(($product['rating']['SoSao'] * 10) / ($product['rating']['SoBinhLuan'] / 2));
                                } else {
                                    $product['trungbinh_rating'] = 0;
                                }
                                ?>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:<?= $product['trungbinh_rating'] ?>%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">
                                        <?= number_format($product['Gia'], 0, ",", ".") ?>đ
                                    </span>
                                    <span class="product-price">
                                        <?= number_format($product['GiaGiam'], 0, ",", ".") ?>đ
                                    </span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="cats-banner-section mb-3">
    <div class="row m-0 no-gutters">
        <div class="col-lg-3">
            <div class="cat-banner d-flex flex-column align-items-center justify-content-center h-100">
                <h4 class="font4 line-height-1 ls-0 text-primary mb-0">BỘ SƯU TẬP TỐT NHẤT</h4>
                <p class="font2 line-height-1 mb-0">Sản phẩm chọn lọc từ các thương hiệu nổi tiếng</p>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="categories-slider owl-carousel owl-theme" data-owl-options="{
                            'margin': 0,
                            'nav': false,
                            'items': 1,
                            'responsive': {
                                '576': {
                                    'items': 2
                                },
                                '768': {
                                    'items': 3
                                },
                                '992': {
                                    'items': 3
                                }
                            }
                        }">
                <div class="product-category" style="background-color: #d8dfe1;">
                    <a href="demo23-shop.html">
                        <figure>
                            <img src="<?= $base_url ?>upload/products/cats/cat-1.jpg" alt="cat banner" width="500"
                                height="400">
                        </figure>

                        <div class="category-content">
                            <h3>BÉ TRAI</h3>
                        </div>
                    </a>
                </div>
                <div class="product-category" style="background-color: #ebeae9;">
                    <a href="demo23-shop.html">
                        <figure>
                            <img src="<?= $base_url ?>upload/products/cats/cat-3.jpg" alt="cat banner" width="500"
                                height="400">
                        </figure>

                        <div class="category-content">
                            <h3>BÉ GÁI</h3>
                        </div>
                    </a>
                </div>
                <div class="product-category" style="background-color: #ead7d5;">
                    <a href="demo23-shop.html">
                        <figure>
                            <img src="<?= $base_url ?>upload/products/cats/cat-2.jpg" alt="cat banner" width="500"
                                height="400">
                        </figure>

                        <div class="category-content">
                            <h3>TRẺ SƠ SINH</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="products-container appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
    <div class="container">
        <div class="row">
            <?php foreach ($dsGhim as $product): ?>
                <?php if (!$product['GiaGiam']): ?>
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>">
                                    <img src="<?= $base_url ?>upload/products/<?= $product['AnhSP']; ?>" alt="product"
                                        style="width: 207px; height: 220px;">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="<?= $base_url ?>product/detail/<?= $product['MaSP']; ?>"
                                        class="btn-icon btn-add-cart fa-solid fa-cart-shopping"></a>
                                </div>
                                <div  class="details">
                                <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>"title="Quick View">Xem chi tiết</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>"
                                            class="product-category">
                                            <?= $product['TenDM']; ?>
                                        </a>
                                    </div>
                                    <a href="<?= $base_url ?>page/wishlist" <?php if (isset($_SESSION['user'])) {
                                          $MaTK = $_SESSION['user']['MaTK'];
                                          $CheckWish = check_wishByProductAndUser($MaTK, $product['MaSP']);
                                          if ($CheckWish != "") {
                                              echo 'title="Đến trang yêu thích" class="btn-icon-wish added-wishlist" ';
                                          } else {
                                              echo 'onclick="ThemSPYT(' . $product['MaSP'] . ')" title="Yêu thích sản phẩm" class="btn-icon-wish"';
                                          }
                                      } ?>><i class="fa-solid fa-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>">
                                        <?= $product['TenSP']; ?>
                                    </a>
                                </h3>
                                <?php
                                $product['rating'] = ratings_trungbinh($product['MaSP']);
                                if ($product['rating']['SoSao'] != "" && $product['rating']['SoBinhLuan'] > 0) {
                                    $product['trungbinh_rating'] = ceil(($product['rating']['SoSao'] * 10) / ($product['rating']['SoBinhLuan'] / 2));
                                } else {
                                    $product['trungbinh_rating'] = 0;
                                }
                                ?>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:<?= $product['trungbinh_rating'] ?>%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">
                                        <?= number_format($product['Gia'], 0, ",", ".") ?>đ
                                    </span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>">
                                    <img src="<?= $base_url ?>upload/products/<?= $product['AnhSP']; ?>" alt="product"
                                        style="width: 207px; height: 220px;">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-
                                        <?= substr((($product['Gia'] - $product['GiaGiam']) / $product['Gia']) * 100, 0, 2) ?>%
                                    </div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="<?= $base_url ?>product/detail/<?= $product['MaSP']; ?>"
                                        class="btn-icon btn-add-cart fa-solid fa-cart-shopping"></a>
                                </div>
                                <div  class="details">
                                <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>"title="Quick View">Xem chi tiết</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>"
                                            class="product-category">
                                            <?= $product['TenDM']; ?>
                                        </a>
                                    </div>
                                    <a href="<?= $base_url ?>page/wishlist" <?php if (isset($_SESSION['user'])) {
                                          $MaTK = $_SESSION['user']['MaTK'];
                                          $CheckWish = check_wishByProductAndUser($MaTK, $product['MaSP']);
                                          if ($CheckWish != "") {
                                              echo 'title="Đến trang yêu thích" class="btn-icon-wish added-wishlist" ';
                                          } else {
                                              echo 'onclick="ThemSPYT(' . $product['MaSP'] . ')" title="Yêu thích sản phẩm" class="btn-icon-wish"';
                                          }
                                      } ?>><i class="fa-solid fa-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="<?= $base_url ?>product/detail/<?= $product['MaSP'] ?>">
                                        <?= $product['TenSP']; ?>
                                    </a>
                                </h3>
                                <?php
                                $product['rating'] = ratings_trungbinh($product['MaSP']);
                                if ($product['rating']['SoSao'] != "" && $product['rating']['SoBinhLuan'] > 0) {
                                    $product['trungbinh_rating'] = ceil(($product['rating']['SoSao'] * 10) / ($product['rating']['SoBinhLuan'] / 2));
                                } else {
                                    $product['trungbinh_rating'] = 0;
                                }
                                ?>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:<?= $product['trungbinh_rating'] ?>%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">
                                        <?= number_format($product['Gia'], 0, ",", ".") ?>đ
                                    </span>
                                    <span class="product-price">
                                        <?= number_format($product['GiaGiam'], 0, ",", ".") ?>đ
                                    </span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>



<div class="brands-section">
    <div class="container">
        <div class="brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn"
            data-animation-delay="400" data-owl-options="{
                    'margin': 30,
                    'responsive': {
                        '991': {
                            'items': 4
                        },
                        '1200': {
                            'items': 5
                        }
                    }
                }">
            <img src="<?= $base_url ?>upload/brands/brand1.png" width="200" height="50" alt="brand">
            <img src="<?= $base_url ?>upload/brands/brand2.png" width="200" height="50" alt="brand">
            <img src="<?= $base_url ?>upload/brands/brand3.png" width="200" height="50" alt="brand">
            <img src="<?= $base_url ?>upload/brands/brand4.png" width="200" height="50" alt="brand">
            <img src="<?= $base_url ?>upload/brands/brand5.png" width="200" height="50" alt="brand">
        </div><!-- End .brands-slider -->
    </div>
</div>