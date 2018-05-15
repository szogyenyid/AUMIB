<?php include("header.php") ?>
<html>
	<head>
		<title>AUMIB - Search</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
		<link rel="icon" href="favicon.ico" type="image/ico">
	</head>
<!-------------------------------------------------------------------------------------------->
	<body>
	<div id="body">
		<div id="title">AUMIB - Search</div>
		<div id="inputWrapper">
			<form action="search.php" method="get">
				<div id="inputRow">
					<div id="inputLabel">Search in:</div>
					<div id="inputLabel">
						<select name="table">
							<option value="threads">Threads</option>
							<option value="replies">Replies</option>
							<option value="both">Both</option>
						</select>
					</div>
				</div>
				<div id="inputRow">
					<div id="inputLabel">Search for:</div>
					<div id="inputLabel"><input type="text" placeholder="Search this" name="text"></div>
				</div>
				<div id="inputRow"><input type="submit" value="Search!" name="search"></div>
			</form>
		</div>

		<?php
			$query1 = "";
			$query2 = "";
			$link = getDB();
			if(isset($_GET['search'])){
				if($_GET['table']=="threads") $query1 = $query1."SELECT DISTINCT * from threads WHERE (Title Like '%".mysqli_real_escape_string($link, $_GET['text'])."%') OR (Post Like '%".mysqli_real_escape_string($link, $_GET['text'])."%');";
				if($_GET['table']=="replies") $query2 = $query2."SELECT * from replies WHERE Reply Like '%".mysqli_real_escape_string($link, $_GET['text'])."%';";
				if($_GET['table']=="both"):
					$query1 = $query1."SELECT DISTINCT * from threads WHERE (Title Like '%".mysqli_real_escape_string($link, $_GET['text'])."%') OR (Post Like '%".mysqli_real_escape_string($link, $_GET['text'])."%');";
					$query2 = $query2."SELECT * from replies WHERE Reply Like '%".mysqli_real_escape_string($link, $_GET['text'])."%';";
				endif;
			}
			//echo $query1;
			//echo $query2;
			$replies;
			if($query2 != "") $replies = mysqli_query($link, $query2);
		?>
		<div id="subtitle">Threads</div>
		<div id="sThrTable">
			<div id="sThrTableRow">
				<div id="sThrTableHeader">Id</div>
				<div id="sThrTableHeader">Title</div>
				<div id="sThrTableHeader">Post</div>
				<div id="sThrTableHeader">Link</div>
				<div id="sThrTableHeader">Datetime</div>
				<div id="sThrTableHeader">Category</div>
			</div>
			<?php if($query1 != ""): ?>
				<?php $threads = mysqli_query($link, $query1); ?>
				<?php while ($row = mysqli_fetch_array($threads)): ?>
					<div id="sThrTableShortCell"><?=$row['Id'] ?></div>
					<div id="sThrTableCell"><?=$row['Title'] ?></div>
					<div id="sThrTableCell"><?=$row['Post'] ?></div>
					<?php if(($row['Image']) == ""): ?>
						<div id="sThrTableShortCell">No link</div>
					<?php else: ?>
					<?php if (strpos($row['Image'], 'http') === false) {
						$row['Image'] = 'http://' .$row['Image'];
}					?>
					<div id="sThrTableShortCell"><a target="_blank" href="<?=$row['Image']?>">LINK</a></div>
					<?php endif; ?>
					<div id="sThrTableShortCell"><?=$row['Datetime'] ?></div>
					<div id="sThrTableShortCell"><?=$row['CatId'] ?></div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<br>
		<br>
		<div id="subtitle">Replies</div>
		<div id="sThrTable">
			<div id="sThrTableRow">
				<div id="sThrTableHeader">Id</div>
				<div id="sThrTableHeader">Reply</div>
				<div id="sThrTableHeader">Link</div>
				<div id="sThrTableHeader">Datetime</div>
				<div id="sThrTableHeader">Thread</div>
			</div>
			<?php if($query2 != ""): ?>
				<?php $replies = mysqli_query($link, $query2); ?>
				<?php while ($row = mysqli_fetch_array($replies)): ?>
					<div id="sThrTableShortCell"><?=$row['Id'] ?></div>
					<div id="sThrTableCell"><?=$row['Reply'] ?></div>
					<?php if(($row['Image']) == ""): ?>
						<div id="sThrTableShortCell">No link</div>
					<?php else: ?>
					<?php if (strpos($row['Image'], 'http') === false) {
						$row['Image'] = 'http://' .$row['Image'];
}					?>
					<div id="sThrTableShortCell"><a target="_blank" href="<?=$row['Image']?>">LINK</a></div>
					<?php endif; ?>
					<div id="sThrTableShortCell"><?=$row['Datetime'] ?></div>
					<div id="sThrTableShortCell"><?=$row['ThrId'] ?></div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<?php include ("footer.php") ?>
	</body>
</html>