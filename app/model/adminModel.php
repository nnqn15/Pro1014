<?php 
namespace app\model;
use app\model\databaseModel;
class adminModel{
    private $db;
    function __construct()
    {
        $this->db=new databaseModel;
    }
    function admin_Showallsp(){
        return $this->db-> pdo_query("SELECT * FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM=dm.MaDM ORDER BY MaSP DESC");
    }
    function admin_ShowanhUser(){
        return $this->db-> pdo_query("SELECT * FROM taikhoan ");
    }
    function admin_getUser(){
        return $this->db-> pdo_query("SELECT * FROM taikhoan ORDER BY MaTK DESC LIMIT 4");
    }
    function admin_getHoaDon(){
        return $this->db-> pdo_query("SELECT * FROM hoadon WHERE TrangThai!='gio-hang' ORDER BY MaHD DESC LIMIT 4");
    }
    function admin_getById($MaDM){
        return $this->db-> pdo_query_one("SELECT * FROM  danhmuc WHERE MaDM=$MaDM");
    }
    function admin_getALLDM(){
        return $this->db-> pdo_query("SELECT *FROM danhmuc ");
    }     
    function admin_checkTenDM($TenDM) {
        return $this->db-> pdo_query_one("SELECT * FROM danhmuc WHERE TenDM='$TenDM'");
    }
    function danhmuc_add($TenDM,$MaDMC){
        $this->db-> pdo_execute("INSERT INTO danhmuc(`TenDM`,`MaDMC`) VALUES('$TenDM',$MaDMC)");
    }
    function admin_update_DM($MaDM,$TenDM,$MaDMC){
        return $this->db-> pdo_execute("UPDATE danhmuc SET TenDM='$TenDM', MaDMC=$MaDMC WHERE MaDM=$MaDM");
    }
    function admin_delete($MaDM){
        $this->db-> pdo_execute("DELETE FROM danhmuc WHERE MaDM=$MaDM");
    } 
    
