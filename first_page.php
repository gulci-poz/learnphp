<!doctype html>

<html>
    <head>
        <title>First Page</title>
    </head>

    <body>

        <?php

        $link_name = "Second Page";
        $id = 2;
        $user = rawurlencode("gość");
        $company_name = rawurlencode("Johnson & Johnson");

        // urlencode(), rawurlencode(), urldecode() - funkcje tylko dla GET

        // spacja + urlencode()
        // wszystkie niealfanumeryczne z wyjątkiem -_. są zastąpione %dd hex

        // spacja %20 rawurlencode()
        // wszystkie niealfanumeryczne z wyjątkiem -_.~ są zastąpione %dd hex
        // ~ od PHP 5.3.0, wcześniej była kodowana

        // rawurlencode() dla ścieżki (Apache potrzebuje %20 dla spacji) czyli do ?
        // zapytanie może być urlencode(), niby + dla spacji jest lepszy
        // rawurlencode() jest lepszy pod względem kompatybilności; jest nowszy

        // parametry idą do tablicy asoc. - jedna z super global variables
        // zmienne super global są dostępne w każdym scope

        echo "<a href=\"second_page.php?id={$id}&user={$user}&company={$company_name}\">
            {$link_name}<a/>";

        ?>

        <!--

        <a href="second_page.php?id=<?php echo $id; ?>"><?php echo $link_name; ?></a>

        -->

    </body>
</html>
