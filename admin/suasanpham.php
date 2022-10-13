<?php
  require_once('php/header-admin.php');
  if(isset($_REQUEST['product_id']))
  {
  	$prodId = $_REQUEST['product_id'];
  }
  else
  {
  	echo ('<script language = "javascript">
			window.location = "quanlysanpham.php";
			</script>');
  }

  
  
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
					  <input type="text" class="form-control" id="tensanpham" name="tensanpham" value="<?php echo $p->laymotthongtin("select tensanpham from products where product_id = '$prodId'"); ?>">
					</div>
					<div class="form-group">
					  <label for="mota">Mô tả</label>
					  <textarea rows="10" class="form-control" id="mota" name="mota"><?php echo $p->laymotthongtin("select mota from products where product_id = '$prodId'"); ?></textarea>
					</div>
					<div class="form-group">
					  <label for="gia">Giá</label>
					  <input type="number" class="form-control" id="gia" name="gia" value="<?php echo $p->laymotthongtin("select gia from products where product_id = '$prodId'"); ?>">
					</div>
					<div class="form-group">
                        <?php 
                            $hinhanhTruoc = $p->laymotthongtin("select hinhanh from products where product_id = '$prodId'");
                        ?>
					  <label for="">Hình ảnh</label>
					  <div class="custom-file">
						<input type="file" class="custom-file-input" id="hinhanh" name="hinhanh" value="<?php echo $p->laymotthongtin("select hinhanh from products where product_id = '$prodId'"); ?>">
						<label class="custom-file-label" for="hinhanh"><?php echo $hinhanhTruoc; ?></label>
					  </div>
					</div><br/>
					<fieldset class="form-group">
					  <div class="row">
                        <?php $danhmucTruoc = $p->laymotthongtin("select danhmuc from products where product_id = '$prodId'"); ?>
						<legend class="col-form-label col-sm-3 pt-0">Loại Sản Phẩm</legend>
						<div class="col-sm-9">
						  <?php 
                            $p->laydanhmucsanpham("select * from categories", $danhmucTruoc);
                          ?>
						</div>
					  </div>
					</fieldset>
					<br/>
					<input type="submit" class="btn btn-primary" name="btn" value="SỬA SẢN PHẨM">
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
                      if($_FILES['hinhanh']['name'])
                      {
                        $tenfile = $_FILES['hinhanh']['name'];
                      }
                      else
                      {
                        $tenfile = $hinhanhTruoc;
                      }
                      
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
						  if($p->themxoasua("update products set tensanpham = '$tensanpham', mota = '$motaNew', gia = '$gianew', hinhanh = '$tenfile', danhmuc ='$danhmucnew' where product_id = '$prodId'"))
						  {
							echo ('<script type="text/javascript">
									alert("sửa sản phẩm thành công");
									window.location="quanlysanpham.php";
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