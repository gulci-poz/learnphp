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

        // array functions
        $rand_numbers = array(32, 8, 16, 64, 512, 2, 128, 1024, 4, 256);
        echo count($rand_numbers) . $ending;
        echo max($rand_numbers) . $ending;
        echo min($rand_numbers) . $ending;
        // sort i rsort dokonują zmiany na tabeli
        echo "<pre>";
        sort($rand_numbers);
        print_r($rand_numbers);
        rsort($rand_numbers);
        print_r($rand_numbers);
        echo "</pre>";
        $rand_numbers_str = implode(" * ", $rand_numbers);
        echo $rand_numbers_str . $ending;
        echo gettype($rand_numbers_str) . $ending;
        $array_back = explode(" * ", $rand_numbers_str);
        print_r($array_back);
        echo $ending;
        echo in_array(13, $array_back) . $ending;
        echo in_array(8, $array_back) . $ending;
        print_r(array_keys($assoc));
        print_r(array_values($assoc));
        echo $ending;
        // w takiej kolejności będą dodane na początku/końcu
        array_push($array_back, 2048, 2048, 4096);
        array_unshift($array_back, 8192, 16384);
        print_r($array_back);
        echo $ending;
        array_pop($array_back);
        array_shift($array_back);
        print_r($array_back);
        echo $ending;
        // array_unique nie modyfikuje tabeli
        print_r(array_unique($array_back));
        echo $ending;
        echo array_search(128, $array_back) . $ending;
        echo array_rand($array_back) . $ending;

        // booleans, wartość true/false lub TRUE/FALSE
        $res_true = true;
        $res_false = false;
        echo "true: " . $res_true . $ending;
        echo "false: " . $res_false . $ending;
        echo "is_bool: " . is_bool($res_true) . $ending;
        if(is_float($float)) {
            echo "There's a float." . $ending;
        }

        ?>

    </body>
</html>
