<?php
namespace model;
use \PDO as pdo;

class DB{
    private $user = 'root';
    private $pass = '';
    private $host = 'localhost';
    private $bdname = 'pweb';
    private $socket = 'mysql';
    protected $conn;


    public function __construct(){
        try{
            $this->conn = new pdo($this->socket.":host=".$this->host.";dbname=".$this->bdname, $this->user, $this->pass);
        }catch(\PDOException $e){
            echo "Deu algum erro na conexão - ".$e->getMessage();
        }
    }

    public function auth($array){ // Busca a senha no bd e retorna true se tiver ou retorna false caso não tenha
        $rs = $this->conn->query("SELECT * FROM user WHERE name = '".$array[':name']."' and pass2 = '".$array[':pass']."'");
        return $rs->fetch();
    }




    public function selectAllCategory(){ // retorna um array com as informações de acordo com o mês
        $rs = $this->conn->query("SELECT * FROM privilegios");
        if(($rs == false) || ($rs == NULL))
            return false;

        return $rs;
    }


    // :: privilegios


    public function insertPrivlegios($array){
        try{
            $stmt = $this->conn->prepare("INSERT INTO user(name, cpf, email, pass, id_priv) VALUES(:name, :cpf, :email, :pass, :id_priv)");
            return $stmt->execute($array);
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }

    public function getMenuForPrivileges($priv){
        return $rs = $this->conn->query("SELECT * FROM permissoes where id_priv = '".$priv."'");
    }

    public function find($name){
        try{
            $stmt = $this->conn->query("select * from cd jOIN cantor ON(cd.id_cantor = cantor.id_cantor) WHERE title LIKE '%".$name."%'");
            $rs = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if(!$rs)
                return $rs['nothing'] = "Nada Encontrado!";

            return $rs;
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }




}