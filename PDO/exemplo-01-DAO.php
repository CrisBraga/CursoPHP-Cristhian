<?php

class Sql
{

    //conn é a conexão ativa com o banco de dados
    private $conn;

    public function __construct()
    {
        //cria a conexão com o postgreSQL usando os dados passados aqui de host, banco, usuario e senha
        $this->conn = new PDO("pgsql:host=localhost;dbname=curso_php_cristhian", "root", "root");
    }

    //Recebe varios dados e como senha, nome etc. e chama o setParam para tratar deles individualmente
    private function setParams($statement, $parameters = array())
    {

        foreach ($parameters as $key => $value) {

            $statement->bindParam($key, $value);
        }
    }

    //essa é a ligacão entre o nome que foi posto no SQL e o valor que vem do sistema, faz com que o banco de dados entenda o que tem que ser substituido
    private function setParam($statement, $key, $value)
    {
        $statement->bindParam($key, $value);
    }

    //aqui é feito o recebimento do comando sql e verifica se ta correto, e manda para o banco de dados
    public function query($rawQuery, $params = array())
    {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    //é um facilitador de buscas
    public function select($rawQuery, $params = array()): array
    {

        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



//================================================================================================

class Usuario
{

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario()
    {
        return $this->idusuario;
    }

    public function setIdusuario($value)
    {
        $this->idusuario = $value;
    }

    public function getDeslogin()
    {
        return $this->deslogin;
    }

    public function setDeslogin($value)
    {
        $this->deslogin = $value;
    }

    public function getDessenha()
    {
        return $this->dessenha;
    }

    public function setDessenha($value)
    {
        $this->dessenha = $value;
    }

    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }

    public function setDtcadastro($value)
    {
        $this->dtcadastro = $value;
    }

    public function loadById($id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID=>$id"
        ));

        if (count($results) > 0) {

            $row = $results[0];
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "idusuario" => $this->getIdusuario(),
            "deslogin" => $this->getDeslogin(),
            "dessenha" => $this->getDessenha(),
            "dtcadastro" => $this->getDtcadastro()->format("d/m/Y H::i:s")
        ));
    }
}