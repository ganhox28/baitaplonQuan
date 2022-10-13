<?php
require_once 'php/header-admin.php'; ?>
		<!-- Container Fluid-->
		<div class="container-fluid" id="container-wrapper">
		  <div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Quản Lý Danh Mục</h1>
		  </div>
		  <div class="row">
			<div class="col-lg-12 mb-4">
			  <!-- Simple Tables -->
			  <div class="card">
				<div class="table-responsive">
				  <table class="table align-items-center table-flush">
					<thead class="thead-light">
					  <tr>
						<th>Stt</th>
						<th>Tên sản phẩm</th>
						<th>Hành Động</th>
					  </tr>
					</thead>
					<tbody>
					  <?php
						$p->quanlydanhmuc('select * from categories order by category_id desc');
						if(isset($_REQUEST['danhmuc_id']) and isset($_REQUEST['action'])){
							$catId = (int)$_REQUEST['danhmuc_id'];
							$action = $_REQUEST['action'];
							if($action == 'xoa')
							{
							  $p->themxoasua("delete from categories 
											  where category_id = '$catId'");
							  echo('<script language = "javascript">
									  alert ("Xóa danh mục thành công");
									  window.location = "quanlydanhmuc.php";
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