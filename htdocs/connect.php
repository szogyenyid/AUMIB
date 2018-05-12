<?php

function getDB(){
	$link = mysqli_connect("localhost","root","","aumib");
	if(!$link){
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	mysqli_query($link, "SET CHARACTER SET utf8");
	return $link;
}

?>