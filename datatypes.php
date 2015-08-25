<!doctype html>

<html>
    <head>

    </head>

    <body>

        <?php

        // zmienne są zapamiętywane między segmentami php
        $separator = " ";
        $ending = "<br/>";

        // variables
        $num1 = 10;
        echo "num1: " . $num1 . $ending;
        $num1 = 100;
        echo "num1 modified: " . $num1 . $ending;

        // strings
        echo "Hello World!" . $ending;
        $greeting = "Hello";
        $target = "World";
        $phrase = $greeting . $separator . $target;
        echo $phrase . $ending;
        echo "$phrase Again" . $ending;
        echo '$phrase Again' . $ending;
        echo "{$phrase}! Again" . $ending;

        // string functions
        $first = "The quick brown fox";
        $second = " jumped over the lazy dog.";
        $third = $first;
        $third .= $second;
        echo "strtolower: " . strtolower($third) . $ending;
        echo "strtoupper: " . strtoupper($third) . $ending;
        echo "ucfirst: " . ucfirst($third) . $ending;
        echo "ucwords: " . ucwords($third) . $ending;
        echo "strlen: " . strlen($third) . $ending;
        echo "trim: " . "A" . trim(" B C D ") . "E" . $ending;
        echo "strstr: " . strstr($third, "brown") . $ending;
        echo "str_replace: ";
        echo str_replace("quick", "super-fast", $third) . $ending;
        echo "str_repeat: " . str_repeat($third, 2) . $ending;
        echo "substr: " . substr($third, 5, 10) . $ending;
        echo "strpos: " . strpos($third, "brown") . $ending;
        echo "strchr: ". strchr($third, "z") . $ending;

        // integers
        $int1 = 10;
        $int2 = 20;
        echo abs(0 - 300) . $ending;
        echo pow(2, 8) . $ending;
        echo sqrt(100) . $ending;
        echo fmod(20, 7) . $ending;
        echo rand() . $ending;
        echo rand(1, 10) . $ending;
        $int1 += 5;
        echo $int1 . $ending;
        $int2++;
        echo $int2 . $ending;
        echo 1 + "2" . $ending;
        echo 1 + "2 houses" . $ending;

        // floats
        $float = 3.14;
        echo $float . $ending;
        echo ($float + 7) . $ending;
        echo (4 / 3) . $ending;
        echo round($float, 1) . $ending;
        echo ceil($float) . $ending;
        echo floor($float) . $ending;
        echo is_int($int1) . $ending;
        echo is_int($float) . $ending;
        echo is_float($int1) . $ending;
        echo is_float($float) . $ending;
        echo is_numeric($int1) . $ending;
        echo is_numeric($float) . $ending;

        // arrays
        $numbers = array(2, 4, 8, 16, 32, 64, 128, 256, 512, 1024);
        echo $numbers[1] . $ending;
        $mixed = array(6, "fox", "dog", array("x", "y", "z"));
        echo $mixed[2] . $ending;
        echo $mixed[3][1] . $ending;
        $mixed[2] = "cat";
        $mixed[4] = "mouse";
        $mixed[] = "parrot";
        echo "<pre>";
        echo print_r($mixed[3]);
        echo "</pre>";
        echo "<pre>";
        echo print_r($mixed);
        echo "</pre>";
        // PHP 5.4, skrócona notacja
        $new_array = [5, 10, 15];

        // associative arrays (object indexed, label indexed), key-value pair
        $assoc = array("first_name" => "Sebastian", "last_name" => "Gulczynski");
        echo $assoc["first_name"] . $separator . $assoc["last_name"] . $ending;
        $assoc["first_name"] = "Sebastian Jacek";
        echo $assoc["first_name"] . $ending;
        $numbers_assoc = array(0 => 2, 1 => 4, 20 => 8, 3 => 16);
        echo $numbers_assoc[20] . $ending;
        $assoc["city"] = "Poznan";
        echo $assoc["city"] . $ending;
        echo "<pre>";
        echo print_r($assoc);
        echo "</pre>";

        ?>

    </body>
</html>
