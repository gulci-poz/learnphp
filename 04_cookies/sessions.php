<?php

// za pomocą ciasteczka docieramy do sesji i ściągamy jej dane do $_SESSION
// w przypadku braku sesji, tworzona jest nowa - wszystko dzięki tej funkcji
// korzystamy z ciasteczek, więc również wszystko przed HTML
session_start();

?>

<!doctype html>

<html>
    <head>
        <title>Sessions</title>
    </head>

    <body>

    <?php

    // usunięcie pary klucz-wartość z sesji
    //$_SESSION["first_name"] = null;

    // efekt jest w jedym cyklu req/res, ponieważ mamy referencję i czytamy sesję
    $_SESSION["first_name"] = "Sebastian";
    $name = $_SESSION["first_name"];
    echo $name;

    ?>

    </body>
</html>