    function admin_ShowProduct(){
        return $this->db-> pdo_query("SELECT sp.*, dm.TenDM, dm.MaDMC FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM=dm.MaDM WHERE GiaGiam > 0 ORDER BY sp.MaSP ASC");
    }
    function admin_getPById_Product($MaSP){
        return $this->db-> pdo_query_one("SELECT * FROM sanpham WHERE MaSP=$MaSP");
    }
    function admin_checkTenSP($TenSP) {
        return $this->db-> pdo_query_one("SELECT * FROM sanpham WHERE TenSP='$TenSP'");
    }
    function admin_checkTenSPsua($TenSP,$MaSP) {
        return $this->db-> pdo_query_one("SELECT * FROM sanpham WHERE TenSP='$TenSP' AND MaSP!=$MaSP");
    }
    function admin_AddProduct($TenSP, $anh, $anh1, $anh2, $anh3, $anh4, $SoLuong, $Gia, $GiaGiam, $MaDM, $MoTa){
    $this->db-> pdo_execute("INSERT INTO sanpham(`TenSP`, `AnhSP`, `AnhSP1`, `AnhSP2`, `AnhSP3`, `AnhSP4`, `SoLuong`, `Gia`, `GiaGiam`, `MaDM`, `MoTa`)
            VALUES ('$TenSP', '$anh', '$anh1', '$anh2', '$anh3', '$anh4',  '$SoLuong', '$Gia', '$GiaGiam', $MaDM, '$MoTa')");
    }
    function admin_UpdateProduct($MaSP, $TenSP, $anh, $anh1, $anh2, $anh3, $anh4, $SoLuong, $Gia, $GiaGiam, $MoTa,$MaDM){
        $this->db-> pdo_execute("UPDATE sanpham SET TenSP = '$TenSP', AnhSP = '$anh', AnhSP1 = '$anh1', AnhSP2 = '$anh2', AnhSP3 = '$anh3', AnhSP4 = '$anh4', SoLuong = $SoLuong, Gia = $Gia, GiaGiam = $GiaGiam, MoTa = '$MoTa',MaDM=$MaDM WHERE MaSP = $MaSP");
    }

    function admin_Product_Delete($MaSP){
        $this->db-> pdo_execute("DELETE FROM sanpham WHERE MaSP=$MaSP");
    }
    function admin_Product_timxoaAnhSP($MaSP){
        $mt=$this->db->pdo_query("SELECT * FROM sanpham WHERE MaSP=$MaSP");
        $Anh = array(
            $mt[0]['AnhSP'],
            $mt[0]['AnhSP1'],
            $mt[0]['AnhSP2'],
            $mt[0]['AnhSP3'],
            $mt[0]['AnhSP4']
        );
        return $Anh; 
    }
    



    // Xóa file ảnh 

    function admin_ShowBanner(){
        return $this->db-> pdo_query("SELECT * FROM banner");
    }
    function admin_chitietkBanner($MaBanner) {
        return $this->db-> pdo_query_one("SELECT * FROM banner WHERE MaBanner=$MaBanner");
    }
    
    function admin_AddBanner($banner_anh){
        $this->db->pdo_execute("INSERT INTO banner (AnhBanner) VALUES ($banner_anh)");
    }
    
    function admin_getPById_Banner($MaBanner){
        return $this->db-> pdo_query_one("SELECT * FROM banner WHERE MaBanner=$MaBanner");
    }
    
    function admin_edit_banner($MaBanner, $banner_anh){
        $this->db->pdo_execute("UPDATE banner SET AnhBanner=$banner_anh WHERE MaBanner=$MaBanner");
    }
    
    function admin_banner_Delete($MaBanner){
        $this->db->pdo_execute("DELETE FROM banner WHERE MaBanner=$MaBanner ");
    }
    function admin_banner_timxoaAnhBanner($MaBanner){
        $mt =$this->db->pdo_execute("SELECT * FROM banner WHERE MaBanner=$MaBanner");
        return $mt[0]['AnhBanner']; // biến này chứa mãng dòng dữ liệu trả về.
    }
    function admin_addkhuyenmai( $TenKM, $codeKhuyenMai, $soTienGiam, $ngayBatDau, $ngayKetThuc, $SoLuong) {
    return $this->db-> pdo_execute("INSERT INTO khuyenmai ( TenKM, CodeKM, GiaKM, NgayBatDau, NgayKetThuc, SoLuong) 
                        VALUES ( $TenKM, $codeKhuyenMai, $soTienGiam, $ngayBatDau, $ngayKetThuc, $SoLuong)");
    }
    
    function getallkm(){
        return $this->db-> pdo_query("SELECT * FROM khuyenmai");
    }
    function admin_getKMById($MaKM){
        return $this->db-> pdo_query_one("SELECT * FROM  khuyenmai WHERE MaKM=$MaKM");
    }
    function updatekm($tenKhuyenMai, $giaKhuyenMai, $ngayBatDau, $ngayKetThuc, $SoLuong, $maKhuyenMai){
            $this->db-> pdo_execute("UPDATE khuyenmai SET TenKM = '$tenKhuyenMai', GiaKM = '$giaKhuyenMai', NgayBatDau = '$ngayBatDau', NgayKetThuc = '$ngayKetThuc', SoLuong = '$SoLuong' WHERE MaKM = '$maKhuyenMai'");
    }
    function is_codeKM($codeKhuyenMai){
        return $this->db-> pdo_query_value("SELECT COUNT(*) FROM khuyenmai WHERE CodeKM = '$codeKhuyenMai'");
    }
    function xoakm($MaKM){
            $this->db-> pdo_execute("DELETE FROM khuyenmai WHERE MaKM = $MaKM");
    }
    
    
    function admin_donhang(){
        return $this->db-> pdo_query("SELECT MaHD, TrangThai, SoDienThoai, HoVaTen FROM `hoadon` hd WHERE hd.TrangThai!='gio-hang' ORDER BY MaHD DESC;");
                        }
    function suaTT($TrangThai, $MaHD){
        return $this->db-> pdo_execute("UPDATE hoadon SET TrangThai = '$TrangThai' WHERE MaHD = $MaHD");
    }
    function get_MaHDbyid($MaHD){
        return $this->db-> pdo_query_one("SELECT MaHD FROM hoadon WHERE MaHD = $MaHD");
    }
    function count_km(){
        return $this->db-> pdo_query_value("SELECT COUNT(MaKM) FROM khuyenmai");
    }
}
    




















?>