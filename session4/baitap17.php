<?php

    $server = 'localhost';
    $username = 'root';
    $pwd = '';
    $database = 'wad_php_1019';

    $connect = mysqli_connect($server, $username, $pwd, $database);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql17a = "SELECT id, fullName, email FROM users;";
    $result = $connect->query($sql17a);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["fullName"]. " - Email: " . $row["email"]. "<br>";
        }
    } else {
        echo "0 results";
    }

?>
    <form action="baitap17.php" method="post">
        Enter UserId To Delete : <input type="text" name="deleteId">
        <input type="submit" name="submit" value="Delete">
    </form>
<?php
    $deleteId = 0;
    if (isset($_POST['submit'])) {
        $deleteId = $_POST['deleteId'];
    }
    $sql17c = "DELETE FROM users WHERE id LIKE '$deleteId'";
    if (mysqli_query($connect, $sql17c) == TRUE){
        echo "Delete user has been success";
    } else {
        echo "Error creating database: " . mysqli_error($connect);
    }
    mysqli_close($connect);
?>
