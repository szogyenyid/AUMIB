<html>
	<head>
		<title>AUMIB</title>
	</head>
	<body>
	<script src="konami.js"></script>
	<!-- PHP to load contant header -->
	<!-- Banner -->
	<!-- List of boards in table, with hyperlink -->
	<?php
	$link = mysqli_connect("localhost","root","","aumib");
	if(!$link){
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	else echo "Connection successful";
	?>
	<!-- Stats: total posts, total images -->
	<!-- PHP to load constant footer -->
	</body>
</html>