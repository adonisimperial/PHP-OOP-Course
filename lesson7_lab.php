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

        class Calculator {
            private $price;  // changed from public to private
            private $qty;   // changed from public to private

            // Used setters and getters to access the private properties
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

            function calculate() {
                $product = $this->price * $this->qty;
                return $product;
            }
            
            /*
            NOTE:
            We just use simple setters and getters to cleanly show the conversion of the visibility of the properties to private.
            One benefit of this getters and setters is for us to validate data or format prices later on.
            */
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

        <button type="submit" name="submit">Submit</button>
    </form>
    <br>

    <?php if (isset($_POST["submit"])) : ?>
        <h3>Order Summary</h3>
        <?php foreach($foods as $food) : ?>
            <?php if($selected_food == $food["name"]) : ?>
                <?php
                    $food_product = new Calculator();
                    //$food_product->price = $food["price"];
                    $food_product->setPrice($food["price"]);
                    //$food_product->qty = $food_qty;
                    $food_product->setQty($food_qty);
                    $food_total = $food_product->calculate();
                ?>
                <?= $food["name"] . " " . $food["price"] . " x " . $food_qty . " = " . $food_total ?>
            <?php endif ?>
        <?php endforeach ?>

        <br>

        <?php foreach($drinks as $drink) : ?>
            <?php if($selected_drink == $drink["name"]) : ?>
                <?php
                    $drink_product = new Calculator();
                    //$drink_product->price = $drink["price"];
                    $drink_product->setPrice($drink["price"]);
                    //$drink_product->qty = $drink_qty;
                    $drink_product->setQty($drink_qty);
                    $drink_total = $drink_product->calculate(); 
                ?>
                <?= $drink["name"] . " " . $drink["price"] . " x " . $drink_qty . " = " . $drink_total ?>
            <?php endif ?>
        <?php endforeach ?>

        <br>

        Grand Total <?= $food_total + $drink_total ?>
    <?php endif ?>
    
    <!--
    Using the previous code/lesson, convert basic OOP a getter and setter methods.
    1. Using your code from lesson 6, basic class to an encapsulated class.
    2. Change the visibility of all class properties ($price and $qty) from public to private.
    3. Create explicit, individual getter and setter methods for each private property (price and qty).
    4. Adjust/update the internal logic of your methods or even properties as necessary depending on the approach you applied (no such adjustment for the technique used except the property and the getter/setter).
    5. Adjust/update also the instantiation, constructor injection, parameter passing (argument) or object calling affected by the changes/conversion depending in the approach or technique you used.
    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>