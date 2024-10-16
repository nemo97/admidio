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
			$existSQL = "SELECT count(1) AS CNT from  bcaa_issues WHERE member_id = ".$member_id." and iss_token='".$token."'";
			$datesStatement1 = $gDb->queryPrepared($existSQL);  
			if ($row1 = $datesStatement1->fetch()) {
				$valid_count = $row1['CNT'];			

				if($valid_count === 0){
					// not exist
					array_push($errors,"Invalid token.");
				}
			}          
		}
		/*
		if(count($errors) == 0){
			// do
			$existSQL = "SELECT count(1) AS CNT from  bcaa_current_event WHERE event_id = ".$event_id." and status='Y'";
			$datesStatement1 = $gDb->queryPrepared($existSQL);  
			if ($row1 = $datesStatement1->fetch()) {
				$valid_count = $row1['CNT'];			

				if($valid_count !== 1){
					// not exist
					array_push($errors,"This event[".$event_id."] is not current event! Please check with APP admin.");
				}
			}          
		}*/
		if(count($errors) == 0){
			// do
			$redeemSQL = "SELECT count(1) AS redeem_cnt,get_member_guest_count(".$member_id.") as guest_cnt from  bcaa_token_redeem r WHERE member_id = ".$member_id." and iss_token='".$token."' and event_id=get_active_event()  ";
			$datesStatement1 = $gDb->queryPrepared($redeemSQL);  
			if ($row1 = $datesStatement1->fetch()) {
				$redeem_cnt = $row1['redeem_cnt'];
				$guest_cnt = $row1['guest_cnt'];				

				if($redeem_cnt+1 > $guest_cnt){
					// not exist
					array_push($errors,"Redeem count(".$redeem_cnt.") is more than guest count(".$guest_cnt.")");
				}
			}          
		}
		
		if(count($errors) > 0){
			$object->error = "Y"; 
		}else{
			// valid data
			$result = [];
			//$updateSQL = "UPDATE bcaa_issues SET `status`='R', redeem_date=CURRENT_TIMESTAMP() where event_id=".$event_id." and member_id = ".$member_id." //and iss_token='".$token."'";
			$insertSQL = "INSERT INTO bcaa_token_redeem (`redeem_id`, `event_id`, `member_id`, `iss_token`, `status`, `redeem_date`, `redeem_user`)
	VALUES (NULL,get_active_event(),".$member_id.",'".$token."','R',CURRENT_TIMESTAMP(),'SYSTEM')";
			$gDb->queryPrepared($insertSQL); 
			$object->error = "N"; 
		}
		
	} catch (\RuntimeException $exception) {
		array_push($errors, $exception);
	}
    
	if(count($errors) > 0){
		$object->error = "Y"; 
	}
	$object->errorDetails = $errors;
    $object->action = $action; 
    $object->result = $MYDATA;
	
    echo json_encode($object);
}
