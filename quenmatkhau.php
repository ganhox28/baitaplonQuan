<?php
    require_once('php/header.php');
    if(isset($_SESSION['id']) || isset($_SESSION['user']) || isset($_SESSION['pass'])){
        echo('<script language = "javascript">
                alert("Bạn đã đăng nhập");
                window.location = "user-detail.php";
            </script>');
    }
?>

    <!-- Sign Up From Begin-->
    <section class="checkout" style="padding-top: 30px;">
        <div class="container">
            <div class="checkout__form">
                <h4 style="text-align: center;">QUÊN MẬT KHẨU</h4>
                <form action="#" method="post">    
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6 col-md-12" style="background: aliceblue;">
                            <div class="checkout__input">
                                <p>Tên Đăng Nhập<span>*</span></p>
                                <input type="text" id="username" name="username" placeholder="Tên đăng nhập...">
                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="email" id="email" name="email" placeholder="Email...">
                            </div>
                            <div style="text-align: center;">
                                <button type="submit" class="site-btn" name="tieptuc">Tiếp tục</button>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </form>
                <?php
                    if(isset($_POST['tieptuc']))
                    {
                        $username = $_REQUEST['username'];
                        $email = $_REQUEST['email'];
                        if ($username == '' || $email == ''){
                            echo '<script type="text/javascript">alert("Vui lòng nhập đầy đủ các trường");</script>';
                        }
                        else{
                            $kiemtra = $p->laymotthongtin("select customer_id from customers where tendangnhap='$username' and email='$email'");
                            if($kiemtra == null)
                            {
                            	echo '<script type="text/javascript">alert("Tên đăng nhập và email không trùng khớp hoặc không tồn tại");</script>';
                            }
                            else
                            {
                            	echo '<script type="text/javascript">alert("Đã thông báo đến quản lý xin vui lòng kiểm tra email để lấy mật khẩu");</script>';
                            	echo '<script type="text/javascript">window.location = "./";</script>';
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </section>
     <!-- Sign Up From End-->
<?php
    require_once('php/footer.php');
?>