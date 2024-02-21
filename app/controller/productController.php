<?php
namespace app\controller;
use app\model\productModel;
use app\model\categoryModel;
use app\model\cartModel;
use app\model\userModel;
class productController extends baseController{
    private $pro;
    private $cat;
    private $cart;
    private $user;
    function __construct(){
        $this->pro=new productModel;
        $this->cat=new categoryModel;
        $this->cart=new cartModel;
        $this->user=new userModel;
    }
    function index(){
        $this->titlepage="Sản phẩm | Bé yêu shop";
        $this->data["danhmuc"]=$this->cat->category_getALLDM();
        $this->data["danhmucmuc"]=$this->cat->category_getALLDMMUC();
        if(isset($_SESSION['user'])) {
            $this->data["count_cart"]= $this->cart->count_cart($_SESSION['user']['MaTK']);
            $this->data["show_cart_for_user"]= $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
            $this->data["info_user"]= $this->user->user_getById($_SESSION['user']['MaTK']);
        }
        $limit = 12;
        $keyword="";
        $MaDM=0;
        $MaDMC=0;
        $page=1;
        //xet link
        $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
        // printf($url);
        $url_array = explode("/",$url);
        // print_r($url_array);
        if($url_array[1]=='product'){
            if(isset($url_array[2])){
                $page=$url_array[2];
            }
        }else if($url_array[1]=='danhmuc'){
            foreach ($this->data["danhmuc"] as $dm) {
                if(create_slug($dm['TenDM'])==$url_array[2]){
                    $MaDM=$dm['MaDM'];
                }
            }
            if(isset($url_array[3])){
                $page=$url_array[3];
            }
        }else{
            $this->titlepage="Kết quả tìm kiếm | Bé yêu shop";
            $keyword=$url_array[2];
            if(isset($url_array[3])){
                $page=$url_array[3];
            }
        }
        $this->data["dsGhim"]=$this->pro->product_getPin(3);
        $soluongSP=$this->pro->product_shop_count($keyword,$MaDM,$MaDMC);
        $this->data["sotrang"] = ceil(intval($soluongSP) / $limit);
        $this->data["product_shop"]=$this->pro->product_shop($keyword,$MaDM,$MaDMC,$page,$limit);
        $this->renderView("page_shop",$this->titlepage,$this->data);
    }
    function linksearch(){
        header('location: '.BASE_URL.'search/'.$_POST['keyword']);
    }
    function detail(){
        $allsp=$this->pro->product_getAll();
        //xet link
        $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
        // printf($url);
        $url_array = explode("/",$url);
        // print_r($url_array);
        foreach ($allsp as $SP) {
            if(create_slug($SP['TenSP'])==$url_array[3]){
                $MaSP=$SP['MaSP'];
            }
        }
        if(!$MaSP){
            header('location: '.BASE_URL.'404');
        }else{
            $this->data["danhmuc"]=$this->cat->category_getALLDM();
            $this->data["danhmucmuc"]=$this->cat->category_getALLDMMUC();
            if(isset($_SESSION['user'])) {
                $this->data["count_cart"]= $this->cart->count_cart($_SESSION['user']['MaTK']);
                $this->data["show_cart_for_user"]= $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
                $this->data["info_user"]= $this->user->user_getById($_SESSION['user']['MaTK']);
            }
            $this->data["product_detail"]=$this->pro->product_detail($MaSP);
            $this->pro->product_tangView($MaSP);
            $this->titlepage=$this->data["product_detail"]['TenSP']." | Bé yêu shop";
            $this->data["comment"] = $this->pro->comment_getByProduct($MaSP);
            $this->data["SLBinhLuan"] = $this->pro->count_comment($MaSP);
            $this->data["product_same"] = $this->pro->product_same($MaSP,$this->data["product_detail"]['MaDM']);
            
            if(isset($_SESSION['user'])) {
                $MaTK = $_SESSION['user']['MaTK'];
                $this->data["checkMuaSP"]=$this->pro->check_comment($MaTK,$MaSP);
            } else {
                $this->data["checkMuaSP"] = '';
            }
            $this->renderView("product_detail",$this->titlepage,$this->data);
        }
    }
    function addtocart(){
        if(isset($_SESSION['user'])) {
            if(isset($_POST['btn_addtocart']) && $_POST['btn_addtocart']) {
                // xử lí sau 
                $MaTK = $_SESSION['user']['MaTK'];
                $MaSP = $_POST['MaSP'];
                $TenSP = $_POST['TenSP'];
                $SoLuongSP = $_POST['SoLuongSP'];

                $has_cart = $this->cart->has_cart($MaTK);
                if($has_cart) {
                    // nếu sản phẩm tồn tại mà người dùng mua nữa thì cập nhật lại giỏ hàng
                    if($this->cart->has_products_by_quantity($has_cart['MaHD'],$MaSP)) {
                        $this->cart->upate_quantity_by_product($SoLuongSP, $has_cart['MaHD']);
                    } else {
                        $this->cart->add_to_cart($has_cart['MaHD'], $SoLuongSP, $MaSP);
                    }
                } else {
                    $this->cart->his_cart($MaTK);
                    $has_cart = $this->cart->has_cart($MaTK);
                    $this->cart->add_to_cart($has_cart['MaHD'], $SoLuongSP, $MaSP);
                }
            }
            $_SESSION['thongbao'] = 'Bạn đã thêm sản phẩm vào giỏ hàng thành công!';
            header('location: '.BASE_URL.'product/detail/'.create_slug($TenSP));
        } else {
            $MaSP = $_POST['MaSP'];
            $TenSP = $_POST['TenSP'];
            $SoLuongSP = (int)$_POST['SoLuongSP'];
            $sp=$this->pro->product_detail($MaSP);
            $Gia=$sp['Gia'];
            if(isset($sp['GiaGiam'])){
                $GiaGiam=$sp['GiaGiam'];
            }
            $AnhSP=$sp['AnhSP'];
            if(!isset($_SESSION['giohang'])) {
                $_SESSION['giohang']=[];
                if(isset($_POST['btn_addtocart']) && $_POST['btn_addtocart']) {
                    // xử lí sau 
                    $giohang=['MaSP' => $MaSP, 'SoLuongSP' => $SoLuongSP, 'TenSP' => $TenSP, 'Gia' => $Gia, 'GiaGiam' => $GiaGiam, 'AnhSP' => $AnhSP];
                    $_SESSION['giohang'][]=$giohang;
                }
            }else{
                //nếu sản phẩm tồn tại mà người dùng mua nữa thì cập nhật lại giỏ hàng
                $flag=0;
                foreach ($_SESSION['giohang'] as $key => $gh) {
                    if($gh['MaSP']==$MaSP) {
                        $_SESSION['giohang'][$key]['SoLuongSP']+=(int)$SoLuongSP;
                        $flag=1;
                    }
                }
                if($flag!=1){
                    $giohang=['MaSP' => $MaSP, 'SoLuongSP' => $SoLuongSP, 'TenSP' => $TenSP, 'Gia' => $Gia, 'GiaGiam' => $GiaGiam, 'AnhSP' => $AnhSP];
                    $_SESSION['giohang'][]=$giohang;
                }
            }
            // var_dump($_SESSION['giohang']);
            $_SESSION['thongbao'] = 'Bạn đã thêm sản phẩm vào giỏ hàng thành công!';
            header('location: '.BASE_URL.'product/detail/'.create_slug($TenSP));
        }
    }
    function comment(){
        if(isset($_SESSION['user']) && isset($_POST['MaSP']) && isset($_POST['NoiDung']) && $_POST['NoiDung'] != "" && isset($_POST['SoSao'])) {
            $MaTK = $_SESSION['user']['MaTK'];
            $MaSP = $_POST['MaSP'];
            $TenSP = create_slug($_POST['TenSP']);
            $NoiDung = $_POST['NoiDung'];
            $SoSao = $_POST['SoSao'];
            $this->pro->addComment($MaTK, $MaSP, $NoiDung, $SoSao);
            $_SESSION['thongbao'] = 'Bạn đã bình luận sản phẩm thành công!';
            header('location: '.BASE_URL.'product/detail/'.$TenSP);
        } else {
            $_SESSION['loi'] = 'Bạn chưa nhập nội dung đánh giá!';
            $TenSP = create_slug($_POST['TenSP']);
            header('location: '.BASE_URL.'product/detail/'.$TenSP);
        }
    }
    function cart()
    {
        $this->data["danhmuc"] = $this->cat->category_getALLDM();
        $this->data["danhmucmuc"] = $this->cat->category_getALLDMMUC();
        if (isset($_SESSION['user']['MaTK'])) {
            $this->data["count_cart"] = $this->cart->count_cart($_SESSION['user']['MaTK']);
            $this->data["show_cart_for_user"] = $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
            $this->data["info_user"] = $this->user->user_getById($_SESSION['user']['MaTK']);
            $MaTK = $_SESSION['user']['MaTK'];
            $this->data["has_cart"] = $this->cart->has_cart($MaTK);
            $this->data["cart"] = $this->cart->show_cart_for_user($MaTK);
        }else {
            $this->data["show_cart_for_user"] = $_SESSION['giohang'];
            $this->data["cart"] = $_SESSION['giohang'];
        }
        $this->titlepage = "Giỏ hàng | Bé yêu shop";
        $this->renderView("page_cart", $this->titlepage, $this->data);
    }
    function deletecart(){
        if(isset($_SESSION['user'])){
            $this->cart->delete_cart_by_pro($_GET['MaSP']);
        }else{
            foreach ($_SESSION['giohang'] as $key => $gh) {
                if($gh['MaSP']==$_GET['MaSP']){
                    unset($_SESSION['giohang'][$key]);
                }
            }
        }
        header('location: '.BASE_URL.'cart');
    }
    function update_status_cart(){
        $TongTien=$_POST['TongTien'];
        if(isset($_SESSION['coupon']['has']['GiaKM'])){
            $GiaKM=$_SESSION['coupon']['has']['GiaKM'];
        }else{
            $GiaKM=0;
        }
        $HoVaTen=$_POST['HoVaTen'];
        $DiaChi=$_POST['DiaChi'];
        $SoDienThoai=$_POST['SoDienThoai'];
        $Email=$_POST['Email'];
        $GhiChu=$_POST['GhiChu'];
        if(isset($_SESSION['user'])){
            $MaTK = $_SESSION['user']['MaTK'];
            $show_cart_for_user=$this->cart->show_cart_for_user($MaTK);
            print_r($show_cart_for_user);
            $MaHD= $show_cart_for_user[0]['MaHD'];
        }else{
            $MaHD=$this->cart->cart_showbyphone($SoDienThoai);
            $show_cart_for_user=$_SESSION['giohang'];
        }
        if(isset($_POST['method_pay'])&&$_POST['method_pay']=='vnpay'){
            foreach ($show_cart_for_user as $key) {
                $SoLuongSP = $key['SoLuongSP'];
                $MaSP = $key['MaSP'];
                // $this->cart->update_quantity_by_checkout($SoLuongSP, $MaSP);
            }
            $this->cart->update_inf_cart($MaHD,$HoVaTen,$DiaChi,$SoDienThoai,$Email);
            header('Location: ' . BASE_URL . 'public/vnpay_php/vnpay_create_payment.php?MaHD=' . urlencode($MaHD) . '&amount=' . urlencode($TongTien));
            exit;
        }else{
            if(!isset($_SESSION['user'])){
                $this->cart->his_cart_nologin($TongTien,$GiaKM,$HoVaTen,$DiaChi,$SoDienThoai,$Email,$GhiChu);
                foreach ($show_cart_for_user as $key) {
                    $SoLuongSP = $key['SoLuongSP'];
                    $MaSP = $key['MaSP'];
                    $this->cart->add_to_cart($MaHD, $SoLuongSP, $MaSP);
                    $this->cart->update_quantity_by_checkout($SoLuongSP, $MaSP);
                }
                unset($_SESSION['giohang']);
            }else{
                foreach ($show_cart_for_user as $key) {
                    $SoLuongSP = $key['SoLuongSP'];
                    $MaSP = $key['MaSP'];
                    $this->cart->update_quantity_by_checkout($SoLuongSP, $MaSP);
                }
                $this->cart->update_inf_cart($MaHD,$HoVaTen,$DiaChi,$SoDienThoai,$Email);
                $this->cart->upate_status_cart($MaHD);
            }
            unset($_SESSION['coupon']);
            $chitiethd=$this->pro->getproductByHD($MaHD);

            $email = $Email;
            $subject = "Xác nhận đơn hàng #".$MaHD;
            $message = "<p>Cảm ơn bạn đã mua hàng. Đây là hóa đơn của bạn:</p>";
            $message .= '<div class="order-content">
            <div class="hoadontitle">
                <h3>CHI TIẾT HÓA ĐƠN SỐ '. $MaHD .'</h3>
                Ngày '.date('d', strtotime($chitiethd[0]['NgayLap'])) . ' tháng ' . date('m', strtotime($chitiethd[0]['NgayLap'])) . ' năm ' . date('Y', strtotime($chitiethd[0]['NgayLap'])).' <br>
                <i>(Kèm theo hóa đơn số '. $MaHD .' ngày '.date('d', strtotime($chitiethd[0]['NgayLap'])) . ' tháng ' . date('m', strtotime($chitiethd[0]['NgayLap'])) . ' năm ' . date('Y', strtotime($chitiethd[0]['NgayLap'])).')</i>
            </div>
            <div class="hoadonthongtin">
                <h6>Tên đơn vị bán hàng : Bé yêu shop</h6>
                Địa chỉ: Tòa T, Công viên phần mềm Quang Trung, Quận 12, TP.HCM <br>
                Mã số thuế: 15101008
                <h6>Tên đơn vị mua hàng : '. $chitiethd[0]['HoVaTen'] .'</h6>
                Địa chỉ : '. $chitiethd[0]['DiaChi'] .' <br>
                Số điện thoại : 0'. $chitiethd[0]['SoDienThoai'] .'
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
                    <tbody>';
                        foreach ($chitiethd as $product){
                            $message .='<tr>
                            <td>
                                <figure class="product-image-container m-auto">
                                    <a href="'. BASE_URL .'product-detail&MaSP='. $product['MaSP'] .'" class="product-image">
                                        <img src="'. BASE_URL .'public/upload/products/'. $product['AnhSP'] .'" alt="product">
                                    </a>
                                </figure>
                            </td>
                            <td>
                                <h5 class="product-title">
                                    <a href="'. BASE_URL .'product/detail/'. $product['MaSP'] .'">'. $product['TenSP'] .'</a>
                                </h5>
                            </td>';
                            if (!$product['GiaGiam']){
                                $message .='<td class="price-box text-center">'. number_format($product['Gia'], 0, ",", ".") .' VND</td>
                                <td class="price-box text-center">'. $product['SoLuongSP'] .'</td>
                                <td class="price-box text-center">'. number_format(($product['Gia'] * $product['SoLuongSP']), 0, ',', '.') .' VNĐ</td>';
                            }else{
                                $message .='<td class="price-box text-danger text-center">
                                <del class="text-dark">
                                    <p>'. number_format($product['Gia'], 0, ",", ".") .'VND</p>
                                </del>
                                <p>'. number_format($product['GiaGiam'], 0, ",", ".") .' VND</p>
                            </td>
                            <td class="price-box text-center">'. $product['SoLuongSP'] .'</td>
                            <td class="price-box text-center">'. number_format(($product['GiaGiam'] * $product['SoLuongSP']), 0, ',', '.') .' VNĐ</td>';
                            }

                        $message .='</tr>
                            <tr>
                                <td>
                                    <figure class="product-image-container m-auto">
                                        <a href="'. BASE_URL .'product-detail&MaSP='. $product['MaSP'] .'" class="product-image">
                                            <img src="'. BASE_URL .'public/upload/products/'. $product['AnhSP'] .'" alt="product">
                                        </a>
                                    </figure>
                                </td>
                                <td>
                                    <h5 class="product-title">
                                        <a href="'. BASE_URL .'product/detail/'. $product['MaSP'] .'">'. $product['TenSP'] .'</a>
                                    </h5>
                                </td>';
                                if (!$product['GiaGiam']){
                                    $message .='<td class="price-box text-center">'. number_format($product['Gia'], 0, ",", ".") .' VND</td>
                                    <td class="price-box text-center">'. $product['SoLuongSP'] .'</td>
                                    <td class="price-box text-center">'. number_format(($product['Gia'] * $product['SoLuongSP']), 0, ',', '.') .' VNĐ</td>';
                                }else{
                                    $message .='<td class="price-box text-danger text-center">
                                    <del class="text-dark">
                                        <p>'. number_format($product['Gia'], 0, ",", ".") .'VND</p>
                                    </del>
                                    <p>'. number_format($product['GiaGiam'], 0, ",", ".") .' VND</p>
                                </td>
                                <td class="price-box text-center">'. $product['SoLuongSP'] .'</td>
                                <td class="price-box text-center">'. number_format(($product['GiaGiam'] * $product['SoLuongSP']), 0, ',', '.') .' VNĐ</td>';
                                }
                            }
                            $message .='</tbody>
                    <tfoot>';
                        if ($chitiethd[0]['GiaKM'] != ""){
                            $message .='<tr>
                            <th colspan="3">
                                Giá khuyến mãi
                            </th>
                            <th class="text-center" colspan="2">
                                <span class="text-danger">'. number_format($chitiethd[0]['GiaKM'], 0, ",", ".") .' VND</span>
                            </th>
                        </tr>';
                        }
                        $message .='<tr>
                            <th colspan="3">
                                Tổng tiền
                            </th>
                            <th class="text-center" colspan="2">
                                <span class="text-danger">'. number_format($chitiethd[0]['TongTien'], 0, ",", ".") .' VND</span>
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
        </div>'; // Thay bằng cách lấy dữ liệu từ class order-content

            // Cài đặt header cho email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Gửi email
            mail($email, $subject, $message, $headers);
            header('location: '.BASE_URL.'hoadon/'.$MaHD);
        }
    }
    function checkout(){
        $this->data["danhmuc"] = $this->cat->category_getALLDM();
        $this->data["danhmucmuc"] = $this->cat->category_getALLDMMUC();
        if (isset($_SESSION['user']['MaTK'])) {
            $this->data["count_cart"] = $this->cart->count_cart($_SESSION['user']['MaTK']);
            $this->data["show_cart_for_user"] = $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
            $this->data["info_user"] = $this->user->user_getById($_SESSION['user']['MaTK']);
            if(isset($_POST['btn_cart']) && $_POST['btn_cart']) {
                $MaHD = $_POST['MaHD'];
                $total = $_POST['total_cart'];
                $this->cart->update_total_cart($total, $MaHD);
                $this->data["total_cart"] = $total;
                $this->titlepage = "Tiến hành thanh toán | Bé yêu shop";
                $this->renderView("page_checkout", $this->titlepage, $this->data);
            } else {
                header('location: '.BASE_URL.'cart');
            }
        }else{
            if(isset($_POST['btn_cart']) && $_POST['btn_cart']) {
                $total = (int)$_POST['total_cart'];
                $this->data["total_cart"] = $total;
                $this->data["show_cart_for_user"] = $_SESSION['giohang'];
                $this->titlepage = "Tiến hành thanh toán | Bé yêu shop";
                $this->renderView("page_checkout", $this->titlepage, $this->data);
            } else {
                header('location: '.BASE_URL.'cart');
            }
        }
    }
    function hoadon(){
        $this->data["danhmuc"] = $this->cat->category_getALLDM();
        $this->data["danhmucmuc"] = $this->cat->category_getALLDMMUC();
        if (isset($_SESSION['user']['MaTK'])) {
            $this->data["count_cart"] = $this->cart->count_cart($_SESSION['user']['MaTK']);
            $this->data["show_cart_for_user"] = $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
            $this->data["info_user"] = $this->user->user_getById($_SESSION['user']['MaTK']);
        }
        $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
        $url_array = explode("/",$url);
        if(count($url_array)>0){
            $MaHD=$url_array[count($url_array)-1];
        }else{
            $MaHD="";
        }
        $this->data["MaHD"]=$MaHD;
        $this->data["chitiethd"]=$this->pro->getproductByHD($MaHD);
        $this->titlepage = "Chi tiết hóa đơn | Bé yêu shop";
        $this->renderView("page_nhanhang", $this->titlepage, $this->data);
    }
}
