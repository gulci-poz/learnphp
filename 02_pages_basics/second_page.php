<!doctype html>

<html>
    <head>
        <title>Second Page</title>
    </head>

    <body>

        <?php

        $ending = "<br/>";

        echo "<pre>";
        print_r($_GET);
        echo "</pre>";

        $id = $_GET["id"];
        echo $id . $ending;
        $user = $_GET["user"];
        echo $user . $ending;
        $company = $_GET["company"];
        echo $company . $ending;

        ?>

    </body>
</html>
