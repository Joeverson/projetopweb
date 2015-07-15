<?php
require_once ("../../../controller/autoload.inc");
$db = new view\user\model\DBUser;

if(empty($_POST))
    exit;

$file = $db->deleteUser($_POST['id_user']);
