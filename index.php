<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
</head>
<body style="margin: 20px 50px;">
    <?php
        $products = [
            [
                "name" => "Laptop",
                "price" => 60000,
                "photo" => "https://picsum.photos/seed/" . rand(1, 1000) . "/300"
            ],
            [
                "name" => "iPad",
                "price" => 50000,
                "photo" => "https://picsum.photos/seed/" . rand(1, 1000) . "/300"
            ],
            [
                "name" => "Cellphone",
                "price" => 20000,
                "photo" => "https://picsum.photos/seed/" . rand(1, 1000) . "/300"
            ],
            [
                "name" => "Digital Watch",
                "price" => 15000,
                "photo" => "https://picsum.photos/seed/" . rand(1, 1000) . "/300"
            ]
        ];

        class calculator {
            private $price;
            private $quantity;

            function getPrice() {
                $this->price;
            }

            function setPrice($price) {
                $this->price = $price;
            }

            function getQuantity() {
                $this->quantity;
            }

            function setQuantity($quantity) {
                $this->quantity = $quantity;
            }

            function calculate() {
                $product = $this->price * $this->quantity;
                return $product;
            }
        }

        $quantity = 0;
        $error = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $product_name = $_POST["product_name"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];
            //echo $product_name; // you can test first if it will run or each submit button on the cards work.
            //echo $price;
            //echo $quantity;

            if ($quantity > 0) {
                //$total = $price * $quantity;
                $calculator = new Calculator();
                $calculator->setPrice($price);
                $calculator->setQuantity($quantity);
            } else {
                $error = "Please enter a quantity in you order.";
            }
        }
    ?>
    
    <h1>OOP Mart E-commerce</h1>
    <p>Welcome to our online store!</p>

    <?php if ($error != null): ?>
        <div class="alert theme-danger" role="alert">
            <p><?= $error ?></p>
        </div>
    <?php endif ?>

    <h2>Top Products</h2>
    <div class="row">
        <?php foreach($products as $key => $product) : ?>
            <div class="col-3 mb-7">
                <section class="card" style="max-width: 400px"> <!-- change 320 to 400px -->
                <img src="<?= $product["photo"] ?>" class="card-img-top " alt="..." style="height: 200px; object-fit: cover;">  <!-- addt this to the bootstrap form style="height: 200px; object-fit: cover;" to reshape the photo -->
                <div class="card-body">
                    <h4 class="card-title"><?= $product["name"] ?></h4>
                    <p class="card-text">₱<?= number_format($product["price"], 2) ?></p>
                    
                    <!-- Copy a modal or dialog from Bootstrap but look for a dialog without Javascript -->
                    <button type="button" class="btn-solid theme-primary" commandfor="invokerDialog<?= $key ?>" command="show-modal">
                        Select Order
                    </button>
                    <dialog class="dialog" id="invokerDialog<?= $key ?>">
                        <div class="dialog-header">
                            <h1 class="dialog-title">Checkout Form</h1>
                            <button type="button" class="btn-close" commandfor="invokerDialog<?= $key ?>" command="close" aria-label="Close"></button>
                        </div>                        
                            
                        <form action="" method="POST">
                            <div class="dialog-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="<?= $product["photo"] ?>" class="img-thumbnail" alt="<?= $product["name"] ?>">
                                    </div>
                                    <div class="col-8">
                                        <h2><?= $product["name"] ?></h2>
                                        <h4>₱<?= number_format($product["price"], 2) ?></h4>
                                        <div>
                                            <!-- Add a hidden input box here to store reference data like the product name and price. For bigger project use identifiers like id or product_id. -->
                                            <input type="text" name="product_name" value="<?= $product["name"] ?>" hidden> <!-- you can also make it hidden by putting the hidden inside type. -->
                                            <input type="number" name="price" value="<?= $product["price"] ?>" hidden>
                                            <label for="sizesInputDefault" class="form-label">Quantity</label>
                                            <input class="form-control" type="number" name="quantity" id="sizesInputDefault" placeholder="Default input" aria-label="Default input example">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dialog-footer">
                                <button type="button" class="btn-solid theme-secondary" commandfor="invokerDialog<?= $key ?>" command="close">Cancel</button>
                                <!--<a href="#" class="btn-solid theme-primary">Select Product</a>  // use button for php to avoid additiona js script or another languge for student to learn. -->
                                <button type="submit" class="btn">Submit</button>
                            </div>
                        </form>
                    </dialog>
                </div>
            </section>
            </div>
        <?php endforeach ?>
    </div>

    <?php if ($quantity > 0) : ?>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Checkout Summary</h2>
                <p class="card-subtitle fg-3">Here's your payment</p>
                <p class="card-text">Product: <?= $product_name ?></p>
                <p class="card-text">Price: <?= $calculator->getPrice() ?></p>
                <p class="card-text">Quantity: <?= $calculator->getQuantity() ?></p>
                <hr>
                <p>Total Amount:</p>
                <h3 class="fg-success">
                    ₱<?= number_format($calculator->calculate(), 2) ?>
                </h3>
            </div>
        </div>
    <?php endif ?>

    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</body>
</html>