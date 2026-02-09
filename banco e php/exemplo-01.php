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

    echo "Instancia criada e conectada com sucesso";

} catch(PDOException $e){
    echo "Erro na conexão: " . $e->getMessage();
}

?>

