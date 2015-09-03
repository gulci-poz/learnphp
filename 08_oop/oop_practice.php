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

    class Two extends One {}
    class Three extends One {}

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

    class A {
        static $a = 1;

        static function modified_a() {
            // self wskazuje na klasę ($this na instancję, i to dla niestatycznych pól)
            // to samo co
            //return A::$a + 10;
            return self::$a + 10;
        }

        function hello() {
            return "hello";
        }
    }

    class B extends A {
        static function attr_test() {
            // A::$a
            // B::$a
            // też będzie działać, jest dziedziczenie, a ponadto
            // statyczność sprawia, że referencja jest taka sama
            return parent::$a;
        }

        static function method_test() {
            return parent::modified_a();
        }

        function instance_test() {
            return $this->hello();
            // parent:: będzie działał z dynamiczną metodą, nie z dyn. atrybutem
            //return parent::hello();
        }

        function hello() {
            return parent::hello();
        }
    }

    // w przypadku dynamicznych pól również można używać parent
    // tylko z metodami

    echo "a: " . B::$a . "<br />";
    echo "modified a: " . B::modified_a() . "<br />";

    echo "attr_test: " . B::attr_test() . "<br />";
    echo "method_test: " . B::method_test() . "<br />";

    $newB = new B();
    echo "this->, wywołanie z B: " . $newB->instance_test() . "<br />";
    echo "parent::, wywołanie z A: " . $newB->hello() . "<br />";

    class Furniture {
        function __construct() {

        }
    }

    class Table extends Furniture {
        public $legs;
        static public $total_tables = 0;

        // można przekazywać argumenty
        function __construct($leg_count = 4) {
            $this->legs = $leg_count;
            Table::$total_tables += 1;
            // można wywołać konstruktor rodzica
            parent::__construct();
        }

        // destruktor nie jest konieczny
        // klasa istnieje na czas request, potem PHP ją usuwa
        // przydaje się przy ręcznym usuwaniu instancji
        function __destruct() {
            Table::$total_tables -= 1;
        }
    }

    $table = new Table();
    echo "table: " . $table->legs . "<br />";
    echo "total tables: " . $table::$total_tables . "<br />";
    echo "total tables stat: " . Table::$total_tables . "<br />";
    // dla metody działało
    //echo "total tables: " . $table->total_tables . "<br />";

    // przekazujemy argument do konstruktora
    $t2 = new Table(6);
    echo "legs: " . $t2->legs . "<br />";
    echo "total tables stat: " . Table::$total_tables . "<br />";

    class Beverage {
        public $name;

        function __construct() {
            echo "new beverage __construct" . "<br />";
        }

        // konstruktor dla sklonowanego obiektu
        function __clone() {
            echo "cloned beverage __clone" . "<br />";
        }
    }

    $bev1 = new Beverage();
    $bev1->name = "coffee";
    $bev2 = $bev1;
    $bev2->name = "tea";
    echo "bev1: " . $bev1->name . "<br />";

    $bev3 = clone $bev1;
    $bev3->name = "juice";
    echo "bev3: " . $bev3->name . "<br />";
    echo "bev1: " . $bev1->name . "<br />";

    $b1 = new Beverage();
    $b2 = $b1;
    $b3 = clone $b1;
    $b4 = clone $b3;
    $b4->name = "milk";
    $b5 = new Beverage();

    echo ($b1 == $b2 ? 'true' : 'false') . "<br />"; // true
    echo ($b1 == $b3 ? 'true' : 'false') . "<br />"; // true
    echo ($b1 == $b4 ? 'true' : 'false') . "<br />"; // zmieniony klon, false
    echo ($b1 == $b5 ? 'true' : 'false') . "<br />"; // true
    echo "<hr />";
    echo ($b1 === $b2 ? 'true' : 'false') . "<br />"; // referencja, true
    echo ($b1 === $b3 ? 'true' : 'false') . "<br />"; // false
    echo ($b1 === $b4 ? 'true' : 'false') . "<br />"; // false
    echo ($b1 === $b5 ? 'true' : 'false') . "<br />"; // flase
    ?>

    </body>
</html>