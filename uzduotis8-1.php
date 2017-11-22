<!DOCTYPE html>
<html>

<head>
    <title>PHP 5</title>
    <meta charset="UTF-8">
</head>

<body>
<pre>
<?php
$zmones = array(
    array('vardas' => 'Jonas', 'lytis' => 'V'),
    array('vardas' => 'Ona', 'lytis' => 'M'),
    array('vardas' => 'Petras', 'lytis' => 'V'),
    array('vardas' => 'Marytė', 'lytis' => 'M'),
    array('vardas' => 'Eglė', 'lytis' => 'M'));

    if ($zmones) {
        foreach ($zmones as $k => $v) {
            if ($v['lytis'] == 'V') {
                $vyr = $v['vardas'];
            }
            else {
                $mot = $v['vardas'];
            }
            for ($i = 1; $i < count($v); $i++) {
                echo $vyr . " - " . $mot . "<br />";
            }
        }
    }
    
    
    
    



?>
</pre>
</body>

</html>