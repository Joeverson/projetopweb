<?php
namespace view\cd\model;
use model\DB;

class DBCd extends DB{
    public function insertCD($array){
        try{
            if(array_key_exists(':img', $array))
                $stmt = $this->conn->prepare("INSERT INTO cd (title, date, descricao, id_cantor, img) VALUES (:title, :date, :descricao,:id_cantor,:img)");
            else
                $stmt = $this->conn->prepare("INSERT INTO cd (title, date, descricao , id_cantor) VALUES (:title, :date, :descricao, :id_cantor)");

            $stmt->execute($array);
            return $stmt->errorInfo();
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAll(){
        try{
            $stmt = $this->conn->query("select * from cd");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectCdById($id){
        try{
            $stmt = $this->conn->query("select * from cd where id_cd=".$id);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectCdByIdJoin($id){
        try{
            $stmt = $this->conn->query("select title, descricao, date, img, name from cd JOIN cantor on(cantor.id_cantor=cd.id_cantor)where cd.id_cd=".$id);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateCD($array, $id){
        try{
            var_dump($array);
            if(array_key_exists(":img", $array))
                $stmt = $this->conn->prepare("update cd set title=:title, img=:img, date=:date, descricao=:descricao, id_cantor=:id_cantor where id_cd=".$id);
            else
                $stmt = $this->conn->prepare("update cd set title=:title, date=:date, descricao=:descricao, id_cantor=:id_cantor where id_cd=".$id);
            $stmt->execute($array);
            var_dump($stmt->errorInfo());
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function deleteDC($id){
        try{
            $this->conn->query("delete from cd WHERE id_cd= ".$id);
            $ft = $this->conn->query("select img from cd WHERE id_cd= ".$id);
            return $ft->fetch(\PDO::FETCH_ASSOC);

        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }
}