<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'wad_php_1019';

    $connect = mysqli_connect($servername, $username, $password, $database);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

?>