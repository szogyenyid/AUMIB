<?php include("header.php") ?>
<html>
<head>
	<title>AUMIB Admin</title>
	<link rel="icon" href="favicon.ico" type="image/ico">
</head>
<!-------------------------------------------------------------->
<body>
<div id="body">
	<div id="title">Admin's control panel</div>
	<div id="inputWrapperLeft">
	<div id="subtitle">Add new category</div>
	<form action="nigoLnimda.php" method="post">
	
	<div id="inputRow">
	<div id="inputLabel">Abbr:</div>
	<div id="inputLabel"><input type="text" name="abbr"></div>
	</div>
	<div id="inputRow">
	<div id="inputLabel">Name:</div>
	<div id="inputLabel"><input type="text" name="name"></div>
	</div>
	<div id="inputRow">
	<div id="inputLabel">Desc:</div>
	<div id="inputLabel"><input type="text" name="desc"></div>
	</div>
	<div id="inputRow"><input type="submit" value="Add" name="newCat"></div>
	</form>
	</div>

	<br>
	<?php include ("footer.php") ?>
</div>
</body>
</html>

<?php
	if(isset($_POST['newCat'])){
		//include 'connect.php';
		$link = getDB();
		$query = "INSERT INTO categories VALUES ('" . mysqli_real_escape_string($link, strtolower($_POST['abbr'])) . "','" . mysqli_real_escape_string($link, $_POST['name']) . "','" . mysqli_real_escape_string($link, $_POST['desc']) . "');";
		//echo $query;
		mysqli_query($link, $query);
		mysqli_close($link);		
	}

?>