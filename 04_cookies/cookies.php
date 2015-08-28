<?php

// ustawianie cisteczek musi być przed HTML - jest w nagłówku
$name = "test";
$value = 51015;
$expire = time() + (60 * 60 * 24 * 7);
//setcookie($name, $value, $expire);

// usunięcie ciasteczka, nie za pomocą unset (usuniemy tylko z poprzedniego request)
//setcookie($name, null);
//setcookie($name);
//setcookie($name, $value, (time() - 3600));

?>

<!doctype html>

<html>
    <head>
        <title>Cookies</title>
    </head>

    <body>

    <?php
    /*
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>"
    */

    // odebranie ciasteczka - nie ma synchronizacji z kodem powyżej (ustawianie ciasteczka)
    $test = isset($_COOKIE["test"]) ? $_COOKIE["test"] : "no test cookie";
    echo $test;
    ?>

    </body>
</html>
