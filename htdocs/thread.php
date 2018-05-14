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
	$failed = 0;
	if(isset($_POST['newReply'])){
		$query_insert = "INSERT INTO replies VALUES(NULL, '". mysqli_real_escape_string($link, $_POST['reply']) . "', '" . mysqli_real_escape_string($link, $_POST['imgurl']) . "', now(), " . $threadId . ");";
		//echo $query_insert;
		if(!($_POST['reply']=="")) mysqli_query($link, $query_insert);
		else $failed=1;
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
		<div id="inputLabel">URL:</div>
		<div id="inputLabel"><input type="text" name="imgurl"></div>
		</div>
		
		<div id="inputRow">
		<div id="inputLabel">Reply:</div>
		<div id="inputLabel"><input type="text" name="reply"></div>
		<?php if($failed == 1) echo "All replies must have some text!"?>
		</div>

		<div id="inputRow">
		<input type="submit" value="Reply" name="newReply">
		</div>
		</form>
		</div>
		<!-- Thread title and post --><!-- DONE -->
		<div id="replyTable">
			<div id="replyTableRow_head">
					<?php if(($row['Image']) == ""): ?>
						<div id="replyTableCell_link">No link</div>
					<?php else: ?>
					<?php if (strpos($row['Image'], 'http') === false) {
						$row['Image'] = 'http://' .$row['Image'];
}					?>
				<div id="replyTableCell_link"><a target="_blank" href="<?= $row['Image'] ?>">LINK</a></div>
					<?php endif; ?>
				<div id="replyTableCell"><?= $row['Title'] ?></div>
				<div id="replyTableCell"><?= $row['Post'] ?></div>
				<div id="replyTableCell_timestamp"><?= $row['Datetime'] ?></div>
			</div>
		</div>
		<!-- Replies --><!-- DONE -->
		<div id="replyTable">
		<?php
			$query_list = "SELECT * FROM replies WHERE ThrId=" . $threadId . ";";
			//echo $query_list;
			$replies_here = mysqli_query($link, $query_list);
		?>
		<?php while ($reply_row = mysqli_fetch_array($replies_here)): ?>
			<div id="replyTableRow">
					<?php if(($reply_row['Image']) == ""): ?>
						<div id="replyTableCell_link">No link</div>
					<?php else: ?>
					<?php if (strpos($reply_row['Image'], 'http') === false) {
						$reply_row['Image'] = 'http://' .$reply_row['Image'];
}					?>
				<div id="replyTableCell_link"><a target="_blank" href="<?=$reply_row['Image']?>">LINK</a></div>
					<?php endif; ?>
				<div id="replyTableCell"><?= $reply_row['Reply'] ?></div>
				<div id="replyTableCell_timestamp"><?= $reply_row['Datetime'] ?></div>
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