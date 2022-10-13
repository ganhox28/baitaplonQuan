<?php
  require_once('php/header-admin.php');
?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quản Lý Khách Hàng</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Tên Đăng Nhập</th>
                        <th>Mật Khẩu</th>
                        <th>Tên Hiển Thị</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Hành Động</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- <tr>
                        <td><a href="#">RA0449</a></td>
                        <td>Udin Wayang</td>
                        <td>Nasi Padang</td>
                        <td>Delivered</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-danger">
                            <i class='fas fa-trash-alt'></i>
                          </a>
                        </td>
                      </tr> -->
                      <?php
                          $p->quanlyuser('select * from customers ORDER BY customer_id ASC');
                          if(isset($_REQUEST['customer_id']) and isset($_REQUEST['action'])){
                            $ctm_id = (int)$_REQUEST['customer_id'];
                            $action = $_REQUEST['action'];
                            if($action == 'xoa'){
                              unset($_SESSION['id']);
                              unset($_SESSION['user']);
                              unset($_SESSION['pass']);
                              unset($_SESSION['tenhienthi']);
                              $p->themxoasua("delete from customers 
                                              where customer_id = $ctm_id;");
                              $p->themxoasua("delete from orders 
                                              where customer_id = $ctm_id;");
                              $p->themxoasua("delete from order_details 
                                              where customer_id = $ctm_id;");
                              echo('<script language = "javascript">
                                      alert ("Xóa tài khoản thành công");
                                      window.location = "quanlyuser.php";
                                    </script>');
                            }
                          }
                          if(isset($_REQUEST['customer_id']) and isset($_REQUEST['action']))
                          {
                            $ctm_id = (int)$_REQUEST['customer_id'];
                            $action = $_REQUEST['action'];
                            if($action == 'reset')
                            {
                              $mkMatDinh = md5('123');
                              $p->themxoasua("update customers set matkhau = '$mkMatDinh' where customer_id = '$ctm_id' ");
                              echo('<script language = "javascript">
                                      alert ("Đã đặt lại mật khẩu mặc định");
                                      window.location = "quanlyuser.php";
                                    </script>');
                            }
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
  <script type="text/javascript">
    function confirmDelete() {
      if (confirm("Thao tác này cũng sẽ xóa tất cả đơn hàng của người dùng! Bạn muốn tiếp tục?") === true){
        return true;
      }else{
        return false;
      }
    }
  </script>

</body>

</html>