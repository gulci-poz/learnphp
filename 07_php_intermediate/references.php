<!doctype html>

<html>
    <head>
        <title>References</title>
    </head>

    <body>

    <?php
    $a = 1;
    $b = $a;
    $b = 2;
    echo "a: " . $a . ", b: " . $b . "<br />";

    // referencja do miejsca w pamięci
    $c = 1;
    $d =& $c;
    $d = 2;
    echo "c: " . $c . ", d: " . $d . "<br />";

    unset($d);
    echo "c: " . $c . ", d: " . $d . "<br />";

    $num = 10;

    // przekazywanie argumentu - referencji do zmiennej
    // jest to bardziej eleganckie podejście od zmiennej globalnej
    // jesteśmy uniezależnieni od nazwy zmiennej globalnej
    function mult_ref(&$multnum) {
        $multnum *= 2;
    }

    mult_ref($num);
    echo "num: " . $num . "<br />";

    // funkcja zwraca referencję
    // wolę przekazywanie przez referencję niż zmienną globalną
    function &return_ref(&$refnum) {
        $refnum += 5;
        return $refnum;
    }

    // żeby zapisać tę referencję trzeba i tutaj użyć &
    $numret =& return_ref($num);
    echo "num: " . $num . "<br />";
    echo "numret: " . $numret . "<br />";
    $num = 50;
    echo "num=50: " . $num . "<br />";
    echo "numret=50: " . $numret . "<br />";

    // dzięki temu możemy dowolnie manipulować zmienną wewnątrz funkcji
    function &incr_static() {
        static $incr = 0;
        $incr += 1;
        return $incr;
    }

    $incrstat =& incr_static();
    incr_static();
    incr_static();
    echo "incrstat: " . $incrstat . "<br />";
    $incrstat = 50;
    incr_static();
    incr_static();
    incr_static();
    echo "incrstat: " . $incrstat . "<br />";
    ?>

    </body>
</html>
