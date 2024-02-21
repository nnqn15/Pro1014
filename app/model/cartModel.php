<?php
namespace app\model;
use app\model\databaseModel;
class cartModel{
    private $db;
    function __construct()
    {
        $this->db=new databaseModel;
    }
    function has_cart($MaTK)
    {
        return $this->db-> pdo_query_one("SELECT * from hoadon where MaTK = $MaTK AND TrangThai='gio-hang'");
    }
    
    function has_products_by_quantity($MaHD,$MaSP)
    {
        return $this->db-> pdo_query_one("SELECT * from chitiethoadon where MaHD = $MaHD AND MaSP = $MaSP");
    }
    
    function upate_quantity_by_product($SoLuongSP, $MaHD) {
        return $this->db-> pdo_execute("UPDATE chitiethoadon SET SoLuongSP = SoLuongSP + $SoLuongSP WHERE MaHD = $MaHD");
    }
    
    function cart_showbyphone($SoDienThoai){
        return $this->db-> pdo_query_value("SELECT MaHD FROM hoadon WHERE SoDienThoai=$SoDienThoai ORDER BY MaHD DESC LIMIT 1");
    }
    // thêm người dùng vào giỏ hàng
    function his_cart($MaTK)
    {
        $date=date('Y-m-d H:i:s');
        $this->db-> pdo_execute(
            "INSERT INTO hoadon(`NgayLap`,`TrangThai`, `MaTK`) VALUES('$date','gio-hang',$MaTK)");
    }
    function his_cart_nologin($TongTien,$GiaKM,$HoVaTen,$DiaChi,$SoDienThoai,$Email,$GhiChu)
    {
        $date=date('Y-m-d H:i:s');
        $this->db-> pdo_execute(
            "INSERT INTO hoadon(`TongTien`,`GiaKM`,`HoVaTen`,`DiaChi`,`SoDienThoai`,`Email`,`GhiChu`,`NgayLap`,`TrangThai`) VALUES($TongTien,$GiaKM,'$HoVaTen','$DiaChi',$SoDienThoai,'$Email','$GhiChu','$date','chuan-bi')");
    }
    // thêm sản phẩm vào giỏ hàng
    
    function add_to_cart($MaHD, $SoLuongSP, $MaSP)
    {
        $this->db-> pdo_execute("INSERT INTO chitiethoadon(`MaHD`,`SoLuongSP`,`MaSP`) VALUES($MaHD,$SoLuongSP,$MaSP)");
    }
    
    // Cập nhật số lượng giỏ hàng
     // Cập nhật số lượng sản phẩm trong giỏ hàng
     function update_quantity_by_cart($SoLuongSP, $MaSP) {
        return $this->db-> pdo_execute("UPDATE chitiethoadon SET SoLuongSP = $SoLuongSP WHERE MaSP=$MaSP");
    }
    function show_cart_for_user($MaTK)
    {
        return $this->db-> pdo_query("SELECT *, sp.Gia * ct.SoLuongSP as total
        FROM hoadon hd 
        INNER JOIN chitiethoadon ct ON 
        hd.MaHD = ct.MaHD
        INNER JOIN sanpham sp ON 
        sp.MaSP = ct.MaSP
        WHERE hd.MaTK =$MaTK AND hd.TrangThai = 'gio-hang'");
    }
    
    // tìm mã giảm giá
    function has_coupon_code($coupon_code) {
        return $this->db-> pdo_query_one("SELECT * FROM khuyenmai WHERE CodeKM = '$coupon_code'");
    }
    
    function update_quantity_coupon($couponcode) {
        return $this->db-> pdo_execute("UPDATE khuyenmai SET SoLuong = SoLuong - '1' WHERE CodeKM = '$couponcode'");
    }
    
    // đếm số lượng sản phẩm
    function count_cart($MaTK) {
        return $this->db-> pdo_query_value("SELECT COUNT(hd.MaHD) FROM chitiethoadon cthd LEFT JOIN hoadon hd ON hd.MaHD= cthd.MaHD WHERE MaTK = $MaTK AND hd.TrangThai = 'gio-hang'");
    }
    
    // xóa sản phẩm 
    function delete_cart_by_pro($MaSP) {
        return $this->db-> pdo_execute("DELETE FROM chitiethoadon WHERE MaSP = $MaSP");
    }
    
    // Số lượng sản phẩm tối đa
    function quantity_cart_max($MaSP) {
        return $this->db-> pdo_query_one("SELECT SoLuong,MaSP FROM sanpham WHERE MaSP = $MaSP");
    }
    function update_inf_cart($MaHD,$HoVaTen,$DiaChi,$SoDienThoai,$Email){
        $this->db-> pdo_execute("UPDATE hoadon SET HoVaTen='$HoVaTen' ,DiaChi = '$DiaChi',SoDienThoai= '$SoDienThoai',Email='$Email' WHERE MaHD = $MaHD");
    }
    // cập nhật trạng thái giỏ hàng
    function upate_status_cart($MaHD) {
        $this->db-> pdo_execute("UPDATE hoadon SET TrangThai = 'chuan-bi' WHERE MaHD = $MaHD");
    }
    
    // hiển thị lịch sử giỏ hàng
    function history_cart($MaTK) {
        return $this->db-> pdo_query("SELECT * FROM `hoadon` WHERE TrangThai != 'gio-hang' AND MaTK = $MaTK ORDER BY MaHD DESC");
    }
    function doanhthu_countAll(){
        return $this->db-> pdo_query("SELECT SUM(TongTien) AS TongTatCaHoaDon FROM hoadon WHERE TrangThai = 'hoan-tat'");
    }
    function history_stat(){
    
        return $this->db-> pdo_query("SELECT YEAR(hd.NgayLap) as Nam,MONTH(hd.NgayLap) as Thang,COUNT(hd.MaHD) AS SoLuotMua,SUM(ct.SoLuongSP) as SoLuongSP,SUM(TongTien) AS DoanhThu FROM hoadon hd INNER join chitiethoadon ct ON hd.MaHD = ct.MaHD GROUP BY YEAR(hd.NgayLap),MONTH(hd.NgayLap)");
    }
    function hoadon_countAll(){
        return $this->db-> pdo_query_value("SELECT COUNT(*) FROM hoadon");
    }
    
    // Cập nhật tổng tiền cho người dùng khi click vào tiến hành thanh toán
    function update_total_cart($total, $MaHD) {
        return $this->db-> pdo_execute("UPDATE hoadon SET TongTien = $total WHERE MaHD = $MaHD");
    }
    
    function get_total($MaHD) {
        return $this->db-> pdo_query_one("SELECT TongTien, MaHD FROM `hoadon` WHERE MaHD = $MaHD");
    }
    
    function update_quantity_by_checkout($SoLuongSP,$MaSP) {
        return $this->db-> pdo_execute("UPDATE sanpham 
        SET SoLuong = SoLuong - $SoLuongSP
        WHERE MaSP = $MaSP");
    }
    function get_allKM(){
        return $this->db->pdo_query("SELECT * FROM khuyenmai");
    }
}



?>