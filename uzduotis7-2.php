<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset="UTF-8">
</head>

<body>
<?php
    $a = ['Jonas', 'Petras', 'Antanas', 'Povilas'];
    $length = count($a);

    for ($j = 0; $j < $length; $j++) {
            for ($i = 0; $i < $length; $i++) {
                if ($i <> $j)
                echo $a[$j] . "-" . $a[$i] . "<br /> ";
            }
    }
?> 
</body>

</html>