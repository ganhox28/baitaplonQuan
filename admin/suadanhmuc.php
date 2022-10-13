<?php
  require_once('php/header-admin.php');
  if(isset($_REQUEST['danhmuc_id']))
  {
  	$catId = $_REQUEST['danhmuc_id'];
  }
  else
  {
  	echo ('<script language = "javascript">
			window.location = "quanlydanhmuc.php";
		   </script>');
  }

?>

		<!-- Container Fluid-->
		<div class="container-fluid" id="container-wrapper">
		  <div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Sửa Danh Mục</h1>
		  </div>

		  <div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
			  <!-- Form Basic -->
			  <div class="card mb-4">
			
				<div class="card-body">
				  <form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
					  <label for="tendanhmuc">Tên danh mục</label>
					  <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" value="<?php echo $p->laymotthongtin("select tendanhmuc from categories where category_id = '$catId'"); ?>">
					</div>
					
					</fieldset>
					<br/>
					<input type="submit" class="btn btn-primary" name="btn" value="SỬA DANH MỤC">
				  </form>
				  <?php
					if(isset($_POST['btn'])){
					  $tendanhmuc = $_REQUEST['tendanhmuc'];
					  
					  if($tendanhmuc == ''){
						echo '<script type="text/javascript">alert("Vui lòng nhập đầy đủ các trường");</script>';
					  }
					  else{
						
						  if($p->themxoasua("update categories set tendanhmuc = '$tendanhmuc' Where category_id = '$catId'"))
						  {
							echo ('<script type="text/javascript">
									alert("Sửa danh mục thành công");
									window.location="quanlydanhmuc.php";
								  </script>');
							
						  }
						}   
					  }
				  ?>
				</div>
			  </div>
			</div>
			<div class="col-lg-2"></div>
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
  <script>
	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
	  var fileName = $(this).val().split("\\").pop();
	  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
  </script>
</body>

</html>