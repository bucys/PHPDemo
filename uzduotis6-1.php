<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset="UTF-8">
</head>

<body>
<?php 
    $a = [5, 6, 10, 15];
    $b = [8, 5, 3, 25];

    for ($i = 0; $i < count($a); $i++) {
        $sumaA += $a[$i];
    }
    for ($i = 0; $i < count($b); $i++) {
        $sumaB += $b[$i];
    }

    echo ($sumaA / count($a)) - ($sumaB / count($b));

?>
</body>

</html>