<?php 

//só se consegue acessar os dados publicos por qualquer um, para acessar o protected somente quem herda, e private somente a propria classe que foi instanciado o objeto
class donoPadaria{

    public $compra = "pão";
    protected $estoque = 600;
    private $senha = "padeirinho123";

    public function verDados(){

    echo $this->compra . "<br/>";
    echo $this->estoque . "<br/>";
    echo $this->senha . "<br/>";


    }

}

class padeiro extends donoPadaria{

    public function verDados(){
        echo get_class($this). "<br/";

        echo $this->compra . "<br/>";
        echo $this->estoque . "<br/>";
        echo $this->senha . "<br/>";

    }
}


//$objeto = new donoPadaria();
$obj = new padeiro();

//echo $objeto->senha . "<br/>";

$obj->verDados();

?>