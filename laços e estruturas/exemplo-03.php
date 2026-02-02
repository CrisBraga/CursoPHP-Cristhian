<?php 
/*
for ($i = 0; $i <= 1000; $i+= 5) {

    if ($i > 200 && $i < 800) continue;

    if ($i === 900) break;

    echo $i . "<br>";
}
*/

echo "<select>";

//$i = data ("Y" = ano); se $i for maior ou igual a data ("Y")-100, $i desce um
for ($i=date("Y"); $i >= date("Y")-100 ; $i--) {

    // option vai imprimir uma seleção "select" de dentro da onde foi setado usando o parametro de variavel, dando a opção de você escolher o ano
    echo '<option value="'.$i.'">'.$i.'</option>';

}

echo "</select>";

?>