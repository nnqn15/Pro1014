<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once 'vendor/autoload.php';
require_once 'app/config/route.php';
require_once 'app/slug/slug.php';
use app\routing\route;
// echo "<pre>".print_r(Route::showroutes())."</pre>";
$uri = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
// echo $uri;
Route::dispatch($uri);
// $homepage=new homeController;
// $productpage=new productController;
// $userpage=new userController;
// $ajaxpage=new ajaxController;
// if(isset($_GET['mod'])){
//     switch ($_GET['mod']){
//         case 'page':
//             $homepage->index();
//             break;
//         case 'shop':
//             $productpage->index();
//             break;
//         case 'contact':
//             $homepage->contact();
//             break;
//         case 'aboutUs':
//             $homepage->aboutUs();
//             break;
//         case 'product-detail':
//             $productpage->detail();
//             break;
//         case 'product-addtocart':
//             $productpage->addtocart();
//             break;
//         case 'product-comment':
//             $productpage->comment();
//             break;
//         case 'user':
//             $userpage->index();
//             break;
//         case 'user-login':
//             $userpage->login();
//             break;
//         case 'user-register':
//             $userpage->register();
//             break;
//         case 'user-update':
//             $userpage->update();
//             break;
//         case 'user-update-pass':
//             $userpage->update_pass();
//             break;
//         case 'user-logout':
//             $userpage->logout();
//             break;
//         case 'cart':
//             $productpage->cart();
//             break;
//         case 'delete_cart':
//             $productpage->deletecart();
//             break;
//         case 'checkout':
//             $productpage->checkout();
//             break;
//         case 'update_status_cart':
//             $productpage->update_status_cart();
//             break;
//         case 'hoadon':
//             $productpage->hoadon();
//             break;
//         case 'discount':
//             $homepage->discount();
//             break;
//         case 'wishlist':
//             $homepage->wishlist();
//             break;
//         case 'delete_wishlist':
//             $homepage->delete_wishlist();
//             break;
//         case 'ajax_search':
//             $ajaxpage->ajax_search();
//             break;
//         case 'ajax_cart_quantity':
//             $ajaxpage->ajax_cart_quantity();
//             break;
//         case 'ajax_cart_coupon':
//             $ajaxpage->ajax_cart_coupon();
//             break;
//         case 'addwish':
//             $ajaxpage->addwish();
//             break;
//         // case 'admin':
//         //     $ajaxpage->ajax_search();
//         //     break;
//         // case 'admin':
//         //     $ctrl_name = 'admin';
//         //     break;
//         case '404':
//             $homepage->error404();
//             break;
//         default:
//             $homepage->error404();
//             break;
//     }
// }else{
//     header('location: ' . BASE_URL . 'page');
// }