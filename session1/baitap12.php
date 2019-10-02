<?php

$string = "";
for ($i = 0; $i < 4; $i++) {
    for ($j = 1; $j <= 4 - $i; $j++) {
        $string .= "_";
    }
    for ($j = 1; $j <= 2 * $i + 1; $j++) {
        $string .= "*";
    }
    $string .= "<br>";
}
echo $string;
?>
