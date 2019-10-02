<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bai Tap 10</title>
    <style>
        .odd {
            background-color: white;
        }
        .even {
            background-color: black;
        }
        .odd, .even {
            width: 50px;
            height: 50px;
            display: inline-block;
        }
    </style>

</head>
<body>
<?php
    $string = "";
    for ($i = 1; $i <= 8; $i++) {
        $string .= "<div>";
        for ($j = $i; $j <= $i + 8; $j++) {
            if ($j % 2 == 0) {
                $string .= "<span class='even'></span>";
            } else {
                $string .= "<span class='odd'></span>";
            }
        }
        $string .= "</div>";
    }
    echo $string;
?>
