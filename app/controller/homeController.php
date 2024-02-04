<?php
namespace app\controller;
use app\model\productModel;
use app\model\categoryModel;
use app\model\cartModel;
use app\model\userModel;
use app\model\adminModel;
use app\model\wishlistModel;
class homeController extends baseController{
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
    function index(){
        $this->titlepage="Trang chủ | Bé yêu shop";
        $this->data["danhmuc"]=$this->cat->category_getALLDM();
        $this->data["danhmucmuc"]=$this->cat->category_getALLDMMUC();
        if(isset($_SESSION['user'])) {
            $this->data["count_cart"]= $this->cart->count_cart($_SESSION['user']['MaTK']);
            $this->data["show_cart_for_user"]= $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
            $this->data["info_user"]= $this->user->user_getById($_SESSION['user']['MaTK']);
        }
        $this->data["dsMoi"]=$this->pro->product_getNew(4);
        $this->data["dsGhim"]=$this->pro->product_getPin(4);
        $this->data["showanhuser"]=$this->admin->admin_ShowanhUser();
        $this->data["showbanner"]=$this->admin->admin_ShowBanner();
        $this->renderView("page_home",$this->titlepage,$this->data);
    }
    function contact(){
        $this->data["danhmuc"]=$this->cat->category_getALLDM();
        $this->data["danhmucmuc"]=$this->cat->category_getALLDMMUC();
        if(isset($_SESSION['user'])) {
            $this->data["count_cart"]= $this->cart->count_cart($_SESSION['user']['MaTK']);
            $this->data["show_cart_for_user"]= $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
            $this->data["info_user"]= $this->user->user_getById($_SESSION['user']['MaTK']);
        }
        $this->titlepage="Liên hệ | Bé yêu shop";
        $this->renderView("page_contact",$this->titlepage,$this->data);
    }
    function aboutUs(){
        $this->data["danhmuc"]=$this->cat->category_getALLDM();
        $this->data["danhmucmuc"]=$this->cat->category_getALLDMMUC();
        if(isset($_SESSION['user'])) {
            $this->data["count_cart"]= $this->cart->count_cart($_SESSION['user']['MaTK']);
            $this->data["show_cart_for_user"]= $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
            $this->data["info_user"]= $this->user->user_getById($_SESSION['user']['MaTK']);
        }
        $this->titlepage="Về chúng tôi | Bé yêu shop";
        $this->renderView("page_aboutUs",$this->titlepage,$this->data);
    }
    function error404(){
        include_once 'app/view/404.php';
    }
    function discount(){
        $this->data["danhmuc"]=$this->cat->category_getALLDM();
        $this->data["danhmucmuc"]=$this->cat->category_getALLDMMUC();
        if(isset($_SESSION['user'])) {
            $this->data["count_cart"]= $this->cart->count_cart($_SESSION['user']['MaTK']);
            $this->data["show_cart_for_user"]= $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
            $this->data["info_user"]= $this->user->user_getById($_SESSION['user']['MaTK']);
        }
        $this->data['allKM']=$this->cart->get_allKM();
        $this->titlepage="Mã giảm giá | Bé yêu shop";
        $this->renderView("page_discount",$this->titlepage,$this->data);
    }
    function wishlist(){
        $this->data["danhmuc"]=$this->cat->category_getALLDM();
        $this->data["danhmucmuc"]=$this->cat->category_getALLDMMUC();
        if(isset($_SESSION['user'])){
            $this->data["count_cart"]= $this->cart->count_cart($_SESSION['user']['MaTK']);
            $this->data["show_cart_for_user"]= $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
            $this->data["info_user"]= $this->user->user_getById($_SESSION['user']['MaTK']);
            $MaTK = $_SESSION['user']['MaTK'];
            $this->data['wishlist']=$this->wish-> show_wishlist($MaTK);
            $this->titlepage="Yêu thích | Bé yêu shop";
            $this->renderView("page_wishlist",$this->titlepage,$this->data);
        }else{
            $_SESSION['error']['login'] = 'Vui lòng đăng nhập để thêm sản phẩm vào yêu thích';
            header('Location: '.BASE_URL.'user/login');
        }
    }
    function delete_wishlist(){
        $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
        $url_array = explode("/",$url);
        if(count($url_array)>0){
            $MaSP=$url_array[count($url_array)-1];
        }else{
            $MaSP="";
        }
        $this->wish->delete_wishlist_by_pro($MaSP);
        header('location: '.BASE_URL.'wishlist');
    }
}
// if(isset($_GET['act'])) {
//     switch($_GET['act']) {
//         case 'home':
//             // lay du lieu
//             include_once 'model/m_product.php';
//             include_once 'model/m_user.php';
//             $dsMoi = product_getNew(4);
//             $dsGhim = product_getPin(4);
//             //hien thi du lieu
//             $view_name = 'page_home';
//             if(isset($_SESSION['user']['MaTK'])){
//                 $info_user = user_getById($_SESSION['user']['MaTK']);
//             }
//             break;
//         case 'shop':
//             $dsGhim = product_getPin(3);
//             $limit = 12;
//             $start = 0;
//             $soluongSP = count_product();
//             $sotrang = ceil(intval($soluongSP) / $limit);
//             include_once 'model/m_user.php';
//             if(isset($_SESSION['user']['MaTK'])){
//                 $info_user = user_getById($_SESSION['user']['MaTK']);
//             }
//             if(isset($_GET["shop"])) {
//                 // Xác định trang hiện tại
//                 $trang_hien_tai = isset($_GET['shop']) ? intval($_GET['shop']) : 1;
//                 // Tính toán vị trí bắt đầu của sản phẩm trên trang hiện tại
//                 $start = ($trang_hien_tai - 1) * $limit;
//                 // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu
//                 $product_shop = product_shop($start, $limit);
//             }
//             $product_shop = product_shop($start, $limit);
//             $view_name = 'page_shop';
//             break;
//         case 'contact':
//             include_once 'model/m_user.php';
//             if(isset($_SESSION['user']['MaTK'])){
//                 $info_user = user_getById($_SESSION['user']['MaTK']);
//             }
//             //laydulieu
//             $view_name = 'page_contact';
//             break;
//         case 'aboutUs':
//             include_once 'model/m_user.php';
//             if(isset($_SESSION['user']['MaTK'])){
//                 $info_user = user_getById($_SESSION['user']['MaTK']);
//             }
//             //laydulieu
//             $view_name = 'page_aboutUs';
//             break;
//         case 'checkout':
//             include_once 'model/m_user.php';
            // if(isset($_SESSION['user']['MaTK'])){
            //     $info_user = user_getById($_SESSION['user']['MaTK']);
            // }
            // include_once 'model/m_cart.php';
            // if(isset($_POST['btn_cart']) && $_POST['btn_cart']) {
            //     $MaHD = $_POST['MaHD'];
            //     $total = $_POST['total_cart'];
            //     update_total_cart($total, $MaHD);
            //     $total_cart = get_total($MaHD);
            // } else {
            //     header('location: '.$base_url.'gio-hang');
            // }

