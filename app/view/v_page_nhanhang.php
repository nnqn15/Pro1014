<?php
require_once 'app/view/v_header.php';
$chitiethd = $data["chitiethd"];
$MaHD = $data["MaHD"];
?>
<style>
    @media print {
  /* Ẩn các phần tử không cần in */
  body * {
      visibility: hidden;
  }
  .order-content, .order-content * {
      visibility: visible;
  }
  /* Căn giữa nội dung in */
  .order-content {
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
<div class="m-auto p-3" style="width: 80%;">
<button class="btn text-end" onclick="window.print()">In <i class="fa-solid fa-print"></i></button>
    <div class="order-content">
        <div class="hoadontitle">
            <h3>CHI TIẾT HÓA ĐƠN SỐ <?= $MaHD ?></h3>
            Ngày <?=date('d', strtotime($chitiethd[0]['NgayLap'])) . ' tháng ' . date('m', strtotime($chitiethd[0]['NgayLap'])) . ' năm ' . date('Y', strtotime($chitiethd[0]['NgayLap']))?> <br>
            <i>(Kèm theo hóa đơn số <?= $MaHD ?> ngày <?=date('d', strtotime($chitiethd[0]['NgayLap'])) . ' tháng ' . date('m', strtotime($chitiethd[0]['NgayLap'])) . ' năm ' . date('Y', strtotime($chitiethd[0]['NgayLap']))?>)</i>
        </div>
        <div class="hoadonthongtin">
            <h6>Tên đơn vị bán hàng : Bé yêu shop</h6>
            Địa chỉ: Tòa T, Công viên phần mềm Quang Trung, Quận 12, TP.HCM <br>
            Mã số thuế: 15101008
            <h6>Tên đơn vị mua hàng : <?= $chitiethd[0]['HoVaTen'] ?></h6>
            Địa chỉ : <?= $chitiethd[0]['DiaChi'] ?> <br>
            Số điện thoại : 0<?= $chitiethd[0]['SoDienThoai'] ?>
        </div>
        <div class="order-table-container text-center">
            <table class="table table-order text-left">
                <thead>
                    <tr>
                        <th class="order-id text-center">Ảnh sản phẩm</th>
                        <th class="order-date">Tên sản phẩm</th>
                        <th class="order-status text-center">Giá</th>
                        <th class="order-price text-center">Số lượng</th>
                        <th class="order-action text-center">Số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chitiethd as $product) : ?>
                        <tr>
                            <td>
                                <figure class="product-image-container m-auto">
                                    <a href="<?= BASE_URL ?>product-detail&MaSP=<?= $product['MaSP'] ?>" class="product-image">
                                        <img src="<?= BASE_URL ?>public/upload/products/<?= $product['AnhSP'] ?>" alt="product">
                                    </a>
                                </figure>
                            </td>
                            <td>
                                <h5 class="product-title">
                                    <a href="<?= BASE_URL ?>product/detail/<?= $product['MaSP'] ?>"><?= $product['TenSP'] ?></a>
                                </h5>
                            </td>
                            <?php if (!$product['GiaGiam']) : ?>
                                <td class="price-box text-center"><?= number_format($product['Gia'], 0, ",", ".") ?> VND</td>
                                <td class="price-box text-center"><?= $product['SoLuongSP'] ?></td>
                                <td class="price-box text-center"><?= number_format(($product['Gia'] * $product['SoLuongSP']), 0, ',', '.') ?> VNĐ</td>
                            <?php else : ?>
                                <td class="price-box text-danger text-center">
                                    <del class="text-dark">
                                        <p><?= number_format($product['Gia'], 0, ",", ".") ?>VND</p>
                                    </del>
                                    <p><?= number_format($product['GiaGiam'], 0, ",", ".") ?> VND</p>
                                </td>
                                <td class="price-box text-center"><?= $product['SoLuongSP'] ?></td>
                                <td class="price-box text-center"><?= number_format(($product['GiaGiam'] * $product['SoLuongSP']), 0, ',', '.') ?> VNĐ</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <?php if ($chitiethd[0]['GiaKM'] != "") : ?>
                        <tr>
                            <th colspan="3">
                                Giá khuyến mãi
                            </th>
                            <th class="text-center" colspan="2">
                                <span class="text-danger"><?= number_format($chitiethd[0]['GiaKM'], 0, ",", ".") ?> VND</span>
                            </th>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <th colspan="3">
                            Tổng tiền
                        </th>
                        <th class="text-center" colspan="2">
                            <span class="text-danger"><?= number_format($chitiethd[0]['TongTien'], 0, ",", ".") ?> VND</span>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="kyten">
            <div class="kyten-2">
                <H4>NGƯỜI MUA HÀNG</H4>
                <i>(Ký, ghi rõ học tên, đóng dấu)</i>
            </div>
            <div class="kyten-2">
                <H4>NGƯỜI BÁN HÀNG</H4>
                <i>(Ký, ghi rõ học tên, đóng dấu)</i>
            </div>
        </div>
    </div>
</div>
<script>
function exportToPdf() {
    const doc = new jsPDF();
    const contentToPrint = document.querySelector('.order-content').innerHTML;
    doc.fromHTML(contentToPrint, 10, 10);
    doc.save('hoa-don.pdf');
}
</script>
<?php require_once 'app/view/v_footer.php'; ?>