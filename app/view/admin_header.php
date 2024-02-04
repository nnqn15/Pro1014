<?php 
$count_km=$data["count_km"]
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/style.css">
    <script src="<?=BASE_URL?>public/assets/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>public/assets/js/validate.js"></script>
    <title><?= $titlepage?></title>
    <!-- linh cdn fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .active {
            z-index: 2;
            color: var(--white-color);
            background-color: var(--text3-color);
            border-color: var(--bs-list-group-active-border-color);
        }

        aside .sidebar {
            margin-top: -30px;
        }

        .chart {
            margin-top: 30px;
        }

        .col-md-6 {
            margin: 0 20px;
            width: 49%;

        }

        .row {
            display: flex;
        }

        .cart-header {
            font-size: 20px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .chart-left,.chart-right {
            border-radius: 5px;
            border: 4px dotted #e3cfcf;
            padding: 5px;
        }

        .chart-right {
            padding-left: 10px;
        }
        .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-weight: bold;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f8bfc8;
        }

        .table tbody td:first-child {
            color: #d4697a;
            font-weight: bold;
        }

        .table tbody td:nth-child(2) {
            text-align: center;
        }
        .table tbody tr:last-child td{
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="<?= BASE_URL ?>public/upload/logo.png">
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="<?= BASE_URL ?>admin" class="list_group-item <?= (strpos($view_name, 'dashboard')) ? 'active' : '' ?>">
                    <span class="material-icons-sharp">
                    <i class="fa-brands fa-microsoft"></i>
                    </span>
                    <h3>Tổng quan</h3>
                </a>
                <a href="<?= BASE_URL ?>admin/user" class="list_group-item <?= (strpos($view_name, 'user')) ? 'active' : '' ?>">
                    <span class="material-icons-sharp">
                    <i class="fa-regular fa-user"></i>
                    </span>
                    <h3>Tài khoản</h3>
                </a>
                <a href="<?= BASE_URL ?>admin/category" class="list_group-item <?= (strpos($view_name, 'category')) ? 'active' : '' ?>">
                    <span class="material-icons-sharp">
                    <i class="fa-solid fa-list"></i>
                    </span>
                    <h3>Danh mục</h3>
                </a>
                <a href="<?= BASE_URL ?>admin/banner" class="list_group-item <?= (strpos($view_name, 'banner')) ? 'active' : '' ?>">
                    <span class="material-icons-sharp"><i class="fa-solid fa-image"></i></span>
                    <h3>Banner</h3>
                </a>
                <a href="<?= BASE_URL ?>admin/product" class="list_group-item <?= (strpos($view_name, 'product')) ? 'active' : '' ?>">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Sản phẩm</h3>
                </a>
                <a href="<?= BASE_URL ?>admin/binhluan" class="list_group-item <?= (strpos($view_name, 'binhluan')) ? 'active' : '' ?>">
                    <span class="material-icons-sharp">
                    <i class="fa-regular fa-comment-dots"></i>
                    </span>
                    <h3>Bình luận</h3>
                </a>
                <a href="<?= BASE_URL ?>admin/donhang" class="list_group-item <?= (strpos($view_name, 'donhang')) ? 'active' : '' ?>">
                    <span class="material-icons-sharp">
                    <i class="fa-solid fa-cart-shopping"></i>
                    </span>
                    <h3>Đơn hàng</h3>
                </a>
                <a href="<?= BASE_URL ?>admin/khuyenmai" class="list_group-item <?= (strpos($view_name, 'khuyenmai')) ? 'active' : '' ?>">
                    <span class="material-icons-sharp">
                    <i class="fa-solid fa-ticket"></i>
                    </span>
                    <h3>Khuyến mãi</h3>
                    <span class="message-count">
                        <?=$count_km;?>
                    </span>
                </a>

                <a href="<?=BASE_URL?>user/logout">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>