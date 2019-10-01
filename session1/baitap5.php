<?php
    function baitap5(){
        $b = 27;
        $m = $b/3;
        for($n=0; $n<27; $n++){
            $b = $b - $n;
            $m = $m + $n;
            if($b == (2*$m)) {
                echo "So sach phai chia la " . ($n + 1);
            }
        }
    }
    echo baitap5();
?>