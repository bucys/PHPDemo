<!DOCTYPE html>
<html>
<head>
    <title>PHP 21</title>
    <meta charset="UTF-8">
</head>

<body>
<pre>
<?php 

$mokiniai = [
    ['vardas' => 'Jonas', 'pazymiai' => ['lietuviu' => [4, 8, 6, 7], 'anglu' =>[6, 7, 8], 'matematika' => [3, 5, 4]]], 
    ['vardas' => 'Ona', 'pazymiai' => ['lietuviu' => [10, 9, 10], 'anglu' => [9, 8, 10], 'matematika' => [10, 10, 9, 9]]]
    ];
$max = 0;

    function vidurkis($pazymiai) {
        $sum = 0;
        foreach ($pazymiai as $pazymys) {
            $sum += $pazymys;
        }
        return $sum / count($pazymiai);
    }

    function vidurkiai($mokinys) {
        $trimestras = [];
        foreach ($mokinys['pazymiai'] as $dalykas => $pazymiai) {
            $vidurkis = round(vidurkis($pazymiai));
            $trimestras[$dalykas] = $vidurkis;
        }
        return $trimestras;
    }

    foreach ($mokiniai as $i => $m) {
        $mokiniai[$i]['trimestras'] = vidurkiai($m);
        $mokiniai[$i]['vidurkis'] = round(vidurkis($mokiniai[$i]['trimestras']));
    }
    
    //print_r($mokiniai);

    for($i = 0; $i < count($mokiniai); $i++) {
        if ($max < $mokiniai[$i]['vidurkis']) {
            $max = $mokiniai[$i]['vidurkis'];
            $name = $mokiniai[$i]['vardas']; 
        }
    }
    echo 'Geriausiai mokosi: ' . $name .','  . ' Vidurkis: ' . $max;
    
?>
</body>
</html>