<?php
  require_once('php/header-admin.php');
?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ĐƠN HÀNG</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Mã đơn hàng</th>
                        <th>Mã khách hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- <tr>
                        <td><a href="#">RA0449</a></td>
                        <td>Udin Wayang</td>
                        <td>Nasi Padang</td>
                        <td>Delivered</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i>
                          </a>
                          <a href="#" class="btn btn-sm btn-danger">
                            <i class='fas fa-trash-alt'></i>
                          </a>
                        </td>
                      </tr> -->
                      <?php
                        $p->quanlydonhang('select * from orders ORDER BY order_id ASC');
                        
                        if(isset($_REQUEST['order_id'])){
                          $order_id = $_REQUEST['order_id'];
                          $action = $_REQUEST['action'];
                          switch($action){
                            case "dxn":
                              {
                                $p->themxoasua("update orders
                                          set trangthai = 'Đã xác nhận'
                                          where order_id = '$order_id';");
                                break;
                              }
                            case "dxl":
                              {
                                $p->themxoasua("update orders
                                          set trangthai = 'Đang xử lý'
                                          where order_id = '$order_id';");
                                break;
                              }
                            case "giu":
                              {
                                $p->themxoasua("update orders
                                          set trangthai = 'Đang giữ hàng'
                                          where order_id = '$order_id';");
                                break;
                              }
                            case "xoa":
                              {
                                $p->themxoasua("delete from orders 
                                                where order_id = '$order_id';");
                                $p->themxoasua("delete from order_details 
                                                where order_id = '$order_id';");
                                echo('<script type="text/javascript">alert("Đã xóa đơn hàng: '.$order_id.'");</script>');
                                break;
                              }
                          }
                          
                          echo('<script type="text/javascript">window.location="quanlydonhang.php";</script>');
                        }
                      ?>

                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

</body>

</html>