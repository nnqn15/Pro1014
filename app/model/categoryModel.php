<?php 
namespace app\model;
use app\model\databaseModel;
class categoryModel{
    private $db;
    function __construct()
    {
        $this->db=new databaseModel;
    }
    function category_getALLDM(){
        return $this->db-> pdo_query("SELECT * FROM danhmuc ");
    }
    function category_getALLDMMUC(){
        return $this->db-> pdo_query("SELECT * FROM danhmuc");
    }
    function category_getbyDM($MaDM) {
        return $this->db-> pdo_query("SELECT * FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM = dm.MaDM WHERE dm.MaDM = $MaDM ");
    }
    function get_id($id){
        return $this->db-> pdo_query_one("SELECT * FROM danhmuc WHERE MaDM = $id");
    }
    function get_categorybyid($id, $start, $limit) {
        return $this->db-> pdo_query("SELECT * FROM sanpham WHERE MaDM = $id ORDER BY sanpham.MaSP DESC LIMIT $start, $limit");
    }
    function count_productsbydm($MaDM){
        return $this->db-> pdo_query_value("SELECT COUNT(MaSP) FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM = dm.MaDM WHERE dm.MaDM = $MaDM");
    }
    function get_tenDM($MaDM){
        return $this->db-> pdo_query_one("SELECT TenDM, MaDMC FROM danhmuc WHERE MaDM = $MaDM");
    }
    function get_dmAnddmc($MaDM){
        return $this->db-> pdo_query("SELECT * FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM = dm.MaDM WHERE dm.MaDM = $MaDM || dm.MaDMC = $MaDM");
    }
    function count_productsbydmanddmc($MaDM){
        return $this->db-> pdo_query_value("SELECT COUNT(MaSP) FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM = dm.MaDM WHERE dm.MaDM = $MaDM || dm.MaDMC = $MaDM");
    }
    function danhmuc_TkSanPham(){
        return $this->db-> pdo_query("SELECT SUM(SoLuongSP) as SoLuongSP,TenSP FROM sanpham sp INNER JOIN chitiethoadon ct ON sp.MaSP=ct.MaSP INNER JOIN hoadon hd ON ct.MaHD=hd.MaHD WHERE trangThai='hoan-tat' GROUP BY TenSP ORDER BY SoLuongSP DESC LIMIT 5;");
    }
    function product_danhmucanddmc($MaDM, $page,$limit){
        $batdau= ($page-1)*$limit;
        // 1 trang lay 8

        // trang 1 bat dau tu 0 1 2 3 4 5 6 7 

        // trang 2 bat dau tu 8

        // trang 3 bat dau tu 16

        // trang n bat dau tu (n-1)*8
        
        return $this->db-> pdo_query("SELECT * FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM = dm.MaDM WHERE dm.MaDM = $MaDM || dm.MaDMC = $MaDM LIMIT $batdau,$limit");
    }
    function product_danhmuc($MaDM, $page,$limit){
        $batdau= ($page-1)*$limit;
        // 1 trang lay 8

        // trang 1 bat dau tu 0 1 2 3 4 5 6 7 

        // trang 2 bat dau tu 8

        // trang 3 bat dau tu 16

        // trang n bat dau tu (n-1)*8
        
        return $this->db-> pdo_query("SELECT * FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM = dm.MaDM WHERE dm.MaDM = $MaDM LIMIT $batdau,$limit");
    }
}
    
?>
