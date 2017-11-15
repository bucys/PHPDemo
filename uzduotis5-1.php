<!DOCTYPE html>
<html>

<head>
    <title>PHP 21</title>
    <meta $charset="UTF-8">
</head>
<body>
    <?php 
    $a = 5;
    $b = 5;
    $c = 5;
    $tipas;
    $plotas;
    $perimetras = ($a + $b + $c) / 2;
    
    if ($a == round(sqrt($b * $b + $c * $c)) || $b == round(sqrt($a * $a + $c * $c)) || $c == round(sqrt($b * $b + $a * $a)) ) {
        $tipas = 'Status';
    }
    
    else if ( $a != $b && $b != $c && $a != $c && $a + $b > $c ){
        $tipas = 'Įvairiakraštis';
    }
    elseif ( $a == $b && $a == $c && $b == $c){
        $tipas = 'Lygiašonis';
    }
    elseif ( $a == $b && $b !== $c && $a + $b > $c || $a == $c && $a !== $b && $a + $c > $b  || $b == $c && $b !== $a && $b + $c > $a ){
        $tipas = 'Lygiakraštis';
    }
    else {
        $tipas = 'Joks';
    }
    
    echo $tipas;
    echo $plotas;
    ?> 
</body>

</html>