<?php
    $usd = 250;
    $keo = 0;
    $euro =0;
    do{
       $usd -= 5;
       $keo++;
       $euro +=3;
       while($euro>=2){
            $euro -=2;
            $keo++;
            $usd +=3;
        };
    } while($keo < 50);
    echo "Total usd to spend : " . (250-$usd);
    echo "<br>";
    echo $euro;
    echo "<br>";
    echo $keo;
?>
