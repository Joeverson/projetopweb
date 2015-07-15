<?php
require_once ("../../../controller/autoload.inc");
$db = new view\cd\model\DBCd;

if(empty($_POST))
    exit;

$file = $db->deleteDC($_POST['id_user']);
unlink("../img/cd/".$file);