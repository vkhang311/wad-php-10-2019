<?php
    function testNumber($n){
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
    testNumber($number);
?>