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

$id = 7;

$query = "delete from ";
$query .= "subjects ";
$query .= "where id = {$id} ";
$query .= "limit 1";
// na wszelki wypadek zalecamy usunięcie tylko jednego wiersza

$result = mysqli_query($connection, $query);

if(!$result) {
    die('db query failed --- ' . mysqli_error($connection));
} else {
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

    // dla delete nie trzeba zwalniać zasobów, mamy zwrócone true/false

    ?>

    <body>

    </body>
</html>

<?php
    mysqli_close($connection);
?>