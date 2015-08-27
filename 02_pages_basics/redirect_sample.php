<?php
    // "HTTP 1.1/ 302 Found" jest domyślnie dopisany,
    // PHP domyśla się, że chcemy przekierować
    header("Location: first_page.php");

    // więcej danych już nie chcemy ładować, np. z pliku HTML
    exit;
?>