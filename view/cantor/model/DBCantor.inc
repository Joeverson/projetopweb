<?php
namespace view\cantor\model;
use model\DB;

class DBCantor extends DB{
    public function insertCantor($array){
        try{
            $stmt = $this->conn->prepare("INSERT INTO cantor (name) VALUES (:name)");
            $stmt->execute($array);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAll(){
        try{
            $stmt = $this->conn->query("select * from cantor");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectCdById($id){
        try{
            $stmt = $this->conn->query("select * from cantor where id_cantor=".$id);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateCD($array, $id){
        try{
            $stmt = $this->conn->prepare("update cantor set name=:name where id_cantor=".$id);
            $stmt->execute($array);
            var_dump($stmt->errorInfo());
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function deleteCantor($id){
        try{
            $this->conn->query("delete from cantor WHERE id_cantor= ".$id);
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }
}