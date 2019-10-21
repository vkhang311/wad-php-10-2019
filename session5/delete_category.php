<?php include 'connect.php';
$id = $_GET['id_delete'];
$sql = "SELECT * FROM products WHERE categories_id = $id";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    echo "Không thể xóa category này vì tồn tại products";
} else{
    $sql = "DELETE FROM product_categories WHERE id = $id";
    if (mysqli_query($connect, $sql) === TRUE) {
        header("Location: list_categories.php");
    }
}
?>