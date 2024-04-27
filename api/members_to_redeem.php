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
    if(!isset($event_id) || empty($event_id) ){
        $result = ["event_id" => "Event ID is empty!"];
    }
	try {
		if(count($result) == 0){
			// do
			$existSQL = "SELECT COUNT(1) as CNT from  bcaa_issues WHERE `status`='P' AND event_id=".$event_id." and member_id = ".$member_id." and iss_token='".$token."'";
			$datesStatement1 = $gDb->queryPrepared($existSQL);  
			if ($row1 = $datesStatement1->fetch()) {
				$cnt = $row1['CNT'];

				if($cnt == 0 ){
					// not exist
					$result = ["event_id" => "Not valid, already claimed."];
				}
			}          
		}
		if(count($result) > 0){
			$result["error"] = "Y";
			//echo json_encode($result);    
		}else{
			// valid data
			$result = [];
			$updateSQL = "UPDATE bcaa_issues SET `status`='R', redeem_date=CURRENT_TIMESTAMP() where event_id=".$event_id." and member_id = ".$member_id." and iss_token='".$token."'";
			$gDb->query($updateSQL); 
		}
	} catch (\RuntimeException $exception) {
		$result = ["event_id" => $exception];
	}
    echo json_encode($result);
}
