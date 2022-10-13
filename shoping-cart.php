<?php
    require('php/header.php');
    // session_destroy();
    // die();
    if(isset($_REQUEST['idsp']))
    {
        $idsp = $_REQUEST['idsp'];
        $query = mysqli_query($p->connect(), "select * from products where product_id = '$idsp'");
        $product = mysqli_fetch_assoc($query);
    }

    if(isset($_REQUEST['action']))
    {
        if(!empty($_GET['slsp']))
        { // kiểm tra xem có số lượng hay không
            $slsp = $_GET['slsp']; // nếu có gán sl vào 
        }
        else
        {
            $slsp = 1; // nếu ko mặc định bằng 1
        }

        $hanhdong = $_REQUEST['action'];
        switch ($hanhdong) {
            case 'add':
            {
                $item = array();

                if(isset($_SESSION['giohang'][$idsp]))
                {
                    $_SESSION['giohang'][$idsp]['soluong']+=$slsp;
                }
                else
                {
                    $item['id'] = $product['product_id'];
                    $item['tensp'] = $product['tensanpham'];
                    $item['gia'] = $product['gia'];
                    $item['hinhanh'] = $product['hinhanh'];
                    $item['soluong'] = $slsp;
                    $_SESSION['giohang'][$idsp] = $item;
                }
                break;
            }

            case 'delete':
            {
                if(isset($_SESSION['giohang'][$idsp]))
                {
                    unset($_SESSION['giohang'][$idsp]);
                }
                break;
            }

            case 'update':
            {                
                if(isset($_REQUEST['soluong']))
                {
                    $SlMoi = $_REQUEST['soluong'];

                    if(isset($_SESSION['giohang']))
                    {
                        $giohang = $_SESSION['giohang'];
                        foreach($giohang as $key => $giatri)
                        {
                            $giohang[$key]['soluong'] = $SlMoi[$key];
                        }

                        $_SESSION['giohang'] = $giohang;
                    }
                }
                break;
            }
        }
        echo (' <script language = "javascript">
                    window.location = "./shoping-cart.php";
                </script>');
    }
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner/gears.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <form action="" method="post" accept-charset="utf-8">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Trị</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-1.jpg" alt="">
                                        <h5>Vegetable’s Package</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $55.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $110.00
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="#"><span class="icon_close"></span></a>
                                    </td>
                                </tr> -->
                                <?php
                                    $tong = 0;
                                    if(!empty($_SESSION['giohang']))
                                    {
                                        $giohang = $_SESSION['giohang'];
                                        foreach ($giohang as $value)
                                        {
                                            $thanhtien = $value['gia'] * $value['soluong'];
                                            $tong += $thanhtien;

                                            echo('
                                                 <tr>
                                                     <td class="shoping__cart__item">
                                                         <img src="img/product/'.$value['hinhanh'].'" alt="" style="
                                                         width: 100px;
                                                         height: 100px;">
                                                         <h5>'.$value['tensp'].'</h5>
                                                     </td>
                                                     <td class="shoping__cart__price">
                                                         '.number_format($value['gia']).' VNĐ
                                                     </td>
                                                     <td class="shoping__cart__quantity">
                                                         <div class="quantity">
                                                             <div class="pro-qty">
                                                                 
                                                                 <input type="text" name="soluong['.$value['id'].']" value="'.$value['soluong'].'">
                                                                 
                                                             </div>
                                                         </div>
                                                     </td>
                                                     <td class="shoping__cart__total">
                                                         '.number_format($thanhtien).' VNĐ
                                                     </td>
                                                     <td class="shoping__cart__item__close">
                                                         <a href="./shoping-cart.php?idsp='.$value['id'].'&action='.'delete'.'" onclick="return confirm(&#39;Bạn có muốn xóa sản phẩm?&#39;)" ><span class="icon_close"></span></a>
                                                     </td>
                                                 </tr>
                                            ');
                                        }
                                    }
                                    else
                                    {
                                        echo '
                                        <tr>
                                            <td colspan="4">
                                                <h4 align="center">Không có sản phẩm nào</h4>
                                            </td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="shop-grid.php" class="primary-btn cart-btn">TIẾP TỤC MUA SẮM</a>
                        <button class="primary-btn cart-btn cart-btn-right" type="submit" name="action" value='update' style="border: unset;">CẬP NHẬT GIỎ HÀNG</button>
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Thanh Toán Giỏ Hàng:</h5>
                        <ul>
                            <li>Tổng Tiền: <span><?php echo number_format($tong) ?> VNĐ</span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn">TIẾN HÀNH THANH TOÁN</a>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
    <!-- Shoping Cart Section End -->

<?php
    require_once('php/footer.php');
?>