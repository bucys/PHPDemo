<!DOCTYPE html>
<html>
<head>
    <title>PHP 21</title>
    <meta charset="UTF-8">
</head>

<body>

<?php 

$mokiniai = [
    ['vardas' => 'Jonas', 'pazymiai' => ['lietuviu' => [4, 8, 6, 7], 'anglu' =>[6, 7, 8], 'matematika' => [3, 5, 4]]], 
    ['vardas' => 'Ona', 'pazymiai' => ['lietuviu' => [10, 9, 10], 'anglu' => [9, 8, 10], 'matematika' => [10, 10, 9, 9]]]
    ];


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

    // print_r($mokiniai);
    // exit;
?>
<table border="1">
    <tr>
        <th>Vardas</th>
        <th>Pazymiai</th>
        <th>Vidurkis</th>
        <th>Bendras Vidurkis</th>
    </tr>
    <?php foreach ($mokiniai as $mokinys): ?>
    <tr>
        <td><?php echo $mokinys['vardas']; ?></td>
        <td>
            <?php foreach ($mokinys['pazymiai'] as $dalykas => $pazymiai): ?>
                <div>
                    <?php echo $dalykas . ': ' . implode(", ", $pazymiai); ?>
                </div>
            <?php endforeach; ?>
        </td>
        <td>
            <?php foreach ($mokinys['pazymiai'] as $dalykas => $pazymiai): ?>
                <div>
                    <?php echo $dalykas . ': ' . round(vidurkis($pazymiai)); ?>
                </div>
            <?php endforeach; ?>
        </td>
        <td>
            <?php foreach ($mokinys['pazymiai'] as $dalykai => $pazymiai): ?>
                <div>  
                    <?php print_r(vidurkis($pazymiai)); ?>
                </div>
            <?php endforeach; ?>
        </td>
    </tr>

    <?php endforeach; ?>

</body> 
</html>