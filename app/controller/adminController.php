<?php
namespace app\controller;
use app\model\productModel;
use app\model\categoryModel;
use app\model\cartModel;
use app\model\userModel;
use app\model\adminModel;
class adminController extends baseController{
    private $pro;
    private $cat;
    private $admin;
    private $cart;
    private $user;
    function __construct(){
        $this->pro=new productModel;
        $this->cat=new categoryModel;
        $this->admin=new adminModel;
        $this->cart=new cartModel;
        $this->user=new userModel;
    }
    function index(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            $this->data["tkProduct"] = $this->pro->count_product();
            $this->data["tkUser"]= $this->user->user_countAll();
            $this->data["hoaDonMoi"] = $this->admin->admin_getHoaDon();
            $this->data["tkSp"] = $this->cat->danhmuc_TkSanPham();
            $this->data["allCate"] = $this->cat->category_getALLDM();
            $this->data["tkDoanhThu"] = $this->cart->history_stat();
            $this->data["tkTongDoanhThu"] = $this->cart->doanhthu_countAll();
            $this->data["tkHoaDon"] = $this->cart->hoadon_countAll();
            $this->data["usermoi"] = $this->admin->admin_getUser();
            $this->titlepage="Trang thống kê | Bé yêu shop";
            $this->renderView("admin_dashboard",$this->titlepage,$this->data);
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function category(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            $this->data["dsADMIN_DM"] = $this->admin->admin_getALLDM();
            $this->titlepage="Trang quản lý danh mục | Bé yêu shop";
            $this->renderView("admin_category",$this->titlepage,$this->data);
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function catadd(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            if (isset($_POST['submit'])) {
                $TenDM = $_POST['TenDM'];
                $MaDMC = $_POST['MaDMC'];
                $check_DM = $this->admin->admin_checkTenDM($TenDM);
                if ($check_DM) { //  bị trùng không thêm báo lỗi
                    $_SESSION['loi'] = 'Không thể thêm vì mã <strong>' . $TenDM . '</strong> đã tồn tại! ';
                } else { // Sai , ko trùng , thêm tài khoản
                    $this->admin->danhmuc_add($TenDM, $MaDMC);
                    $_SESSION['thongbao'] = 'Đã thêm danh mục thành công!';
                    header('location: ' . BASE_URL . 'admin/category');
                }
            }
            $this->titlepage="Thêm danh mục | Bé yêu shop";
            $this->renderView("admin_category_them",$this->titlepage,$this->data);
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function catedit(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
            $url_array = explode("/",$url);
            if(count($url_array)>0){
                $MaDM=$url_array[count($url_array)-1];
            }else{
                $MaDM="";
            }
            if (isset($_POST['submit'])) {
                $TenDM = $_POST['TenDM'];
                $MaDMC = $_POST['MaDMC'];
                $this->admin->admin_update_DM($MaDM, $TenDM, $MaDMC);
                header('location: ' . BASE_URL . 'admin/category');
            }
            $this->data["itemDM"] = $this->admin->admin_getById($MaDM);
            $this->titlepage="Sửa danh mục | Bé yêu shop";
            $this->renderView("admin_category_edit",$this->titlepage,$this->data);
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function catdelete(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
            $url_array = explode("/",$url);
            if(count($url_array)>0){
                $MaDM=$url_array[count($url_array)-1];
            }else{
                $MaDM="";
            }
            $this->admin->admin_delete($MaDM);
            header('location: ' . BASE_URL . 'admin/category');
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function sanpham(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            $this->data["show_product"]=$this->admin->admin_Showallsp();
            $this->titlepage="Trang quản lí sản phẩm | Bé yêu shop";
            $this->renderView("admin_product",$this->titlepage,$this->data);
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function sanphamthem(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            if (isset($_POST['submit'])) {
                // Nhận dữ liệu từ form
                $TenSP = $_POST['TenSP'];
                $SoLuong = $_POST['SoLuong'];
                $Gia = $_POST['Gia'];
                $GiaGiam = $_POST['GiaGiam'];
                $MaDM = $_POST['MaDM'];
                $MoTa = $_POST['MoTa'];
                $_FILES['anh'];
                $_FILES['anh1'];
                $_FILES['anh2'];
                $_FILES['anh3'];
                $_FILES['anh4'];
                $check_TenSP = $this->admin->admin_checkTenSP($TenSP);
                if ($check_TenSP) { //  bị trùng không thêm báo lỗi
                    $_SESSION['loi'] = 'Không thể thêm vì tên <strong>' . $TenSP . '</strong> đã tồn tại! ';
                } else { // Sai , ko trùng , thêm tài khoản
                    $target_dir = "upload/products/";
                    $fileAnh = array("anh", "anh1", "anh2", "anh3", "anh4");
                    $upload = array();
                    foreach ($fileAnh as $fileName) {
                        $target_file = $target_dir . basename($_FILES[$fileName]["name"]);
                        move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file);
                        $upload[] = $_FILES[$fileName]["name"];
                    }
                    $this->admin->admin_AddProduct($TenSP, $_FILES["anh"]["name"], $_FILES["anh1"]["name"], $_FILES["anh2"]["name"], $_FILES["anh3"]["name"], $_FILES["anh4"]["name"], $SoLuong, $Gia, $GiaGiam, $MaDM, $MoTa);
                    $_SESSION['thongbao'] = 'Đã thêm sản phẩm thành công!';
                }
            }
            $this->data["danhmuc"] = $this->admin->admin_getALLDM();
            $this->titlepage="Thêm sản phẩm | Bé yêu shop";
            $this->renderView("admin_product_add",$this->titlepage,$this->data);
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function sanphamsua(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
            $url_array = explode("/",$url);
            if(count($url_array)>0){
                $MaSP=$url_array[count($url_array)-1];
            }else{
                $MaSP="";
            }
            if (isset($_POST['submit'])) {
                // Nhận dữ liệu từ form
                $TenSP = $_POST['TenSP'];
                $_FILES['anh'];
                $_FILES['anh1'];
                $_FILES['anh2'];
                $_FILES['anh3'];
                $_FILES['anh4'];
                $SoLuong = $_POST['SoLuong'];
                $Gia = $_POST['Gia'];
                $GiaGiam = $_POST['GiaGiam'];
                $MoTa = $_POST['MoTa'];
                $MaDM = $_POST['MaDM'];
                $check_TenSP = $this->admin->admin_checkTenSPsua($TenSP,$MaSP);
                if ($check_TenSP) { //  bị trùng không thêm báo lỗi
                    $_SESSION['loi'] = 'Không thể thêm vì tên <strong>' . $TenSP . '</strong> đã tồn tại! ';
                } else { // Sai , ko trùng , thêm tài khoản
                    $target_dir = "public/upload/products/";
                    $fileAnh = array("anh", "anh1", "anh2", "anh3", "anh4");
                    $upload = array();
                    foreach ($fileAnh as $fileName) {
                        $target_file = $target_dir . basename($_FILES[$fileName]["name"]);
                        move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file);
                        $upload[] = $_FILES[$fileName]["name"];
                    }
                    $this->admin->admin_UpdateProduct($MaSP, $TenSP, $_FILES["anh"]["name"], $_FILES["anh1"]["name"], $_FILES["anh2"]["name"], $_FILES["anh3"]["name"], $_FILES["anh4"]["name"], $SoLuong, $Gia, $GiaGiam, $MoTa,$MaDM);
                    $_SESSION['thongbao'] = 'Đã sửa sản phẩm thành công!';
                }
            }
            $this->data["danhmuc"] = $this->admin->admin_getALLDM();
            $this->data["show_AnhSP"] = $this->admin->admin_getPById_Product($MaSP);
            $this->titlepage="Trang quản lí sản phẩm | Bé yêu shop";
            $this->renderView("admin_product_edit",$this->titlepage,$this->data);
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function sanphamxoa(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
            $url_array = explode("/",$url);
            if(count($url_array)>0){
                $MaSP=$url_array[count($url_array)-1];
            }else{
                $MaSP="";
            }
            if (isset($MaSP) && ($MaSP) > 0) {
                // nếu sản phẩm tồn tại giỏ hàng => không cho phép xóa và hiển thị ra thông báo cho người dùng
                if ($this->pro->has_cart_by_product($MaSP)) {
                    $_SESSION['detete']['product'] = "Sản phẩm đã mua, Không được phép xóa";
                } else {
                    if ($this->pro->has_wishlist_by_product($MaSP)) {
                        $_SESSION['detete']['product'] = "Không được phép xóa sản phẩm được yêu thích";
                    } else {
                        $target_dir = "public/upload/products/";
                        $product_Anh = $this->admin->admin_Product_timxoaAnhSP($MaSP);
                        foreach ($product_Anh as $anh) {
                            $AnhSP_path = $target_dir . $anh;
                            if (is_file($AnhSP_path)) {
                                unlink($AnhSP_path);
                            }
                            $this->admin->admin_Product_Delete($MaSP);
                        };
                        $_SESSION['detete']['success'] = "Xóa sản phẩm thành công";
                    }
                }
            }
            header('location: ' . BASE_URL . 'admin/product');
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function banner(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            $this->data["show_product"]=$this->admin->admin_Showallsp();
            $this->titlepage="Trang quản lí sản phẩm | Bé yêu shop";
            $this->renderView("admin_product",$this->titlepage,$this->data);
        }else{
            header('location: '.BASE_URL.'error404');
        }
        $this->data["showbanner"]=$this->admin->admin_ShowBanner();
        $this->titlepage="Trang quản lí banner | Bé yêu shop";
        $this->renderView("admin_banner",$this->titlepage,$this->data);
    }
    function bannerthem(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            if (isset($_POST['submit'])) {
                $_FILES['banner_anh'];
                $target_dir = "upload/banners/";
                $target_file = $target_dir . basename($_FILES["banner_anh"]["name"]);
                move_uploaded_file($_FILES['banner_anh']["tmp_name"], $target_file);

                $check_Banner = $this->admin->admin_AddBanner($_FILES['banner_anh']['name']);
                if ($check_Banner != false) { //  bị trùng không thêm báo lỗi
                    $_SESSION['loi'] = 'Không thể thêm banner vì bị trùng tên file! ';
                } else { // Sai , ko trùng , thêm tài khoản
                    $_SESSION['thongbao'] = 'Đã thêm banner thành công!';
                }
            }
            $this->titlepage="Thêm banner | Bé yêu shop";
            $this->renderView("admin_banner_add",$this->titlepage,$this->data);
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function donhang(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            $this->data["count_km"] = $this->admin->count_km();
            $this->data["show_HD"]= $this->admin->admin_donhang();
            $this->titlepage="Trang quản lí dơn hàng | Bé yêu shop";
            $this->renderView("admin_donhang",$this->titlepage,$this->data);
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
    function donhangsua(){
        if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])){
            if (isset($_POST['btn-donhang'])) {
                $MaHD = $_POST['MaHD'];
                $TrangThai = $_POST['TrangThai'];
                $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
                $url_array = explode("/",$url);
                if(count($url_array)>0){
                    $MaHD=$url_array[count($url_array)-1];
                }else{
                    $MaHD="";
                }
                // Check if MaHD exists before updating
                $getHDbyid = $this->admin->get_MaHDbyid($MaHD);

                if ($getHDbyid) {
                    $SuaHD = $this->admin->suaTT($TrangThai, $MaHD);

                    if ($SuaHD !== false) {
                        $_SESSION['ThongBao']['Thanhcong'] = "<div id='Thongbao' class='success'>Cập nhật trạng thái đơn hàng thành công</div>";
                        
                    } else {
                        $_SESSION['ThongBao']['Thatbai'] = "<div id='Thongbao' class='error'>Cập nhật không thành công.</div>";
                    }
                    header('location: '.BASE_URL.'admin/donhang');
                } else {
                    echo "Mã Hóa đơn bruh bruh.";
                }
            }
        }else{
            header('location: '.BASE_URL.'error404');
        }
    }
}
// if (isset($_GET['act'])) {
//     if ($_SESSION['user']['VaiTro'] !== 0 && isset($_SESSION['user'])) {
//         switch ($_GET['act']) {

//             case 'banner-add':
                // if (isset($_POST['submit'])) {
                //     $MaBanner = "";
                //     $_FILES['banner_anh'];
                //     $target_dir = "upload/banners/";
                //     $target_file = $target_dir . basename($_FILES["banner_anh"]["name"]);
                //     move_uploaded_file($_FILES['banner_anh']["tmp_name"], $target_file);

                //     $check_Banner = admin_AddBanner($_FILES['banner_anh']['name']);
                //     if ($check_Banner != false) { //  bị trùng không thêm báo lỗi
                //         $_SESSION['loi'] = 'Không thể thêm banner! ';
                //     } else { // Sai , ko trùng , thêm tài khoản
                //         $_SESSION['thongbao'] = 'Đã thêm banner thành công!';
                //     }
                // }
                // $view_name = 'admin_banner_add';
//                 $title = "Thêm banner";
//                 break;
//             case 'banner-edit':
//                 $MaBanner = $_GET['id'];
//                 if (isset($_POST['submit'])) {
//                     $_FILES['banner_anh'];
//                     $target_dir = "upload/banners/";
//                     $target_file = $target_dir . basename($_FILES["banner_anh"]["name"]);
//                     move_uploaded_file($_FILES['banner_anh']["tmp_name"], $target_file);
//                     $banner_anh = $target_file;
//                     $check_banner = admin_edit_banner($MaBanner, $_FILES["banner_anh"]["name"]);
//                     if ($check_banner != false) { //  bị trùng không thêm báo lỗi
//                         $_SESSION['loi'] = 'Sửa không thành công! ';
//                     } else { // Sai , ko trùng , thêm tài khoản
//                         $_SESSION['thongbao'] = 'Đã sửa banner thành công!';
//                     }
//                 }
//                 $showbanner = admin_getPById_Banner($MaBanner);
//                 $view_name = 'admin_banner_edit';
//                 $title = "Thêm banner";
//                 break;
//             case 'user':
//                 //lay du lieu
//                 $dsTK = user_getAll();
//                 // hien thi du lieu
//                 $view_name = 'admin_user';
//                 $title = "Trang quản lí tài khoản";
//                 break;
//             case 'khuyenmai':
//                 include_once 'model/m_pdo.php';
//                 include_once 'model/m_admin.php';
//                 //lay du lieu
//                 if (isset($_POST['btn_km'])) {
//                     $TenKM = $_POST['TenKM'];
//                     $SoLuong = $_POST['SoLuong'];
//                     $codeKhuyenMai = $_POST['khuyenMai'];
//                     $soTienGiam = $_POST['soTienGiam'];
//                     $ngayBatDau = $_POST['ngayBatDau'];
//                     $ngayKetThuc = $_POST['ngayKetThuc'];

//                     if (is_codeKM($codeKhuyenMai)) {
//                         // Nếu tồn tại, báo lỗi và không thêm vào cơ sở dữ liệu
//                         $loi = "Mã khuyến mãi '$codeKhuyenMai' đã tồn tại. Vui lòng chọn một mã khuyến mãi khác.";
//                     } else {
//                         // Nếu không trùng, thực hiện thêm vào cơ sở dữ liệu

//                         $add_khuyenmai = admin_addkhuyenmai($TenKM, $codeKhuyenMai, $soTienGiam, $ngayBatDau, $ngayKetThuc, $SoLuong);

//                         if ($add_khuyenmai !== false) {
//                             echo "<div id='Thongbao' class='success'>Thêm mã khuyến mãi thành công</div>";
//                         } else {
//                             echo "<div id='Thongbao' class='error'>Thêm mã khuyến mãi không thành công.</div>";
//                         }
//                     }
//                 }
//                 // hien thi du lieu
//                 $show_KM = getallkm();
//                 $view_name = 'admin_khuyenmai';
//                 $title = "Trang quản lí khuyến mãi";
//                 break;
//             case 'edit-khuyenmai':
//                 include_once 'model/m_pdo.php';
//                 include_once 'model/m_admin.php';
//                 $show_KM = admin_getKMById($_GET['id']);
//                 //lay du lieu
//                 if (isset($_POST['btn_sua'])) {
//                     $maKhuyenMai = $_POST['MaKM'];
//                     $tenKhuyenMai = $_POST['TenKM'];
//                     $giaKhuyenMai = $_POST['GiaKM'];
//                     $ngayBatDau = $_POST['NgayBatDau'];
//                     $ngayKetThuc = $_POST['NgayKetThuc'];
//                     $SoLuong = $_POST['SoLuong'];
//                     if (is_codeKM($tenKhuyenMai)) {
//                         // Nếu tồn tại, báo lỗi và không thêm vào cơ sở dữ liệu
//                         $loi = "Mã khuyến mãi '$tenKhuyenMai' đã tồn tại. Vui lòng chọn một mã khuyến mãi khác.";
//                     } else {
//                         // Nếu không trùng, thực hiện thêm vào cơ sở dữ liệu
//                         $updateQuery = updatekm($tenKhuyenMai, $giaKhuyenMai, $ngayBatDau, $ngayKetThuc, $SoLuong, $maKhuyenMai);
//                         header('Location: ' . $base_url . 'admin/khuyenmai');
//                         if ($updateQuery !== false) {
//                             echo "<div id='Thongbao' class='success'>Cập nhật thành công</div>";
//                         } else {
//                             echo "<div id='Thongbao' class='error'>Cập nhật không thành công.</div>";
//                         }
//                     }
//                 }
//                 // hien thi du lieu
//                 $title = "Sửa khuyến mãi";
//                 $view_name = 'admin_sua_khuyenmai';
//                 break;
//             case 'delete-khuyenmai':
//                 include_once 'model/m_pdo.php';
//                 include_once 'model/m_admin.php';
//                 $show_KM = admin_getKMById($_GET['id']);
//                 xoakm($_GET['id']);
//                 header('Location: ' . $base_url . 'admin/khuyenmai');
//                 break;
//             case 'user-add':
//                 //lay du lieu
//                 include_once 'model/m_user.php';
//                 if (isset($_POST['submit'])) {
//                     $SoDienThoai = $_POST['SoDienThoai'];
//                     $Email = $_POST['Email'];
//                     $HoTen = $_POST['HoTen'];
//                     $MatKhau = $_POST['MatKhau'];
//                     $DiaChi = $_POST['DiaChi'];
//                     $VaiTro = $_POST['VaiTro'];
//                     $kq = user_checkEmail($Email);
//                     if ($kq) {
//                         // bi trung, khong them
//                         $_SESSION['loi'] = 'Không thể tạo tài khoản với số điện thoại <strong>' . $Email . '</strong>';
//                     } else {
//                         //khong trung
//                         $HinhAnh = 'defaut.png';
//                         user_admin_add($SoDienThoai, $Email, $HoTen, $MatKhau, $DiaChi, $VaiTro);
//                         $_SESSION['thongbao'] = '<h4>Đã tạo tài khoản với Email <strong>' . $Email . '</strong> thành công';
//                     }
//                 }
//                 // hien thi du lieu
//                 $view_name = 'admin_user_add';
//                 break;
//             case 'user-edit':
//                 //lay du lieu
//                 include_once 'model/m_user.php';
//                 $dsTK = user_getById($_GET['id']);
//                 if (isset($_POST['submit'])) {
//                     $MaTK = $_GET['id'];
//                     $HoTen = $_POST['HoTen'];
//                     $Email = $_POST['Email'];
//                     $SoDienThoai = $_POST['SoDienThoai'];
//                     $MatKhau = $_POST['MatKhau'];
//                     $DiaChi = $_POST['DiaChi'];
//                     $VaiTro = $_POST['VaiTro'];
//                     $kq = user_checkEmail($Email);
//                     if ($kq && $kq['MaTK'] != $MaTK) {
//                         // bi trung, khong them
//                         $_SESSION['loi'] = '<p>Không thể tạo tài khoản với Email <strong>' . $Email . '</strong> !</p>';
//                     } else {
//                         //khong trung
//                         user_edit($MaTK, $SoDienThoai, $Email, $HoTen, $MatKhau, $DiaChi, $VaiTro);
//                         $_SESSION['thongbao'] = '<p>Thông tin thay đổi đã được lưu lại !</p>';
//                     }
//                 }
//                 // hien thi du lieu
//                 $view_name = 'admin_user_edit';
//                 break;
//             case 'user-delete':
//                 // Lấy dữ liệu
//                 include_once 'model/m_user.php';
//                 $vaiTroUser = user_getById($_GET['id']);
//                 // Kiểm tra xem người dùng có tự xóa chính mình hay không => nếu đúng => báo lỗi
//                 if ($_GET['id'] == $_SESSION['user']['MaTK']) {
//                     $_SESSION['loi'] = '<p>Không thể tự xóa tài khoản của bạn!</p>';
//                 } else if ($_SESSION['user']['VaiTro'] >= $vaiTroUser['VaiTro']) {
//                     user_delete($_GET['id']);
//                     $_SESSION['thongbao'] = '<p>Xóa người dùng thành công! </p>';
//                 } else if ($_SESSION['user']['VaiTro'] < $vaiTroUser['VaiTro']) {
//                     // Kiểm tra xem người dùng có quyền cao hơn hay không => nếu đúng => báo lỗi
//                     $_SESSION['loi'] = '<p>Bạn không thể xóa người có quyền cao hơn!</p>';
//                 }
//                 // Hiển thị dữ liệu
//                 header('location: ' . $base_url . 'admin/user');
//                 $view_name = 'admin_user_delete';
//                 break;
//             case 'binhluan':
//                 //lay du lieu
//                 include_once 'model/m_user.php';
//                 $show_bl = show_comment();
//                 $view_name = 'admin_binhluan';
//                 $title = "Trang quản lí bình luận";
//                 break;
//             case 'chitiet-binhluan':
//                 //lay du lieu
//                 include_once 'model/m_user.php';
//                 $tenSP = get_tenSP($_GET['id']);
//                 $show_bl = chitiet_comment($_GET['id']);
//                 $view_name = 'admin_binhluan_chitiet';
//                 break;
//             case 'delete-binhluan':
//                 //lay du lieu
//                 include_once 'model/m_user.php';
//                 delete_comment($_GET['id']);
//                 header('location: ' . $base_url . 'admin/chitiet/binhluan/' . $_GET['MaSP']);
//                 break;
//             case 'donhang':
//                 //lay du lieu
//                 include_once 'model/m_user.php';
//                 $show_HD = admin_donhang();
//                 $view_name = 'admin_donhang';
//                 $title = "Trang quản lí đơn hàng";
//                 break;
//             case 'sua-donhang':
//                 //lay du lieu
//                 include_once 'model/m_user.php';
//                 ///
                // if (isset($_POST['btn-donhang'])) {
                //     $MaHD = $_POST['MaHD'];
                //     $TrangThai = $_POST['TrangThai'];

                //     // Check if MaHD exists before updating
                //     $getHDbyid = get_MaHDbyid($MaHD);

                //     if ($getHDbyid) {
                //         $SuaHD = suaTT($TrangThai, $MaHD);

                //         if ($SuaHD !== false) {
                //             $_SESSION['Thongbao']['Thanhcong'] = "<div id='Thongbao' class='success'>Cập nhật trạng thái đơn hàng thành công</div>";
                //         } else {
                //             $_SESSION['Thongbao']['Thatbai'] = "<div id='Thongbao' class='error'>Cập nhật không thành công.</div>";
                //         }
                //     } else {
                //         echo "Mã Hóa đơn bruh bruh.";
                //     }
                // }
//                 ///
//                 $show_HD = admin_donhang();
//                 $view_name = 'admin_donhang';
//                 break;
//             default:
//                 $view_name = 'admin_dashboard';
//                 break;
//         }
//     } else {
//         header('location: ' . $base_url . 'page/home');
//     }
//     include_once 'view/v_admin_layout.php';
// } else {
//     header('location: ' . $base_url . '404.php');
// }
?>