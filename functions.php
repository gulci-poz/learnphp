<!doctype html>

<html>
    <head>

    </head>

    <body>

        <?php

        // te zmienne nie są widoczne wewnątrz deklaracji funkcji
        $separator = " ";
        $ending = "<br/>";
        $bar = "outside";

        //1 funkcje w PHP nie są case sensitive
        //2 funkcje można deklarować w kodzie po wywołaniu
        //  PHP robi preprocessing
        //3 nie można przedeklarować funkcji
        //4 można deklarować funkcje wewnątrz funkcji, if i pętli

        function say_hello() {
            echo "Hello World!" . "<br/>";
        }

        function say_hello_to($word) {
            echo "Hello, {$word}!<br/>";
        }

        function better_hello($greeting, $target, $punct) {
            return "{$greeting} {$target}{$punct}<br/>";
        }

        function add($val1, $val2) {
            $sum = $val1 + $val2;
            // natychmiastowe wyjście z funkcji,
            // również z wewnątrz struktur sterujących
            return $sum;
        }

        function chinese_zodiac($year) {
            switch(($year - 4) % 12) {
                case 0: return "Rat";
                case 1: return "Ox";
                case 2: return "Tiger";
                case 3: return "Rabbit";
                case 4: return "Dragon";
                case 5: return "Snake";
                case 6: return "Horse";
                case 7: return "Goat";
                case 8: return "Monkey";
                case 9: return "Rooster";
                case 10: return "Dog";
                case 11: return "Pig";
            }
        }

        function add_subt($val1, $val2) {
            $add = $val1 + $val2;
            $subt = $val1 - $val2;
            return array($add, $subt);
        }

        function bar_mod() {
            // możliwość modyfikowania zmiennej globalnej
            global $bar;
            $bar = "inside";
        }

        // najpierw wymagane argumenty, potem opcjonalne
        // inaczej nie da rady skorzystać z opcjonalnego argumentu
        // i zawsze trzeba będzie podać wszystkie
        function paint($room = "office", $color = "red") {
            echo "<pre>";
            var_dump(debug_backtrace());
            echo "</pre>";
            return "the room is: {$room}, the color is: {$color}<br/>";
        }

        say_hello();
        say_hello_to("gulci");
        echo better_hello("Cześć", "gulci", "!!!");
        // mamy wartość - null, dla ostatniego argumentu
        echo better_hello("Cześć", "gulci", null);
        $add_res = add(3, 4);
        echo $add_res . $ending;
        $zodiac = chinese_zodiac(2015);
        echo $zodiac . $ending;
        $add_subt_res = add_subt(10, 5);
        echo "add: {$add_subt_res[0]}, subt: {$add_subt_res[1]}{$ending}";
        list($add_pos, $subt_pos) = add_subt(20, 7);
        echo "add: {$add_pos}, subt: {$subt_pos}{$ending}";
        echo "bar before func: {$bar}{$ending}";
        bar_mod();
        echo "bar after func: {$bar}{$ending}";
        echo paint("bedroom", "blue");
        echo paint();
        // nie zostanie podstawiona domyślna wartość argumentu, wartość - null
        echo paint("kitchen", null);
        echo paint("kitchen");
        echo paint(null, "green");
        // tutaj nie da się pominąć pierwszego argumentu, żeby był domyślny

        // debug
        echo "<pre>";
        var_dump($add_subt_res);
        print_r(get_defined_vars());
        echo "</pre>";

        ?>

    </body>
</html>
