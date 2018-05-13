<?php include("header.php") ?>
<?php
	if(isset($_GET['id'])){
		//include 'connect.php';
		$link = getDB();
		$threadId = mysqli_real_escape_string($link, $_GET['id']);
		$query = "SELECT * FROM threads WHERE " . "Id=" . $threadId . ";";
		//echo $query;
		$threadTitle = mysqli_query($link, $query);
		$row = mysqli_fetch_array($threadTitle);
		$threadTitle = $row['Title'];
	}
?>

<?php
	if(isset($_POST['newReply'])){
		$query_insert = "INSERT INTO replies VALUES(NULL, '". mysqli_real_escape_string($link, $_POST['reply']) . "', '" . mysqli_real_escape_string($link, $_POST['imgurl']) . "', now(), " . $threadId . ");";
		//echo $query_insert;
		mysqli_query($link, $query_insert);		
	}

?>

<html>
	<head>
		<title><?= $threadTitle?> - AUMIB</title>
		<link rel="icon" href="favicon.ico" type="image/ico">
	</head>
	<body>
		<!-- Header --><!-- DONE -->
		<!-- New reply --><!-- DONE -->
		<form action="thread.php?id=<?=$threadId?>" method="post">
			Img-URL: <input type="text" name="imgurl"><br>
			Reply: <input type="text" name="reply"><br>
			<input type="submit" value="Reply" name="newReply">
		</form>
		<!-- Thread title and post --><!-- DONE -->
		<table>
		<tr>
			<td><?= $row['Image'] ?></td>
			<td><?= $row['Title'] ?></td>
			<td><?= $row['Post'] ?></td>
			<td><?= $row['Datetime'] ?></td>
		</tr>
		<!-- Replies --><!-- DONE -->
		<?php
			$query_list = "SELECT * FROM replies WHERE ThrId=" . $threadId . ";";
			//echo $query_list;
			$replies_here = mysqli_query($link, $query_list);
		?>
		<?php while ($reply_row = mysqli_fetch_array($replies_here)): ?>
		<tr>
			<td></td>
			<td><?= $reply_row['Image'] ?></td>
			<td><?= $reply_row['Reply'] ?></td>
			<td><?= $reply_row['Datetime'] ?></td>
		</tr>
		<?php endwhile; ?>
		</table>
		<!-- Footer --><!-- DONE -->
		<?php include ("footer.php") ?>
	</body>
</html>


<?php
	mysqli_close($link);
?>