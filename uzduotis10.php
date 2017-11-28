<!DOCTYPE html>
<html>
<head>
    <title>Pratimas 10</title>
</head>
<body>
<?php

date_default_timezone_set('EET');

class Mokinys 
{
    public $vardas;
    public $gimData;
    public $pazymiai;

    function __construct($v, $g, $p) {
        $this->vardas = $v;
        $this->gimData = $g;
        $this->pazymiai = $p;
    }

    function trimestras() {
        $trimestras = [];
        foreach ($this->pazymiai as $dalykas => $pazymiai) {
            $vidurkis = $this->vidurkis($pazymiai);
            $trimestras[$dalykas] = $vidurkis;
        }
        return $trimestras;
    }

    function vidurkis($pazymiai) {
        $sum = 0;
        foreach ($pazymiai as $pazymys) {
            $sum += $pazymys;
        }
        return $sum / count($pazymiai);
    }

    function trimestroVidurkis() {
        $trimestras = $this->trimestras($m);
        return $this->vidurkis($trimestras);
    }

    function amzius() {
        $dabar = new DateTime();
        $amzius = new DateTime($this->gimData);
        $skirtumas = $amzius->diff($dabar);
        return $skirtumas->y;
    }   
} 

$mokiniai = [
    new Mokinys('Jonas', '1990-01-01', ['lietuviu' => [4, 8, 6, 7], 'anglu' =>[6, 7, 8], 'matematika' => [3, 5, 4]]), 
    new Mokinys('Ona', '1987-02-28', ['anglu' => [9, 8, 10], 'lietuviu' => [7, 9, 10], 'matematika' => [9, 10, 9, 9]]),
    new Mokinys('Petras', '1998-12-01', ['anglu' => [5, 8, 7], 'lietuviu' => [7, 10, 8], 'matematika' => [10, 10, 9, 9]])
];

for ($i = 0; $i < count($mokiniai) - 1; $i++) {
    
    $x = $mokiniai[$i];
    $index = $i;

    for ($j = $i + 1; $j < count($mokiniai); $j++) {
        if ($x->trimestroVidurkis() > $mokiniai[$j]->trimestroVidurkis()) {
            $x = $mokiniai[$j];
            $index = $j;
        }
    }
    $y = $mokiniai[$i];
    $mokiniai[$i] = $mokiniai[$index];
    $mokiniai[$index] = $y;
}
?>

<table border="1">
    <tr>
        <th>Vardas</th>
        <th>Pazymiai</th>
        <th>Vidurkis</th>
        <th>Gimimo Metai</th>
        <th>Amzius</th>
    </tr>
    <?php foreach ($mokiniai as $mokinys): ?>
    <tr>
        <td><?php echo $mokinys->vardas; ?></td>
        <td>
            <?php foreach ($mokinys->pazymiai as $dalykas => $pazymiai): ?>
                <div>
                    <?php echo $dalykas . ': ' . implode(', ', $pazymiai); ?>
                </div>
            <?php endforeach; ?>
        </td>
        <td><?php echo $mokinys->trimestroVidurkis() ?></td>
        <td><?php echo $mokinys->gimData; ?></td>
        <td><?php echo $mokinys->amzius(); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>