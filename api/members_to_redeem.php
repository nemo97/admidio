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
	$errors = array();	
	$action = "redeem";
    $data = json_decode(file_get_contents('php://input'), true);    
	$result = [];
    $token = $data["token"];
    if(!isset($token) || empty($token) ){
        array_push($errors,"Token is empty!");
    }
    $member_id = $data["member_id"];
    if(!isset($member_id) || empty($member_id) ){
        array_push($errors,"Member ID is empty!");
    }
    $event_id = $data["event_id"];
    if(!isset($event_id) || empty($event_id) ){
        array_push($errors,"Event ID is empty!");
    }
	$object = new stdClass();  
	try {
		if(count($errors) == 0){
			// do
			$existSQL = "SELECT `status` AS token_status,`redeem_date` AS token_redeem_date from  bcaa_issues WHERE  event_id=".$event_id." and member_id = ".$member_id." and iss_token='".$token."'";
			$datesStatement1 = $gDb->queryPrepared($existSQL);  
			if ($row1 = $datesStatement1->fetch()) {
				$token_status = $row1['token_status'];
				$token_redeem_date = $row1['token_redeem_date'];

				if($token_status === "R"){
					// not exist
					array_push($errors,"Not valid,this code is already claimed.Claimed on ".$token_redeem_date);
				}
			}          
		}
		if(count($errors) > 0){
			$object->error = "Y"; 
		}else{
			// valid data
			$result = [];
			$updateSQL = "UPDATE bcaa_issues SET `status`='R', redeem_date=CURRENT_TIMESTAMP() where event_id=".$event_id." and member_id = ".$member_id." and iss_token='".$token."'";
			$gDb->query($updateSQL); 
			$object->error = "N"; 
		}
		
	} catch (\RuntimeException $exception) {
		array_push($errors, $exception);
	}
    
	$object->errorDetails = $errors;
    $object->action = $action; 
    $object->result = $MYDATA;
	
    echo json_encode($object);
}
