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
			echo $query1;
			echo $query2;
		?>
		
	</div>
	<?php include ("footer.php") ?>
	</body>
</html>