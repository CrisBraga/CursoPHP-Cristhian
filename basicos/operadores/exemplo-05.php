<?php 

$a = NULL;

$b = 11;

$c = 23;


//caso a for maior, me mostre 1, caso os dois sejam iguais mostre 0, caso b maior mostre -1
var_dump($a <=> $b);

echo "<br>";
///////////////////////////////////////////////////////////////////////////////////////////

//caso o primeiro for nulo sera mostrado diretamente o segundo e assim por diante
echo $a ?? $b ?? $c;

echo "<br>";
///////////////////////////////////////////////////////////////////////////////////////////

// pega o valor de a e coloca +1 na frente
echo $a++ ;

echo "<br>";

//pega +1 e coloca o valor de a junto dele
echo ++$a
?>