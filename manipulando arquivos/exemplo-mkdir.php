<?php

$name = "images";

if (!is_dir($name)) {

    mkdir($name);
    echo "Diretorio criado com sucesso";
} else {

    rmdir($name);
    echo "diretorio $name ja existe, foi escluido!";
}
