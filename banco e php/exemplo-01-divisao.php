<?php

require_once("exemplo-01.php");


$stmt = $conn->query("SELECT * FROM equipamentos");
$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($lista as $item) {
    echo $item['nome'] . " - ";

    echo "<a href='editar.php?id=" . $item['id'] . ">Editar</a><br>";
}