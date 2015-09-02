<!doctype html>

<html>
    <head>
        <title>Server Supervar</title>
    </head>

    <body>

    <?php
    echo $_SERVER["SERVER_NAME"] . "<br />";
    echo $_SERVER["SERVER_ADDR"] . "<br />";
    echo $_SERVER["SERVER_PORT"] . "<br />";
    echo $_SERVER["DOCUMENT_ROOT"] . "<br />";
    echo $_SERVER["PHP_SELF"] . "<br />";
    echo $_SERVER["SCRIPT_FILENAME"] . "<br />";

    echo "<hr />";

    //dane żądania
    echo $_SERVER["REMOTE_ADDR"] . "<br />";
    echo $_SERVER["REMOTE_PORT"] . "<br />";
    echo $_SERVER["REQUEST_URI"] . "<br />";
    echo $_SERVER["QUERY_STRING"] . "<br />";
    echo $_SERVER["REQUEST_METHOD"] . "<br />";
    echo $_SERVER["REQUEST_TIME"] . "<br />";
    echo $_SERVER["HTTP_REFERER"] . "<br />";
    echo $_SERVER["HTTP_USER_AGENT"] . "<br />";

    // istnieje też zmienne superglobal $_REQUEST
    // zawiera to co $_GET i $_POST, nie używać
    ?>

    </body>
</html>
