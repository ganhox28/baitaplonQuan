<?php
    require_once('php/header.php');
    if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || !isset($_SESSION['pass'])){
        echo('<script language = "javascript">
                alert("Bạn chưa đăng nhập");
                window.location = "sign-in.php";
            </script>');
    }
    else
    {
        if(isset($_SESSION['id']))
        {
            $user_id = $_SESSION['id'];
        }
        else
        {
            echo('<script language = "javascript">
                window.location = "index.php";
            </script>');
        }
    }
?>

    <!-- Sign Up From Begin-->
    <section class="checkout" style="padding-top: 30px;">
        <div class="container">
            <div class="checkout__form">
                <h4 style="text-align: center;">Đổi mật khẩu</h4>
                <form action="#" method="post">    
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6 col-md-12" style="background: aliceblue;">
                            <div class="checkout__input">
                                <p>Nhập lại mật khẩu<span>*</span></p>
                                <input type="password" id="matkhautruoc" name="matkhautruoc" placeholder="Mật khẩu...">
                            </div>
                            <div class="checkout__input">
                                <p>Mật khẩu mới<span>*</span></p>
                                <input type="password" id="matkhausau" name="matkhausau" placeholder="Mật khẩu mới...">
                            </div>
                            <div class="checkout__input">
                                <p>Nhập lại mật khẩu<span>*</span></p>
                                <input type="password" id="nhaplaimk" name="nhaplaimk" placeholder="Nhập lại mật khẩu mới...">
                            </div>
                            <div style="text-align: center;">
                                <button type="submit" class="site-btn" name="doimk">Đổi mật khẩu</button>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </form>
                <?php
                    if(isset($_POST['doimk']))
                    {
                        $matkhautruoc = $_REQUEST['matkhautruoc'];
                        $matkhausau = $_REQUEST['matkhausau'];
                        $nhaplaimk = $_REQUEST['nhaplaimk'];
                        if ($matkhautruoc == null || $matkhausau == null || $nhaplaimk == null){
                            echo '<script type="text/javascript">alert("Vui lòng nhập đầy đủ các trường");</script>';
                        }
                        else{
                            $kiemTraMkTruoc = $p->laymotthongtin("select matkhau from customers where customer_id = '$user_id'");
                            if($kiemTraMkTruoc == md5($matkhautruoc))
                            {
                                if($matkhausau == $matkhautruoc || $nhaplaimk == $matkhautruoc)
                                {
                                    echo '<script type="text/javascript">alert("Mật khẩu mới không được trùng với mật khẩu cũ");</script>';
                                }
                                else
                                {
                                    if($nhaplaimk != $matkhausau)
                                    {
                                        echo '<script type="text/javascript">alert("Mật khẩu mới không trùng khớp");</script>';
                                    }
                                    else
                                    {
                                        $matkhausaubam = md5($matkhausau);
                                        $p->themxoasua("update customers set matkhau = '$matkhausaubam' where customer_id = '$user_id'");
                                        echo '<script type="text/javascript">alert("Đổi mật khẩu thành công");</script>';
                                        echo '<script type="text/javascript">window.location="user-detail.php";</script>';
                                    }
                                }
                            }
                            else
                            {
                                echo '<script type="text/javascript">alert("Mật khẩu cũ không đúng");</script>';
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