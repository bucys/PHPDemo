<!DOCTYPE html>
<html>

<head>
    <title>PHP 12</title>
    <meta charset="UTF-8">
</head>

<body>
<?php 
    session_start();

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
  
    if (isset($_SESSION['radars'])) {
        $radaras = $_SESSION['radars'];    
    } else {
        $radaras = array();
    }
    if (isset($_POST['date'])) { 
        $naujas = new Radar($_POST['date'], $_POST['number'], $_POST['distance'], $_POST['time']);
        $radaras[] = $naujas;
        $_SESSION['radars'] = $radaras;
        header("Location: 12.php"); 
    }
?> 

<form action="" method="POST">
    <input name="date" id="datetime" type="datetime-local" required>
    <input name="number" type="text" placeholder="Numeris" required>
    <input name="distance" type="number" placeholder="Atstumas" required>
    <input name="time" type="number" placeholder="Laikas" required>
    <input type="submit" value="Submit">
</form>

<hr>

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