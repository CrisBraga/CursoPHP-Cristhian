<?php 

//isto é um autoload de outra pasta, suponhamos que eu queira chamar uma classe de outro exercicio, eu adiciono assim.
function __autoload($nomeClasse){

    if(file_exists($nomeClasse. ".php")=== true){
        require_once("$nomeClasse.php");
    }

}

spl_autoload_register("incluirClasses");

abstract class Animal{

    public function falar(){

        return "som";

    }

    public function mover(){

        return "anda nas quebrada";

    }

}

class Cachorro extends Animal{

    public function falar(){

        return "fala meu patrão";

    }

}

class Passaro extends Animal{

    public function falar()
    {
        return "pi piuiii";
    }

    public function mover()
    {
        return "dando um role pelo céu e " . parent::mover();
    }

}

class Gato extends Animal{

    public function falar(){
        return "MIIAAUUUU CARAAAA";
    }

}

$bidu = new Cachorro();

echo $bidu ->falar(). "<br/>" ;
echo $bidu -> mover(). "<br/>" ;

echo "-------------------------------<br/>";

$garfield = new Gato();

echo $garfield -> falar(). "<br/>";
echo $garfield -> mover(). "<br/>";

echo "-------------------------------<br/>";

$pintin = new Passaro();

echo $pintin -> falar(). "<br/>";
echo $pintin -> mover(). "<br/>";

?>