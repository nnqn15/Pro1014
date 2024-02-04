<?php 
namespace app\model;
use app\model\databaseModel;
class userModel{
    private $db;
    function __construct()
    {
        $this->db=new databaseModel;
    }
    function check_login($email, $password){
        $md5MK=md5($password);
        return $this->db-> pdo_query_one("SELECT * FROM taikhoan WHERE Email='$email' AND MatKhau='$md5MK'");
    }
    // kiểm tra email có tồn tại hay không
    function has_email($email){
        return $this->db-> pdo_query_one("SELECT EMAIL FROM taikhoan WHERE Email='$email'");
    }
    // Tạo tài khoản người dùng 
    function user_add($SoDienThoai, $Email, $HoTen, $MatKhau, $DiaChi){
        $md5MK=md5($MatKhau);
        $this->db-> pdo_execute("INSERT INTO taikhoan(`SoDienThoai`,`Email`,`HoTen`,`MatKhau`,`DiaChi`) VALUES($SoDienThoai,'$Email','$HoTen','$md5MK','$DiaChi')");
    }
    // Thêm user từ Admin
    function user_admin_add($SoDienThoai, $Email, $HoTen, $MatKhau, $DiaChi,$VaiTro){
        $this->db-> pdo_execute("INSERT INTO taikhoan(`SoDienThoai`,`Email`,`HoTen`,`MatKhau`,`DiaChi`,`VaiTro`) VALUES($SoDienThoai,$Email,$HoTen,md5($MatKhau),$DiaChi,$VaiTro)");
    }
    // Lấy thông tin user
    function user_getAll(){
        return $this->db-> pdo_query("SELECT * FROM taikhoan");
    }
    function user_checkEmail($Email){
        return $this->db-> pdo_query_one("SELECT * FROM taikhoan WHERE Email=$Email");
    }
    function user_getById($MaTK){
        return $this->db-> pdo_query_one("SELECT * FROM taikhoan WHERE MaTK=$MaTK");
    }
    function user_edit($MaTK,$SoDienThoai, $Email, $HoTen, $MatKhau, $DiaChi,$VaiTro){
        $this->db-> pdo_execute("UPDATE taikhoan SET SoDienThoai=$SoDienThoai,Email=$Email,HoTen=$HoTen,MatKhau=$MatKhau,DiaChi=$DiaChi,VaiTro=$VaiTro WHERE MaTK=$MaTK");
    }
    function user_delete($MaTK){
        $this->db-> pdo_execute("DELETE FROM taikhoan WHERE MaTK=$MaTK");
    }
    function user_countAll(){
        return $this->db-> pdo_query_value("SELECT COUNT(*) FROM taikhoan");
    }
    function user_update_info($HoTen, $SoDienThoai, $DiaChi, $MaTK){
        return $this->db-> pdo_execute("UPDATE taikhoan SET HoTen=$HoTen, SoDienThoai =$SoDienThoai, DiaChi=$DiaChi WHERE MaTK=$MaTK");
    }
    function user_edit_info($MaTK,$SoDienThoai, $HoTen, $DiaChi,$Hinh){
        $this->db-> pdo_execute("UPDATE taikhoan SET SoDienThoai=$SoDienThoai,HoTen='$HoTen',DiaChi='$DiaChi',HinhAnh = '$Hinh' WHERE MaTK=$MaTK");
    }
    function user_update_pass($MaTK, $MatKhau){
        $this->db-> pdo_execute("UPDATE taikhoan SET MatKhau = '$MatKhau' WHERE MaTK = $MaTK");
    }
    //up anh
    function user_upanh(){
        $target_dir='public/upload/avatar/';
        $target_file=$target_dir . basename($_FILES['Hinh']['name']);
        if(!file_exists($target_file)){
            move_uploaded_file($_FILES['Hinh']['tmp_name'], $target_file);
        }
        $img=basename($_FILES['Hinh']['name']);
        return $img;
    }
}
?>
