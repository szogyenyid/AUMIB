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
	if(isset($_POST['newThr'])){
		$query_insert = "INSERT INTO threads VALUES (NULL, '" . mysqli_real_escape_string($link, $_POST['title']) . "','" . mysqli_real_escape_string($link, $_POST['post']) . "','" . mysqli_real_escape_string($link, $_POST['imgurl']) . "', now(),'" . $category . "');";
		//echo $query_insert;
		mysqli_query($link, $query_insert);		
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
	</head>
	<body>
		<!-- Header -->
		<!-- Start new thread --><!-- DONE -->
		<form action="board.php?cat=<?=$category?>" method="post">
		Img-URL: <input type="text" name="imgurl"><br>
		Title: <input type="text" name="title"><br>
		Post: <input type="text" name="post"><br>
		<input type="submit" value="Start" name="newThr">
		</form>
		<!-- List threads --><!-- DONE -->
		<table>
			<th>Img</th>
			<th>Title</th>
			<th>Post</th>
			<th>Timestamp</th>
			<th>Take a look</th>
			<?php while ($row = mysqli_fetch_array($threads)): ?>
			<tr>
			<td><?= $row['Image'] ?></td>
			<td><?= $row['Title'] ?></td>
			<td><?= $row['Post'] ?></td>
			<td><?= $row['Datetime'] ?></td>
			<td><a href="thread.php?id=<?= $row['Id']?>">View thread</a></td>
			</tr>
			<?php endwhile; ?>
		</table>
		<!-- Footer -->
	</body>
</html>


<?php
	mysqli_close($link);
?>