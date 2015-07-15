<?php
require_once ("../../../controller/autoload.inc");

$db = new view\cd\model\DBCd;
$fn = new controller\functions;

//var_dump($db->selectCdByIdJoin($_GET['id']));
$fn->xmlDownload($db->selectCdByIdJoin($_GET['id'])[0]);