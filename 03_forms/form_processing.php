<!doctype html>

<html>
    <head>
        <title>Form Processing</title>
    </head>

    <body>

        <?php
        // nie musimy się przejmować kodowaniem znaków,
        // ponieważ nie wysyłamy url string - jak w GET

        // uwaga na zawartość akcji, ona może być potrzebna
        // do dynamicznego przetwarzania, trzeba zadbać o kodowanie


        // robimy sprawdzanie, na wypadek bezpośredniego uruchomienia strony,
        // bez danych z formularza
        // można obsłużyć równocześnie GET i POST

        // w wartości pola formularza zawsze będzie string

        if(isset($_POST["submit"])) {
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            echo "<br />";

            /*
            if(isset($_POST["username"])) {
                $username = $_POST["username"];
            } else {
                $username = "username";
            }

            if(isset($_POST["password"])) {
                $password = $_POST["password"];
            } else {
                $password = "password";
            }
            */

            $username = isset($_POST["username"]) ? $_POST["username"] : "username";
            $password = isset($_POST["password"]) ? $_POST["password"] : "password";

            echo "{$username}: {$password}";
        } else {
            echo "Please enter your login and password" . "<br />";
            echo "<a href=\"form.php\">Login</a>";
        }
        ?>

    </body>
</html>
