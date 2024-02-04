<?php
namespace app\model;
use app\model\databaseModel;
class wishlistModel{
    private $db;
    function __construct()
    {
        $this->db=new databaseModel;
    }
    function check_wishByProductAndUser($MaTK,$MaSP){
        return $this->db-> pdo_query_one("SELECT MaSP FROM yeuthich WHERE MaTK=$MaTK AND MaSP=$MaSP");
    }
    // Thêm người dùng vào danh sách yêu thích
    function his_wishlist($MaTK){
        $this->db-> pdo_execute("INSERT INTO yeuthich(`MaTK`) VALUES($MaTK)");
    }
    // Thêm sản phẩm vào danh sách yêu thích
    function add_to_wishlist($MaTK,$MaSP){
        $this->db-> pdo_execute("INSERT INTO yeuthich(`MaTK`,`MaSP`) VALUES($MaTK,$MaSP)");
    }
    // Hiển thị sản phẩm ở trang yêu thích
    function show_wishlist($MaTK){
        return $this->db-> pdo_query("SELECT * FROM yeuthich yt INNER JOIN sanpham s ON yt.MaSP = s.MaSP WHERE yt.MaTK = $MaTK ");
    }
    // Xóa sản phẩm trang yêu thích
    function delete_wishlist_by_pro($MaSP) {
        return $this->db-> pdo_execute("DELETE FROM yeuthich WHERE MaSP = $MaSP");
    }
}
    
?>