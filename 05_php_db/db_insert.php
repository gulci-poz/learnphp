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

$menu_name = 'Test';
$position = 5;
$visible = 1;

$query = "insert into ";
$query .= "subjects (";
$query .= "menu_name, position, visible";
$query .= ") values (";
$query .= "'{$menu_name}', {$position}, {$visible}";
$query .= ")";

// teraz mamy true/false
$result = mysqli_query($connection, $query);

// id ostatniego rekordu wstawionego w tym połączeniu
$id = mysqli_insert_id($connection);

if(!$result) {
    // ostatni błąd jaki się pojawił
    die('db query failed --- ' . mysqli_error($connection));
} else {
    echo 'query ok --- ' . 'id: ' . $id . ' --- ' . $query . '<hr />';
}

?>

<!doctype html>

<html>
    <head>
        <title>dbs in php</title>
    </head>

    <?php

    // dla insert nie trzeba zwalniać zasobów, mamy zwrócone true/false

    ?>

    <body>

    </body>
</html>

<?php
    mysqli_close($connection);
?>