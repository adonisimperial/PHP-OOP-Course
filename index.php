<?php
    require_once "config/Database.php";

    //$database = new Database();
    //$db = $database->getConnection();
    //var_dump($db);
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

    <?php
        $products = [
            [
                "name" => "Laptop",
                "price" => 50000,
                "photo" => "https://cdn.pixabay.com/photo/2016/03/27/07/12/apple-1282241_1280.jpg"
            ],
            [
                "name" => "iPad",
                "price" => 45000,
                "photo" => "https://cdn.pixabay.com/photo/2021/11/17/17/53/tablet-6804280_1280.jpg"
            ],
            [
                "name" => "Cellphone",
                "price" => 25000,
                "photo" => "https://cdn.pixabay.com/photo/2016/12/09/11/33/smartphone-1894723_1280.jpg"
            ],
            [
                "name" => "Digital Watch",
                "price" => 15000,
                "photo" => "https://cdn.pixabay.com/photo/2015/06/25/17/22/smart-watch-821559_1280.jpg"
            ],
        ];
    ?>

    <div class="row">
        <?php foreach($products as $product) : ?>
            <div class="col-3">
                <section class="card" style="max-width: 400px">
                    <img src="<?= $product["photo"] ?>" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title"><?= $product["name"] ?></h4>
                        <p class="card-text"><?= $product["price"] ?></p>
                        <a href="#" class="btn-solid theme-primary">Buy</a>
                    </div>
                </section>
            </div>
        <?php endforeach ?>
    </div>
    
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</body>
</html>