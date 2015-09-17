<?php
// jeśli istnieje sesja (a powinna istnieć), to zostanie ona odczytana i zapisana w $_SESSION
session_start();

function message() {
    if(isset($_SESSION["message"])) {
        $output = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";

        // inaczej będzie nam się w kółko wyświetlać ta sama wiadomość
        $_SESSION["message"] = null;

        return $output;
    }
}
?>