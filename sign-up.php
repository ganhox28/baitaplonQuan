<?php
    require_once('php/header.php');
?>

    <!--Sign In Form Begin -->
    <section class="checkout" style="padding-top: 30px;">
        <div class="container">
            <div class="checkout__form">
                <h4 style="text-align: center;">ĐĂNG KÝ</h4>
                <form action="" method="post">    
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
                            <div class="checkout__input">
                                <p>Họ Và Tên<span>*</span></p>
                                <input type="text" id="hoten" name="hoten" placeholder="Họ và Tên...">
                            </div>
                            <div class="checkout__input">
                                <p>Địa Chỉ:<span>*</span></p>
                                <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ....">
                            </div>
                            <div class="checkout__input">
                                <p>Số Điện Thoại:<span>*</span></p>
                                <input type="text" id="sdt" name="sdt" placeholder="Số điện thoại....">
                            </div>
                            <div class="checkout__input">
                                <p>Email:<span>*</span></p>
                                <input type="email" id="email" name="email" placeholder="Email...">
                            </div>
                            <div style="text-align: center;">
                                <button type="submit" class="site-btn" id="nut" name="nut" value="signup">Đăng Ký</button>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </form>
                <?php
                    if(isset($_POST['nut'])){
                        $username = $_REQUEST['username'];
                        $password = $_REQUEST['password'];
                        $hoten = $_REQUEST['hoten'];
                        $diachi = $_REQUEST['diachi'];
                        $sdt = $_REQUEST['sdt'];
                        $email = $_REQUEST['email'];
                        
                        if($username == '' || $password == '' || $hoten == '' || $diachi == '' ||  $sdt == '' || $email == '')
                        {
                            echo('Vui lòng nhập đủ các trường');
                        }
                        else{
                            $hashed_password = md5($password);
                            //password_verify('1234', $hashed_password);
                            
                            $checkExistUser = mysqli_query($p->connect(), "select * from customers where tendangnhap like '$username' or email like '$email'");
                            if(mysqli_num_rows($checkExistUser) > 0)
                            {
                                echo '<script type="text/javascript">alert("Tài khoản đã tồn tại");</script>' ;
                            }
                            else{
                                if($p->themxoasua("insert into customers(tendangnhap, matkhau, tenhienthi, email, sodienthoai, diachi)
                                values('$username','$hashed_password', '$hoten', '$email','$sdt', '$diachi')") == true)
                                {
                                    echo('<script type="text/javascript">
                                        alert("Tạo tài khoản thành công");
                                        window.location = "sign-in.php";
                                    </script>');
                                }
                                else{
                                    echo('<script type="text/javascript">
                                        alert("Tạo tài khoản KHÔNG thành công");
                                        window.location = "sign-up.php";
                                    </script>');
                                }
                                
                            
                                
                            }
                               
                        }

                        
                    }
                ?>
            </div>
        </div>
    </section>
    <!--Sign In Form End -->
<?php
    require_once('php/footer.php');
?>