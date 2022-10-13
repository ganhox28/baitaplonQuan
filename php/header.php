<?php 
	session_start();
	include 'script/myscript.php';
	$p = new quan;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài tập lớn</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="./"><img src="img/logo.png" alt=""></a>
        </div>
        <!-- <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">Sản phẩm: <span>150000</span></div>
        </div> -->

        <?php
            if(!empty($_SESSION['giohang'])) 
            {
                $products = $_SESSION['giohang'];
                $tong = 0;
                $stt_cart = 1;
                
                foreach ($products as $item) { // truy cập từng phần tử gg để biết them foreach as
                    $thanhtien = $item['gia'] * $item['soluong'];
                    $tong += $thanhtien;
                } // phần này giông php thôi gọi giá trị array
    
            }
            else
            {
                echo ('
                        <tr>
                            <td colspan="4">
                                <h4 align="center">Không có sản phẩm nào</h4>
                            </td>
                        </tr>');
            }
        ?>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Đăng ký</a>
                <a href="#"><i class="fa fa-user"></i> Đăng nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="./">Trang chủ</a></li>
                <li><a href="./shop-grid.php">Cửa hàng</a></li>
                <li><a href="./shoping-cart.php">Giỏ hàng</a></li>
                <li><a href="./contact.php">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> nguyenquocanhquan69@gmail.com</li>
                <li>Website phục vụ mục đích nghiên cứu</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> nguyenquocanhquan69@gmail.com</li>
                                <li>Website phục vụ mục đích nghiên cứu</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <!-- <div class="header__top__right__social">
                                <a href="./sign-up.php"><i class="fa fa-user"></i> Đăng ký</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="./sign-in.php"><i class="fa fa-user"></i> Đăng nhập</a>
                            </div> -->
                            <?php
                                if(!isset($_SESSION['tenhienthi']))
                                {
                                    echo('
                                        <div class="header__top__right__social">
                                            <a href="./sign-up.php"><i class="fa fa-user"></i> Đăng ký</a>
                                        </div>
                                        <div class="header__top__right__auth">
                                            <a href="./sign-in.php"><i class="fa fa-user"></i> Đăng nhập</a>
                                        </div>');
                                }
                                else{
                                    echo('<div class="header__top__right__social">
                                            <a href="user-detail.php"><i class="fa fa-user"></i> '.$_SESSION['tenhienthi'].'</a>
                                        </div>
                                        <div class="header__top__right__auth">
                                            <form method = "post">
                                                <input type="submit" name="ddd" value="Đăng Xuất">
                                            </form>
                                        </div>');
                                }
                                if(isset($_POST['ddd'])){
                                    unset($_SESSION['tenhienthi']);
                                    unset($_SESSION['id']);
                                    unset($_SESSION['user']);
                                    unset($_SESSION['pass']);
                                    echo ('<script language = "javascript">
                                                window.location = "./";
                                            </script>');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                    <ul>
                        <li><a href="./">Trang chủ</a></li>
                        <li><a href="./shop-grid.php">Cửa hàng</a></li>
                        <li><a href="./shoping-cart.php">Giỏ hàng</a></li>
                        <li><a href="./contact.php">Liên hệ</a></li>
                    </ul>
                    </nav>
                </div>
                
                <?php
                    if(!empty($_SESSION['giohang'])) {

                        $products = $_SESSION['giohang'];
                        $tong = 0;
                        $stt_cart = 1;
                        $dem = 0;
                        
                        foreach ($products as $item) { // truy cập từng phần tử gg để biết them foreach as
                            $thanhtien = $item['gia'] * $item['soluong'];
                            $tong += $thanhtien;
                            $dem++;
                            
                        } // phần này giông php thôi gọi giá trị array
                        echo('
                            <div class="col-lg-3">
                                <div class="header__cart">
                                    <ul>
                                        <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span>'.$dem.'</span></a></li>
                                    </ul>
                                    <div class="header__cart__price">Sản phẩm: <span>'.number_format($tong).' VNĐ</span></div>
                                </div>
                            </div>');
            
                    }
                    else {
                        echo '
                        <div class="col-lg-3">
                            <div class="header__cart">
                                <ul>
                                    <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                                </ul>
                                <div class="header__cart__price">Sản phẩm: <span>0 VNĐ</span></div>
                            </div>
                        </div>';
                    }
                ?>

            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    <div align="center" class="hero__search">
                        <div class="hero__search__form">
                            <form action="shop-grid.php" method="get">
                                <input type="text" placeholder="Bạn đang tìm sản phẩm gì?" style="float: left;" name="timkiem">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
