<?php 

$nome = "laranja";

$sobrenome = "dos amarelos";

$frase = "eu quero uma lamborghini aventador SJV";

$palavra = "lamborghini";

//caso seja com aspas simples ele vai mostrar a variavel
echo "$nome $sobrenome";

echo "<br>";

//strtoupper = string to upper, maiusculo
echo strtoupper($nome) ;

echo "<br>";

//letra minuscula
echo strtolower($nome);

echo "<br>";

//a primeira letra de cada palavra fica maiuscula
echo ucwords($nome);

echo "<br>";

//primeira letra da primeira palavra fica maiuscula
echo ucfirst($nome);

echo "<br>";
echo "<br>";

//eu quero trocar o j da laranja por um p na variavel nome
$nome = str_replace("j", "p", $nome);

echo $nome;

echo "<br>";

//selecionar oque quer ver do texto 
$q = strpos($frase, $palavra);

var_dump($q);

echo "<br>";

//eu quero que o texto contenha uma parte da frase que começa em 0(primeira letra) ate onde esta no q
$texto = substr($frase, 0, $q);

var_dump($texto);

echo "<br>";

//aqui eu quero a partir do "q"
$texto1 = substr($frase, $q);

var_dump($texto1);

echo "<br>";

//eu quero da frase, a partir da letra q + a palavra que era lamborghini, que ele me mostre o resto da frase, exemplo(aventador SVJ)
$texto2 = substr($frase, $q + strlen($palavra), strlen($frase));

var_dump($texto2);

?>