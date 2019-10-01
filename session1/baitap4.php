<?php
    function testNumber3(){
        for($n = 0; $n<=100; $n++){
            if($n%6 == 0){
                echo $n . " chia het cho 6";
            }else if($n%2 == 0){
                echo $n . " chia het cho 2";
            }else if($n%3 == 0){
                echo $n . " chia het cho 3";
            } else echo $n . " không chia hết cho 2, 3, 6";
            echo "<br>";
        }
    }
    testNumber3();
?>
