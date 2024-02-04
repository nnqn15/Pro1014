<?php
namespace app\controller;
use app\model\categoryModel;
use app\model\cartModel;
use app\model\userModel;
class userController extends baseController{
    private $cat;
    private $cart;
    private $user;
    function __construct(){
        $this->cat=new categoryModel;
        $this->cart=new cartModel;
        $this->user=new userModel;
    }
    function index(){
        if (isset($_SESSION['user']['VaiTro'])) {
            $this->data["danhmuc"]=$this->cat->category_getALLDM();
            $this->data["danhmucmuc"]=$this->cat->category_getALLDMMUC();
            $this->data["count_cart"]= $this->cart->count_cart($_SESSION['user']['MaTK']);
            $this->data["show_cart_for_user"]= $this->cart->show_cart_for_user($_SESSION['user']['MaTK']);
            $this->data["info_user"]= $this->user->user_getById($_SESSION['user']['MaTK']);
            $this->titlepage="Tài khoản | Bé yêu shop";
            $this->data['history_cart'] = $this->cart-> history_cart($_SESSION['user']['MaTK']);
            $this->data['info_user'] =$this->user-> user_getById($_SESSION['user']['MaTK']);
            $this->renderView("user_dashboard",$this->titlepage,$this->data);
        } else {
            // Neus không tồn tại người dùng thì chuyển về trang đăng ký
            $_SESSION['error']['register'] = 'Vui lòng đăng ký để truy cập vào trang dashboard';
            header('location: ' . BASE_URL . 'user/register');
        }
    }
    function update(){
        if(isset($_POST['btn_update_info']) && $_POST['btn_update_info']){
            $this->data['info_user'] =$this->user-> user_getById($_SESSION['user']['MaTK']);
            $HoTen = $_POST['HoTen'];
            $SoDienThoai = $_POST['SoDienThoai'];
            $DiaChi = $_POST['DiaChi'];
            $MaTK=$_SESSION['user']['MaTK'];
            if(!$HoTen || !$SoDienThoai || !$DiaChi){
                $_SESSION['loi'] = 'Vui lòng nhập đủ <strong>các thông tin</strong> cho tài khoản!';
            }else{
                if(isset($_FILES['Hinh']['name']) && $_FILES['Hinh']['name']!= ""){
                    $Hinh = $this->user->user_upanh();
                    if(file_exists($_POST['HinhAnh'])){
                        unlink($_POST['HinhAnh']); 
                    }
                }else{
                    $Hinh = $_POST['HinhAnh'];
                }
                $this->user->user_edit_info($MaTK,$SoDienThoai, $HoTen, $DiaChi,$Hinh);
                $_SESSION['thanhcong'] = 'Bạn đã cập nhật tài khoản thành công!';
            }
        }
        header('location: '.BASE_URL.'user');
    }
    function login(){
        if (isset($_POST['btn_login']) && $_POST['btn_login']) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($email) || empty($password)) {
                // Hiển thị lỗi
                $_SESSION['error']['login'] = "Email hoặc mật khẩu không được để trống";
            } else {
                // kiểm tra tài khoản có tồn tại hay không
                $has_account = $this->user->check_login($email, $password);
                // cho phép đăng nhập
                if ($has_account) {
                    $_SESSION['user'] = $has_account;
                    header('location: ' . BASE_URL);
                } else if ($has_account == 0) {
                    $_SESSION['error']['login'] = "Tài khoản hoặc mật khẩu sai. Vui lòng thử lại";
                }
            }
        }
        $this->data["danhmuc"]=$this->cat->category_getALLDM();
        $this->data["danhmucmuc"]=$this->cat->category_getALLDMMUC();
        $this->titlepage="Đăng nhập | Bé yêu shop";
        $this->renderView("user_login",$this->titlepage,$this->data);
    }
    function logout(){
        unset($_SESSION['user']);
        header('location: ' . BASE_URL );
    }
    function register(){
        if (isset($_POST['btn_register']) && $_POST['btn_register']) {
            $HoTen = $_POST['fullname'];
            $Email = $_POST['email'];
            $SoDienThoai = $_POST['number_phone'];
            $MatKhau = $_POST['password'];
            $DiaChi = $_POST['address'];

            if (empty($SoDienThoai) || empty($MatKhau) || empty($HoTen) || empty($DiaChi)) {
                $_SESSION['error']['register'] = 'Đăng ký không thành công. Vui lòng thử lại';
                // header('location: ' . $base_url . 'user/register');
            } else if (empty($Email)) {
                $_SESSION['error']['register'] = 'Đăng ký không thành công. Vui lòng thử lại sau';
            // } else if (true) {
            //     $_SESSION['error']['register'] = 'Đăng ký không thành công. Email không hợp lệ';
        // Kiểm tra tài khoản có tồn tại hay không
            } else if ($this->user->has_email($Email) > 0) {
                $_SESSION['error']['register'] = 'Đăng ký không thành công. Tài khoản này đã tồn tại';
            } else {
                // Allow registration
                $this->user->user_add($SoDienThoai, $Email, $HoTen, $MatKhau, $DiaChi);
                $_SESSION['success']['register'] = 'Đăng ký tài khoản thành công.';
            }
            
        }
        $this->data["danhmuc"]=$this->cat->category_getALLDM();
        $this->data["danhmucmuc"]=$this->cat->category_getALLDMMUC();
        $this->titlepage="Đăng ký tài khoản | Bé yêu shop";
        $this->renderView("user_register",$this->titlepage,$this->data);
    }
    function update_pass(){
        if(isset($_POST['btn_update_pass']) && $_POST['btn_update_pass']){
            $info_user = $this->user->user_getById($_SESSION['user']['MaTK']);
            $MatKhau = $_POST['old_password'];
            $MatKhauMoi = $_POST['new_password'];
            $MatKhauNhapLai = $_POST['re_password'];
            $MaTK = $_SESSION['user']['MaTK'];
            if(empty($MatKhau) && empty($MatKhauMoi) && empty($MatKhauNhapLai)){
                $_SESSION['loi'] = 'Vui lòng nhập các thông tin cho tài khoản!';
            }elseif(md5($MatKhau) != $info_user['MatKhau']){
                $_SESSION['loi'] = 'Vui lòng nhập đúng mật khẩu cũ của tài khoản!';
            }elseif($MatKhau == $MatKhauMoi){
                $_SESSION['loi'] = 'Vui lòng nhập mật khẩu mới khác mật khẩu cũ cho tài khoản!';
            }elseif($MatKhauMoi != $MatKhauNhapLai){
                $_SESSION['loi'] = 'Vui lòng nhập mật khẩu mới và mật khẩu nhập lại giống nhau!';
            }elseif(empty($MatKhauMoi)){
                $_SESSION['loi'] = 'Vui lòng nhập mật khẩu mới cho tài khoản!';
            }elseif(empty($MatKhauNhapLai)){
                $_SESSION['loi'] = 'Vui lòng nhập lại mật khẩu mới cho tài khoản!';
            }elseif(empty($MatKhau)){
                $_SESSION['loi'] = 'Vui lòng nhập mật khẩu cũ cho tài khoản!';
            }
            else{
                $this->user->user_update_pass($MaTK, md5($MatKhauMoi));
                $_SESSION['thanhcong'] = 'Bạn đã cập nhật mật khẩu thành công!';
            }
        }
        header('location: '.BASE_URL.'user');
    }
}
?>