<?php 

interface Veiculo{

    public function acelerar($velocidade);
    public function frenar($velocidade);
    public function trocaMarcha($velocidade);

}

class Automovel implements Veiculo{

    public function acelerar($velocidade)
    {
        echo "O veiculo acelerou ate ". $velocidade." Km/H";
    }

    public function frenar($velocidade)
    {
        echo "o veiculo frenou ate ". $velocidade . "Km/H";
    }

    public function trocaMarcha($marcha)
    {
        echo "o veiculo engantou a ". $marcha . " marcha";
    }

}


?>