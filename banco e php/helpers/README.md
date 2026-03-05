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


==============================================================================

### gestão da loja ###
uma aba para realizar a compra de produtos do estoque (somente o encarregado para cima)

um alerta de baixa quantidade no estoque (ex: abaixo de 10 da um destaque em vermelho) no item (todos)

ter "carrinho de compras" onde eu possa adicionar os itens diversos e me retornar um valor total antes de ir para o banco (todos)

poder visualizar os itens adicionados nesse carrinho (todos)

adicionar novos usuarios (adm e o gestor)

excluir os itens do carrinho (todos)

visualizar campos para o recebimento de produtos, como pendente, em rota e entregue (encarregado para cima)

realizar login, porem se for cargo baixo, tem pouco acesso as funções, se for cargo mais alto, ter mais acesso a outras funções 

### funcionalidades internas ###
criar diferentes categorias para produtos diferentes, por exemplo categoria de flores, categoria de fertilizantes, e etc.

criar uma busca dinânica que eu possa selecionar as flores por cor, ou pelo nome e diversos produtos sem precisar necessáriamente procurar

geração do recibo online

ter um relatório de faturamento somente para gestor e adm

ter um histórico de recibos

ter um gráfico de faturamento (%) por cada loja e uma base para mostrar qual o faturamento total
