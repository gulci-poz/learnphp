<!doctype html>

<html>
    <head>
        <title>Variable variables</title>
    </head>

    <body>

    <?php
    $a = "Kevin";
    $b = "Mary";
    $c = "Joe";
    $d = "Larry";
    $e = "Audrey";

    $students = ["a", "c", "e"];

    foreach($students as $seat) {
        echo $$seat . "<br />";
    }

    $temp = "students";

    echo "1 " . $$students[1] . "<br />";
    echo "2 " . ${$students[1]} . "<br />";
    echo "3 " . ${$students}[1] . "<br />";
    echo "4 " . ${$temp}[1] . "<br />";
    echo "5 " . ${${$temp}[1]} . "<br />";

    echo "<a href=\"server_supervar.php?id=1\">Server Supervar</a>";
    ?>

    </body>
</html>
