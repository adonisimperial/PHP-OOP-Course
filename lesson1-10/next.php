<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BilMart E-Commerce System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container py-5">
        <?php
            $products = [
                [
                    "name" => "Classic T-Shirt",
                    "price" => 350,
                    //"image" => "https://picsum.photos/seed/" . rand(1, 1000) . "/300",
                    "image" => "https://cdn.pixabay.com/photo/2025/05/20/10/57/t-shirt-9611374_1280.jpg",
                ],
                [
                    "name" => "Casual Sneakers",
                    "price" => 1200,
                    "image" => "https://cdn.pixabay.com/photo/2016/11/19/18/06/feet-1840619_1280.jpg",
                ],
                [
                    "name" => "Backpack",
                    "price" => 850,
                    "image" => "https://cdn.pixabay.com/photo/2016/11/22/19/25/man-1850181_1280.jpg",
                ],
                [
                    "name" => "Wrist Watch",
                    "price" => 950,
                    "image" => "https://cdn.pixabay.com/photo/2016/09/08/14/52/watch-1654550_1280.jpg",
                ],
            ];

            abstract class Calculator {
                private $price;
                private $quantity;

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
                    $product = $this->getPrice() * $this->getQuantity();
                    return $product;
                }
            }

            class MemberCheckout extends Calculator {
                function calculate() {
                    $product = $this->getPrice() * $this->getQuantity();
                    return $product - ($product * 0.20);
                }
            }

            $error = "";
            $total = null;
            $customer_name = "";
            $selected_product = "";
            $quantity = "";
            $price = null;
            $member_discount = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $customer_name = trim($_POST["customer_name"] ?? "");
                $selected_product = $_POST["product_name"] ?? "";
                $quantity = $_POST["quantity"] ?? "";
                $member_discount = isset($_POST["member_discount"]);

                if (isset($_POST["select_product"])) {
                    $selected_product = $_POST["product_name"] ?? "";
                }

                foreach ($products as $product) {
                    if ($product["name"] === $selected_product) {
                        $price = $product["price"];
                        break;
                    }
                }

                if (isset($_POST["submit"])) {
                    if (
                        empty($customer_name) ||
                        $price === null ||
                        $quantity === "" ||
                        !is_numeric($quantity) ||
                        $quantity <= 0 ||
                        (int) $quantity != $quantity
                    ) {
                        $error = "Please provide valid data!";
                    } else {
                        if ($member_discount) {
                            $checkout = new MemberCheckout();
                        } else {
                            $checkout = new Checkout();
                        }

                        $checkout->setPrice($price);
                        $checkout->setQuantity((int) $quantity);
                        $total = $checkout->calculate();
                    }
                }
            }
        ?>

        <h1 class="mb-2">BilMart E-Commerce System</h1>
        <p class="text-secondary mb-4">OOP Class Finals Activity.</p>

        <h2 class="mb-3">Product Catalog</h2>

        <div class="row g-4 mb-5">
            <?php foreach ($products as $product): ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img
                            src="<?= htmlspecialchars($product["image"]) ?>"
                            class="card-img-top"
                            alt="<?= htmlspecialchars($product["name"]) ?>"
                            style="height: 200px; object-fit: cover;"
                        >
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <?= htmlspecialchars($product["name"]) ?>
                            </h5>
                            <p class="card-text fw-bold">
                                ₱<?= number_format($product["price"], 2) ?>
                            </p>
                            <form action="" method="POST" class="mt-auto">
                                <input
                                    type="hidden"
                                    name="product_name"
                                    value="<?= htmlspecialchars($product["name"], ENT_QUOTES) ?>"
                                >
                                <button
                                    type="submit"
                                    name="select_product"
                                    class="btn btn-primary w-100"
                                >
                                    Select Product
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="mb-3">Checkout Form</h2>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Customer Name:</label>
                        <input
                            type="text"
                            id="customer_name"
                            name="customer_name"
                            class="form-control"
                            value="<?= htmlspecialchars($customer_name) ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="product_name" class="form-label">Selected Product:</label>
                        <input
                            type="text"
                            id="product_name"
                            class="form-control"
                            value="<?= htmlspecialchars($selected_product) ?>"
                            readonly
                        >
                        <input
                            type="hidden"
                            name="product_name"
                            value="<?= htmlspecialchars($selected_product, ENT_QUOTES) ?>"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input
                            type="text"
                            id="price"
                            class="form-control"
                            value="<?= $price !== null ? '₱' . number_format($price, 2) : '' ?>"
                            readonly
                        >
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            class="form-control"
                            min="1"
                            step="1"
                            value="<?= htmlspecialchars((string) $quantity) ?>"
                            required
                        >
                    </div>

                    <div class="form-check mb-3">
                        <input
                            type="checkbox"
                            id="member_discount"
                            name="member_discount"
                            class="form-check-input"
                            <?= $member_discount ? "checked" : "" ?>
                        >
                        <label for="member_discount" class="form-check-label">
                            Apply 20% Member Discount
                        </label>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success">
                        Checkout
                    </button>
                </form>
            </div>
        </div>

        <?php if ($error != ""): ?>
            <div class="alert alert-danger mt-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if ($total !== null): ?>
            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <h2>Checkout Result</h2>
                    <p class="mb-1">
                        Customer: <?= htmlspecialchars($customer_name) ?>
                    </p>
                    <p class="mb-1">
                        Product: <?= htmlspecialchars($selected_product) ?>
                    </p>
                    <p class="mb-1">
                        Price: ₱<?= number_format($price, 2) ?>
                    </p>
                    <p class="mb-1">
                        Quantity: <?= (int) $quantity ?>
                    </p>
                    <p class="mb-1">
                        Member Discount: <?= $member_discount ? "20%" : "None" ?>
                    </p>
                    <hr>
                    <p class="mb-1">Total Amount to Pay:</p>
                    <h3 class="text-success">
                        ₱<?= number_format($total, 2) ?>
                    </h3>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>