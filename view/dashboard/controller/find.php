<?php
require_once ("../../../controller/autoload.inc");

$db = new model\DB;
echo json_encode($db->find($_POST['find']));