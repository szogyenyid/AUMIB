<?php
	if(isset($_GET['cat'])){
		include 'connect.php';
		$link = getDB();
		$category=mysqli_real_escape_string($link, $_GET['cat']);
		//echo $category;
	}
?>

<html>
	<head>
	</head>
	<body>
	</body>
</html>