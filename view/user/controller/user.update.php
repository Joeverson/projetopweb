<?php
require_once ("../../../controller/autoload.inc");

$db = new view\user\model\DBUser;
$fn = new controller\functions;

if(empty($_POST))
    exit;

//var_dump($fn->prepareArrayDoublePointer($_POST, false));
$user = $_POST['id_user'];
unset($_POST['id_user']);
$_POST['pass1'] = $fn->segPassEncript($_POST['pass1']);
$_POST['pass2'] = $fn->segPassEncript($_POST['pass2']);

$db->updateCD($fn->prepareArrayDoublePointer($_POST, false), $user);// vai retornar a quantidade de linhas afetadas
