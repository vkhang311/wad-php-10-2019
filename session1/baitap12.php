<?php
for ($i = 0; $i < 4; $i++) {
    for ($j = 1; $j <= 4 - $i; $j++) {
        echo "_";
    }
    for ($j = 1; $j <= 2 * $i + 1; $j++) {
        echo "*";
    }
    echo "<br>";
}
?>
