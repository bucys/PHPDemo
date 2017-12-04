<!DOCTYPE html>
<html>

<head>
    <title>PHP 5</title>
    <meta charset="UTF-8">
</head>

<body>
<?php

class Radar
{
    public $date;
    public $number;
    public $distance;
    public $time;

    function __construct($d, $n, $a, $t) {
        $this->date = $d;
        $this->number = $n;
        $this->distance = $a;
        $this->time = $t;
    }

    function speed() {
        $speedMs = $this->distance/$this->time;
        $speed = $speedMs*3.6;
        return round($speed,1);
    }
}


$radaras = [
    new Radar('2017-10-31 12:00:00', 'ABC123', 5000, 180),
    new Radar('2017-11-08 03:30:00', 'ABC321', 9000, 450),
    new Radar('2017-11-21 11:50:00', 'CBA123', 6000, 240),
    new Radar('2017-11-28 16:30:00', 'CBA321', 4500, 150)
];


usort($radaras, function($a, $b) {
    $greitisA = $a->speed();
    $greitisB = $b->speed();

    return $greitisA == $greitisB ? 0 : $greitisA < $greitisB ? -1: 1;
});
?>
<table border="1">
    <tr>
        <th>Data</th>
        <th>Numeris</th>
        <th>Atstumas</th>
        <th>Laikas</th>
        <th>Greitis</th>
    </tr>
    <tr>
    <?php foreach ($radaras as $radar):  ?>
        <td><?php echo $radar->date ?></td>
        <td><?php echo $radar->number ?></td>
        <td><?php echo $radar->distance ?></td>
        <td><?php echo $radar->time ?></td>
        <td><?php echo $radar->speed() . ' ' ?></td>
    </tr>
    <?php endforeach ?>
</table>
</body>

</html>