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
                //"qty" => 2
            ], 
            [
                "name" => "banana que",
                "price" => 10,
                //"qty" => 1
            ], 
            [
                "name" => "siomai",
                "price" => 20,
                //"qty" => 3
            ]
        ];

        $drinks = [
            [
                "name" => "coke",
                "price" => 15,
                //"qty" => 1
            ], 
            [
                "name" => "orange juice",
                "price" => 10,
                //"qty" => 3
            ], 
            [
                "name" => "buko juice",
                "price" => 20,
                //"qty" => 2
            ]
        ];

        //$selected_food = "siomai";
        //$selected_drink = "coke";

        function calculate($price, $qty) {
            $product = $price * $qty;
            return $product;
        }

        //newly added code to get the values from the HTML form inputs
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

    <!-- newly added code converting the selected food and drinks to HTML inputs including the quantity from the array -->
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
                <?php //$food_total = calculate($food["price"], $food["qty"]) ?>
                <?php $food_total = calculate($food["price"], $food_qty) ?>
                <?= $food["name"] . " " . $food["price"] . " x " . $food_qty . " = " . $food_total ?>
            <?php endif ?>
        <?php endforeach ?>

        <br>

        <?php foreach($drinks as $drink) : ?>
            <?php if($selected_drink == $drink["name"]) : ?>
                <?php //$drink_total = calculate($drink["price"], $drink["qty"]) ?>
                <?php $drink_total = calculate($drink["price"], $drink_qty) ?>
                <?= $drink["name"] . " " . $drink["price"] . " x " . $drink_qty . " = " . $drink_total ?>
            <?php endif ?>
        <?php endforeach ?>

        <br>

        Grand Total <?= $food_total + $drink_total ?>
    <?php endif ?>
    
    <!--
    Using the previous code/lesson, convert the selected food and drinks to HTML inputs inlcuding the quantity from the array.
    1. Create a HTML form to accept food, food_qty, drink and drink_qty. This will replace the selected food and drinks including the quantity array.
    2. Submit the data with action="" by now, not using php processor separately.
    3. Convert the $selected_food and $selected_drink value to the HTML form input values of the selected orders.
    4. Create a new variable name $food_qty and $drink_qty to contain the values from the HTML input values of the quantities.
    5. Replace the values that using the quantity from the array ($food["qty"] and $drink["qty"]) with $food_qty and $drink_qty.
    6. Finally, enclose those undefined variables in a condition at runtime so they do not throw errors. For the sample above, i used different condition for demonstration.
    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>