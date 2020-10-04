<?php 
// The strict declaration forces things to be used in the intended way.
//declare(strict_types=1); // strict requirement 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>First PHP Program</title>

    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />

    <!--
      Always put in header
      For ajax and jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="css_prac1.css" type="text/css" rel="stylesheet" media="screen" />

    <!-- Bootstrap CSS (Latest compiled and minified CSS)-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/7516c4b4cc.js" crossorigin="anonymous"></script>

    <!-- 
    ################## 
            CSS  
    ###################  
    -->
    <style rel="stylesheet">
    .aaa1 {
        background-color: green !important;
    }

    .footer1 {
        position: fixed !important;
        bottom: 0;
        width: 100%;
    }
    </style>

</head>

<body class="ml_2 mr_2 mb_2 mt_2">

    <header>
        <?php // include_once("header.php"); ?>
    </header>

    <h1 class="centre b7">PHP PRACTICE</h1>



    <?php 
    
    ////////////////////////////////////////////////////////
    // DATA TYPES
    ////////////////////////////////////////////////////////


    // define(name, value, case-insensitive)
    define("NAME", "Ahsan Ghaffar!"); // case insensitive is optional. Default is false
    $int1 = 2**3;
    $float1=2.43;
    $string1 = "Hello ahsan.";
    $boolean1 = true;
    $null1 = null;
    $array1 = array('Bill', 'Mary', 'Mike', 'Chris', 'Anne');
    $multi_array1 = array(array('1', '2', '3'),
                            array('4', '5', '6'),
                            array('7', '8', '9'));


    
    ////////////////////////////////////////////////////////
    // ECHO 
    ////////////////////////////////////////////////////////

    echo "<h2 class='b6 mt_2 size32'><u> ECHO </u></h2>";

    // Different ways of writing echo statements
    echo "Hello world<br/><br/>";

    // echo "My Friend Name is ",$array[1];

    for($i=0; $i<sizeof($array1); $i++){  
        echo "My Friend Name is ",$array1[$i] , " |-| ";
    }

    echo "<br/><br/>";

    for($i=0; $i<3; $i++){  
        for($j=0; $j<3 ; $j++){
            
        echo "My Friend Name is ", $multi_array1[$i][$j] , " |-| ";
        }
    }

    echo " <br/><br/>Today is " . date("l") . ". <br/><br/>";
    
    // we can concatinate multiple variables or strings using , or .
    echo $int1 , " + " , $float1 , "<br/>";
    echo $int1 . " + " . $float1 . "<br/>";
    echo "$int1 +  $float1 <br/>";
    echo $int1 +  $float1." <br/>";



    ////////////////////////////////////////////////////////
    // VARIABLE SCOPES
    ////////////////////////////////////////////////////////

    echo "<h2 class='b6 mt_2 mb_0 size32'><u> VARIABLE SCOPE </u></h2>";

    /*
    PHP has three different variable scopes:
        local
        global
        static
    */

    $x = 5; // global scope
    $z = 6; // global scope
    
    function myTest() {
        $y = 4; // local scope

        // now we'll use a global varible z inside function:
        global $z;
        $z=66;
     
        echo "Variable x inside function: $x";// using x outside function will generate error
        echo "<br/>Variable y inside function: $y";
        echo "<br/>Variable z inside function: $z";
    } 

    myTest();

    echo "<br/>Variable x outside function: $x";
    echo "Variable y outside function: $y";// using y outside function will generate error
    echo "<br/>Variable z outside function: $z";



    ////////////////////////////////////////////////////////
    // STRING FUNCTIONS
    ////////////////////////////////////////////////////////

    echo "<h2 class='b6 mt_2 size32'><u> STRING FUNCTIONS </u></h2>";


    $str0= "Hello ahsan bhai.";
    $str1= strlen($str0);
    $str2= str_word_count($str0);
    $str3= strrev($str0);
    $str4= strpos($str0 , "bhai");
    $str5= str_replace("bhai", "Brother", $str0);
    $str6= "142"; //The is_numeric() returns true if the variable is a number or a numeric string, false otherwise.
    $float2 = 4.23;
    $int2= 3;

    echo "<b>strlen()</b> function return the length of string ";
    echo "<br/>String length of str0 is: $str1";

    echo "<br/><br/><b>str_word_count()</b> function return the number of words present in a string ";
    echo "<br> Total words in str0 is: $str2";

    echo "<br/><br/><b>strrev()</b> function reverse the string";
    echo "<br> The reverse of str0 is: $str3";

    echo "<br/><br/><b>strpos()</b> function find the position of a word in a string ";
    echo "<br> The position of 'bhai' in str0 is: $str4";

    echo "<br/><br/><b>str_replace()</b> function replace the  ";
    echo "<br> The replacement of 'bhai' in str0 is: $str5";

    echo "<br/><br/><b>is_numeric()</b> function return the length of string ";
    echo "<br> The str6 variable is numeric? ", var_dump(is_numeric($str6));

    echo "<br/><br/><b>strlen()</b> function return the length of string ";
    echo "<br> sum of string numeric and numeric value is: ",$str6+$int2; 

    echo "<br/><br/><b>TypeCasting</b>";
    echo "<br/><img src='PHP_Importants/typecast.PNG' />";
    echo "<br> Convert string numeric to int: ", (int)$str6; 
    echo "<br> Convert float to int: ", (int)$float2; 
   

    
    ////////////////////////////////////////////////////////
    // MATH FUNCTIONS
    ////////////////////////////////////////////////////////

    $int3= -54;
    $array2= array(150, 20, -8, -200);
    $min_func= min($array2);
    $max_func= max($array2);
    $abs_func= abs($int3);
    $sqrt_func= sqrt(4);
    $round_func= round(0.49);

    echo "<h2 class='b6 mt_2 size32'><u> MATH FUNCTIONS </u></h2>";

    echo "<b>pi()</b> function: ", pi();
    
    echo "<br/><br/> <b>min()</b> function return lowest value from array: ";
    echo "<br/> Lowest value in array(150, 20, -8, -200) is: ", $min_func; 
    
    echo "<br/><br/><b>max()</b> function return highest value from array: $max_func";
    echo "<br/> Highest value in array(150, 20, -8, -200) is: $max_func";

    echo "<br/><br/><b>abs()</b> function return absolute(positive) value of a number: ";
    echo "<br/>Absolute value of $int3 is: $abs_func";

    echo "<br/><br/><b>sqrt()</b> function return square root of a number: ";
    echo "<br/>SquareRoot value of 4 is: $sqrt_func";

    echo "<br/><br/><b>round()</b> function rounds a floating-point number to its nearest integer: ";
    echo "<br/>Round value of 0.49 is: $round_func";

    echo "<br/><br/><b>rand()</b> function generates a random number";
    echo "<br/>Random number: ", rand();
    echo "<br/>We can also add limit: ", rand(10, 100);


    
    ////////////////////////////////////////////////////////
    // PHP OPERATORS (Arthimetic | Assignment | Comparison | Increment/Decrement | Logical | String | Array | Conditional Assignment)
    ////////////////////////////////////////////////////////

    
    echo "<h2 class='b6 mt_2 size32'><a href='https://www.w3schools.com/php/php_operators.asp'><u> PHP OPERATORS </u></a></h2>";

    echo 
    '
    <ul class="ml_1">
        <li>
            <h2 class="size22 b6 cl_b mt_2 mb_0 "> Arithmentic Operators </h2>
            <br /><img src="PHP_Importants/arithmetic_operator.PNG">
        </li>
        <li>
            <h2 class="size22 b6 cl_b mt_2 mb_0 "> Assignment Operators </h2>
            <br /><img src="PHP_Importants/assignment_operator.PNG">
        </li>
        <li>
            <h2 class="size22 b6 cl_b mt_2 mb_0 "> Comparison Operators </h2>
            <br /><img src="PHP_Importants/comparison_operator.PNG">
        </li>
        <li>
            <h2 class="size22 b6 cl_b mt_2 mb_0 "> Increment/Decrement Operators </h2>
            <br /><img src="PHP_Importants/increment_decrement_operator.PNG">
        </li>
        <li>
            <h2 class="size22 b6 cl_b mt_2 mb_0 "> Logical Operators </h2>
            <br /><img src="PHP_Importants/logical_operator.PNG">
        </li>
        <li>
            <h2 class="size22 b6 cl_b mt_2 mb_0 "> String Operators </h2>
            <br /><img src="PHP_Importants/string_operator.PNG">
        </li>
        <li>
            <h2 class="size22 b6 cl_b mt_2 mb_0 "> Array Operators </h2>
            <br /><img src="PHP_Importants/array_operator.PNG">
        </li>
        <li>
            <h2 class="size22 b6 cl_b mt_2 mb_0 "> Conditional Assignment Operators </h2>
            <br /><img src="PHP_Importants/conditional_assignment_operator.PNG">
        </li>
    </ul>
    ';

        ////////////////////////////////////////////////////////
    // LOOPS
    ////////////////////////////////////////////////////////


    echo "<h2 class='b6 mt_2 size32'><u> LOOPS </u></h2>";

    echo '<h2 class="size22 b6 cl_b mt_2 mb_0 "> Advance For Loop </h2>';


    for ($i = 0, $j = 0 ; $i + $j < 10 ; $i++ , $j++)
    {
        echo "i=$i and j=$j <br/>";
    }

    
    
    echo '<h2 class="size22 b6 cl_b mt_2 mb_0 "> Foreach Loop </h2>';

    $array3 = array(125, 43, 65, 10);

    $key_value_array = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

    $multi_array2 = array( array('1', '2', '3'),
                            array('4', '5', '6','22'),
                            array('7', '8', '9'));


    echo "value of array3 is: <br/>";
    foreach ($array3 as $i){
        echo "| $i |";
    }

    echo "<br/><br/>value of key_value_array is: <br/>";
    foreach($key_value_array as $x => $val) {
        echo "|  $x = $val  |";
    }

    echo "<br/><br/>value of multi_array2 is: <br/>";
    foreach ($multi_array2 as $i){
        foreach($i as $j){
            echo "| $j |";
        }
    }




    ////////////////////////////////////////////////////////
    // FUNCTIONS
    ////////////////////////////////////////////////////////


    echo "<h2 class='b6 mt_2 size32'><u> FUNCTIONS </u></h2>";




    // agr arguments ke saath koi datatype use nhi krenge to iska mtlb input ke tor pr kch 
    // bhi de skte he
    function printNumber($a) {
        return $a;
    }
    echo addNumbers(2), "<br/><br/>";




    // PHP is a Loosely Typed Language
    // agr arguments ke saath uski datatype bhi initialize krenge to iska mtlb input ke 
    // tor pr jo hm data provide krenge use php pehle typecast kregi or agr typecast nhi 
    // hoska to error show kregi
    function addNumbers(int $a, int $b=20) {
        return $a + $b;
    }
    // since strict is NOT enabled string "5" is changed to int(5), and it will return 10
    echo printNumber(2.65), "<br/>";
    echo addNumbers(5, "10"), "<br/><br/>";




    // hm function ki return type bhi define krskte he:
    function return_float(float $a, float $b) : float {
        return $a/$b;
    }
    echo return_float(2.3, 1), "<br/><br/>";




    // In PHP, arguments are usually passed by value, which means that a copy of the value is 
    // used in the function and the variable that was passed into the function can't be changed.
    
    // When a function argument is passed by reference, changes to the argument also change the 
    // variable that was passed in. 
    function add_five(&$value) {
        $value += 2;
        return $value;
    }

    $num = 2;
    echo add_five($num), "<br/>";
    echo $num, "<br/>";




    


    ////////////////////////////////////////////////////////
    // ARRAYS
    ////////////////////////////////////////////////////////


    echo "<h2 class='b6 mt_2 size32'><u> ARRAYS </u></h2>";



    $array3 = array(125, 43, 65, 10);

    $key_value_array = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

    $multi_array2 = array( array('1', '2', '3'),
                            array('4', '5', '6','22'),
                            array('7', '8', '9'));


                            
    // Find length of array
    count($array3);

    // Find length of multidimensional array

    $c1=0;
    foreach($multi_array2 as $s)// 1st way 
        $c1+=count($s);

    $c2 = sizeof($multi_array2,1) - sizeof($multi_array2); // 2nd way

    

    echo "value of array3 is: <br/>";
    foreach ($array3 as $i){
        echo "| $i |";
    }

    echo "<br/><br/>value of key_value_array is: <br/>";
    foreach($key_value_array as $x => $val) {
        echo "|  $x = $val  |";
    }

    echo "<br/><br/>value of multi_array2 is: <br/>";
    foreach ($multi_array2 as $i){
        foreach($i as $j){
            echo "| $j |";
        }
    }


    
    echo "<br/><br/><b>sort()</b> function sort arrays in ascending order";
    echo "<br/> After Sorting, array(125, 43, 65, 10) become:: ";
    sort($array3);
    foreach ($array3 as $i){
        echo " $i, ";
    }


    echo "<br/><br/><b>rsort()</b> function sort arrays in descending  order";
    echo "<br/> After Sorting, array(125, 43, 65, 10) become:: ";
    rsort($array3);
    foreach ($array3 as $i){
        echo " $i, ";
    }


    echo "<br/><br/><b>rsort()</b> function sort arrays in descending  order";



    ?>













    <footer>
        <?php // include_once("footer.php"); ?>
    </footer>


    <!-- After Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>


    <!-- 
    ################## 
        JAVASCRIPT 
    ###################  
    -->
    <script type="text/javascript">
    // document.write("<br/>Today is " + Date());
    </script>


</body>

</html>