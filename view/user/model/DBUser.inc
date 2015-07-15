<?php
namespace view\user\model;
use model\DB;

class DBUser extends DB{
    public function insertUser($array){
        try{
            $stmt = $this->conn->prepare("INSERT INTO user (name, pass1, pass2) VALUES (:name, :pass1, :pass2)");
            $stmt->execute($array);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAll(){
        try{
            $stmt = $this->conn->query("select * from user");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectCdById($id){
        try{
            $stmt = $this->conn->query("select * from user where id_user=".$id);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateCD($array, $id){
        try{
            $stmt = $this->conn->prepare("update user set name=:name, pass1=:pass1, pass2=:pass2 where id_user=".$id);
            $stmt->execute($array);
            var_dump($stmt->errorInfo());
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function deleteUser($id){
        try{
            $this->conn->query("delete from user WHERE id_user= ".$id);
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }
}