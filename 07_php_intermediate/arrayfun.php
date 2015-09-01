<!doctype html>

<html>
    <head>
        <title>Array Functions</title>
    </head>

    <body>

    <?php
    $numbers = [1, 2, 3, 4, 5, 6];

    // zdejmuje pierwszy element
    $a = array_shift($numbers);
    echo $a . "<br />";

    // dodaje element na początku tablicy, zwraca ilość el. w tablicy
    $b = array_unshift($numbers, 1);
    echo $b . "<br />";
    echo $numbers[0] . "<br />";

    // zdejmuje element z końca tablicy
    $c = array_pop($numbers);
    echo $c . "<br />";
    echo count($numbers) . "<br />";

    // dodaje element na końcu tablicy, zwraca ilość el. w tablicy
    $d = array_push($numbers, 7);
    echo $d . "<br />";
    echo $numbers[count($numbers) - 1] . "<br />";

    $assoc = ["first_name" => "sebastian",
        "last_name" => "gulczynski",
        "city" => "poznan"];
    $assoc_flip = array_flip($assoc);
    echo "<pre>";
    print_r($assoc);
    print_r($assoc_flip);
    echo "<pre />";
    ?>

    </body>
</html>
