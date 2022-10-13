<?php 
	session_start();
	include 'script/myscript.php';
	$p = new quan;
	$p->connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cart test</title>
	<link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
	<?php 
		$p -> selectProduct("select * from sanpham");
	?>
	<a href="giohang.php"><button type="button">giỏ hàng</button></a>
</body>
</html>