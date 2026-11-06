<?php
    require_once "config/Database.php";

    $database = new Database();
    $db = $database->getConnection();
    //var_dump($db);
    $stmt = $db->prepare("SELECT * from products");
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //echo "<pre>";
    //var_dump($products);
    //yecho "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
</head>
<body style="margin: 20px 50px">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Checkout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="product.php">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
    </ul>

    <h1>Product CRUD</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product) : ?>
                <tr>
                    <th scope="row"><?= $product["id"] ?></th>
                    <td><?= $product["name"] ?></td>
                    <td><?= $product["price"] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        </table>
    
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</body>
</html>