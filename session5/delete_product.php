<?php include 'connect.php'; 
	$id = $_GET['id_delete'];
	$sql = "DELETE FROM products WHERE id = $id";
	if (mysqli_query($connect, $sql) === TRUE) {
		header("Location: list_product.php");
	}
?>