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
                "qty" => 2
            ], 
            [
                "name" => "banana que",
                "price" => 10,
                "qty" => 1
            ], 
            [
                "name" => "siomai",
                "price" => 20,
                "qty" => 3
            ]
        ];

        $drinks = [
            [
                "name" => "coke",
                "price" => 15,
                "qty" => 1
            ], 
            [
                "name" => "orange juice",
                "price" => 10,
                "qty" => 3
            ], 
            [
                "name" => "buko juice",
                "price" => 20,
                "qty" => 2
            ]
        ];

        $selected_food = "siomai";
        $selected_drink = "coke";

        function calculate($price, $qty) {
            $product = $price * $qty;
            return $product;
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

    <?php foreach($foods as $food) : ?>
        <?php if($selected_food == $food["name"]) : ?>
            <?php $food_total = calculate($food["price"], $food["qty"]) ?>
            <?= $food["name"] . " " . $food["price"] . " x " . $food["qty"] . " = " . $food_total ?>
        <?php endif ?>
    <?php endforeach ?>

    <br>

    <?php foreach($drinks as $drink) : ?>
        <?php if($selected_drink == $drink["name"]) : ?>
            <?php $drink_total = calculate($drink["price"], $drink["qty"]) ?>
            <?= $drink["name"] . " " . $drink["price"] . " x " . $drink["qty"] . " = " . $drink_total ?>
        <?php endif ?>
    <?php endforeach ?>

    <br>

    Grand Total <?= $food_total + $drink_total ?>
    <!--
    Using the previous code/lesson, convert calculations to a function
    1. Create a function that accepts the salary and hour. Note that this is a named funtion for a while.
    2. Transfer or apply the calculation into the created function.
    3. Return the result of the calculation.
    4. Call the function to display the result. Note that this will also refactor the code inside the control structure including the <li> display content.
    5. Convert the name function to an anonymous function or lambda. This may also converted to a fully string interpolation coz the named function could be integrated directly within the string using interpolation.
    6. Convert lambda to arrow function.
    
    IMPORTANT:
    The term "Lambda" wasn't introduced as one of the name of anonymous function during the last lesson. Now is the time to mention it.
    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>