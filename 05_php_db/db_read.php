<?php

$dbhost = 'localhost';
$dbuser = 'widget_cms';
$dbpass = 'widget_cms';
$dbname = 'widget_corp';
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// 0 - jeśli nie ma błędów
if(mysqli_connect_errno()) {
    // mysqli_connect_error - pusty string jeśli nie ma błędów
    die('db connection failed: ' . mysqli_connect_error() . ' (' . mysqli_connect_errno() . ')');
} else {
    echo 'connected to ' . $dbname . '<br />';
}

$query = 'select * ';
$query .= 'from subjects';

// resource - collection of sql rows, MySQL result set
$result = mysqli_query($connection, $query);

// wyłapujemy error zapytania, a nie brak rezultatu
if(!$result) {
    die('db query failed');
} else {
    echo 'query ok --- ' . $query . '<hr />';
}

?>

<!doctype html>

<html>
    <head>
        <title>dbs in php</title>
    </head>

    <?php

    // pracujemy ze strukturą MySQL ($result), funkcja automatycznie inkrementuje
    // nie możemy użyć foreach
    while($row = mysqli_fetch_row($result)) {


        //var_dump($row);

        //echo row['id'] . '<br />';
        //echo row['menu_name'] . '<br />';
        //echo row['position'] . '<br />';
        //echo row['visible'] . '<br />';

        echo '<ul>';

        // tutaj możemy już użyć foreach, bo mamy tablicę PHP
        foreach($row as $field) {
            echo '<li>' . $field . '</li>';
        }

        echo '</ul>';

        echo '<hr />';
    }

    // mysqli_fetch_row, kluczami są kolejne liczny całkowite
    // mysqli_fetch_assoc, kluczami są nazwy kolumn
    // mysqli_fetch_array, tablica z dwoma rodzajami kluczy,
    // dodatkowy argument: MYSQL_NUM, MYSQL_ASSOC, MYSQL_BOTH
    // te argumenty są deprecated
    // mysqli_fetch_object

    mysqli_free_result($result);

    ?>

    <body>

    </body>
</html>

<?php
    mysqli_close($connection);
?>