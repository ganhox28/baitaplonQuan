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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner/gears.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thông tin tài khoản</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center table_content">
                    <form action="" method="post">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th colspan="2"><h2>Thông tin</h2></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tên khách hàng: </td>
                                    <td>
                                        <input type="text" name="tenkh" value="<?php echo $p->laymotthongtin("select tenhienthi from customers where customer_id = '$user_id'"); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td>
                                        <input type="email" name="email" value="<?php echo $p->laymotthongtin("select email from customers where customer_id = '$user_id'"); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại: </td>
                                    <td><input type="number" name="sdt" value="<?php echo $p->laymotthongtin("select sodienthoai from customers where customer_id = '$user_id'"); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ: </td>
                                    <td>
                                        <textarea name="diachi" rows="3" cols="22"><?php echo $p->laymotthongtin("select diachi from customers where customer_id = '$user_id'"); ?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br />
                        <button type="submit" id="nut" name="nut" value="editpass">Đổi mật khẩu</button>
                        <button type="submit" id="nut" name="nut" value="edittt">Cập nhập thông tin</button>
                    </form>
                    <?php
                        if(isset($_POST['nut']))
                        {
                            switch ($_POST['nut']) {
                                case 'edittt':
                                {
                                    $tenkh = $_REQUEST['tenkh'];
                                    $email = $_REQUEST['email'];
                                    $sdt = $_REQUEST['sdt'];
                                    $diachi = $_REQUEST['diachi'];
                                    if($tenkh == null || $email == null || $sdt == null || $diachi == null)
                                    {
                                        echo '<p style="color: red;"><br>Vui lòng không để trống các trường!</p>';
                                    }
                                    else
                                    {
                                        $p->themxoasua("update customers set tenhienthi = '$tenkh', email = '$email', sodienthoai = '$sdt', diachi = '$diachi' where customer_id = 1;");
                                        
                                        echo(
                                            '<script language = "javascript">
                                                 alert("Cập nhật thành công");
                                            </script>'
                                        );

                                        echo(
                                            '<script language = "javascript">
                                                 window.location = "user-detail.php";
                                            </script>'
                                        );
                                    }
                                    break;
                                }
                                case 'editpass':
                                {
                                    echo(
                                            '<script language = "javascript">
                                                 window.location = "change-pass.php";
                                            </script>'
                                        );
                                    break;
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

<?php
    require_once('php/footer.php');
?>