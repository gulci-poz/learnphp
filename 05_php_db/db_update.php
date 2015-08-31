<?php

$dbhost = 'localhost';
$dbuser = 'widget_cms';
$dbpass = 'widget_cms';
$dbname = 'widget_corp';
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()) {
    die('db connection failed: ' . mysqli_connect_error() . ' (' . mysqli_connect_errno() . ')');
} else {
    echo 'connected to ' . $dbname . '<br />';
}

$id = 2000;
$menu_name = 'Contact';
$position = 4;
$visible = 1;

$query = "update ";
$query .= "subjects ";
$query .= "set ";
$query .= "menu_name = '{$menu_name}', ";
$query .= "position = {$position}, ";
$query .= "visible = {$visible} ";
$query .= "where id = {$id}";

$result = mysqli_query($connection, $query);

// może być poprawne zapytanie, które przy update i delete nic nie zmienia, i tu jest true

if(!$result) {
    die('db query failed --- ' . mysqli_error($connection));
} else {
    // -1 - jeśli będzie błąd
    // 0 - jeśli będą takie same wartości
    // 0 - poprawne zapytanie, ale nie ma zmian w bazie
    echo 'rows affected: ' . mysqli_affected_rows($connection) . '<br />';
    echo 'query ok --- ' . $query . '<hr />';
}

?>

<!doctype html>

<html>
    <head>
        <title>dbs in php</title>
    </head>

    <?php

    // dla update nie trzeba zwalniać zasobów, mamy zwrócone true/false

    ?>

    <body>

    </body>
</html>

<?php
    mysqli_close($connection);
?>