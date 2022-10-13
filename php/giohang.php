<?php 
	session_start();

	if(!empty($_SESSION['giohang'])) {
		
		$products = $_SESSION['giohang'];
		$tong = 0;
		$stt_cart = 1;
		
		foreach ($products as $item) { // truy cập từng phần tử gg để biết them foreach as
			$thanhtien = $item['gia'] * $item['soluong'];
			$tong += $thanhtien;
			echo $stt_cart++ . '<br>';
			echo $item['ten'] . '<br>';
			echo $item['gia'] . '<br>';
			echo $item['soluong'] . '<br>';
			echo $thanhtien . ' ';
			echo '<p><a href="thaotacgiohang.php?action='."delete".'&add='.$item["id"].'"><button>remove</button></a></p>';
		} // phần này giông php thôi gọi giá trị array
		echo $tong;
	}
	else {
		echo 'không có sản phẩm nào';
	}
	
	echo '<p><a href="./"><button>home</button></a></p>';
?>