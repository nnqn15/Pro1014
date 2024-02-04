<?php
namespace app\controller;
use app\model\productModel;
use app\model\categoryModel;
use app\model\cartModel;
use app\model\userModel;
use app\model\adminModel;
use app\model\wishlistModel;
class ajaxController extends baseController{
    private $pro;
    private $cat;
    private $admin;
    private $cart;
    private $user;
    private $wish;
    function __construct(){
        $this->pro=new productModel;
        $this->cat=new categoryModel;
        $this->admin=new adminModel;
        $this->cart=new cartModel;
        $this->user=new userModel;
        $this->wish=new wishlistModel;
    }
    function ajax_search(){
        $keyword = $_POST['keyword'];
        if(!$_POST['keyword']){
            $show_search = $this->pro->product_getNew(3);
        }else{
            $show_search = $this->pro->search_live_product($keyword);
        }
        if ($show_search) {
            foreach ($show_search as $value):
                extract($value);
                echo '<a href="'.BASE_URL.'product/detail/'.$TenSP.'" class="col-md-4 img-focus">
                    <img src="' . BASE_URL . 'public/upload/products/' . $AnhSP . '"
                        width="50" height="50" alt="' . $TenSP . '">
                </a>
                <div class="col-md-8 mt-2 content-focus">' . $TenSP . ' </div>';
            endforeach;
        } else {
            echo '<span class="not_product">Sản phẩm không tồn tại</span>';
        }
    }
    function ajax_cart_quantity(){
        $SoLuongSP = $_POST['quantity'];
        $MaSP = $_POST['MaSP'];
        $Quantity = $this->cart->quantity_cart_max($MaSP);

        if ($SoLuongSP > $Quantity['SoLuong']) {
            // lưu session vào là disiable true
            echo '
            <div class="toast toast--error">
                <div class="toast__icon">
                    <i class="fa fa-check-circle"></i>
                </div>
                <div class="toast__body">
                    <h3 class="toast__title">Thất bại</h3>
                    <p class="toast__msg">Rất tiếc, bạn chỉ có thể mua tối đa ' . $Quantity['SoLuong'] . ' sản phẩm.</p>
                </div>
    
                <div class="toast__close">
                    <i class="fa fa-times"></i>
                </div>
            </div>
            ';
        } else {
            // lưu session vào là disiable flase
            echo '
            <div class="toast toast--success">
                <div class="toast__icon">
                    <i class="fa fa-check-circle"></i>
                </div>
                <div class="toast__body">
                    <h3 class="toast__title">Thành công</h3>
                    <p class="toast__msg">Cập nhật số lượng thành công</p>
                </div>
    
                <div class="toast__close">
                    <i class="fa fa-times"></i>
                </div>
            </div>
            ';
            if(isset($_SESSION['user'])){
                $this->cart->update_quantity_by_cart($SoLuongSP, $MaSP);
            }else{
                foreach ($_SESSION['giohang'] as $key => $gh) {
                    if($gh['MaSP']==$MaSP){
                        $_SESSION['giohang'][$key]['SoLuongSP']=$SoLuongSP;
                    }
                }
            }
        }
    }
    function ajax_cart_coupon(){
        if (isset($_POST['btn_coupon']) && $_POST['btn_coupon']) {
            // lấy giá trị input của couponcode
            $couponcode = $_POST['couponcode'];
            // Nếu counponcode trống => Bắt người dùng nhập mã
            if (empty($couponcode)) {
                echo "error_coupon_null";
            } else {
                // Nếu có nhập mã code thì select xem mã đó có đúng không
                $has_coupon = $this->cart->has_coupon_code($couponcode);
                // Nếu mã đó có tồn tại thì
                if ($has_coupon) {
                    // Kiểm tra mã đó còn hạn dùng hay không
                    $counpon_date = $has_coupon['NgayKetThuc'];
                    // biến ngày giờ thành số giây
                    $counpon_date_timestamp = strtotime($counpon_date);
                    if (time() > $counpon_date_timestamp) {
                        echo "Mã giảm giá không còn hạn sử dụng";
                    } else {
                        // Kiểm tra mã đó còn số lượng dùng hay không
                        if ($has_coupon['SoLuong'] > 0) {
                            $_SESSION['coupon']['has'] = $has_coupon;
                            echo '<input type="hidden" class="coupon_value" value="' . $has_coupon['GiaKM'] . '">';
                            echo "Đơn hàng của bạn được giảm " . number_format($has_coupon['GiaKM'], 0, ',', '.') . ' VNĐ';
                        } else {
                            echo "Mã giảm giá đã hết";
                        }
                    }
                } else {
                    echo "error_coupon_false";
                }
            }
        }
    }
    function addwish(){
        $MaTK = $_SESSION['user']['MaTK'];
        $MaSP = $_POST['MaSP'];
        $this->wish->add_to_wishlist($MaTK, $MaSP);
    }
}
// case 'select_option':
//     include_once '../model/m_product.php';
//     $search_key = $_POST['search_key'];
//     switch ($search_key) {
//         case 'menu_order':
//             $product_shop = product_search_option_by_default($page = 1);
//             show_product($product_shop, BASE_URL);
//             break;
//         case 'popularity':
//             $product_shop = product_search_option_by_poplarity($page = 1);
//             show_product($product_shop, BASE_URL);
//             break;
//         case 'rating':
//             $product_shop = product_search_option_by_rating($page = 1);
//             show_product($product_shop, BASE_URL);
//             break;
//         case 'date':
//             $product_shop = product_search_option_by_new_date($page = 1);
//             show_product($product_shop, BASE_URL);
//             break;
//         case 'price':
//             $product_shop = product_search_option_by_price($page = 1);
//             show_product($product_shop, BASE_URL);
//             break;
//         case 'price-desc':
//             $product_shop = product_search_option_by_pricedesc($page = 1);
//             show_product($product_shop, BASE_URL);
//             break;