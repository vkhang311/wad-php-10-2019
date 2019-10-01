<?php
    $blue = 50;
    $red = 0;
    do{
        $blue--;
        $red++;
    } while(($blue*2/5) + ($red*3/4) != 27);
    echo "Blue: " . $blue;
    echo "<br>";
    echo "Red: " . $red;
?>
