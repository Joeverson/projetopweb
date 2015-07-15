<?php
require_once ("../../../controller/autoload.inc");

$db = new view\cd\model\DBCd;
$fn = new controller\functions;

if(empty($_POST))
    exit;

var_dump($_FILES);
//var_dump($fn->prepareArrayDoublePointer($_POST, false));
$user = $_POST['id_user'];
unset($_POST['id_user']);
//exit;
if(empty($_FILES['img']['name'])){
    var_dump($db->updateCD($fn->prepareArrayDoublePointer($_POST, false), $user));// vai retornar a quantidade de linhas afetadas
}else if(move_uploaded_file($_FILES['img']['tmp_name'], '../img/cd/'.$_FILES['img']['name'])){
    $_POST['img'] = $_FILES['img']['name'];
    var_dump($db->updateCD($fn->prepareArrayDoublePointer($_POST, false), $user)); // vai retornar a quantidade de linhas afetadas
}