<?php 

//include consegue puxar de outra paxima uma função especifica para você caso necessário
//include "Exemplo-01.php";
//caso quisesse incluir algo de outra pasta ou diretório, teria que ser feito "../variavel/exemplo-01.php" .. para subir uma pasta

//require só roda se estiver sem nenhum problema, caso contrario acontece um fatal error
require "Exemplo-01.php";
//require once caso ja tenha requerido antes o repertório ele não vai chamar novamente, se não dara erro
require_once "Exemplo-01.php";
//no exercicio 1 criei a function somar, adicionei um include para trazer esta função para o código.
$resultado = somar(10, 20);

echo $resultado;

?> 