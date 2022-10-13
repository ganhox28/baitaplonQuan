<?php
  require_once("../php/script/myscript.php");
  $p = new quan;
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
  <title>Thực phẩm sạch - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login" style="margin-top: 4rem;">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ĐĂNG NHẬP</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" id="ad_user" name="ad_user" placeholder="Tên đăng nhập...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="ad_password" name="ad_password" placeholder="Mật khẩu...">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-block" name="btn" value="ĐĂNG NHẬP">
                    </div> 
                  </form>
                  <?php
                      if(isset($_POST['btn'])){
                        $ad_user = $_REQUEST['ad_user'];
                        $ad_password = $_REQUEST['ad_password'];
                        if($ad_user == '' || $ad_password == ''){
                          echo '<script type="text/javascript">alert("Vui lòng nhập đầy đủ các trường");</script>';
                        }
                        else{
                          $p->xacminhadmin($ad_user, $ad_password);
                        }
                      }
                  ?>
                  <hr>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>