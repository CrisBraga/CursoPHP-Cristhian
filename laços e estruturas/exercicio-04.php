<?php 

//array é gaveta de informações vamos supor que tem uma caixa dividida em 12 espaços e cada um é o mês ali embaixo
$meses = array( 
    "Janeiro", "Fevereiro", "Março",
    "Abril", "Maio", "Junho",
    "Julho", "Agosto", "Setembro",
    "Outubro", "Novembro", "Dezembro"
);

//o foreach passa por um item de cada vez
foreach ($meses as $index => $mes ) {

    echo "Indice: ".$index."<br>";
    echo "Você esta em: ".$mes."<br>";

}

?>