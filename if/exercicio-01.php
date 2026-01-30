<?php 

$qualSuaIdade = 19;

$idadeCrianca = 12;
$idadeMaior = 18;
$idadeMelhor = 65;

// if é caso, caso sua idade for maior que 12 = adolescente, caso menor = criança, e assim por diante

if($qualSuaIdade < $idadeCrianca) {

    echo "Criança";

}

else if($qualSuaIdade < $idadeMaior){

    echo "Adolescente";

}

else if ($qualSuaIdade < $idadeMelhor){
    echo "Adulto";
}

else {

    echo "Idoso";

}


echo "<br>";

//sua idade é maior que a idade de maior ? caso não escreva "Menor de idade", caso sim (:) escreva "Maior de idade".
echo ($qualSuaIdade < $idadeMaior)?"Menor de idade":"Maior de idade";

?>