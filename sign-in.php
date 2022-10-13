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
                <h4 style="text-align: center;">ĐĂNG NHẬP</h4>
                <form action="#" method="post">    
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6 col-md-12" style="background: aliceblue;">
                            <div class="checkout__input">
                                <p>Tên Đăng Nhập<span>*</span></p>
                                <input type="text" id="username" name="username" placeholder="Tên đăng nhập...">
                            </div>
                            <div class="checkout__input">
                                <p>Mật Khẩu<span>*</span></p>
                                <input type="password" id="password" name="password" placeholder="Mật khẩu...">
                            </div>
                            <div style="text-align: center;">
                                <button type="submit" class="site-btn" name="signin">Đăng Nhập</button>
                                <button type="submit" class="site-btn" name="quenmk">Quên mật khẩu</button>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </form>
                <?php
                    if(isset($_POST['signin']))
                    {
                        $username = $_REQUEST['username'];
                        $password = $_REQUEST['password'];
                        if ($username == '' || $password == ''){
                            echo '<script type="text/javascript">alert("Vui lòng nhập đầy đủ các trường");</script>';
                        }
                        else{
                            $p->xacminhuser($username, $password);
                        }
                    }
                    if(isset($_POST['quenmk']))
                    {
                        echo ('
                                <script type="text/javascript">
                                    window.location = "quenmatkhau.php"
                                </script>
                        ');
                    }
                ?>
            </div>
        </div>
    </section>
     <!-- Sign Up From End-->
<?php
    require_once('php/footer.php');
?>