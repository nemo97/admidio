<?php
require_once(__DIR__ . '/../adm_program/system/common.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $MYDATA = [];
    /*
    $sql = 'SELECT * FROM adm2_members';
    $datesStatement = $gDb->queryPrepared($sql);
    
    while ($row = $datesStatement->fetch()) {
        $MYDATA[] =  $row ;
    }
    */

    //$MYDATA['test' => $_POST['test']];
    $data = json_decode(file_get_contents('php://input'), true);
    echo json_encode($data);
}
