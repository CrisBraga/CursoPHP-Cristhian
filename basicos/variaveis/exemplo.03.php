<?php 

//$ cria varíaveis de todos os tipos
$nome = "hcode";
$site = 'www.hcode.com.br';

$ano = 2006;
$salario = 1100;
$bloqueado = false;

//////////////////////////////////////////////

$frutas = array("abacaxi", "laranja", "morango");

//echo $frutas[2];

$nascimento = new DateTime();

//var_dump($nascimento);
//////////////////////////////////////////////

$arquivo = fopen("exemplo.03.php", "r");

//var_dump serve como um debug para mostrar: tipo de dado, valor, tamanho e estrutura(se for um array por exemplo mostra a posição [posição aqui dentro])//
//var_dump($arquivo);

$nulo = null;
?>