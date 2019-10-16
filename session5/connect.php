<?php 
	$server = 'localhost'; //$server = '127.0.0.1';
	$username = 'root';
	$password = ''; // $password = '';
	$database = 'wad_php_1019';

	$connect = mysqli_connect($server, $username, $password, $database);

	// Change character set to utf8
	mysqli_set_charset($connect,"utf8");
	
	// Check connection
	if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>