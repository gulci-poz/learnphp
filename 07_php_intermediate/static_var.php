<!doctype html>

<html>
    <head>
        <title>Static Variable</title>
    </head>

    <body>

    <?php
    // wartość zmiennej statycznej jest zapamiętywana między wywołaniami funkcji
    function incr() {
        static $count = 0;
        $count += 1;
        echo $count . "<br />";
    }

    incr();
    incr();
    incr();
    ?>

    </body>
</html>
