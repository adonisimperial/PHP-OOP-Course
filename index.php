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
        // ==========================================
        // TASK 1: Project and HMTL Template Creation
        // ==========================================

        // ==========================================
        // TASK 2: The Shopping Cart Matrix
        // ==========================================
        $shopping_carts = [
            [
                "name" => "Wireless Mouse", 
                "price" => 750, 
                "quantity" => 2
            ],
            [
                "name" => "Mechanical Keyboard",
                "price" => 2500,
                "quantity" => 1
            ],
            [
                "name" => "USB-C Hub",
                "price" => 1200,
                "quantity" => 3]
        ];

        // ==========================================
        // TASK 3: Calculation Function
        // ==========================================
        function calculateTotal($shopping_cart) {
            $total = $shopping_cart["price"] * $shopping_cart["quantity"];
            return $total;
        }

        // BONUS
        $total_quantity = 0;
        $grand_total = 0;

        foreach($arrays as $array) {
            // Your code here
        }
    ?>

    <h1>Automated E-Commerce Invoice Engine</h1>

    <!-- TASK 4: Loop Iteration & Output -->
    <h2>Customer Shopping Receipt</h2>
    <hr>
    
    <ul>
        <?php foreach($shopping_carts as $shopping_cart): ?>
            <li>
                <strong><?= $shopping_cart['name']; ?></strong> <br>
                Rate: PHP <?= $shopping_cart['price']; ?> x <?= $shopping_cart['quantity']; ?> pcs <br>
                Subtotal: PHP <?= calculateTotal($shopping_cart) ?>
            </li>
            <br>

            <!-- BONUS -->
            <?php
                $total_quantity += $shopping_cart['quantity'];
                $grand_total += calculateTotal($shopping_cart); 
            ?>
        <?php endforeach; ?>
    </ul>
    <hr>

    <!-- BONUS -->
    <h3>Order Summary:</h3>

    Total Items: <?= $total_quantity ?> <br>
    Grand Total: <?= $grand_total ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>