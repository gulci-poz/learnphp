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

$menu_name = "Today's Widget Trivia";
$position = (int) 5;
$visible = (int) 1;
// na wszelki wypadek, żeby nie umknął nam string

// nie robimy escape podwójnie
// zmienia nie tylko single quote
$menu_name = mysqli_real_escape_string($connection, $menu_name);

$query = "insert into ";
$query .= "subjects (";
$query .= "menu_name, position, visible";
$query .= ") values (";
$query .= "'{$menu_name}', {$position}, {$visible}";
$query .= ")";

$result = mysqli_query($connection, $query);

$id = mysqli_insert_id($connection);

if(!$result) {
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