<html>
	<head>
		<title>AUMIB</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
		<script src="konami.js"></script>
	</head>
<!--------------------------------------------------------------------------------->
	<body>
	
	<!-- PHP to load contant header -->
	<!-- Banner -->
	<!-- List of boards in table, with hyperlink -->
	<?php
	include 'connect.php';
	$link = getDB();
	$cats=mysqli_query($link, "SELECT * from categories Group by Id");
	?>
	<center><h2>Categories</h2></center>
	<center><table class="index">
		<th class="index">Abbr</th>
		<th class="index">Name</th>
		<th class="index">Description</th>
	<?php while ($row = mysqli_fetch_array($cats)): ?>
		<tr class="index">
			<td class="index"><?= $row['Id'] ?></td>
			<td class="index"><?= $row['Name'] ?></td>
			<td class="index"><?= $row['Description'] ?></td>
		</tr>
	<?php endwhile; ?>
	</table><center>
	<!-- Stats: total posts, total images -->
	<!-- PHP to load constant footer -->
	</body>
</html>