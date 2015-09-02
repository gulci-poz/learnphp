<!doctype html>

<html>
    <head>
        <title>OOP Practice</title>
    </head>

    <body>

    <?php
    class Car {
        var $wheels = 4;
        var $doors = 4;

        function wheelsdoors() {
            return $this->wheels + $this->doors;
        }
    }

    class CompactCar extends Car {
        var $doors = 2;
    }

    $car1 = new Car();
    $car2 = new CompactCar();

    echo $car1->wheels . "<br />";
    echo $car1->doors . "<br />";
    echo $car1->wheelsdoors() . "<br />";

    echo $car2->wheels . "<br />";
    echo $car2->doors . "<br />";
    echo $car2->wheelsdoors() . "<br />";

    echo "car parent: " . get_parent_class("Car") . "<br />";
    echo "compact car parent: " . get_parent_class("CompactCar") . "<br />";
    echo "subclass: " . is_subclass_of("CompactCar", "Car") . "<br />";

    class Example {
        public $a = 1;
        protected $b = 2;
        private $c = 3;

        // dzięki tej funkcji mam dostęp do wartości pola private w subklasie
        function show_abc() {
            echo $this->a . "<br />";
            echo $this->b . "<br />";
            echo $this->c . "<br />";
        }

        function get_b() {
            return $this->b;
        }

        function set_b($value) {
            $this->b = $value;
        }

        function get_c() {
            return $this->c;
        }

        function set_c($value) {
            $this->c = $value;
        }

        public function hello_everyone() {
            return "everyone" . "<br />";
        }

        protected function hello_family() {
            return "family" . "<br />";
        }

        private function hello_me() {
            return "me" . "<br />";
        }

        // dzięki tej funkcji mam dostęp do wartości funkcji protected w subklasie
        // przy override już nie mam dostępu
        function hello() {
            $output = $this->hello_everyone();
            $output .= $this->hello_family();
            $output .= $this->hello_me();
            return $output;
        }
    }

    $example = new Example();
    echo "public a: " . $example->a . "<br />";
    $example->show_abc();
    echo $example->hello_everyone();
    echo $example->hello();

    class Detail extends Example {
        // mam dostęp do public i protected
        function test() {
            // dostęp do zmiennej protected
            $this->b = 10;
            // wykonanie funkcji protected
            $this->hello_family();
        }
    }

    $detail = new Detail();
    echo "public a: " . $detail->a . "<br />";
    $detail->show_abc();
    echo $detail->hello_everyone();
    echo $detail->hello();
    $detail->set_b(20);
    $detail->set_c(30);
    echo $detail->get_b() . "<br />";
    echo $detail->get_c() . "<br />";

    // kiedy jest statyczna klasa?
    class Student {
        static $total_students = 0;
        var $eval = 10;

        // nie możemy używać $this w statycznych metodach
        static function add_student() {
            Student::$total_students += 1;
        }

        // można też używać normalncyh funkcji i $this dla normalnych pól
        // można skorzystać ze statycznych pól
        // wszystko zależy od kontekstu
        function show_eval() {
            echo "count: "
                . Student::$total_students
                . ", eval: "
                . $this->eval
                . "<br />";
        }

        static function welcome_students($var = "Hello") {
            return "{$var} students.";
        }
    }

    // $ jest w drugiej części, odwrotnie do normalnej klasy
    // mamy zmienną w scope klasy, stąd $
    echo Student::$total_students . "<br />";
    // tutaj bez $
    echo Student::welcome_students() . "<br />";

    $student = new Student();
    // możemy używać statycznych metod w kontekście instancji
    $student->add_student();
    Student::add_student();
    $student->show_eval();

    // zmienne i metody statyczne są dziedziczone
    class One {
        static $foo;
    }

    class Two extends One {};
    class Three extends One {};

    One::$foo = 1;
    Two::$foo = 2;
    Three::$foo = 3;
    // wszędzie będzie 3, ponieważ mamy referencję do jednego konkretnego miejsca
    // i kolejne klasy trzymają tę referencję
    echo One::$foo . "<br />";
    echo Two::$foo . "<br />";
    echo Three::$foo . "<br />";

    // można mieszać statyczne i niestatyczne w jednej klasie
    // statyczne mogą pomóc w ogarnięciu ogółu wspólnego dla wszystkich instancji
    // dla static klasa jest zakresem (scope)

    // scope resolution operator, Paamayim Nekudotayim, One Doubled Dot Doubled
    // dwukropek po hebrajsku
    ?>

    </body>
</html>