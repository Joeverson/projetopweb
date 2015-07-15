<?php

namespace controller;

class functions{

    //converte o array para tipo PDO paramentro aceitavel
    /*
     * $flag -> flag usada para ignorar os campos vazios, por default (true)
     *
     */
    public function prepareArrayDoublePointer($array, $flag = true){
        if(!is_array($array) || empty($array))
            return null;

        foreach($array as $key => $val){
            if( $val == "" and $flag) continue;
            if( $key == 'pass' ){
                $newArray[':'.$key] = $this->segPassEncript($val);
                continue;
            }

            $newArray[':'.$key] = $val;
        }

        return $newArray;
    }

    // encriptar senhas
    public function segPassEncript($pass){
        return md5(sha1($pass));
    }


    public function makeMenu(){
        //$acessLevel = $_SESSION['acessLevel'];  //informação necessária para saber o nivel de acesso do usuário logado
        if(isset($_SESSION['makeMenu'])) return true;

        foreach(scandir('../../modules') as $k)
            if(($k != '.') && ($k != '..') && (!preg_match("/([.])/",$k))) {
                $manifest = '../../modules/' . $k . '/manifest.json';
                if (is_file($manifest)) {
                    $obj = json_decode(file_get_contents($manifest), true);

                    if ($obj['dad'] == "this") {
                        if (!empty($obj['acessLevel'])){
                            $array = explode(",", $obj['acessLevel']);
                            $masters[$obj['title']] = $obj;
                            $masters[$obj['title']]['acessLevel'] = $array;
                        }
                    } else {
                        $subs[$obj['dad']] = $obj;
                    }
                }
            }

        if(!empty($subs)){
            foreach ($subs as $sub){
                foreach($sub['submenu'] as $s)
                    $masters[$sub['dad']]['submenu'][] = $s;
            }
        }

        $_SESSION["makeMenu"] = $masters;
    }


    public function generateQuerySqlUpdatePDO($table, $array, $id, $where){
        $str = "UPDATE ".$table." SET";
        unset($array['id_user']);

        foreach($array as $key => $val){
            if($val == '' || $key == "id_user") continue;


            if(end($array) == $val)
                $str .= " $key = '".$val."' ";
            else
                $str .= " $key = '".$val."', ";
        }

        $str .= "WHERE ".$where." = '$id'";

        return $str;
    }

    public function xmlDownload($array){
        $dom = new \DOMDocument("1.0", "ISO-8859-1");
        $root = $dom->createElement("cd");

        foreach($array as $k => $v){
            if($k == "name")
                $root->appendChild($dom->createElement("cantor", $v));
            else
                $root->appendChild($dom->createElement($k, $v));
        }

        $dom->appendChild($root);

        //  header("Content-Type: text/xml");
        print $dom->save($array['title'].".xml");
        header('Content-disposition: attachment; filename="'.$array['title'].".xml".'"');
        header('Content-type: "text/xml"; charset="utf8"');
        readfile($array['title'].".xml");

    }
}