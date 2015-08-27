<?php
    // require()
    // bez załadowania pliku strona nie będzie się dalej ładowała

    // include_once(), trzyma tablicę z pozycjami include; przydatne dla funkcji,
    // może być tylko jedna deklaracja

    // require_once()

    include("included_functions.php");

    // może być też plik html
    include("included_header.php");
?>

<div>The header has been included.</div><br/>

<?php
    echo hello("gulci") . "<br/>";
?>

    </body>
</html>
