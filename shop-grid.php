<?php
    require_once('php/header.php');
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner/gears.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Gamming Gear</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4 style="border-bottom: 1px solid #ccc;  padding: 9px;">DANH MỤC:</h4>
                            <ul>
                                <?php
                                    if(isset($_REQUEST['category_id']))
                                    {
                                        $IdDm = $_REQUEST['category_id'];
                                    }
                                    else
                                    {
                                        $IdDm = false;
                                    }
                                    $p->showdanhmucsanpham('select * from categories', $IdDm);
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <h3 align="center" style="margin-bottom: 10px; font-weight: bold;">Cửa hàng</h3>
                    <div class="filter__item">
                    </div>
                    <div class="row">

                        <?php
                            $conn = $p->connect();
                            if(!isset($_REQUEST['category_id']) && !isset($_REQUEST['timkiem'])){
                                $kq = mysqli_query($conn,'select product_id from products');
                            }
                            else{
                                if(isset($_REQUEST['category_id'])){
                                    $category_id = $_REQUEST['category_id'];
                                    $kq = mysqli_query($conn,"select product_id from products where danhmuc = '$category_id'");
                                }
                                if(isset($_REQUEST['timkiem'])){
                                    $timkiem = $_REQUEST['timkiem'];
                                    $kq = mysqli_query($conn,"select product_id from products where tensanpham like '%$timkiem%'");
                                }
                            }
                            
                            $tongSp = mysqli_num_rows($kq);
                            if($tongSp <= 0)
                            {
                                $tongSp = 1;
                            }
                            $spTrongMotTrang = 6;

                            if(isset($_REQUEST['trang']))
                            {
                                $trang = $_REQUEST['trang'];
                            }
                            else
                            {
                                $trang = 1;
                            }
                            $tongTrang = ceil($tongSp / $spTrongMotTrang);
                            $from = ($trang - 1) * $spTrongMotTrang;

                            if(!isset($_REQUEST['category_id']) && !isset($_REQUEST['timkiem'])){
                                $p->selectProduct("select * from products order by product_id desc limit $from, $spTrongMotTrang ");
                                if($trang > $tongTrang || $trang <= 0)
                                {
                                    echo ('<script language = "javascript">
                                            window.location = "./shop-grid.php";
                                            </script>');
                                }
                            }
                            else{
                                if(isset($_REQUEST['category_id'])){
                                    $category_id = $_REQUEST['category_id'];
                                    $p->selectProduct("select * from products where danhmuc = '$category_id' order by product_id desc limit $from, $spTrongMotTrang");

                                    if($trang > $tongTrang || $trang <= 0)
                                    {
                                        echo ('<script language = "javascript">
                                                window.location = "./shop-grid.php?category_id='.$category_id.'";
                                                </script>');
                                    }
                                }
                                if(isset($_REQUEST['timkiem'])){
                                    $timkiem = $_REQUEST['timkiem'];
                                    $p->selectProduct("select * from products where tensanpham like '%$timkiem%' order by product_id desc limit $from, $spTrongMotTrang");
                                    if($trang > $tongTrang || $trang <= 0)
                                    {
                                        echo ('<script language = "javascript">
                                                window.location = "./shop-grid.php?timkiem='.$category_id.'";
                                                </script>');
                                    }
                                }
                            }
                        ?>
                    </div>
                    <div class="pagination">
                        
                        <?php
                            $luiSoTrang = $trang - 1;
                            $tienSoTrang = $trang + 1;

                            if(!isset($_REQUEST['category_id']) && !isset($_REQUEST['timkiem'])){
                                echo ('<a href="?trang='.$luiSoTrang.'">&laquo;</a>');
                                for($i = 1; $i <= $tongTrang; $i++)
                                {
                                    if($i == $trang)
                                    {
                                        echo('<a class="active" href="?trang='.$i.'">'.$i.'</a>');
                                    }
                                    else
                                    {
                                        echo('<a href="?trang='.$i.'">'.$i.'</a>');
                                    }
                                }
                                echo ('<a href="?trang='.$tienSoTrang.'">&raquo;</a>');
                            }

                            else
                            {
                                if(isset($_REQUEST['category_id'])){
                                    echo ('<a href="?category_id='.$category_id.'&trang='.$luiSoTrang.'">&laquo;</a>');
                                    for($i = 1; $i <= $tongTrang; $i++)
                                    {
                                        if($i == $trang)
                                        {
                                            echo('<a class="active" href="?category_id='.$category_id.'&trang='.$i.'">'.$i.'</a>');
                                        }
                                        else
                                        {
                                            echo('<a href="?category_id='.$category_id.'&trang='.$i.'">'.$i.'</a>');
                                        }
                                        
                                    }
                                    echo ('<a href="?category_id='.$category_id.'&trang='.$tienSoTrang.'">&raquo;</a>');
                                }
                                if(isset($_REQUEST['timkiem'])){
                                    echo ('<a href="?timkiem='.$timkiem.'&"trang='.$luiSoTrang.'">&laquo;</a>');
                                    for($i = 1; $i <= $tongTrang; $i++)
                                    {
                                        if($i == $trang)
                                        {
                                            echo('<a class="active" href="?timkiem='.$timkiem.'&trang='.$i.'">'.$i.'</a>');
                                        }
                                        else
                                        {
                                            echo('<a href="?timkiem='.$timkiem.'&trang='.$i.'">'.$i.'</a>');
                                        }
                                        
                                    }
                                    echo ('<a href="?timkiem='.$timkiem.'&'.$tienSoTrang.'">&raquo;</a>');
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

<?php
    require_once('php/footer.php');
?>