<?php 
use app\model\productModel;
require_once 'app/view/v_header.php'; 
$dsMoi=$data["dsMoi"];
$dsGhim=$data["dsGhim"];
$showanhuser=$data["showanhuser"];
$showbanner=$data["showbanner"];
$proshow=new productModel;
?>
<section class="intro-section mb-3">
    <div class="home-slider slide-animate owl-carousel owl-theme" data-owl-options="{
                        'nav': false,
                        'responsive': {
                            '1440': {
                                'nav': true
                            }
                        }
                    }">
        <div class="home-slide-1 banner">
            <img class="slide-bg" src="<?=BASE_URL?>public/upload/banners/<?= $showbanner[0]['AnhBanner'] ?>"
                alt="slider image" width="1200" height="400">

            <div class="banner-layer banner-layer-middle banner-layer-left">
                <div class="container-fluid">
                    <div class="appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                        <h2 class="font-weight-light ls-10 text-primary">Khám phá sự ra đời của chúng tôi</h2>
                        <a href="<?=BASE_URL?>product" class="btn btn-link"><i>Xem sản phẩm của chúng tôi</i><i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-slide-2 banner">
            <img class="slide-bg" src="<?=BASE_URL?>public/upload/banners/<?= $showbanner[1]['AnhBanner'] ?>" alt="slider image" width="1200" height="400">

            <div class="banner-layer banner-layer-middle banner-layer-right w-100">
                <div class="container-fluid">
                    <div class="col-6 offset-6 appear-animate" data-animation-name="fadeInRightShorter"
                        data-animation-delay="200">
                        <h2 class="font-weight-light ls-10 text-primary">Bộ sưu tập hợp thời trang</h2>
                        <a href="<?=BASE_URL?>product" class="btn btn-link"><i>Xem sản phẩm đặc biệt của chúng tôi</i><i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
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
                        <img src="<?=BASE_URL?>public/upload/discount.png" alt="banner" width="580" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-end justify-content-center">
                        <div class="text-justify">
                            <h3 class="font4 font-weight-bold ls-n-25 text-uppercase mb-1">GIẢM GIÁ</h3>
                            <h4 class="ls-n-25 text-uppercase">Lên đến 70%</h4>
                            <a href="<?=BASE_URL?>product" class="btn btn-link"><i>Xem giao dịch của chúng tôi</i><i
                                    class="fa-solid fa-angles-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="banner banner2 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #f0f5f8;">
                    <figure>
                        <img src="<?=BASE_URL?>public/upload/dobo.png" alt="banner" width="280" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-center justify-content-end">
                        <h2 class="ls-n-25 text-uppercase">Nổi bật mùa hè</h2>
                        <a href="<?=BASE_URL?>product" class="btn btn-link"><i>
                                Xem sản phẩm nổi bật của chúng tôi</i><i class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="banner banner3 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #ededed;">
                    <figure>
                        <img src="<?=BASE_URL?>public/upload/mevabe.png" alt="banner" width="280" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-center justify-content-between">
                        <h2 class="font-weight-bold ls-n-25 text-center text-uppercase">Mẹ &amp;
                            Bé gái</h2>
                        <a href="<?=BASE_URL?>product" class="btn btn-link"><i>Xem trang phục của chúng tôi</i><i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="banner banner4 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #f5f6f8;">
                    <figure>
                        <img src="<?=BASE_URL?>public/upload/doembe.png" alt="banner" width="560" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-center">
                        <h2 class="ls-n-25 text-uppercase">Trang phục cho bé</h2>
                        <a href="<?=BASE_URL?>product" class="btn btn-link"><i>Xem trang phục của chúng tôi</i><i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="banner banner5 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #f5ecef;">
                    <figure>
                        <img src="<?=BASE_URL?>public/upload/dress.png" alt="banner" width="280" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-center justify-content-between">
                        <h2 class="ls-n-25 text-uppercase">Váy trẻ em</h2>
                        <a href="<?=BASE_URL?>product" class="btn btn-link"><i>Xem trang phục của chúng tôi</i><i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-6">
                <div class="banner banner6 mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200"
                    style="background-color: #e2e2e2;">
                    <figure>
                        <img src="<?=BASE_URL?>public/upload/shoes.png" alt="banner" width="280" height="374">
                    </figure>

                    <div class="banner-layer d-flex flex-column align-items-center justify-content-between">
                        <h2 class="ls-n-25 text-uppercase">Giày cho bé</h2>
                        <a href="<?=BASE_URL?>product" class="btn btn-link"><i>Xem ưu đãi của chúng tôi</i><i
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
            <?=$htmlSPMoi=$proshow->show_product($dsMoi);?>
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
                    <a href="<?=BASE_URL?>product">
                        <figure>
                            <img src="<?=BASE_URL?>public/upload/products/cats/cat-1.jpg" alt="cat banner" width="500"
                                height="400">
                        </figure>

                        <div class="category-content">
                            <h3>BÉ TRAI</h3>
                        </div>
                    </a>
                </div>
                <div class="product-category" style="background-color: #ebeae9;">
                    <a href="<?=BASE_URL?>product">
                        <figure>
                            <img src="<?=BASE_URL?>public/upload/products/cats/cat-3.jpg" alt="cat banner" width="500"
                                height="400">
                        </figure>

                        <div class="category-content">
                            <h3>BÉ GÁI</h3>
                        </div>
                    </a>
                </div>
                <div class="product-category" style="background-color: #ead7d5;">
                    <a href="<?=BASE_URL?>product">
                        <figure>
                            <img src="<?=BASE_URL?>public/upload/products/cats/cat-2.jpg" alt="cat banner" width="500"
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
            <?=$htmlSPGhim=$proshow->show_product($dsGhim);?>
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
            <img src="<?=BASE_URL?>public/upload/brands/brand1.png" width="200" height="50" alt="brand">
            <img src="<?=BASE_URL?>public/upload/brands/brand2.png" width="200" height="50" alt="brand">
            <img src="<?=BASE_URL?>public/upload/brands/brand3.png" width="200" height="50" alt="brand">
            <img src="<?=BASE_URL?>public/upload/brands/brand4.png" width="200" height="50" alt="brand">
            <img src="<?=BASE_URL?>public/upload/brands/brand5.png" width="200" height="50" alt="brand">
        </div><!-- End .brands-slider -->
    </div>
</div>
<?php require_once 'app/view/v_footer.php'; ?>