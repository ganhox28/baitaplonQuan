<?php
	session_start();
	include 'php/script/myscript.php';
	$p = new quan();
	// session_destroy();
	// die();

	$cart_pid = $_GET['add']; // bắt id của sản phẩm;

	if(!empty($_GET['slsp'])){ // kiểm tra xem có số lượng hay không
		$slsp = $_GET['slsp']; // nếu có gán sl vào 
	}
	else{
		$slsp = 1; // nếu ko mặc định bằng 1
	}

	$query = mysqli_query($p->connect(), "select * from products where product_id = '$cart_pid'"); // kết nối database select theo id được truyền qua
	$product = mysqli_fetch_assoc($query);

	if(!empty($_GET['action'])) // kiểm tra hành động có tồn tại hay ko
	{
		$action = $_GET['action']; // gán hd vào biến
	}
	else
	{
		//$action = 'add'; // mặc định là add (chỗ này cần fix những chưa nghĩ ra)
		header('location:index.php');
	}

	if($product) {
		switch ($action) {
			case 'add':
			{
				if(isset($_SESSION['giohang'][$cart_pid])) {
					$_SESSION['giohang'][$cart_pid]['soluong'] += $slsp;
				} // tìm session giỏ hàng với id sp nếu có tăng sl
				else{
					$item = [
						'id' => $product['product_id'],
						'ten' => $product['tensanpham'],
						'gia' => $product['gia'],
						'hinhanh' => $product['hinhanh'],
						'soluong' => $slsp,
					]; // tạo 1 mảng với tên biến là item

					$_SESSION['giohang'][$cart_pid] = $item; // gán id sp vào array
				}
				header('location: ./shoping-cart.php'); // trở lại trang chủ giữ nguyên
				break;
			}

			case 'delete':
			{
				if(isset($_SESSION['giohang'][$cart_pid]))
				{
					unset($_SESSION['giohang'][$cart_pid]);
				} // kiểm tra xem sp có trong giỏ hảng chư nếu rồi xóa
				header('location: ./shoping-cart.php'); // ở nguyên ở trang giỏ hàng
				break;
			}

			case 'update':
			{
				if(isset($_SESSION['giohang'][$cart_pid])) {
					$_SESSION['giohang'][$cart_pid]['soluong'] = $slsp;
				}
				header('location: ./shoping-cart.php'); // trở lại trang chủ giữ nguyên
				break;
			}
		}
	}
?>