<!DOCTYPE html>
<html>
    <head>
        <title>14</title>
        <meta charset="UTF-8">
    </head>
<body>
<?php 

$servername = 'localhost';
$dbname = 'Auto';
$username = 'Auto';
$password = 'LabaiSlaptas123';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Nepavyko prisjungti: ' . $conn->connect_error);
}

mysqli_select_db($conn, 'pagination');

$results_per_page = 10;

$sql = "SELECT `number`, round(`distance`/`time`, 1) as `speed`, `date` FROM radars ORDER BY `speed`, `date`";
$result = mysqli_query($conn,$sql);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results/$results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page-1)*$results_per_page;

$sql = "SELECT `number`, round(`distance`/`time`, 1) as `speed`, `date` FROM radars ORDER BY `speed`, `date` LIMIT " . $this_page_first_result . ',' . $results_per_page;
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    if ($result->num_rows > 0) {
    ?>
    <table border="1">
        <tr>
            <th>Numeris</th>
            <th>Data</th>
            <th>Greitis</th>
        </tr>
    
    <?php
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['speed']; ?></td>
        </tr>
        <?php
    }
    echo '</table>';
} else {
    echo 'nėra duomenų';
};
}
    echo '<hr>';

for ($page = 1; $page <= $number_of_pages; $page++) {
    echo '<a href="14.php?page=' . $page . '">' . $page . ' </a>';
}
?>
</body>
</html>