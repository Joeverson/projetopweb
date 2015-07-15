<?php
require_once ("../../../controller/autoload.inc");

$db = new view\cantor\model\DBCantor;
$fn = new controller\functions;

if(empty($_POST))
    exit;

//var_dump($fn->prepareArrayDoublePointer($_POST, false));
$user = $_POST['id_user'];
unset($_POST['id_user']);

$db->updateCD($fn->prepareArrayDoublePointer($_POST, false), $user);// vai retornar a quantidade de linhas afetadas
