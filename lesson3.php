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
        $employees = [
            [
                "firstname" => "santino",
                "lastname" => "fontanilla",
                "salary" => 1234,
                "hours" => 8
            ], 
            [
                "firstname" => "vangie",
                "lastname" => "gigaquit",
                "salary" => 2234,
                "hours" => 8
            ], 
            [
                "firstname" => "ped",
                "lastname" => "fontanilla",
                "salary" => 2235,
                "hours" => 8
            ]
        ];

        $selected_name = "fontanilla";
    ?>

    <ol>
        <?php foreach($employees as $employee) : ?>
            <?php if($selected_name == $employee["firstname"] || $selected_name == $employee["lastname"]) : ?>
                <li><?= $employee["firstname"] . " " . $employee["lastname"] . " " . $employee["salary"] * $employee["hours"] ?></li>
            <?php endif ?>
        <?php endforeach ?>
    </ol>

    <!--
    Indexed Array to Associative Array to Multi-dimensional Array while using Control Structure
    1. Indexed Array with loop. Note that the loop being used is the basic and not yet the Alternative Syntax for Template. 
    2. Converting the indexed array to an associative array while showing how to access it in the loop.
    3. Convert the associative array to a multi-dimensional array.
    4. Access the loop using foreach.
    5. Convert the loop into the Alternative Syntax for Template

    Filtering Content
    1. Declare a selected name (lastname) or finder; assuming this is the finder for search.
    2. Use If Statement to filter the loop.
    3. Broaden the condition to filter multiple condition like firstname and lastname.
    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>