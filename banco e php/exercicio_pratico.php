<?php

require_once 'conexão.php';

$produtoEditar = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['txt_nome'];
    $preco = $_POST['txt_preco'];
    $id    = $_POST['id_escondido'] ?? null;

    if ($id) {
        $sql = "UPDATE produtos SET nome = :nome, preco = :preco WHERE id = :id";
        $params = ['nome' => $nome, 'preco' => $preco, 'id' => $id];
    } else {
        $sql = "INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)";
        $params = ['nome' => $nome, 'preco' => $preco];
    }

    $stmt = $conn->prepare($sql);

    $stmt->execute($params);

    header("location: visualizar.php");
    exit;
}

if (isset($_GET['id'])) {
    $id_url = $_GET['id'];
    $sql = "SELECT p.*, s.quantidade FROM produtos p 
            LEFT JOIN estoque_saldo s ON p.id = s.produto_id
            WHERE p.id = :id";
    $stmt = $conn->query($sqlLista);
    $stmt->execute(['id' => $id_url]);
    $produtoEditar = $stmt->fetch(PDO::FETCH_ASSOC);
}

$sqlLista = "SELECT p.*, s.quantidade FROM produtos p 
             LEFT JOIN estoque_saldo s ON p.id = s.produtos_id";
$stmt = $conn->query($sqlLista);
$lista = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];

if ($stmt) {
    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $lista = [];
}

foreach ($lista as $item) {
    echo "Produto: " . $item['nome'] . " | Estoque: " . $item['quantidade_estoque'];
    echo " - <a href='exercicio_pratico.php?id=" . $item['id'] . "'>Editar</a><br>";
}



require_once 'html_exercicio.php';
