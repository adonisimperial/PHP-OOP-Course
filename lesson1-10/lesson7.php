<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <?php
        // FLUENT SETTER VS IMMUTABLE OBJECT
        class Person {
            public $name;
            public $age;

            function returnThis() { // fluent setter
                return $this;
            }

            function copyThis() {   // immutable object or the copy
                return new Person();
            }

            function calculate() {
                $product = $this->age * 2;
                return $product;
            }
        }

        $x = new Person();
        $x->name = "Vangie";
        $x->age = 2;

        print_r($x->returnThis());
        echo "<br>";
        print_r($x->returnThis()->calculate());
        echo "<br>";

        print_r($x->copyThis());    // the copy
        echo "<br>";
        print_r($x);    // the one being copied
        echo "<br>";
        print_r($x->copyThis()->age = 3); // edit the copy
        echo "<br>";
        print_r($x->age); // age of the original class was not overwritten

        
        // SETTERS & GETTERS VS DOMAIN METHOD
        class Student1 {
            private $name;   // made private just to be accessed by methods

            function setName($name) {
                $this->name = $name;    // set or assign the value
            }

            function getName() {
                return $this->name; // get or return the value
            }
        }

        class Student2 {
            function showName($name) {   // specifically for getting or displaying name
                return $name;
            }

            function greetName($name) { // separating logic for greeting name
                return "Hello" . $name;
            }
        }

        $y = new Student1();
        //$y->name = "Jes";   // error coz it is now private; use methods to append or access it
        $y->setName("Jes");    // used setter to append
        echo "<br>";
        echo $y->getName();  // used getter to access

        $y = new Student2();
        echo "<br>";
        echo $y->showName("Ped"); 
        echo "<br>";
        echo $y->greetName("Ped");

        // CONSTRUCTOR
        class Constructor {
            public $name;

            function __construct($name) {   // enforced once here
                $this->name = $name;
            }

            function getName() {
                return $this->name;
            }
        }

        $z = new Constructor("Ivan");   // assigned at the moment of creation; not every single time on the method calling
        echo "<br>";
        echo $z->getName();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>