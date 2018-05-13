
<html>
	<head>
		<title>AUMIB</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
		<link rel="icon" href="favicon.ico" type="image/ico">
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
	<br><br><br>
	<!-- Stats: total posts, total images --><!-- DONE -->
	<?php 
	$statqueryCat = "SELECT COUNT(Id) FROM categories;";
	$statqueryThr = "SELECT COUNT(Id) FROM threads;";
	$statqueryRep = "SELECT COUNT(Id) FROM replies;";
	$resultCats = mysqli_fetch_array(mysqli_query($link, $statqueryCat))[0];
	$resultThrs = mysqli_fetch_array(mysqli_query($link, $statqueryThr))[0];
	$resultReps = mysqli_fetch_array(mysqli_query($link, $statqueryRep))[0];
	?>
	<div id="iTable">
		<div id="iTableRow">
			<div id="iTableHeader">Categories</div>
			<div id="iTableHeader">Total threads</div>
			<div id="iTableHeader">Total replies</div>
		</div>
		<div id="iTableRow">
			<div id="iTableCell"><?=$resultCats?></div>
			<div id="iTableCell"><?=$resultThrs?></div>
			<div id="iTableCell"><?=$resultReps?></div>
		</div>
	</div>
	<!-- PHP to load constant footer --><!-- DONE -->
	<?php include ("footer.php") ?>
	</div>
	</body>
</html>

<?php
	mysqli_close($link);
?>