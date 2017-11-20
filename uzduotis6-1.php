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
    $lengthA = count($a);
    $lengthB = count($b);

    for ($i = 0; $i < $lengthA; $i++) {
        $sumaA += $a[$i];
    }
    for ($i = 0; $i < $lengthB; $i++) {
        $sumaB += $b[$i];
    }

    $vidA = $sumaA / $lengthA;
    $vidB = $sumaB / $lengthB;
    $vid = $vidA - $vidB;

    echo $vid;

?>
</body>

</html>