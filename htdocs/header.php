<html>
	<head>
	<link rel="stylesheet" type="text/css" href="theme.css">
	</head>
	<body>
	<div id = "headerbody">
	<?php
	include 'connect.php';
	$link = getDB();
	$catIds=mysqli_query($link, "SELECT Id from categories GROUP BY Id ASC;");
	?>
	<center>
	[ <a href = "index.php">Home</a>
	<?php while($row = mysqli_fetch_array($catIds)): ?>
		 / <a href="board.php?cat=<?= $row['Id']?>"><?=$row['Id']?></a>
	<?php endwhile; ?>
	/ <a href="search.php">Search</a>
	 ]
	</center>
	</div>
	</body>
</html>
<?php
	mysqli_close($link);
?>