<?php
require_once ("../../../controller/autoload.inc");

$db = new view\user\model\DBUser;
$fn = new controller\functions;

if(empty($_POST))
    exit;

$_POST['pass1'] = $fn->segPassEncript($_POST['pass1']);
$_POST['pass2'] = $fn->segPassEncript($_POST['pass2']);

$db->insertUser($fn->prepareArrayDoublePointer($_POST, false));// vai retornar a quantidade de linhas afetadas
