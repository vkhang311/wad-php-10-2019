<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>

    <?php

    // define variables and set to empty values
    $nameErr = $addressErr = $cityErr = $genderErr = $websiteErr = $startDateErr = $endDateErr = $startNumberErr = $lastNumberErr = "";
    $name = $address = $city = $gender = $startDate = $endDate =  "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }
        if (empty($_POST["address"])) {
            $addressErr = "Address is required";
        } else {
            $address = test_input($_POST["address"]);
        }
        if (empty($_POST["city"])) {
            $cityErr = "City is required";
        } else {
            $city = test_input($_POST["city"]);
        }
        if (empty($_POST["startDate"])) {
            $startDateErr = "Start Date is required";
        } else {
            $startDate = test_input($_POST["startDate"]);
        }
        if (empty($_POST["endDate"])) {
            $endDateErr = "End Date is required";
        } else {
            $endDate = test_input($_POST["endDate"]);
            if ($endDate < $startDate){
                $endDateErr = "Err: End Date Less Than Start Date";
            }
        }
        if (empty($_POST["startNumber"])) {
            $startNumberErr = "Start Number is required";
        } else {
            $startNumber = $_POST["startNumber"];
        }
        if (empty($_POST["lastNumber"])) {
            $lastNumberErr = "Last Number is required";
        } else {
            $lastNumber = $_POST["lastNumber"];
            if ($lastNumber <= $startNumber){
                $lastNumberErr = "Err: Last Number Less Than Start Number";
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
        $electricNumber = $lastNumber - $startNumber;
        $money = 0;
        if ($electricNumber <=100){
            $money = $electricNumber * 1500;
        } else if($electricNumber <= 300){
            $money = 100 * 1500 + ($electricNumber - 100) * 2100;
        } else $money = 100 * 1500 + 200 * 2100 +  ($electricNumber - 300) * 3500;
    };

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

    <h2>PHP Form Validation Example</h2>
    <form method="post" action="exercise14.php">
        FullName: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        Address: <textarea name="address" rows="5" cols="40"></textarea>
        <span class="error">* <?php echo $addressErr;?></span>
        <br><br>
        City: <input type="text" name="city">
        <span class="error">* <?php echo $cityErr;?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        Start Date: <input type="date" name="startDate">
        <span class="error">* <?php echo $startDateErr;?></span>
        <br><br>
        End Date: <input type="date" name="endDate">
        <span class="error">* <?php echo $endDateErr;?></span>
        <br><br>
        Start Number: <input type="text" name="startNumber">
        <span class="error">* <?php echo $startNumberErr;?></span>
        <br><br>
        Last Number: <input type="text" name="lastNumber">
        <span class="error">* <?php echo $lastNumberErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <div>
        <h2>Form Input:</h2>
        <form>
            Name: <input  type="text" name="fullName" value="<?php if ($gender == 'male'){
                echo 'Mr. ' . $name;
            } else echo 'Mrs. ' . $name; ?>">
            <br><br>
            Address: <input  type="text" name="address" value="<?php echo $address; ?>">
            <br><br>
            City: <input  type="text" name="address" value="<?php echo $city; ?>">
            <br><br>
            Electric Number used: <input  type="text" name="electricNumber" value="<?php echo number_format($electricNumber); ?>">
            <br><br>
            Money : <input  type="text" name="money" value="<?php echo number_format($money); ?>">
        </form>
    </div>

</body>
</html>
