<?php
  require_once('php/header-admin.php');
?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Chi Tiết Đơn Hàng</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>STT</th>
                        <th>Mã Đơn Hàng</th>
                        <th>Mã Khách Hàng</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- <tr>
                        <td>RA0449</td>
                        <td>Udin Wayang</td>
                        <td>Nasi Padang</td>
                        <td>Delivered</td>
                      </tr> -->
                      <?php 
                        if(isset($_REQUEST['order_id'])){
                          $order_id = (int)$_REQUEST['order_id'];
                          $p->showchitietdonhang("select * from order_details where order_id = $order_id");
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