//             //laydulieu
//             $title = "Kiểm tra thanh toán";
//             $view_name='page_checkout';
//             break;
//         case 'wishlist':
//             include_once 'model/m_user.php';
//             if(isset($_SESSION['user']['MaTK'])){
//                 $info_user = user_getById($_SESSION['user']['MaTK']);
//             }
//             //laydulieu
//             include_once 'model/m_wishlist.php';
//             if(isset($_SESSION['user'])) {
//                 $MaTK = $_SESSION['user']['MaTK'];
//                 $wishlist = show_wishlist($MaTK);
//                 $view_name = 'page_wishlist';
//             } else {
//                 $_SESSION['loi']['yeuthich'] = 'Vui lòng đăng nhập để thêm sản phẩm vào yêu thích';
//                 header('Location: '.$base_url.'user/login');
//             }
//             $title = "Danh sách yêu thích";
//             break;
//         case 'addtowishlist':

//             include_once 'model/m_product.php';
//             include_once 'model/m_wishlist.php';
//             if(isset($_SESSION['user'])) {
//                 if(isset($_POST['btn_addtowishlist']) && $_POST['btn_addtowishlist']) {

//                     $MaTK = $_SESSION['user']['MaTK'];
//                     $MaSP = $_POST['MaSP'];
//                     $has_wishlist = check_wishByProductAndUser($MaTK, $MaSP);
//                     if(true) {
//                         add_to_wishlist($MaTK, $MaSP);
//                     } else {
//                         his_wishlist($MaTK);
//                         $has_wishlist = check_wishByProductAndUser($MaTK, $MaSP);
//                         add_to_wishlist($MaTK, $MaSP);
//                     }
//                 }
//             }
//             header('location: '.$base_url.'page/wishlist');
//             break;
//         case 'delete_wishlist':
//             include_once 'model/m_wishlist.php';
            // delete_wishlist_by_pro($_GET['id']);
            // header('location: '.$base_url.'page/wishlist');

//             break;
//         case 'discount':
//             //laydulieu
//             $view_name = 'page_discount';
//             break;
//         case 'nhanhang':
//             //laydulieu
            // $MaTK=$_SESSION['user']['MaTK'];
            // $MaHD=$_GET['MaHD'];
            // $chitiethd=getproductByHD($MaTK,$MaHD);
//             $title = "Chi tiết đơn hàng";
//             $view_name = 'page_nhanhang';
//             break;
//         case 'history':
//             //laydulieu
//             $MaTK = $_SESSION['user']['MaTK'];
//             $view_name = 'page_history';
//             break;
//         case 'search':
//             include_once 'model/m_user.php';
//             if(isset($_SESSION['user']['MaTK'])){
//                 $info_user = user_getById($_SESSION['user']['MaTK']);
//             }
//             if(isset($_POST['search_key'])) {
//                 // doi tu post sang get
//                 header("location: ".$base_url."page/search/".$_POST['search_key']."");
//             }
//             // lay du lieu
//             include_once 'model/m_product.php';
//             $name = "Kết quả tìm kiếm";
//             $page = 1;
//             if(isset($_GET['page'])) {
//                 $page = $_GET['page'];
//             }
//             $ketqua = product_search($_GET['search_key'], $page);
//             $sotrang = ceil(intval((product_searchTotal($_GET['search_key']))) / 12);
//             // hien thi du lieu
//             $view_name = 'page_search';
//             break;
//         default:
//             // lay du lieu
//             include_once 'model/m_product.php';
//             $dsMoi = product_getNew(4);
//             $dsGhim = product_getPin(4);
//             //hien thi du lieu
//             $view_name = 'page_home';
//             break;
//     }
//     include_once 'view/v_user_layout.php';
// } else {
//     header('location: '.$base_url.'page/home');
// }
?>