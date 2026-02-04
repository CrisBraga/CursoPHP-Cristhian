<?php 
/*
class Pessoa{

    public $nome;

    public function falar(){

    return "O meu nome é ".$this->nome;

    }

}

$cristhian = new Pessoa();
$cristhian->nome = "Cristhian Braga";
echo $cristhian->falar();
*/

class Carro{

    private $modelo;
    private $cor;
    private $WHP;

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
    $this->modelo = $modelo;
    }

    public function getCor(){
        return $this->cor;
    }

    public function setCor($cor){
    $this->cor = $cor;
    }


    public function getWHP(){
        return $this->WHP;
    }

    public function setWHP($WHP){
    $this->WHP = $WHP;
    }

    public function exibir(){

    return array(
        "modelo" => $this->getModelo(),
        "cor"=> $this->getCor(),
        "WHP"=> $this->getWHP()cd
    );

    }

}

$BMW = new Carro();
$BMW->setModelo("M3 F80");
$BMW->setCor("Yas Marina Blue");
$BMW->setWHP("431-CV");

print_r($BMW->exibir());

?>