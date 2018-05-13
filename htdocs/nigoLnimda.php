<?php include("header.php") ?>
<html>
<head>
	<title>AUMIB Admin</title>
</head>
<!-------------------------------------------------------------->
<body>
	<h1>Admin's control panel</h1>
	<h3>Add new category</h3>
	<form action="nigoLnimda.php" method="post">
		Abbr: <input type="text" name="abbr"><br>
		Name: <input type="text" name="name"><br>
		Desc: <input type="text" name="desc"><br>
		<input type="submit" value="Add" name="newCat">
	</form>
	<br>
	<?php include ("footer.php") ?>
</body>
</html>

<?php
	if(isset($_POST['newCat'])){
		//include 'connect.php';
		$link = getDB();
		$query = "INSERT INTO categories VALUES ('" . mysqli_real_escape_string($link, $_POST['abbr']) . "','" . mysqli_real_escape_string($link, $_POST['name']) . "','" . mysqli_real_escape_string($link, $_POST['desc']) . "');";
		//echo $query;
		mysqli_query($link, $query);
		mysqli_close($link);		
	}

?>