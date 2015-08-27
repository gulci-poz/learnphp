<!doctype html>

<html>
    <head>
        <title>HTML Encoding</title>
    </head>

    <body>

        <?php
        // dotyczy tylko znaków <>&"
        $link_text = "<Click> & learn more";
        $link_text_sp = htmlspecialchars($link_text);

        //htmlspecialchars_decode()

        // dotyczy też znaków, które mają odpowiedniki w HTML
        echo htmlentities("$<>") . "<br/>";

        //html_entity_decode()
        ?>

        <a href=""><?php echo $link_text_sp; ?></a><br/>

        <?php
        $url_page = "first_page.php";
        $param1 = "Tekst z <>";
        $param2 = "&#?*$[]+ ciekawe znaki";
        $linktext = "<Click> & learn more";

        $url = "http://localhost:63342/learnphp/";
        $url .= rawurlencode($url_page);
        $url .= "?" . "param1=" . urlencode($param1);
        $url .= "&" . "param2=" . urlencode($param2);
        ?>

        <a href="<?php echo htmlspecialchars($url); ?>">
            <?php echo htmlspecialchars($linktext); ?>
        </a>

    </body>
</html>
