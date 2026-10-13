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
        abstract class Calculator {
            protected $price;
            protected $quantity;

            function getPrice() {
                return $this->price;
            }

            function setPrice($price) {
                $this->price = $price;
            }

            function getQuantity() {
                return $this->quantity;
            }

            function setQuantity($quantity) {
                $this->quantity = $quantity;
            }

            abstract function calculate();
        }

        class Checkout extends Calculator {
            function calculate() {
                $product = $this->price * $this->quantity;
                return $product;
            }
        }

        class MemberCheckout extends Calculator {
            function calculate() {
                $product = $this->price * $this->quantity;
                return $product - ($product * 0.20);
            }
        }

        $error = "";
        $total = null;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $customer_name = $_POST["customer_name"];
            $product_name = $_POST["product_name"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];

            if (empty($_POST["customer_name"]) || empty($_POST["product_name"]) || $_POST["price"] <= 0 || $_POST["quantity"] <= 0 ) {
                $error = "Please provide valid data!";
            } else {
                if (isset($_POST["member_discount"])) {
                    $checkout = new MemberCheckout();
                } else {
                    $checkout = new Checkout();
                }

                $checkout->setPrice($price);
                $checkout->setQuantity($quantity);
                $total = $checkout->calculate();
            }
        }
    ?>

    <h1>Imperial Mart E-Commerce System</h1>
    <h2>Checkout Form</h2>

    <form action="" method="POST">
        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name">
        <br><br>
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name">
        <br><br>
        <label for="price">Price:</label>
        <input type="number" name="price">        
        <br><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity">
        <br><br>
        <label>
            <input type="checkbox" name="member_discount">
            Apply 20% Member Discount
        </label>
        <br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>

    <?php if ($error != ""): ?>
        <h3><?= $error ?></h3>
    <?php endif; ?>

    <?php if ($total !== null): ?>
        <hr>
        <h2>Checkout Result</h2>
        <p>Total Amount to Pay:</p>
        <h3><?= $total ?></h3>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>