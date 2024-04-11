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
    $result = [];
    $token = $data["token"];
    if(!isset($token) || empty($token) ){
        $result = ["token" => "Token is empty!"];
    }
    $member_id = $data["member_id"];
    if(!isset($member_id) || empty($member_id) ){
        $result = ["member_id" => "Member ID is empty!"];
    }
    $event_id = $data["event_id"];
    if(!isset($member_id) || empty($member_id) ){
        $result = ["event_id" => "Event ID is empty!"];
    }
    if(count($result) > 0){
        //echo json_encode($result);    
    }else{
        // valid data
        $result = [];
        $updateSQL = "UPDATE bcaa_issues SET `status`='R', redeem_date=CURRENT_TIMESTAMP() where event_id=".$eventId." and member_id = ".$member_id." and iss_token='".$uniqueId."'";
        $gDb->queryPrepared($updateSQL);            

    }
    echo json_encode($result);
}
