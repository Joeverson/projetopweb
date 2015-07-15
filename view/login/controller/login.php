<?php
session_start();
require_once ("../../../controller/autoload.inc");

$db = new model\DB;
$fn = new controller\functions;

if(empty($_POST))
    exit;

$user = $_SESSION['user'] = $db->auth($fn->prepareArrayDoublePointer($_POST));// envia para o DB o pedido


if($user == false){
    echo "false";
    exit;
}

echo "../dashboard/index.php";

