<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <div class="card">
        <div class="card-body">
            This is a Bootstrap card and it is working.
        </div>
    </div>

    <h1>
        <?php $greeting = "<h2 style='color: red'>Hi Everyone!</h2>" ?>
        <?php echo htmlspecialchars($greeting) ?>
    </h1>
    
    <?php
        $name = "Ted Corporation";
        echo "Hello, {$name}™";
        // this is a comment
        # this is also a single line comment
        /*
        this is a
        multiline comment
        */ 

        echo "<br>";

        $integer1 = 6;
        $integer2 = 2;
        $sum = $integer1 % $integer2;
        echo "Modulo of two integer: $sum";

        echo "<br>";

        $integer = 2;
        $float = 2.5;
        $calc = ($integer * $float + 2) % 3; // what is the output?

        echo "Modulo of float and integer: $calc";
        echo "<br>5 divided by 2 is", 5/2;
        echo "<br>Rounded float: ", round($float);

        echo "<br>Absolute value: ", abs(-10);

        echo "<br>";

        $formated_date = date_create("2020-12-12");
        $formated_now = date_create("2026-08-20");

        $diff = date_diff($formated_date, $formated_now);
        echo "This is the date difference: " . $diff->format("%y");
        
        echo "<br>";
        echo "this is current year ", date('Y');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>