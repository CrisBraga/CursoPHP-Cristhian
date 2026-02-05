<?php 

class Endereco{

    //criando os objetos da classe
    private $logradouro;
    private $numero;
    private $cidade;

    //metodo construtor
    public function __construct($a, $b, $c)
    {
        $this->logradouro =$a;
        $this->numero = $b;
        $this->cidade = $c;

    }

    //metodo que limpa a memoria
    public function __destruct()
    {
        //var_dump("Destruido");
    }

    public function __toString()
    {
        return $this->logradouro.", ".$this->numero." - ".$this->cidade;
    }

}

$meuEndereco = new Endereco("Rua atalaia", "1227", "Colombo");

echo $meuEndereco;

?>