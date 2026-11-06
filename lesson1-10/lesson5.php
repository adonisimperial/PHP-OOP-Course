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
        echo $_SERVER['SERVER_NAME'];
        echo "<br>";
        echo $_SERVER['DOCUMENT_ROOT'];
        echo "<br>";
        echo $_SERVER['PHP_SELF'];
        echo "<br>";
        echo $_SERVER['REQUEST_METHOD'];
        echo "<br>";
        echo $_SERVER['REQUEST_URI'];
        echo "<br>";
        echo "<br>";

        // ?name=Adonis%20Imperial&age=41; this query string is needed for the code below to get the name and age.
        /* Checking
        echo "<pre>";
        var_dump($_SERVER, $_GET, $_POST);
        echo "</pre>";
        */
        /* Getting the query values
        echo $_GET["name"];
        echo "<br>";  
        echo $_GET["age"];
        echo "<br>";

        echo $_REQUEST["name"];
        echo "<br>";
        echo $_REQUEST["age"];
        */

        // Form Handling
        // 3. Request Verification - verify if it is a POST request.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 1. Getting the values
            echo $_POST["username"];    // not safe for inputs like <script>alert("hi")</script>

            // 2. Sanitation
            echo htmlspecialchars(trim($_POST["username"]));    // safe for inputs like <script>alert("hi")</script>
            // Can use functions for sanitition using filter_input
            //echo filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);

            // Try XSS attack by removing the required in the username through inspect then introduce server-side validation.
            // 4. Server-side Data Validation
            if (empty($_POST["username"])) {
                echo "Username is required.";
            }

            // 5. Error Handling
            $errors = [];

            if (empty($_POST['username'])) {
                $errors[] = "Username is required.";
            } else {
                $user = trim($_POST['username']);
            }

            // Redirecting
            /*if (!empty($errors)) {
                header("Location: /");
                exit(); // Terminate script to prevent code bleed
            }*/
        }
    ?>
    
    <?php if (isset($_POST["submit"]) && empty($errors)) : ?>
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    <?php endif ?>

    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" required>    <!-- XSS - required can be removed via inspect. -->
        <label for="password">Password</label>
        <input type="password" name="password">
        <button type="submit" name="submit">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>