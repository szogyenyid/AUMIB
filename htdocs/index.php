<html>
	<head>
		<title>AUMIB</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
		<script src="konami.js"></script>
	</head>
<!--------------------------------------------------------------------------------->
	<body>
	<div id = "body">
	<!-- PHP to load constant header --><!-- DONE -->
	<?php include("header.php") ?>
	<?php
	//include 'connect.php';
	$link = getDB();
	$cats=mysqli_query($link, "SELECT * from categories Group by Id");
	?>
	<div id="title">Anonymous UnModerated ImageBoard</div>
	<div id="subtitle">Categories</div>
	
	<div id="iTable">
		<div id="iTableRow">
			<div id="iTableHeader">Abbr</div>
			<div id="iTableHeader">Name</div>
			<div id="iTableHeader">Description</div>
		</div>
		<?php while ($row = mysqli_fetch_array($cats)): ?>
		
		<div id="iTableRow">
			<div id="iTableCell"><a href="board.php?cat=<?=$row['Id']?>"><?=$row['Id']?></a></div>
			<div id="iTableCell"><?=$row['Name'] ?></div>
			<div id="iTableCell"><?=$row['Description'] ?></div>
		</div>
		<?php endwhile; ?>
	</div>

	<!-- Stats: total posts, total images -->
	<!-- PHP to load constant footer --><!-- DONE -->
	<?php include ("footer.php") ?>
	</div>
	</body>
</html>
<?php
	mysqli_close($link);
?>