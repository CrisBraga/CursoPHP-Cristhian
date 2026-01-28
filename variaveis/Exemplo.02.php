<?php 

$nome1 = "Cristhian";

$sobrenome1 = "Braga";

$nomeCompleto = $nome1 . " " . $sobrenome1;

//Echo faz print no site
echo $nomeCompleto;

//Nada roda depois do exit
exit;

echo $nome1;

echo "<br/>";

unset($nome1);

if (isset($nome1)){
    echo $nome1;
}

?>