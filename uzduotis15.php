<?php 

$servername = 'localhost';
$dbname = 'Auto';
$username = 'Auto';
$password = 'LabaiSlaptas123';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Nepavyko prisjungti: ' . $conn->connect_error);
}

$values = [];
if (isset ($_GET['delete'])) {
    $sql = "DELETE FROM radars WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
}
    if (array_key_exists('edit', $_GET) && $_GET['edit'] > 0) {
        $sql = 'SELECT * FROM radars WHERE `id` = ' . $_GET["edit"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $values = $result->fetch_assoc();
        }
    }
   
    if ($_POST['id'] > 0) {
        $sql = "UPDATE radars SET `number` = ?, `date` = ?, `distance` = ?, `time` = ? WHERE id = ?"; 
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssddi", $_POST['number'], $_POST['date'], $_POST['distance'], $_POST['time'], $_POST['id']);
        $stmt->execute();
        header("Location: " . $_SERVER['PHP_SELF']); /* Redirect browser */
        exit();
    } else if ($_POST['id'] === '') {
        $insert = "INSERT INTO radars(`date`, `number`, `distance`, `time`) VALUES(?, ?, ?, ?)"; 
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("ssdd", $_POST['date'], $_POST['number'], $_POST['distance'], $_POST['time']);
        $stmt->execute();
        header("Location: " . $_SERVER['PHP_SELF']); /* Redirect browser */
        exit();
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Uzduotis 15</title>
        <meta charset="UTF-8">
    </head>
<body>

<form action="" method="POST">
    <input name="date" type="text" value="<?= $values['date'] ?>" placeholder="Data" required>
    <input name="number" type="text" value="<?= $values['number'] ?>" placeholder="Numeris" required>
    <input name="distance" type="number" value="<?= $values['distance'] ?>" placeholder="Atstumas" required>
    <input name="time" type="number" value="<?= $values['time'] ?>" placeholder="Laikas" required>
    <input name="id" type="hidden" value="<?= $values['id'] ?>"required>
    <input type="submit" name="submit" value="Submit">
</form>

<hr />

<?php

$offset = 0;
if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
}
if (isset($_GET['eiti'])) {
    if ($_GET['eiti'] == 'Pirmyn') {
        $offset += 10;
    } else if ($_GET['eiti'] == 'Atgal') {
        $offset -= 10;
        if ($offset < 0) $offset = 0;
    }
}

if (isset($_GET['count'])) {
    $count = $_GET['count'];
} else {
    $sql = 'SELECT count(*) FROM radars';
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $count = $row[0];
}
    $sql = 'SELECT *, `distance`/`time`*3.6 as `speed` FROM radars ORDER BY `id`, `date` DESC'.
    ' LIMIT 10 OFFSET '. $offset;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
        <table border="1">
            <tr>
                <th>Numeris</th>
                <th>Data</th>
                <th>Atstumas (m)</th>
                <th>Laikas (s)</th>
                <th>Greitis (km/h)</th>
            </tr>
        
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['number']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['distance']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php echo round($row['speed'], 1); ?></td>
                    <td><a href="?edit=<?= $row['id'] ?>">Taisyti</a></td>
                    <td><a href="?delete=<?= $row['id'] ?>">Trinti</a></td>
                </tr>
            <?php endwhile; ?>
        
        </table>

        <?php
    } else {
        echo 'nėra duomenų';
    }

    ?>
    <hr />
    <form action="" method="get">
           <input type="hidden" value="<?php echo $offset; ?>" name="offset">
           <input type="hidden" value="<?php echo $count; ?>" name="count">
           <?php if ($offset > 0) { ?>
               <input type="submit" value="Atgal" name="eiti">
           <?php } ?>
           <?php if ($offset < $count - 10) { ?>
               <input type="submit" value="Pirmyn" name="eiti">
           <?php } ?>
       </form>
   <?php
    
    $conn->close();
