<?php

//a+ no lugar do w so adiciona, não sobreescreve
$file = fopen("log.txt", "w+");

//escreva isso no $file
fwrite($file, date("Y-m-d H:i:s"));

//feche o meu $file
fclose($file);

echo "arquivo criado";

//essa função é um faz-tudo com ele posso criar, sobreescrever e etc. PHP_EOL adiciona uma quebra de linha e FILE_APPEND faz a mesma coisa que o a+.
file_put_contents("log.txt", date("Y-m-d H:i:s") . PHP_EOL, FILE_APPEND);
