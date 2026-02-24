<?php

require_once 'conexão.php';

require_once 'html_exercicio.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produtos = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoNome = $_POST['txt_nome'];

    $sql = "UPDATE produtos SET nome = :nome WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['nome' => $novoNome, 'id' => $id]);

    header("location: visualizar.php");
}


//podemos adicionar rollback() para cancelar a mudança no código, por exemplo, se tal coisa der certo mas outra der errado, cancela.

$stmt = $conn->query("SELECT * FROM produtos");
$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($lista as $item) {
    echo $item['nome'] . " - ";

    echo "<a href='editar.php?id=" . $item['id'] . "'>Editar</a><br>";
}
