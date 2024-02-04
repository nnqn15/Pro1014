</main>

        <footer class="footer">
            <div class="footer-middle">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <a href="#">
                                <img class="logo mb-3" src="<?=BASE_URL?>public/upload/logo.png" alt="SHop bé yêu"
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
                        <img src="<?=BASE_URL?>public/upload/payment-icon.png" alt="payment">
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
                    <li><a href="<?=BASE_URL?>public/page/home">Trang chủ</a></li>
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
                                                href="<?=BASE_URL?>public/category/detail/<?= $item_dm['MaDM'] ?>/<?= $item_dm['MaDMC'] ?>">
                                                <?= $item_dm['TenDMC'] ?>
                                            </a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?=BASE_URL?>public/page/shop">Sản phẩm</a></li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="<?=BASE_URL?>public/page/contact">Liên hệ</a></li>
                    <li><a href="<?=BASE_URL?>public/page/aboutUs">Về chúng tôi</a></li>
                    <li><a href="<?=BASE_URL?>public/page/wishlist">Yêu thích</a></li>
                    <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="<?=BASE_URL?>public/gio-hang">Giỏ hàng</a></li>
                    <li><a href="<?=BASE_URL?>public/user/dashboard">Tài khoản</a></li>
                    <li><a href="<?php $base_url ?>logout" class="login-link">Đăng xuất</a></li>
                    <?php else: ?>
                    <li><a href="<?=BASE_URL?>public/user/login">Giỏ hàng</a></li>
                    <li><a href="<?=BASE_URL?>public/user/login" class="login-link">Đăng nhập</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="<?=BASE_URL?>public/page/home">
                <i class="icon-home"></i>Trang chủ
            </a>
        </div>
        <div class="sticky-info">
            <a href="<?=BASE_URL?>public/page/shop" class="">
                <i class="icon-wishlist-2"></i>Sản phẩm 
            </a>
        </div>
        <div class="sticky-info">
            <a href="<?=BASE_URL?>public/page/wishlist" class="">
                <i class="icon-wishlist-2"></i>Yêu thích 
            </a>
        </div>
        <?php if (isset($_SESSION['user'])): ?>
        <div class="sticky-info">
            <a href="<?=BASE_URL?>public/user/login" class="">
                <i class="icon-user-2"></i>Tài khoản
            </a>
        </div>
        <div class="sticky-info">
            <a href="<?=BASE_URL?>public/gio-hang" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle"><?=$count_cart?></span>
                </i>Giỏ hàng
            </a>
        </div>
        <?php else: ?>
        <div class="sticky-info">
            <a href="<?=BASE_URL?>public/user/login" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">0</span>
                </i>Giỏ hàng
            </a>
        </div>
        <div class="sticky-info">
            <a href="<?=BASE_URL?>public/user/login" class="">
                <i class="icon-user-2"></i>Đăng nhập
            </a>
        </div>
        <?php endif; ?>
    </div>

    <!-- popup  -->
    <!-- <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form"
        style="background: #f1f1f1 no-repeat center/cover url(<?=BASE_URL?>public/upload/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="<?=BASE_URL?>public/upload/logo-black.png" alt="Logo" class="logo-newsletter" width="111" height="44">
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
    <script src="<?=BASE_URL?>public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=BASE_URL?>public/assets/js/plugins.min.js"></script>
    <script src="<?=BASE_URL?>public/assets/js/optional/isotope.pkgd.min.js"></script>
    <script src="<?=BASE_URL?>public/assets/js/jquery.appear.min.js"></script>
    <script src="<?=BASE_URL?>public/assets/js/jquery.plugin.min.js"></script>
    <script src="<?=BASE_URL?>public/assets/js/main.min.js"></script>
    <script src="<?=BASE_URL?>public/assets/js/map.js"></script>

    <script script>
        function ThemSPYT(MaSP) {
            $.ajax({
                type: "POST",
                url: "<?=BASE_URL?>addwish",
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
                        url: '<?=BASE_URL?>ajax_search',
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
                    url: "<?=BASE_URL?>public/controller/ajax.php?act=select_option",
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