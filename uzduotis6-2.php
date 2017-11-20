<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset="UTF-8">
</head>

<body>
<?php 

function perfect($number) {
        for ($i = 2; $i <= sqrt($number); $i++)
        {
            if (!($number % $i)) {
                $a += $i;
                if ($i <> $number / $i)
                    $a += $number / $i;
            }
        }
        return ++$a == $number;
    }
    for ($i = 1; $i < 1000; $i++)
        if (perfect($i))
            echo $i . '<br />';    

?>
</body>

</html>