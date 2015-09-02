<!doctype html>

<html>
    <head>
        <title>OOP Basics</title>
    </head>

    <body>

    <?php
    // są też zmienne, stałe i inne, w klasie i poza klasą
    //print_r(get_defined_functions());

    class Person {
        var $first_name;
        var $last_name;

        var $arm_count = 2;
        var $leg_count = 2;

        function say_hello() {
            // $this to referencja do bieżącej instancji
            echo "Hello from " . get_class($this) . " class!" . "<br />";
        }

        function hello() {
            $this->say_hello();
        }

        function full_name() {
            return $this->first_name . " " . $this->last_name;
        }
    }

    $classes = get_declared_classes();
    // klasy użytkownika są na końcu tablicy
    echo $classes[count($classes) - 1] . "<br />";
    /*
    foreach($classes as $class) {
        echo $class . "<br />";
    }
    */

    if(class_exists("Person")) {
        echo "class Person defined" . "<br />";
    } else {
        echo "class Person not defined" . "<br />";
    }

    if(class_exists("Animal")) {
        echo "class Animal defined" . "<br />";
    } else {
        echo "class Animal not defined" . "<br />";
    }

    $methods = get_class_methods('Person');
    foreach($methods as $method) {
        echo $method . "<br />";
    }

    if(method_exists("Person", "say_hello")) {
        echo "say_hello method exists" . "<br />";
    } else {
        echo "say_hello method doesn't exist" . "<br />";
    }

    $person = new Person();
    $person2 = new Person();
    echo "class: " . get_class($person) . "<br />";

    if(is_a($person, "Person")) {
        echo "this is a Person object" . "<br />";
    } else {
        echo "not a Person object" . "<br />";
    }

    $person->say_hello();

    // domyślnie w PHP jest przekazywana referencja do obiektu, można dodać &
    $customer = $person;

    $customer->say_hello();
    $customer->hello();

    // bez $
    echo "arm_count: " . $person->arm_count . "<br />";

    $person->arm_count = 3;
    $person->first_name = "Sebastian";

    echo $customer->arm_count . "<br />";
    echo $customer->first_name . "<br />";

    $person->last_name = "Gulczynski";
    echo $person->full_name() . "<br />";

    echo "<pre>";
    print_r(get_class_vars("Person"));
    echo "</pre>";

    echo "property exists: " . property_exists("Person", "first_name") ? "true" : "false" . "<br />";
    ?>

    </body>
</html>