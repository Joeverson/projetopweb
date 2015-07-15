<?php
require_once ("../../../controller/autoload.inc");
$db = new view\cantor\model\DBCantor;

if(empty($_POST))
    exit;

$file = $db->deleteCantor($_POST['id_user']);
