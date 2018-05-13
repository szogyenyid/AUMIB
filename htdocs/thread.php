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
	<div id="body">
		<!-- Header --><!-- DONE -->
		<div id="title"><?= $threadTitle?> - AUMIB</div>
		<div id="subtitle">Reply to thread</div>
		<!-- New reply --><!-- DONE -->
		<div id="inputWrapper">
		<form action="thread.php?id=<?=$threadId?>" method="post">
		
		<div id="inputRow">
		<div id="inputLabel">Img-URL:</div>
		<div id="inputLabel"><input type="text" name="imgurl"></div>
		</div>
		
		<div id="inputRow">
		<div id="inputLabel">Reply:</div>
		<div id="inputLabel"><input type="text" name="reply"></div>
		</div>

		<div id="inputRow">
		<input type="submit" value="Reply" name="newReply">
		</div>
		</form>
		</div>
		<!-- Thread title and post -->
		<table>
		<tr>
			<td><?= $row['Image'] ?></td>
			<td><?= $row['Title'] ?></td>
			<td><?= $row['Post'] ?></td>
			<td><?= $row['Datetime'] ?></td>
		</tr>
		<!-- Replies -->
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
		</div>
	</body>
</html>


<?php
	mysqli_close($link);
?>