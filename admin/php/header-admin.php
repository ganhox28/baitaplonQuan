<?php
    session_start();
    require_once('php/header-admin.php');
    require_once("../php/script/myscript.php");
    $p = new quan;
      
    if(!isset($_SESSION['ad_id']) || !isset($_SESSION['ad_user']) || !isset($_SESSION['ad_pass']) || !isset($_SESSION['ad_phanquyen'])){
       echo('<script language = "javascript">
                window.location = "login.php";
            </script>');
    }else{
        $p->confirmlogin($_SESSION['ad_id'], $_SESSION['ad_user'], $_SESSION['ad_pass'], $_SESSION['ad_phanquyen']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Bài tập lớn|Admin</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">Bài tập lớn <br/> ADMIN</div>
      </a>
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Tính Năng
      </div>
      <li class="nav-item">
        <a class="nav-link" href="quanlydonhang.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Quản Lý Đơn Hàng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="quanlyuser.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Quản Lý Khách Hàng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="quanlysanpham.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Quản Lý Sản Phẩm</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="quanlydanhmuc.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Quản Lý Danh Mục</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="themsanpham.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Thêm Sản Phẩm</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="themdanhmuc.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Thêm Danh Mục</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../">
          <i class="fas fa-fw fa-table"></i>
          <span>Trở lại cửa hàng</span>
        </a>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                  <span class="ml-2 d-none d-lg-inline text-white small">
                    <?php
                      echo($_SESSION['ad_tenhienthi']);
                    ?>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="../">
                    cửa hàng
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                    <!-- <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng Xuất -->
                      <form action="" method="post">
                        <input type="submit" name="dangxuat" class="form-control" value="Đăng Xuất">
                      </form>
                      <?php
                        if(isset($_POST['dangxuat'])){
                          unset($_SESSION['ad_id']);
                          unset($_SESSION['ad_user']);
                          unset($_SESSION['ad_pass']);
                          unset($_SESSION['ad_tenhienthi']);
                          unset($_SESSION['ad_phanquyen']);
                          echo ('<script language = "javascript">
                                  window.location = "login.php";
                                </script>');
                        }
                      ?>
                  </a>
                </div>
              </li>
          </ul>
        </nav>
        
        <!-- Topbar -->