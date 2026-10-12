<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <!-- ADDITION OF DISCOUNT FEATURES AND ABSTRACTION -->
    <?php
        $foods = [
            [
                "name" => "turon",
                "price" => 10,
            ], 
            [
                "name" => "banana que",
                "price" => 10,
            ], 
            [
                "name" => "siomai",
                "price" => 20,
            ]
        ];

        $drinks = [
            [
                "name" => "coke",
                "price" => 15,
            ], 
            [
                "name" => "orange juice",
                "price" => 10,
            ], 
            [
                "name" => "buko juice",
                "price" => 20,
            ]
        ];

        // Converted the class Calculator into an abstract class to implement abstration
        abstract class Calculator {
            private $price;
            private $qty;

            function getPrice() {
                return $this->price;
            }

            function setPrice($price) {
                $this->price = $price;
            }

            function getQty() {
                return $this->qty;
            }

            function setQty($qty) {
                $this->qty = $qty;
            }

            abstract function calculate();   // converted function calculate into an abstrac method  
            /*{
                $product = $this->price * $this->qty;
                return $product;
            }*/
        }

        // Created a RegularCalculator class that extends the abstract class
        class RegularCalculator extends Calculator {
            function calculate() {
                $product = $this->getPrice() * $this->getQty();
                return $product;
            }
        }

        // Added the DiscountCalculator class that extends the abstract class
        class DiscountCalculator extends Calculator {
            function calculate() {
                $product = $this->getPrice() * $this->getQty();
                return $product - ($product * 0.20);
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selected_food = $_POST["food"];
            $food_qty = $_POST["food_qty"];

            $selected_drink = $_POST["drink"];
            $drink_qty = $_POST["drink_qty"];
        }
    ?>

    <h1>Order Management System</h1>
    <h2>Menu</h2>

    <h3>Foods</h3>
    <ol>
        <?php foreach($foods as $food) : ?>
            <li><?= $food["name"] . " " . $food["price"] ?></li>
        <?php endforeach ?>
    </ol>

    <h3>Drinks</h3>
    <ol>
        <?php foreach($drinks as $drink) : ?>
            <li><?= $drink["name"] . " " . $drink["price"]?></li>
        <?php endforeach ?>
    </ol>

    <h3>Order</h3>

    <form action="" method="POST">
        <label for="food">Food:</label>
        <select name="food" required>
            <option value="">Select food</option>
            <option value="turon">turon</option>
            <option value="banana que">banana que</option>
            <option value="siomai">siomai</option>
        </select>

        <label for="food_qty">Quantity:</label>
        <input type="number" name="food_qty" required>

        <label for="drink">Drinks:</label>
        <select name="drink" required>
            <option value="">Select drink</option>
            <option value="coke">coke</option>
            <option value="orange juice">orange juice</option>
            <option value="buko juice">buko juice</option>
        </select>

        <label for="drink_qty">Quantity:</label>
        <input type="number" name="drink_qty" required>

        <!-- Added checkbox for discount feature - SAME WITH LESSON 8 and 9 -->
        <label>
            <input type="checkbox" name="discounted" value="yes">
            20% discount
        </label>

        <button type="submit" name="submit">Submit</button>
    </form>
    <br>

    <?php if (isset($_POST["submit"])) : ?>
        <h3>Order Summary</h3>
        <?php foreach($foods as $food) : ?>
            <?php if($selected_food == $food["name"]) : ?>
                <?php
                    //$food_product = new Calculator(); // commented SAME WITH LESSON 8 and 9
                    if (isset($_POST["discounted"])) {
                        $food_product = new DiscountCalculator();
                    } else {
                        $food_product = new RegularCalculator();
                    }

                    $food_product->setPrice($food["price"]);
                    $food_product->setQty($food_qty);
                    $food_total = $food_product->calculate();
                ?>
                <?= $food["name"] . " " . $food_product->getPrice() . " x " . $food_product->getQty() . " = " . $food_total ?>
            <?php endif ?>
        <?php endforeach ?>

        <br>

        <?php foreach($drinks as $drink) : ?>
            <?php if($selected_drink == $drink["name"]) : ?>
                <?php
                    //$drink_product = new Calculator();    // commented SAME WITH LESSON 8 and 9
                    if (isset($_POST["discounted"])) {
                        $drink_product = new DiscountCalculator();
                    } else {
                        $drink_product = new RegularCalculator();
                    }

                    $drink_product->setPrice($drink["price"]);
                    $drink_product->setQty($drink_qty);
                    $drink_total = $drink_product->calculate(); 
                ?>
                <?= $drink["name"] . " " . $drink_product->getPrice() . " x " . $drink_product->getQty() . " = " . $drink_total ?>
            <?php endif ?>
        <?php endforeach ?>

        <br>

        Grand Total <?= $food_total + $drink_total ?>
    <?php endif ?>
    
    <!--
    Using the previous code/lesson, convert basic OOP a getter and setter methods.
    1. Using your code from lesson 7, add a checkbox to the order form labeled “20% discount”.
    2. Convert the Calculator class into an abstract class.
    3. Keep the shared properties, getters, and setters in the abstract class.
    4. Declare calculate() as an abstract method.
    5. Create a RegularCalculator class and a DiscountCalculator class that extend the abstract Calculator class. Implement calculate() in each class for regular and discounted calculations, respectively.
    6. If the checkbox is checked, create a DiscountCalculator object. If unchecked, create a RegularCalculator object.

    Note:
    In adding a discount feature, students must use either inheritance, polymorphism or abstraction based on their report (or by draw lots).
    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>