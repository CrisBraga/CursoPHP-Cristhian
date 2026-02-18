<?php

$host = 'localhost';
$port = '5433';
$dbname = 'floricultura';
$user = 'postgres';
$pass = 'acesse';

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {

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

    function verificarTipo() {}

    //verifica se o usuario clicou no botão
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
            ':nome'      => $nomeProduto,
            ':preco'     => $precoProduto,
            ':estoque_id' => $idEstoque
        ]);

        echo "<p style='color:green;'>Sucesso! Equipamento cadastrado.</p>";
    }
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM equipamentos WHERE id = ?");
$stmt->execute([$id]);
$equipamentos = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_Server['REQUEST_METHOD'] === 'POST') {
    $novoNome = $_POST['txt_nome'];

    $sql = "UPDATE equipamentos SET nome = :nome WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['nome' => $novoNome, 'id' => $id]);

    header("location: visualizar.php");
}

//podemos adicionar rollback() para cancelar a mudança no código, por exemplo, se tal coisa der certo mas outra der errado, cancela.

?>

<!-- form é o corpo do código, sera colocado tudo dentro dele -->
<form class="meu-formulario" action="" method="POST">
    <!-- h2 é o cabeçalho -->
    <h1>Cadastrar Equipamentos</h1>

    <!-- div é onde define um espaço entao tudo que estiver fora dele pula uma linha para não ficarem colados -->
    <div class="campo">
        <label>Tipo de Item</label>
        <select id="tipo_item" name="tipo_item" onchange="verificarTipo()">
            <option value="">Selecionar</option>
            <option value="equipamento">Equipamento</option>
            <option value="semente">Semente</option>
        </select>
    </div>

    <div id="campo_semente" style="display: none;" class="campo">
        <label>Tipo de Semente:</label>
        <input type="text" name="txt_tipo">
    </div>

    <div id="campo_equipamento" style="display: none;" class="campo">
        <label>Nome do Equipamento: </label>
        <input type="text" name="txt_nome">
    </div>

    <div class="campo">
        <!-- label é o texto que será visto pelo usuario -->
        <label>Nome do Equipamento: </label>
        <!-- input é onde fica o quadrado de texto ou etc. aqui é texto mesmo, mas pode ser number e submit
     o required é onde eu faço o usuario adicionar os dados -->
        <input type="text" name="txt_nome" required>
    </div>

    <div class="campo">
        <label>Preço:</label>
        <!-- step define quantas casas decimais para tras pode ir, placehololder é o texto que fica dentro da caixa -->
        <input type="number" step="0.01" placeholder="0,00" name="txt_preco" required>
    </div>

    <div class="campo">
        <label>Vincular ao Estoque</label>
        <select name="sel_estoque">
            <option value="">Selecione...</option>

            <!-- vamos supor que categorias é um baú cheio de informações que vieram do banco 
         "as $cat" é a mão que vai tirando as informações uma por uma
         o $cat id é o id do item e o cat nome é o nome que vai aparecer desse item-->
            <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['id'] ?>">
                <?= $cat['nome'] ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit">Cadastrar</button>
</form>

<?php

$stmt = $conn->query("SELECT * FROM equipamentos");
$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($lista as $item) {
    echo $item['nome'] . " - ";

    echo "<a href='editar.php?id=" . $item['id'] . ">Editar</a><br>";
}

?>