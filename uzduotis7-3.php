<!DOCTYPE html>
<html>

<head>
    <title>PHP 21</title>
    <meta charset="UTF-8">
</head>

<body>
<pre>
<?php 
    $a = [ [1, 3, 4], [2, 5], [2 => 3, 5=> 8], [1, 1, 5 => 1] ];
    $sum = [];
    $max = 0;

    foreach ($a as $eilute) {
        foreach ($eilute as $stulpelis => $reiksme) {
            $sum[$stulpelis] += $reiksme;
        }
    }
    for ($i = 0; $i < count($sum); $i++) {
        if ($sum[$i] > $max) {
            $max = $sum[$i];
        }
    }

    echo 'Didžiausia reikšmė: ' . $max . "<br />";


?>
</pre>
</body>

</html>