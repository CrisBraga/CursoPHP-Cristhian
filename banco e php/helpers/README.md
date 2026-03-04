Verifica se o composer foi instalado
# composer -v

cria o arquivo json
# composer init

instalar a biblioteca phinx
# composer require robmorgan/phinx

criar o arquivo "phinx.php" com as configurações e alterar as mesmas.
# vendor/bin/phinx init -f php

testar as configs
# vendor/bin/phinx test

criar a migration
# vendor/bin/phinx create Users

executar as migrations
# vendor/bin/phinx migrate 

criar a migrations para alterar dado
# vendor/bin/phinx create AddColumnPasswordUsers

executar o rollback na ultima migration
# vendor/bin/phinx rollback