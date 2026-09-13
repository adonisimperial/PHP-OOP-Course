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
                "hour" => 8
            ], 
            [
                "firstname" => "vangie",
                "lastname" => "gigaquit",
                "salary" => 2234,
                "hour" => 8
            ], 
            [
                "firstname" => "ped",
                "lastname" => "fontanilla",
                "salary" => 2235,
                "hour" => 8
            ]
        ];

        $selected_name = "fontanilla";

        $calculateWage = function ($salary, $hour) {
            $wage = $salary * $hour;
            return $wage;
        }
    ?>

    <ol>
        <?php foreach($employees as $employee) : ?>
            <?php if($selected_name == $employee["firstname"] || $selected_name == $employee["lastname"]) : ?>
                <li><?= "{$employee['firstname']} {$employee['lastname']} {$employee['salary']} x {$employee['hour']} = {$calculateWage($employee['salary'], $employee['hour'])}" ?></li>
            <?php endif ?>
        <?php endforeach ?>
    </ol>

    <!--
    Using the previous code/lesson, convert calculations to a function
    1. Create a function that accepts the salary and hour. Note that this is a named funtion for a while.
    2. Transfer or apply the calculation into the created function.
    3. Return the result of the calculation.
    4. Call the function to display the result. Note that this will also refactor the code inside the control structure including the <li> display content.
    5. Convert the name function to an anonymous function or lambda. This may also converted to a fully string interpolation coz the named function could be integrated directly within the string using interpolation.
    6. Convert lambda to arrow function.
    
    IMPORTANT:
    The term "Lambda" wasn't introduced as one of the name of anonymous function during the last lesson. Now is the time to mention it.
    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>