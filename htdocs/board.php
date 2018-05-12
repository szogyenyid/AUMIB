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
	$query = "SELECT * FROM threads WHERE CatId='" . $category . "' GROUP BY Id ASC;";
	//echo $query;
	$threads=mysqli_query($link, $query);
?>

<html>
	<head>
		<title><?= $catName?> - AUMIB</title>
	</head>
	<body>
		<!-- Header -->
		<!-- Start new thread -->
		<table>
			<th>Img</th>
			<th>Title</th>
			<th>Post</th>
			<th>Timestamp</th>
			<th>Take a look</th>
			<!-- List threads -->
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