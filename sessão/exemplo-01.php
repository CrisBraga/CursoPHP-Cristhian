<?php 

//posso criar uma sessão de configuração por exemplo e depois fazer um require_once por aqui para atribuir essa configuração aqui

session_start();

$_SESSION["nome"] = "Crisin";

//pode ser forçado criar uma nova sessão tambem com
//session_regenetare_id();

?>