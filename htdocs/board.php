<?php include("header.php") ?>
<?php
	if(isset($_GET['cat'])){
		//include 'connect.php';
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
	$failed = 0;
	if(isset($_POST['newThr'])){
		$query_insert = "INSERT INTO threads VALUES (NULL, '" . mysqli_real_escape_string($link, $_POST['title']) . "','" . mysqli_real_escape_string($link, $_POST['post']) . "','" . mysqli_real_escape_string($link, $_POST['imgurl']) . "', now(),'" . $category . "');";
		//echo $query_insert;
		if(!($_POST['title']=="")) mysqli_query($link, $query_insert);
		else $failed = 1;
	}

?>

<?php
	$query_list = "SELECT * FROM threads WHERE CatId='" . $category . "' GROUP BY Id ASC;";
	//echo $query_list;
	$threads=mysqli_query($link, $query_list);
?>

<html>
	<head>
		<title><?= $catName?> - AUMIB</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
		<link rel="icon" href="favicon.ico" type="image/ico">
	</head>
	<body>
	<div id="body">
		<!-- Header --><!-- DONE -->
		<div id="title"><?= $catName?> - AUMIB</div>
		<div id="subtitle">Start new thread</div>
		<!-- Start new thread --><!-- DONE -->
		<div id="inputWrapper">
		<form action="board.php?cat=<?=$category?>" method="post">
		
		<div id="inputRow">
		<div id="inputLabel">URL:</div>
		<div id="inputLabel"><input type="text" name="imgurl"></div>
		</div>
		
		<div id="inputRow">
		<div id="inputLabel">Title:</div>
		<div id="inputLabel"><input type="text" name="title"></div>
		<?php if($failed == 1) echo "All threads must have a title!"?>
		</div>
		
		<div id="inputRow">
		<div id="inputLabel">Post:</div>
		<div id="inputLabel"><input type="text" name="post"></div>
		</div>
		
		<div id="inputRow">
		<input type="submit" value="Start" name="newThr">
		</div>
		</form>
		</div>
		<!-- List threads --><!-- DONE -->
		<div id="thrTable">
			<div id="thrTableRow">
				<div id="thrTableHeader">Link</div>
				<div id="thrTableHeader">Title</div>
				<div id="thrTableHeader">Post</div>
				<div id="thrTableHeader">Timestamp</div>
				<div id="thrTableHeader">Take a look</div>
			</div>
			<?php while ($row = mysqli_fetch_array($threads)): ?>
			<div id="thrTableRow">
					<?php if(($row['Image']) == ""): ?>
						<div id="thrTableCell">No link</div>
					<?php else: ?>
					<?php if (strpos($row['Image'], 'http') === false) {
						$row['Image'] = 'http://' .$row['Image'];
}					?>
					<div id="thrTableLinkCell"><a target="_blank" href="<?=$row['Image']?>">LINK</a></div> <!-- // for absolute link -->
					<?php endif; ?>
				<div id="thrTableCell"><?= $row['Title'] ?></div>
				<div id="thrTableCell"><?= $row['Post'] ?></div>
				<div id="thrTableCell"><?= $row['Datetime'] ?></div>
				<div id="thrTableCell"><a href="thread.php?id=<?= $row['Id']?>">View thread</a></div>
			</div>
			<?php endwhile; ?>
		</div>

		<!-- Footer --><!-- DONE -->
		<?php include ("footer.php") ?>
		</div>
	</body>
</html>


<?php
	mysqli_close($link);
?>