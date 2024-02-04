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