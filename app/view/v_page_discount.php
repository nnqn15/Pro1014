<?php require_once 'app/view/v_header.php';
$allKM=$data['allKM'];
 ?>       
            <div class="page-header">
                <div class="container d-flex flex-column align-items-center">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <div class="container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>page">Trang Chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Mã giảm giá 
                                </li>
                            </ol>
                        </div>
                    </nav>

                    <h1>Mã giảm giá</h1>
                </div>
            </div>

            <div class="container">
                <div class="wishlist-title">
                    <h2 class="p-2">Mã giảm giá trên cửa hàng</h2>
                </div>
                <div class="wishlist-table-container">
                    <table class="table table-wishlist mb-0">
                        <thead>
                            <tr>
                                <th class="product-col">Tên mã giảm giá</th>
                                <th class="price-col text-center">CODE</th>
                                <th class="status-col">Ngày bắt đầu</th>
                                <th class="status-col">Ngày kết thúc</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($allKM as $KM): extract($KM);?>
                            <tr class="product-row">
                                <td>
                                    <h5 class="product-title">
                                        <a href=""><?=$TenKM?></a>
                                    </h5>
                                </td>
                                <td class="price-box text-center"><?=$CodeKM?></td>
                                <td>
                                    <span class="stock-status"><?=$NgayBatDau?></span>
                                </td>
                                <td>
                                    <span class="stock-status"><?=$NgayKetThuc?></span>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div><!-- End .cart-table-container -->
            </div><!-- End .container -->
<?php require_once 'app/view/v_footer.php';?>