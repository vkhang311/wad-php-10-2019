<style>
    .error{
        color: red;
    }
</style>
<?php
$nameErr = $emailErr = $passwordErr = $phoneErr = $birthdateErr = "";
$name = $email = $password = $phone = $birthdate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone Number is required";
    } else {
        $phone = test_input($_POST["phone"]);
    }
    if (empty($_POST["birthdate"])) {
        $birthdateErr = "Birthdate is required";
    } else {
        $birthdate = test_input($_POST["birthdate"]);
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<form action="baitap16.php" method="post">
    Full Name: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Password: <input type="text" name="password">
    <span class="error">* <?php echo $passwordErr;?></span>
    <br><br>
    Phone Number: <input type="text" name="phone">
    <span class="error">* <?php echo $phoneErr;?></span>
    <br><br>
    Birthdate: <input type="date" name="birthdate">
    <span class="error">* <?php echo $birthdateErr;?></span>
    <br><br>
    <input type="submit" name="register" value="Register">
</form>
<?php
    $server = 'localhost';
    $username = 'root';
    $pwd = '';
    $database = 'wad_php_1019';

    $connect = mysqli_connect($server, $username, $pwd, $database);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql16 = "INSERT INTO users (fullName, phoneNumber, email, birthdate) VALUES ('$name', '$phone','$email', '$birthdate');";
    if (mysqli_query($connect, $sql16) == TRUE){
        echo "Insert success";
    } else {
        echo "Error creating database: " . mysqli_error($connect);
    }
    mysqli_close($connect);

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
    mysqli_close($connect);

    $sql17b = "DELETE * FROM users WHERE fullName LIKE 'khang' AND email LIKE 'vkhang311@gmail.com';";
    if (mysqli_query($connect, $sql17a) == TRUE){
        echo "Delete success";
    } else {
        echo "Error creating database: " . mysqli_error($connect);
    }
    mysqli_close($connect);
?>

