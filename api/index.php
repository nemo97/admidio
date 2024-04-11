<?php
require_once(__DIR__ . '/../adm_program/system/common.php');
//var_dump($_SERVER)
//$MYDATA = ["Ch" => "Test"];
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $sql = 'SELECT * FROM adm2_members';
    $datesStatement = $gDb->queryPrepared($sql);
    
    $MYDATA = array();

    while ($row = $datesStatement->fetch()) {
        $MYDATA[] =  $row ;
    }

    $insetSQL = "INSERT INTO bcaa_issues(iss_id,event_id,member_id,iss_token,`status`) VALUES (NULL,1,1,'TEST1234','P')";
    $gDb->queryPrepared($insetSQL);
    
    echo json_encode($MYDATA);
}
