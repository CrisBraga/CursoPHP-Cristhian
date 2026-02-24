<?php

$filename = "usuarios.csv";

if (file_exists($filename)) {

    $file = fopen($filename, "r");

    $headers = fgets($file);

    var_dump($headers);
}
