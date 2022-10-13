<?php
class quan
{
	function connect()
	{
		$con = mysqli_connect("localhost","root","","baitaplon");
		if (!$con)
		{
		  die ("Kết nối thất bại");
		  exit();
		}
		else
		{
			mysqli_set_charset($con,"utf8");
			return $con;
		}
	}

	function selectProduct($sql)
	{
		$link = $this -> connect();

		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)) {
				echo '
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="img/product/'.$row['hinhanh'].'">
								<ul class="product__item__pic__hover">
									<li>
										<a href="shoping-cart.php?&idsp='.$row["product_id"].'&action='."add".'">
											<i class="fa fa-shopping-cart"></i>
										</a>
									</li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6 style="height: 4em;"><a href="shop-details.php?idsp='.$row['product_id'].'">'.$row['tensanpham'].'</a></h6>
								<h5>'.number_format($row['gia']).' VNĐ</h5>
							</div>
						</div>
					</div>';
			}
		}
		else
		{
			echo '<h3 style="margin-bottom: 50px;">Không còn sản phẩm </h3>';
		}
	}
	
	function chitietSanpham($sql){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)) {
				echo('<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="product__details__pic">
								<div class="product__details__pic__item">
									<img class="product__details__pic__item--large"
										src="img/product/'.$row['hinhanh'].'" alt="">
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<form action="shoping-cart.php" method="get">
								<div class="product__details__text">
									<h3>'.$row['tensanpham'].'</h3>
									<div class="product__details__price">'.number_format($row['gia']).' VNĐ</div>
									<br/>
									<div class="product__details__quantity">
										<div class="quantity">
											<div class="pro-qty">
												<input type="text" name="slsp" value="1">
											</div>
											<input type="hidden" name="idsp" value="'.$row["product_id"].'">
											<input type="hidden" name="action" value="add">
										</div>
									</div>
										<input type="submit" value="Thêm vào giỏ hàng" class="primary-btn">
								</div>
							</form>
						</div>
						<div class="col-lg-12">
							<div class="product__details__tab">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
											aria-selected="true">MÔ TẢ</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tabs-1" role="tabpanel">
										<div class="product__details__tab__desc">
											<h6>Thông tin chi tiết về sản phẩm:</h6>
											'.$row['mota'].'
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>'
				);
			}
		}
	}

	function showrauindex($sql){
		$link = $this -> connect();

		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)) {
				echo('<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
						<div class="featured__item">
							<div class="featured__item__pic set-bg" data-setbg="img/product/'.$row['hinhanh'].'">
								<ul class="featured__item__pic__hover">
									<li><a href="shoping-cart.php?idsp='.$row["product_id"].'&action='."add".'"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="featured__item__text">
								<h6 style="height: 4em;"><a href="shop-details.php?idsp='.$row['product_id'].'">'.$row['tensanpham'].'</a></h6>
								<h5>'.number_format($row['gia']).' VNĐ</h5>
							</div>
						</div>
					</div>');
			}
		}
	}

	function showthitindex($sql){
		$link = $this -> connect();

		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)) {
				echo('<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
						<div class="featured__item">
							<div class="featured__item__pic set-bg" data-setbg="img/product/'.$row['hinhanh'].'">
								<ul class="featured__item__pic__hover">
									<li><a href="shoping-cart.php?idsp='.$row["product_id"].'&action='."add".'"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="featured__item__text">
								<h6><a href="shop-details.php?idsp='.$row['product_id'].'">'.$row['tensanpham'].'</a></h6>
								<h5>'.number_format($row['gia']).' VNĐ</h5>
							</div>
						</div>
					</div>');
			}
		}
	}
	function showdanhmucsanpham($sql, $IdDm){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)) {
				if(isset($IdDm) && $row['category_id'] == $IdDm)
				{
					echo(
							'<li><a class="active__dm" href="shop-grid.php?category_id='.$row['category_id'].'">'.$row['tendanhmuc'].'</a></li>'
					);
				} 
				else
				{
					echo(
							'<li><a href="shop-grid.php?category_id='.$row['category_id'].'">'.$row['tendanhmuc'].'</a></li>'
					);
				}
			}
		}
	}

	function sanphamgoiy($sql){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_array($result)) {
				echo('<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="img/product/'.$row['hinhanh'].'">
								<ul class="product__item__pic__hover">
									<li><a href="shoping-cart.php?idsp='.$row["product_id"].'&action='."add".'"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="shop-details.php?idsp='.$row["product_id"].'">'.$row["tensanpham"].'</a></h6>
								<h5>'.$row["gia"].'</h5>
							</div>
						</div>
					</div>');
			}
		}
	}

	function themxoasua($sql){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if($result){
			return 1;
		}
		else{
			return 0;
		}
	}
	function xacminhuser($username, $password){
		$link = $this -> connect();
		$decryption = md5($password);
		$sql = "select * from customers where tendangnhap = '$username' and matkhau = '$decryption'";
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_array($result)) {
				$id = $row['customer_id'];
				$user = $row['tendangnhap'];
				$pass = $row['matkhau'];
				$tenhienthi = $row['tenhienthi'];
				session_start();
				$_SESSION['id'] = $id;
				$_SESSION['user'] = $user;
				$_SESSION['pass'] = $pass;
				$_SESSION['tenhienthi'] = $tenhienthi;
				echo ('<script language = "javascript">
						window.location = "./";
						</script>');
			}
		}
		else{
			echo ('<script language = "javascript">
						alert ("Tài khoản không tồn tại");
						</script>');
		}
	}
	function dientudong($sql){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)){
				echo('<div class="col-lg-7 col-md-5">
						<div class="checkout__input">
							<p>Họ Và Tên<span>*</span></p>
							<input type="text" name="hoten" value="'.$row['tenhienthi'].'">
						</div>
						<div class="checkout__input">
							<p>Địa Chỉ:<span>*</span></p>
							<input type="text" name="diachi" value="'.$row['diachi'].'">
						</div>
						<div class="checkout__input">
							<p>Số Điện Thoại:<span>*</span></p>
							<input type="text"name="sdt" value="'.$row['sodienthoai'].'">
						</div>
						<div class="checkout__input">
							<p>Email:<span>*</span></p>
							<input type="text"name="email" value="'.$row['email'].'">
						</div>
					</div>');
			}
		}
	}

	function laydanhmucsanpham($sql, $dmTruoc){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)){
				if(isset($dmTruoc) && $row['category_id'] == $dmTruoc)
				{
					echo('<div class="custom-control custom-radio">
						<input type="radio" id="dm'.$row['category_id'].'" name="dm" class="custom-control-input" value="'.$row['category_id'].'" checked>
						<label class="custom-control-label" for="dm'.$row['category_id'].'">'.$row['tendanhmuc'].'</label>
					  </div>');
				}
				else
				{
					echo('<div class="custom-control custom-radio">
						<input type="radio" id="dm'.$row['category_id'].'" name="dm" class="custom-control-input" value="'.$row['category_id'].'">
						<label class="custom-control-label" for="dm'.$row['category_id'].'">'.$row['tendanhmuc'].'</label>
					  </div>');
				}
			}
		}
	}

	function laymotthongtin($sql){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)){
				return $row[0];
			}
		}
	}

	function xacminhadmin($ad_user, $ad_password){
		$link = $this -> connect();
		$decryption = md5($ad_password);
		$sql = "select * from employees where tendangnhap like '$ad_user' and matkhau like '$decryption' limit 1";
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_array($result)) {
				$ad_id = $row['employee_id'];
				$ad_user = $row['tendangnhap'];
				$ad_pass = $row['matkhau'];
				$ad_tenhienthi = $row['tenhienthi'];
				$ad_phanquyen = $row['phanquyen'];
				session_start();
				$_SESSION['ad_id'] = $ad_id;
				$_SESSION['ad_user'] = $ad_user;
				$_SESSION['ad_pass'] = $ad_pass;
				$_SESSION['ad_tenhienthi'] = $ad_tenhienthi;
				$_SESSION['ad_phanquyen'] = $ad_phanquyen;
				echo ('<script language = "javascript">
						window.location = "quanlydonhang.php";
						</script>');
			}
		}
		else{
			echo '<script type="text/javascript">alert("Sai tên tài khoản hoặc mật khẩu");</script>';
		}
	}

	function confirmlogin($id, $user, $pass, $phanquyen)
	{
		$link = $this -> connect();
		$sql = "select employee_id
				from employees
				where employee_id like '$id'
				and tendangnhap like '$user'
				and matkhau like '$pass'
				and phanquyen like '$phanquyen'
				limit 1";
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($result);
		if($i < 0)
		{
			echo ('<script language = "javascript">
					window.location = "login.php";
					</script>');
		}
	}

	function quanlydonhang($sql){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)){
				echo('<tr>
						<td><a href="chitietdonhang.php?order_id='.$row['order_id'].'">'.$row['order_id'].'</a></td>
						<td>'.$row['customer_id'].'</td>
						<td>'.$row['tenkhachhang'].'</td>
						<td>'.$row['ngaydat'].'</td>
						<td>'.$row['diachi'].'</td>
						<td>'.$row['tongtien'].'</td>
						<td>
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								'.$row['trangthai'].'
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
									
										<a class="dropdown-item" href="?action='."dxn".'&order_id='.$row['order_id'].'">Đã xác nhận</a>
										<a class="dropdown-item" href="?action='."dxl".'&order_id='.$row['order_id'].'">Đang xử lý</a>
										<a class="dropdown-item" href="?action='."giu".'&order_id='.$row['order_id'].'">Giữ hàng</a>
									
								</div>
							</div>
						</td>
						<td>
						<a href="?action='."xoa".'&order_id='.$row['order_id'].'" class="btn btn-sm btn-danger">
							<i class="fas fa-trash-alt"></i>
						</a>
						</td>
					</tr>');
			}
		}
	}

	function quanlyuser($sql){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)){
				echo('
				<tr>
					<td>'.$row['tendangnhap'].'</td>
					<td>'.$row['matkhau'].'</td>
					<td>'.$row['tenhienthi'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['sodienthoai'].'</td>
					<td>'.$row['diachi'].'</td>
					<td>
						<a onClick="return confirmDelete()" href="?action='."xoa".'&customer_id='.$row['customer_id'].'" class="btn btn-sm btn-danger">
							<i class="fas fa-trash-alt"></i>
						</a>
						<a onClick="return confirm(&#39;Bạn có muốn đặt lại mật khẩu mặc định?&#39;)" href="?action='."reset".'&customer_id='.$row['customer_id'].'" class="btn btn-sm btn-danger">
							<i class="fas fa-redo"></i>
						</a>
					</td>
				</tr>');
			}
		}
	}

	function quanlysanpham($sql){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0)
		{
			$stt = 1;
			while ($row = mysqli_fetch_array($result)){
				echo('
				<tr>
					<td style="text-align:'."center".'">'.$stt.'</td>
					<td>'.$row['tensanpham'].'</td>
					<td>'.$row['gia'].'</td>
					<td><img src="../img/product/'.$row['hinhanh'].'" width="50%"></td>
					<td style="text-align:'."center".'">'.$row['danhmuc'].'</td>
					<td style="text-align:'."center".'">
						<a onClick="return confirm(&#39;Bạn có muốn xóa sản phẩm này?&#39;)" href="?product_id='.$row['product_id'].'&action='."xoa".'" class="btn btn-sm btn-danger">
							<i class="fas fa-trash-alt"></i>
						</a>
						<a href="suasanpham.php?product_id='.$row['product_id'].'" class="btn btn-sm btn-danger">
							<i class="fas fa-pen"></i>
						</a>
					</td>
				</tr>');
				$stt++;
			}
		}
	}
	
	function quanlydanhmuc($sql){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0)
		{
			$stt = 1;
			while ($row = mysqli_fetch_array($result)){
				echo('
				<tr>
					<td style="text-align:'."center".'">'.$stt.'</td>
					<td>'.$row['tendanhmuc'].'</td>
					<td style="text-align:'."center".'">
						<a onClick="return confirm(&#39;Bạn có muốn xóa danh mục này?&#39;)" href="?danhmuc_id='.$row['category_id'].'&action='."xoa".'" class="btn btn-sm btn-danger">
							<i class="fas fa-trash-alt"></i>
						</a>
						<a href="suadanhmuc.php?danhmuc_id='.$row['category_id'].'" class="btn btn-sm btn-danger">
							<i class="fas fa-pen"></i>
						</a>
					</td>
				</tr>');
				$stt++;
			}
		}
	}

	function showchitietdonhang($sql){
		$link = $this -> connect();
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result)){
				echo('<tr>
						<td>'.$row['detail_id'].'</td>
						<td>'.$row['order_id'].'</td>
						<td>'.$row['customer_id'].'</td>
						<td>'.$row['product_id'].'</td>
						<td>'.$row['tensanpham'].'</td>
						<td>'.$row['soluong'].'</td>
						<td>'.$row['dongia'].'</td>
					</tr>');
			}
		}
	}
	function uploadFile($pathfile, $pathfileSV){
		if(move_uploaded_file($pathfile, '../img/product/'.$pathfileSV)){
			return 1;
		}
		else{
			return 0;
		}
	}
}
?>