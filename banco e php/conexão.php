<?php

global $conn;

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
    //sempre que eu pedir uma tabela olhe dentro do schema public
    $conn->exec("SET search_path TO public");
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
