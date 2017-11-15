<!DOCTYPE html>
<html>

<head>
    <title>PHP 21</title>
    <meta $charset="UTF-8">
</head>
<body>
    <?php 
    $a = 4;
    $b = 4;
    $c = 4;
    $tipas;
    $plotas;
    $perimetras = (($a + $b + $c)) / 2;
    
    if ($a == round(sqrt($b * $b + $c * $c)) ) {
        $tipas = 'Status ';
        $plotas = 'Plotas Lygus:' . ' ' . ($b * $c) / 2;
    }

    elseif ($b == round(sqrt($a * $a + $c * $c)) ) {
        $tipas = 'Status ';
        $plotas = 'Plotas Lygus:' . ' ' . ($a * $c) / 2;
    }

    elseif ($c == round(sqrt($a * $a + $b * $b)) ) {
        $tipas = 'Status ';
        $plotas = 'Plotas Lygus:' . ' ' . ($a * $b) / 2;
    }
    
    elseif ( $a != $b && $b != $c && $a != $c && $a + $b > $c ){
        $tipas = 'Įvairiakraštis ';
        $plotas = 'Plotas Lygus:' . ' ' . round(sqrt($perimetras * (($perimetras - $a) * ($perimetras - $b) * ($perimetras - $c))));    
    }
    elseif ( $a == $b && $a == $c && $b == $c){
        $tipas = 'Lygiašonis ';
        $plotas = 'Plotas Lygus:' . ' ' . round(sqrt($perimetras * (($perimetras - $a) * ($perimetras - $b) * ($perimetras - $c))));
    }
    elseif ( $a == $b && $b !== $c && $a + $b > $c || $a == $c && $a !== $b && $a + $c > $b  || $b == $c && $b !== $a && $b + $c > $a ){
        $tipas = 'Lygiakraštis ';
        $plotas = 'Plotas Lygus:' . ' ' . round(sqrt($perimetras * (($perimetras - $a) * ($perimetras - $b) * ($perimetras - $c))));    
    }
    else {
        $tipas = 'Joks ';
        $plotas = 'Plotas Lygus: 0';
    }
    
    echo $tipas;
    echo $plotas;
    ?> 
</body>

</html>