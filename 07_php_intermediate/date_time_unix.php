<!doctype html>

<html>
    <head>
        <title>Date Time Unix</title>
    </head>

    <body>

    <?php
    // ilość sekund od północy 01.01.1970 - epoka Unix
    echo "time: " . time() . "<br />";

    // zwraca parę msec sec
    // ilość mikrosekund, które minęły od sec w postaci sekund
    // jest to string
    echo "microtime: " . microtime() . "<br />";

    // może zwracać float, z argumentem true
    // w sekundach, od epoki, z dokładnością do najbliższej mikrosekundy
    echo "microtime true: " . microtime(true) . "<br />";

    // godziny, minuty, sekundy, miesiąc, dzień, rok
    // jeśli invalid - będzie false
    echo "mktime: " . mktime(8, 19, 29, 9, 2, 2015) . "<br />";

    echo "checkdate: ";
    echo checkdate(1, 6, 1984) ? "true" : "false";
    echo "<br />";

    echo "strtotime now : " . strtotime("now") . "<br />";
    echo "strtotime 2 September 2015: " . strtotime("2 September 2015") . "<br />";
    echo "strtotime September 2, 2015: " . strtotime("September 2, 2015") . "<br />";
    echo "strtotime +1 day: " . strtotime("+1 day") . "<br />";
    echo "strtotime last Monday: " . strtotime("last Monday") . "<br />";

    echo "date year: " . date('Y') . "<br />";

    echo strftime("%d") . "<br />";
    // %D to samo co %m/%d/%y
    echo strftime("%D") . "<br />";
    echo strftime("birth %D", mktime(16, 0, 0, 1, 6, 1984)) . "<br />";

    function strip_zeros_from_date($marked_string = "") {
        $no_zeros = str_replace("*0", "", $marked_string);
        $cleaned_string = str_replace("*", "", $no_zeros);
        return $cleaned_string;
    }

    $birth = strftime("birth *%m/*%d/%y", mktime(16, 0, 0, 1, 6, 1984));
    echo strftime("birth *%m/*%d/%y", mktime(16, 0, 0, 1, 6, 1984)) . "<br />";
    echo strip_zeros_from_date($birth) . "<br />";

    // %Y pełny rok
    echo "for MySQL: " . strftime("%Y-%m-%d %H:%M:%S", time()) . "<br />";
    ?>

    </body>
</html>
