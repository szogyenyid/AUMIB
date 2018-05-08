<?php
	if(isset($_GET['cat'])){
		include 'connect.php';
		$link = getDB();
		$category=mysqli_real_escape_string($link, $_GET['cat']);
		$query = "SELECT * FROM categories WHERE " . "Id='" . $category . "';";
		//echo $query;
		$catName = mysqli_query($link, $query);
		$row = mysqli_fetch_array($catName);
		$catName = $row['Name'];
	}
?>

<?php
	$query = "SELECT * FROM threads WHERE CatId='" . $category . "' Group by Datetime;";
	//echo $query;
	$threads=mysqli_query($link, $query);
?>

<html>
	<head>
		<title><?= $catName?> - AUMIB</title>
	</head>
	<body>
		<!-- Start new thread -->
		<!-- List threads -->
		
	</body>
</html>