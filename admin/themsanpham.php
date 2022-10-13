<?php
  require_once('php/header-admin.php');

?>

		<!-- Container Fluid-->
		<div class="container-fluid" id="container-wrapper">
		  <div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Thêm Sản Phẩm</h1>
		  </div>

		  <div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
			  <!-- Form Basic -->
			  <div class="card mb-4">
			
				<div class="card-body">
				  <form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
					  <label for="tensanpham">Tên sản phẩm</label>
					  <input type="text" class="form-control" id="tensanpham" name="tensanpham">
					</div>
					<div class="form-group">
					  <label for="mota">Mô tả</label>
					  <textarea rows="10" class="form-control" id="mota" name="mota"></textarea>
					</div>
					<div class="form-group">
					  <label for="gia">Giá</label>
					  <input type="number" class="form-control" id="gia" name="gia">
					</div>
					<div class="form-group">
					  <label for="">Hình ảnh</label>
					  <div class="custom-file">
						<input type="file" class="custom-file-input" id="hinhanh" name="hinhanh">
						<label class="custom-file-label" for="hinhanh">Chọn File</label>
					  </div>
					</div><br/>
					<fieldset class="form-group">
					  <div class="row">
						<?php 
							$danhmucTruoc = false;
						?>
						<legend class="col-form-label col-sm-3 pt-0">Loại Sản Phẩm</legend>
						<div class="col-sm-9">
						  <?php 
                            $p->laydanhmucsanpham("select * from categories", $danhmucTruoc);
                          ?>
					  </div>
					</fieldset>
					<br/>
					<input type="submit" class="btn btn-primary" name="btn" value="THÊM SẢN PHẨM">
				  </form>
				  <?php
					if(isset($_POST['btn'])){
					  $tensanpham = $_REQUEST['tensanpham'];
					  $mota = $_REQUEST['mota'];
					  $motaNew = str_replace("\n", "<br>", $mota);
					  if(isset($_REQUEST['dm']))
					  {
					  	$danhmuc = $_REQUEST['dm'];
					  	$danhmucnew = (int)$danhmuc;
					  }
					  $gia = $_REQUEST['gia'];
					  $gianew = (int)$gia;
					  $pathfile = $_FILES['hinhanh']['tmp_name'];
					  $tenfile = $_FILES['hinhanh']['name'];
					  $allowed = array('jpeg', 'png', 'jpg');
					  $kieufile = pathinfo($tenfile, PATHINFO_EXTENSION);
					  
					  if($tensanpham == '' || $danhmuc == '' || $gia == ''){
						echo '<script type="text/javascript">alert("Vui lòng nhập đầy đủ các trường");</script>';
					  }
					  else{
						if(in_array($kieufile,$allowed) == false)
						{
						  echo ('<script type="text/javascript">
								  alert("Chỉ nhận file hình ảnh");
								</script>');
						}
						else
						{
						  $p->uploadFile($pathfile,$tenfile);
						  if($p->themxoasua("insert into products(tensanpham, mota, gia, hinhanh, danhmuc) 
											values('$tensanpham', '$motaNew', '$gianew', '$tenfile', '$danhmucnew')"))
						  {
							echo ('<script type="text/javascript">
									alert("Thêm sản phẩm thành công");
									window.location="themsanpham.php";
								  </script>');
							
						  }
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