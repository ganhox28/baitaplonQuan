<?php
    require_once('php/header.php');

    if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || !isset($_SESSION['pass'])){
        echo('<script language = "javascript">
                alert("Bạn cần đăng nhập để thanh toán");
                window.location = "sign-in.php";
            </script>');
    }
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner/gears.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thanh Toán</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Chi Tiết Thanh Toán</h4>
                <form action="#" method="post">
                    <div class="row">
                        <!-- <div class="col-lg-7 col-md-5">
                            <div class="checkout__input">
                                <p>Họ Và Tên<span>*</span></p>
                                <input type="text" name="hoten">
                            </div>
                            <div class="checkout__input">
                                <p>Địa Chỉ:<span>*</span></p>
                                <input type="text" name="diachi">
                            </div>
                            <div class="checkout__input">
                                <p>Số Điện Thoại:<span>*</span></p>
                                <input type="text"name="sdt">
                            </div>
                            <div class="checkout__input">
                                <p>Email:<span>*</span></p>
                                <input type="text"name="email">
                            </div>
                        </div>  -->
                        <?php
                            $customer_id = $_SESSION['id'];
                            $p->dientudong("select * from customers where customer_id = $customer_id");
                        ?>
                        <div class="col-lg-5 col-md-7">
                            <div class="checkout__order">
                                <h4>Đơn Hàng Của Bạn</h4>
                                <!-- <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                                <ul>
                                    <li>Vegetable’s Package <span>$75.99</span></li>
                                    <li>Fresh Vegetable <span>$151.99</span></li>
                                    <li>Organic Bananas <span>$53.99</span></li>
                                </ul>
                                <div class="checkout__order__subtotal">Phụ Phí: <span>0 VNĐ</span></div>
                                <div class="checkout__order__total">Thành Tiền: <span>150000 VNĐ</span></div> -->
                                <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                                    <ul>
                                        <?php
                                            $tong = 0;
                                            if(!empty($_SESSION['giohang'])) {
                                                $products = $_SESSION['giohang'];
                                                $stt_cart = 1;
                                                
                                                foreach ($products as $item) { // truy cập từng phần tử gg để biết them foreach as
                                                    $thanhtien = $item['gia'] * $item['soluong'];
                                                    $tong += $thanhtien;
                                                    echo('
                                                        <li>'.$item['tensp'].'<span>'.number_format($thanhtien).'</span></li>  
                                                    ');
                                                } // phần này giông php thôi gọi giá trị array
                                            }
                                            else{
                                                echo('<li><h5 align = "center"><br/>Không có sản phẩm nào<h5><br/></li>');
                                            }
                                        ?>
                                    </ul>
                                <div class="checkout__order__total">Thành Tiền: <span><?php echo number_format($tong); ?> VNĐ</span></div>
                                <button type="submit" class="site-btn" style="font-family: serif;" name="btn">ĐẶT HÀNG</button>
                                
                                <?php
                                    if(isset($_POST['btn'])){
                                        $hoten = $_REQUEST['hoten'];
                                        $diachi = $_REQUEST['diachi'];
                                        $sdt = $_REQUEST['sdt'];
                                        $email = $_REQUEST['email'];
                                        if($hoten == "" || $diachi == "" || $sdt == "" || $email == ""){
                                            echo('<script language = "javascript">
                                                alert ("Vui lòng nhập đầy đủ các trường");
                                            </script>');
                                        }
                                        else{
                                            $p->themxoasua("insert into orders(customer_id, tenkhachhang, ngaydat, diachi, tongtien, trangthai) 
                                                            values ('$customer_id', '$hoten', CURDATE(), '$diachi', '$tong', 'Đang xử lý')");
                                            $result = mysqli_query($p->connect(), "select max(order_id) from orders where customer_id = '$customer_id' and tongtien = '$tong'");    
                                            $order_id = mysqli_fetch_array($result);
                                            $order_id = $order_id[0];
                                            //var_dump($order_id);
                                            foreach ($products as $item) {
                                                    $product_id1 = $item['id'];
                                                    $tensanpham1 = $item['tensp'];
                                                    $gia1 = $item['gia'];
                                                    $soluong1 = $item['soluong'];
                                                    $p->themxoasua("insert into order_details(order_id,customer_id ,product_id, tensanpham, soluong, dongia) 
                                                                    VALUES ('$order_id','$customer_id','$product_id1','$tensanpham1','$soluong1','$gia1')");
                                                    unset($_SESSION['giohang']);
                                                }
                                                echo ('<script language = "javascript">
                                                        alert ("Đặt hàng thành công. Cám ơn bạn đã mua hàng của chúng tôi");
                                                        window.location = "./";
                                                        </script>');
                                                
                                            
                                        }

                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

<?php
    require_once('php/footer.php');
?>