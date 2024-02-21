<?php
namespace app\model;
use app\model\productModel;
require_once 'app/view/v_header.php';
$dsGhim = $data["dsGhim"];
$product_shop = $data["product_shop"];
$sotrang = $data["sotrang"];
$proshow = new productModel;
?>
<!-- <div class="category-banner-container">
    <div class="category-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center text-md-right">
                    <h2 class="font4 font-weight-normal ls-n-25 line-height-1 text-uppercase mb-0">
                        Giảm giá</h2>
                    <h3 class="ls-n-25 line-height-1 text-uppercase mb-0 ml-0">Lên đến 70%</h3>
                </div>
                <div class="col-md-4 text-center">
                    <img src="public/upload/banners/category-banner.png" alt="banner" width="267" height="241">
                </div>
                <div class="col-md-4 text-center text-md-left">
                    <a href="#" class="btn btn-link ml-0 p-0"><i>Xem ưu đãi của chúng tôi</i><i class="fa-solid fa-angles-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div> -->

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="demo23.html">Trang chủ</a></li>
            <?php 
            $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
            $url_array = explode("/",$url);
            if($url_array[1]=='product'){
                echo '<li class="breadcrumb-item active" aria-current="page">Sản Phẩm</li>';
            }else if($url_array[1]=='danhmuc'){
                echo '<li class="breadcrumb-item active" aria-current="page">Danh mục</li>';
            }else{
                echo '<li class="breadcrumb-item active" aria-current="page">Kết quả tìm kiếm với từ khóa "' . $url_array[2] . '"</li>';
            }
            ?>
        </ol>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-9 main-content">
            <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                <div class="toolbox-left">
                    <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                            <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                            <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                            <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                            <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                            <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                            <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                            <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2">
                            </path>
                            <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                            <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                        </svg>
                        <span>Bộ lọc</span>
                    </a>

                    <div class="toolbox-item toolbox-sort">
                        <label>Phân loại:</label>

                        <div class="select-custom">
                            <select name="search_key" id="select_data" class="form-control">
                                <option value="menu_order" selected="selected">Mặc định</option>
                                <option value="popularity">Phổ biến</option>
                                <option value="rating">Đánh giá tốt</option>
                                <option value="date">Mới nhất </option>
                                <option value="price">Giá từ thấp -> cao</option>
                                <option value="price-desc">Giá từ cao -> thấp</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="toolbox-right">
                    <div class="toolbox-item layout-modes">
                        <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                            <i class="icon-mode-grid"></i>
                        </a>
                        <a href="category-list.html" class="layout-btn btn-list" title="List">
                            <i class="icon-mode-list"></i>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- chỗ lầy là chỗ foeach sản phẩm -->
            <div class="row product-default_option ">
                <?= $htmlShowSP = $proshow->show_product($product_shop); ?>
                <!-- chỗ lầy là chỗ foeach sản phẩm    -->
            </div>

            <nav class="toolbox toolbox-pagination">
                <ul class="pagination toolbox-item">
                    <li class="page-item disabled">
                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                    </li>
                    <?php for ($i = 1; $i <= $sotrang; $i++) : ?>
                        <li class="page-item">
                            <?php
                            //xet link
                            $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
                            // printf($url);
                            $url_array = explode("/",$url);
                            if($url_array[1]=='product'){
                                echo '<a class="page-link" href="'.BASE_URL.'product/'.$i.'">'.$i.'</a>';
                            }else if($url_array[1]=='danhmuc'){
                                echo '<a class="page-link" href="'.BASE_URL.'danhmuc/'.$url_array[2].'/'.$i.'">'.$i.'</a>';
                            }else{
                                echo '<a class="page-link" href="'.BASE_URL.'search/'.$url_array[2].'/'.$i.'">'.$i.'</a>';
                            }
                            ?>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="sidebar-overlay"></div>
        <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
            <div class="sidebar-wrapper">
                <div class="widget">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-1">Danh mục</a>
                    </h3>

                    <div class="collapse show" id="widget-body-1">
                        <div class="widget-body">
                            <ul class="cat-list">
                                <?php
                                $danhmuc = $danhmucmuc;
                                $i = 1;
                                foreach ($danhmucmuc as $item_dmmuc) {
                                    // Điêu kiện để lấy danh mục cha
                                    if ($item_dmmuc['MaDMC'] == 0) {?>
                                        <li>
                                            <a href="#widget-category-<?= $i ?>" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="widget-category-<?= $i ?>">
                                                <?= $item_dmmuc['TenDM'] ?><span class="products-count"></span>
                                                <span class="toggle"></span>
                                            </a>
                                            <?php foreach ($danhmuc as $item_dm) {
                                                if ($item_dm['MaDMC'] != 0 && $item_dm['MaDMC'] == $item_dmmuc['MaDM']) {?>
                                                    <div class="collapse show" id="widget-category-<?= $i ?>">
                                                        <ul class="cat-sublist">
                                                            <li><a href="<?= BASE_URL ?>danhmuc/<?= create_slug($item_dm['TenDM']) ?>"><?= $item_dm['TenDM'] ?><span class="products-count"></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                        </li>
                                            <?php
                                                }
                                            }
                                        }
                                        $i++;
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="widget widget-featured pb-0">
                    <h3 class="widget-title">Sản phẩm nổi bật</h3>

                    <div class="widget-body">
                        <div class="featured-col">
                            <?php foreach ($dsGhim as $sp) : ?>
                                <div class="product-default left-details product-widget">
                                    <figure>
                                        <a href="<?= BASE_URL ?>product-detail&MaSP=<?= $sp['MaSP'] ?>">
                                            <img src="<?= BASE_URL ?>public/upload/products/<?= $sp['AnhSP']; ?>" width="75" height="75" alt="product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-title">
                                            <a href="<?= BASE_URL ?>product/detail&MaSP=<?= $sp['MaSP'] ?>"><?= $sp['TenSP'] ?></a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span>

                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price"><?= $sp['GiaGiam'] ?> &ndash; <?= $sp['Gia'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
<?php require_once 'app/view/v_footer.php'; ?>