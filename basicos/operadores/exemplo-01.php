<?php 

$nome = "cris";

//<br> quebra a linha e joga a proxima coisa para a proxima linha
echo $nome." mais alguma coisa<br>";

//.= estou adicionando algo que sempre que eu chamar $nome ira aparecer junto dele o que estiver depois de ".="
$nome .= " mais outra coisa";

echo $nome;

?>