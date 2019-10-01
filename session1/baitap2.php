<?php
    function testNumber1($n){
        if($n == 2){
            echo "Monday";
        } else if($n==3){
            echo "Tuesday";
        } else if($n==4){
            echo "Wednesday";
        } else if($n==5){
            echo "Thursday";
        } else if($n==6){
            echo "Friday";
        } else if($n==7){
            echo "Saturday";
        } else if($n==8){
            echo "Sunday";
        } else echo "number is invalid";
    }
    function testNumber2($n){
        switch ($n){
            case 2 : echo "Monday";
                break;
            case 3 : echo "Tuesday";
                break;
            case 4 : echo "Wednesday";
                break;
            case 5 : echo "Thursday";
                break;
            case 6 : echo "Friday";
                break;
            case 7 : echo "Saturday";
                break;
            case 8 : echo "Sunday";
                break;
            default : echo "Number is invalid";
        }
    }
    $number = 6;
    testNumber1($number);
    echo "<br>";
    testNumber2($number);
?>

