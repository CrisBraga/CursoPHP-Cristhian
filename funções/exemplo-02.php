<?php 

$hierarquia = array(

//criando as hierarquias aqui
//array guarda uma lista de dados, como neste exemplo, é como uma gaveta.
    array(
        'nome_cargo' => 'CEO',
        'subordinados' => array(

            //Inicio Diretor comercial
            array(
                'nome_cargo'=>'Diretor Comercial',
                'subordinados'=>array(
                    array(
                        //Tem como subordinado o Gerente de vendas
                        'nome_cargo'=>'Gerente de Vendas'
                    )//Termino gerente de vendas
                )
            ),//Termino Diretor comercial

            //Inicio Diretor Financeiro
            array(
                'nome_cargo'=>'Diretor Financeiro',
                'subordinados'=>array(
                    //Inicio Gerente de contas a pagar
                    array(
                        'nome_cargo'=>'Gerente de Contas a Pagar',
                        'subordinados'=>array(
                        //Inicio Supervisor
                            array(
                                'nome_cargo'=>'Supervisor de pagamentos'
                            )
                            //Termino supervisor
                        )
                    ),
                    //Termino Gerente de contas
                    //Inicio Gerente de Compras
                     array(
                        'nome_cargo'=>'Gerente de Compras',
                        'subordinados'=>array(
                            //Inicio supervisor de suprimentos
                            array(
                            'nome_cargo'=>'Supervisor de Suprimentos'

                            )
                            //Termino supervisor de suprimento
                        )//Inicio Gerente de compras
                    )
                )

            )//Termino Diretor Financeiro
        )
    )

);
//termino das hierarquias

//cria a função exibe com o parametro (cargos)
function exibe($cargos){

    //abre html para o navegador, basicamente aqui avisa ao navegador onde começa a lista
    $html = '<ul>';

    foreach($cargos as $cargo){
        
        //aqui é onde lista os itens geralmente de uma tabela, sempre que for usar li, necessario colocar ul
        $html .= "<li>";

        $html .= $cargo['nome_cargo'];

        //se em cargo, estiver "setado" subordinados e a contagem de subordinados forem maior que 0 
        if (isset($cargo['subordinados']) && count($cargo['subordinados']) > 0){

            //exbia os cargos dos subordinados
            $html .= exibe($cargo['subordinados']);

        }

        $html .= "/<li>";

    }

    $html .= '/<ul>';

    return $html;

}

echo exibe($hierarquia);

?>