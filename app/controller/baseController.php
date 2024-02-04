<?php 
namespace app\controller;
class baseController{
    protected $titlepage="";
    protected $data=[];
    function renderView($viewpage,$titlepage,$data){
        $viewfile="app/view/v_".$viewpage.".php";
        if(is_file($viewfile)){
            include_once $viewfile;
        }else{
            echo 'File không tồn tại!';
        }
    }
}
?>