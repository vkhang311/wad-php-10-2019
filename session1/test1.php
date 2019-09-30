<?php  echo "hello khang";  ?>
<h1>Hello HTML</h1>
echo "Hello";
<?php
// bien trong php
    $myClass ="WAP PHP";
    echo $myClass;

// các phép toán cơ bản + ; - ; * ; / ; %
    $numberOne = 7;
    $numberTwo = 8;
    echo "<br>";
    echo $numberOne + $numberTwo;
// ham trong php
    function myFunction(){
        echo "test function";
    }
    echo "<br>";
    myFunction();
    function myFunction1(){
        $a = 5;
        $b = 3;
        return $a + $b;
    }
    echo myFunction1();
    echo "<br>";
    function myFunction2($x, $y){
        return $x - $y;
    }
    echo myFunction2(5,4);
?>