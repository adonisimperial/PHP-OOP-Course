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
            <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/') { echo 'active'; } ?>" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/checkout.php') { echo 'active'; } ?>" href="checkout.php">Checkout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/product.php') { echo 'active'; } ?>" href="product.php">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
    </ul>