<?php 
/*
//condição é true 
$condicao = true;

//enquanto a condição
while ($condicao) {

    //rodar um numero aleatorio de 1 a 100
    $numero = rand(1, 100);

    //se o numero que vier for 70
    if ($numero ===70){

    //print "setenta"
    echo "Setenta!!";
    //e a condição para 
    $condicao = false;

    }

    //print um numero = um espaço 
    echo $numero . " ";

}
*/

$total = 150;
$desconto = 0.9;

do {

    $total *= $desconto;

}
while ($total > 100);

echo $total;

?>