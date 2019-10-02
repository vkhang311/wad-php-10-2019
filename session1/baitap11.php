<?php
    $string = "";
    $n = 1;
   for($i=1;$i<=4;$i++)
    {
        for($j = 1; $j <= $i; $j++){
            $string .= "$n ";
            $n++;
        }
        $string .= "<br>";
    }
    echo $string;

?>
