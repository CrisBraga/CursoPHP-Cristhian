<?php 

$host = 'localhost';
$port = '5433';
$dbname = 'floricultura';
$user = 'postgres';
$pass = 'acesse';

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try{

    //cria uma nova conexão (PDO = obejto de dados do PHP com segurança)
    $conn = new PDO($dsn, $user, $pass);

    //caso aconteça algum erro retorne imediatamente para mim uma exeção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //sempre que eu pedir uma tabela olhe dentro da DB floricultura
    $conn->exec("SET search_path TO floricultura");


    $sql = "SELECT id, nome FROM estoque";
    //resultado obtido
    $stmt = $conn->query($sql);

    //o fetchALL é um tradutor, o resultado obtido vira uma tabela do php
    $categorias = $stmt->fetchALL(PDO::FETCH_ASSOC);

    //verifica se o usuario clicou no botão
    if ($_SERVER ['REQUEST_METHOD'] === 'POST'){

        //pegamos os valores criados no formulario atraves do 'name'
        $nomeProduto = $_POST['txt_nome'];
        $precoProduto = $_POST['txt_preco'];
        $idEstoque = $_POST['sel_estoque'];

        //preparamos o comando para o sql
        $sqlInsert = "INSERT INTO equipamentos (nome, preco, estoque_id)
                      VALUES (:nome, :preco, :estoque_id)";

        //PDO prepara o comando
        $stmt = $conn->prepare($sqlInsert);

        //executado com sucesso e envio dos valores reais para o banco
        $stmt->execute([
            ':nome'      =>$nomeProduto,
            ':preco'     =>$precoProduto,
            ':estoque_id'=>$idEstoque
        ]);

        echo"<p style='color:green;'>Sucesso! Equipamento cadastrado.</p>";

    }

    echo "Instancia criada e conectada com sucesso";

} catch(PDOException $e){
    echo "Erro na conexão: " . $e->getMessage();
}

?>

 <?php //form é o corpo do html
        //action diz para qual arquivo os dados devem ir, caso vazio retorna para a pagina que ja estou
        //method é o modo de envio ao postgres
        //required é pra deixar o campo obrigatóriamente preenchido
        //label é a etiqueta de lembrança, nela você escreve seu texto para ser mostrado ao usuario

        //input é onde o usuario ira interagir, por exemplo com essa etiqueta de nome de equipamento, logo a frente ele precisa colocar o  nome do equipamento neste input. type="text" abre uma caixa para letras e números, type="number" so aceita números e name"nome do seu campo" é como voce ira chamar aquele dado no php, por exemplo eu chamo o $POST['txt_nome'].
        //step é para a precisão de numeros por exemplo step="0.01" vai ser 100,00

        //select é o menu que é uma lista de opções 
        //option são os itens que ficam escondidos no select


        //==========================
        //     IMPORTANTE
        //==========================
        //o foreach pega a sua lista zona ($categorias) e começa a percorrê-la, uma linha por vez.
        //o option value é o que o banco de dados realmente quer receber. O usuário não vê o value, mas quando ele seleciona "Ferramentas", o formulário entende que você selecionou o número 2.
        //<?= $cat['nome'] "?">Este é o texto que aparece para o ser humano ler dentro da caixinha de seleção
        //o endforeach como o nome ja diz, fecha o foreach e continua o código
        ?>


<form action="" method="POST">
    
    <label>Nome do Equipamento: </label>
    <input type="text" name="txt_nome" required>

    <label>Preço:</label>
    <input type="number" step="0.01" name="txt_preco" required>

    <label>Vincular ao Estoque</label>
    <select name="sel_estoque">
        <option value="">Selecione...</option>

        <?php foreach($categorias as $cat): ?>
            <option value="<?=  $cat['id'] ?>">
                 <?=  $cat['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Cadastrar</button>
</form>