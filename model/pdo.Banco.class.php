<?php
// Classe de conexão universal ao banco
interface iBanco{
    public function conectar($nome = "mamaezona", $host = "localhost", $usuario = "root", $senha = "");
    public function desconectar();
}

abstract class Banco
{
    protected $pdo;
    public $msg;
    function conectar($nome = "mamaezona", $host = "localhost", $usuario = "root", $senha = "1234")
    {
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=" . $nome . "; host=" . $host . ";charset=utf8", $usuario, $senha);
        } catch (PDOException $erro) {
            global $msg;
            $msg = $erro->getMessage();
            echo $msg;
        }
    }

    function desconectar(){
        global $pdo;
        $pod = null;
    }
}
