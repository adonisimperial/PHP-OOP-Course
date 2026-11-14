<?php
    require_once "config/Database.php";
    require_once "class/Product.php";
    require_once "partials/header.php";

    $database = new Database();
    $db = $database->getConnection();

    // SQL Injection: URL Method
    //$item = $_GET['search'];
    //$stmt2 = $db->prepare("SELECT * from products WHERE name LIKE '%" . $item . "%'");
    //$stmt2->execute();
    //var_dump($stmt2);
    //http://oopclass.test/product.php?search=Laptop'; DROP TABLE users;    // for a string value input, put a single quote (') before the semicolon (;) to terminate the string before implementing the SQL injection.
    //http://oopclass.test/product.php?search=1; DROP TABLE users;    // for a numeric value input, just put a semicolon (;) after the number to terminate the statement then implement the SQL injection.
    
    if (isset($_GET["btnSearch"])) {
        $item = $_GET["search"];
        $stmt2 = $db->prepare("SELECT * from products WHERE name LIKE '%" . $item . "%'");
        $stmt2->execute();
        // SQL Injection: Input Box Method
        // In the search field, input/type this -> Laptop'; DROP TABLE users; -> and click the search/submit button
        //var_dump($stmt2);
        $products = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmt = new Product($db);
        $products = $stmt->read()->fetchAll(PDO::FETCH_ASSOC);
    }

    //echo "<pre>";
    //var_dump($products);
    //echo "</pre>";
?>

    <h1>Product CRUD</h1>

    <form action="" method="get">
        <label for="search" class="form-label mb-2">Search</label>
        <input type="text" class="form-control" id="search" name="search" placeholder="Search product">
        
        <button type="submit" name="btnSearch" class="btn">Search</button>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
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