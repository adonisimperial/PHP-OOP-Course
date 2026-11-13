<?php
    require_once "config/Database.php";
    require_once "partials/header.php";

    //$database = new Database();
    //$db = $database->getConnection();
    //var_dump($db);

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

    <h1>Homepage</h1>
    
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</body>
</html>