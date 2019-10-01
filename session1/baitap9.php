<?php
    $red = 120/5;
    $blue = 120*3/10;
    echo "Blue: " . $blue;
    echo "<br>";
    echo "Red: " . $red;
    echo "<br>";
    $yellow = 120 - $red - $blue;
    $white = 0;
    do{
        $yellow--;
        $white++;
    } while((3*$yellow) != (7*$white));
    echo "Yellow: " . $yellow;
    echo "<br>";
    echo "White: " . $white;
?>
