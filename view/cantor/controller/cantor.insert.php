<?php
require_once ("../../../controller/autoload.inc");

$db = new view\cantor\model\DBCantor;
$fn = new controller\functions;

if(empty($_POST))
    exit;

$db->insertCantor($fn->prepareArrayDoublePointer($_POST, false));// vai retornar a quantidade de linhas afetadas
