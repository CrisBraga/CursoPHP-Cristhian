<?php 

//Get serve como um filtro, por exemplo, ele quebra o seu código em uma parte que voce queira e joga na barra de pesquisa direto 
$nome = (int)$_GET["a"];

//var_dump($nome);

$ip = $_SERVER["SCRIPT_NAME"];

echo $ip;

?>