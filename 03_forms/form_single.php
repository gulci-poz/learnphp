<?php
require_once("included_header.php");

if(isset($_POST["submit"])) {

    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // nie przejdzie z "0" (is_numeric) lub " " (trim); lub po prostu $value === ""
    // uwaga na radio, checkbox, opcje

    // -> walidacja na żywo w JS (na leave field; user php + bufor)
    if($username == "gulci" && $password == "gulci") {
        redirect_to("welcome.php");
    } else {

        if (empty($username) && empty($password)) {
            $message = "Please enter your login and password.";
        } elseif (empty($username)) {
            $message = "Please enter your login.";
        } elseif (empty($password)) {
            $message = "Please enter your password.";
        } else {
            $message = "User not found.";
        }
    }

    // testowanie formatowania
    //preg_match("/PHP/", "PHP is fun.");

} else {
    $username = "";
    $password = "";
    $message = "Please enter your login and password.";
}
?>

<!doctype html>

<html>
    <head>
        <title>Form</title>
    </head>

    <body>

        <?php
        // w razie uwzględnienia w wiadomości danych z innych zmiennych,
        // które mogą się nie pojawić, lub danych z bazy
        // trzeba pamiętać o kodowaniu
        echo $message;
        ?>

        <br />

        <form action="form_single.php" method="post">
            Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" /><br />
            Password: <input type="password" name="password" value="" /><br />
            <br />
            <input type="submit" name="submit" value="Submit" />
        </form>

    </body>
</html>
