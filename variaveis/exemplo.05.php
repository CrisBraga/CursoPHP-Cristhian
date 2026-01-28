<?php 
//escopo global
$nome = "Cris";

//escopo local
function teste(){
    //Chamando a variavel global dentro do escopo local 
    global $nome;

    echo $nome;

}

function teste2(){

    //sem chamar a variavel para dentro do escopo global, não aparece o nome
    echo $nome." agora no teste 2";

}

teste();

teste2();

?>