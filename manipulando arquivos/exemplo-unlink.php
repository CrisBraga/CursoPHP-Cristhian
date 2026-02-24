<?php
//se não for um dir, make(crie)um dir(diretório) chamado images
if (!is_dir("images")) mkdir("images");

//faça um scandir(escaneamento de diretório) do dir images, e percorra cada item dentro dele
foreach (scandir("images") as $item) {

    //se o item não for o diretório atual(.) ou o diretório pai(..), exclua o arquivo da pasta images
    if (!in_array($item, array(".", ".."))) {

        unlink("images/" . $item);
    }
}

echo "OK";
