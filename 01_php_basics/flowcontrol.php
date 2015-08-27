<!doctype html>

<html>
    <head>

    </head>

    <body>

        <?php

        $separator = " ";
        $ending = "<br/>";

        // if, else, elseif
        $a = 10;
        $b = 5;
        if($a > $b) {
            echo "a is larger than b" . $ending;
        }
        elseif($a < $b) {
            echo "b is larger than a" . $ending;
        }
        else {
            echo "a equals b" . $ending;
        }

        $new_user = true;
        if($new_user) {
            echo "<h1>Welcome!</h1>";
            echo "<p>Welcome back.</p>";
        }

        $numerator = 20;
        $denominator = 4;
        // na wszelki wypadek, żeby $result nie była unset
        $result = 0;
        if($denominator > 0) {
            $result = $numerator / $denominator;
        }
        // jeśli deklaracja będzie w if, to i tak będziemy widzieli $result poza if
        echo "Result : {$result}{$ending}";

        // comparison and logical operators
        $num1 = 4;
        $num2 = 3;
        $num3 = 20;
        $num4 = 5;
        if(($num1 > $num2) && ($num3 > $num4)) {
            echo "a is greater than b and c is greater than d" . $ending;
        }

        if(!isset($e)) {
            $e = 200;
        }
        echo "e: " . $e . $ending;

        $quantity = "2";
        // bez deklaracji pokaże notice
        if(empty($quantity) && !is_numeric($quantity)) {
            echo "enter a quantity" . $ending;
        }
        // jeśli dochodzimy tutaj, to znaczy, że zmienna nie może być pusta
        // is_numeric konwertuje liczbę w stringu do int
        // ale robi to chyba w dość restrykcyjny sposób
        elseif(is_numeric($quantity)) {
            echo "quantity: " . $quantity . $ending;
            echo "is_numeric: " . is_numeric($quantity) . $ending;
        }

        // switch
        $contact = "phone";
        switch($contact) {
            case "email":
                echo "email" . $ending;
                break;
            // kilka naraz; nie potrzeba {}
            case "phone":
            case "mobile":
                echo "phone" . $ending;
                echo "or mobile phone" . $ending;
                break;
            default:
                echo "no contact" . $ending;
                // i tak dalej już nic się nie sprawdzi
                break;
        }

        // while
        $whiler = 0;
        while($whiler < 10) {
            echo "whiler run: " . ($whiler + 1) . $ending;
            $whiler++;
        }

        // for
        for($forer = 0; $forer < 10; $forer++) {
            echo "forer run: " . ($forer + 1) . $ending;
        }

        // foreach + continue + break (też dla while)
        // continue(1), break(1) - ilość pętli, z których wyskakujemy, domyślnie 1
        $classroom = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];
        foreach($classroom as $pupil) {
            if($pupil % 2 == 0) {
                continue;
            }
            if($pupil > 10) {
                break;
            }
            echo "pupil no: " . $pupil . $ending;
        }

        $user = ["firstname" => "sebastian",
            "lastname" => "gulczynski",
            "city" => "poznan"];
        foreach($user as $key => $value) {
            echo $key . $separator . $value . $ending;
        }

        // array pointers
        // current item, default - 1, w pętli wskaźnik się przesuwa
        $ages = array(5, 10, 15, 27, 56, 89);
        echo "current 1: " . current($ages) . $ending;
        next($ages);
        echo "current 2: " . current($ages) . $ending;
        next($ages);
        echo "current 3: " . current($ages) . $ending;
        prev($ages);
        echo "current 4 prev: " . current($ages) . $ending;
        reset($ages);
        echo "current 5 reset: " . current($ages) . $ending;
        end($ages);
        echo "current 6 end: " . current($ages) . $ending;
        next($ages);
        echo "current 7 next after end: " . current($ages) . $ending;

        reset($ages);

        // testujemy powodzenie przypisania, w końcu wyjdzie null czyli false
        while($age = current($ages)) {
            echo $age . $separator;
            next($ages);
        }

        ?>

    </body>
</html>
