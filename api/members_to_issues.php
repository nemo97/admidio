<?php
require_once(__DIR__ . '/../adm_program/system/common.php');

 if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
 }

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
	
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$action = $_GET['action'];
	$MYDATA = array();
	$errors = array();
	
	if($action == "ALL_ACTIVE" || empty($action)){
		$sql = 'SELECT m.`mem_id` AS member_id ,ud2.`usd_value` AS member_status,CASE WHEN ud2.`usd_value` = 1 THEN \'Active\' END AS member_status_desc,ud.`usd_value` AS member_email,CONCAT(ud4.`usd_value`,\' \',ud3.`usd_value`) AS member_name,
			   (SELECT COUNT(1) FROM bcaa_issues b WHERE m.`mem_id` = b.`member_id`) AS token_count
				FROM adm2_members m             
				LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_id` AND ud.`usd_usf_id` = 11 
				LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_id` AND ud2.`usd_usf_id` = 24
				LEFT OUTER JOIN `adm2_user_data` ud3 ON ud3.`usd_usr_id` = m.`mem_id` AND ud3.`usd_usf_id` = 1
				LEFT OUTER JOIN `adm2_user_data` ud4 ON ud4.`usd_usr_id` = m.`mem_id` AND ud4.`usd_usf_id` = 2
				WHERE m.mem_approved IS NULL AND ud2.`usd_value` IS NOT NULL';
		$datesStatement = $gDb->queryPrepared($sql);
		
		//$MYDATA = array();

		while ($row = $datesStatement->fetch()) {
			$MYDATA[] =  $row ;
		}

		//echo json_encode($MYDATA);
	}else if($action == "GET_TOKENS"){
		// 
		$member_id = $_GET['member_id'];
		 if (empty($member_id)) {
			array_push($errors,"Member_ID should be provide.");			
		}
		$queryParams = [$member_id];
		$sql = 'SELECT iss_id,`member_id`,`iss_token` AS token_text,`status` AS token_status,\'\' AS token_status_desc,`redeem_date` AS token_redeem_date FROM bcaa_issues b WHERE  b.`member_id` = ?';
		$datesStatement = $gDb->queryPrepared($sql,$queryParams);
		while ($row = $datesStatement->fetch()) {
			$MYDATA[] =  $row ;
		}
		
	}
	$object = new stdClass();   
    // Added property to the object 
	if(count($errors) > 0){
		$object->error = "Y"; 
	}else{
		$object->error = "N"; 
	}
	$object->errorDetails = $errors;
    $object->action = $action; 
    $object->result = $MYDATA;
	
	echo json_encode($object);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents('php://input'), true);
    $action = $data["action"];
    $eventId = $data["eventId"];    
    if(empty($eventId)){
        $eventId = 1;
    }
	$errors = array();
	$MYDATA = array();
	if($action == "all_active_members"){
        // issue to ALL active members    
		$sql = 'SELECT ud3.`usd_value` AS member_count,ud2.`usd_value` AS member_status,ud.`usd_value` AS member_email,m.`mem_id`
		FROM adm2_members m 
		LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_id` AND ud.`usd_usf_id` = 11 
		LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_id` AND ud2.`usd_usf_id` = 24
		LEFT OUTER JOIN `adm2_user_data` ud3 ON ud3.`usd_usr_id` = m.`mem_id` AND ud3.`usd_usf_id` = 25
		HAVING ud.`usd_value` IS NOT NULL';
		$datesStatement = $gDb->queryPrepared($sql);    
		
		while ($row = $datesStatement->fetch()) {
			//$MYDATA[] =  $row ;
			$member_count = $row["member_count"];
			$member_status = $row["member_status"];
			$member_email = $row["member_email"];
			$member_id = $row["mem_id"];

			$i = 0;
			while($i < $member_count){
				// issue code             
				$uniqueId = uniqid();
				$insetSQL = "INSERT INTO bcaa_issues(iss_id,event_id,member_id,iss_token,`status`) VALUES (NULL,".$eventId.",".$member_id.",'".$uniqueId."','P')";
				$gDb->queryPrepared($insetSQL);            

				$i++;
			}

		}
	}else if( $action == "UNDO_TOKEN"){
		 $iss_id = $data["iss_id"];
		 $member_id = $data["member_id"];
		 if (empty($member_id)) {
			array_push($errors,"Member_ID should be provide.");			
		 } 
		 if (empty($iss_id)) {
			array_push($errors,"Iss_id should be provide.");			
		 }
		$queryParams = [$iss_id,$member_id];
		$sql = "SELECT count(1) as CNT from bcaa_issues where iss_id=? and member_id=? and `status`='R'";		
		$stmt = $gDb->queryPrepared($sql,$queryParams);
		$rec_count = 0;
		if ($row = $stmt->fetch()) {
			$rec_count = $row["CNT"];			
		}
		if($rec_count > 0 ){
			$insetSQL = "UPDATE bcaa_issues set redeem_date=NULL,`status`='P' where iss_id=? and member_id=?";		
			$stmt = $gDb->queryPrepared($insetSQL,$queryParams);	
		}else{
			array_push($errors,"No record found with redeem status('R') for iss_id=".$iss_id.", member id: ".$member_id);			
		}			
		//if($stmt -> rowCount() === 1){
		//	$MYDATA = "Succesfully deleted.";
		//}else{
		//	$errors["NotDeleted"] = "Record is not deleted.";			
		//}
	}
	else if( $action == "DELETE_TOKEN"){
		 $iss_id = $data["iss_id"];
		 $member_id = $data["member_id"];
		 if (empty($member_id)) {
			array_push($errors, "Member_ID should be provide.");			
		 } 
		 if (empty($iss_id)) {
			array_push($errors, "Iss_id should be provide.");			
		 }
		$queryParams = [$iss_id,$member_id];
		$sql = "SELECT count(1) as CNT from bcaa_issues where iss_id=? and member_id=?";		
		$stmt = $gDb->queryPrepared($sql,$queryParams);
		$rec_count = 0;
		while ($row = $stmt->fetch()) {
			$rec_count = $row["CNT"];			
		}
		if($rec_count > 0 ){
			$insetSQL = "DELETE FROM bcaa_issues WHERE iss_id=? and member_id=?";		
			$stmt = $gDb->queryPrepared($insetSQL,$queryParams);	
		}else{
			array_push($errors, "No record found iss_id=".$iss_id.", member id: ".$member_id);			
		}			
		//if($stmt -> rowCount() === 1){
		//	$MYDATA = "Succesfully deleted.";
		//}else{
		//	$errors["NotDeleted"] = "Record is not deleted.";			
		//}
	}
	else if( $action == "ISSUE_SINGLE_TOKEN"){
		 
		 $member_id = $data["member_id"];		 
		 if (empty($member_id)) {
			array_push($errors,"Member_ID should be provide.");			
		 } 
		 
		$queryParams = [$member_id];
		$sql = "SELECT count(1) as CNT from bcaa_issues where  member_id=?";		
		$stmt = $gDb->queryPrepared($sql,$queryParams);
		$rec_count = 0;
		while ($row = $stmt->fetch()) {
			$rec_count = $row["CNT"];			
		}
		
		// issue code             
		$uniqueId = uniqid();
		$insetSQL = "INSERT INTO bcaa_issues(iss_id,event_id,member_id,iss_token,`status`) VALUES (NULL,".$eventId.",".$member_id.",'".$uniqueId."','P')";
		$gDb->queryPrepared($insetSQL);  
				
		//}else{
	//		$errors["NoRecordFound"] = "No record found member id: ".$member_id;			
	//	}			
		//if($stmt -> rowCount() === 1){
		//	$MYDATA = "Succesfully deleted.";
		//}else{
		//	$errors["NotDeleted"] = "Record is not deleted.";			
		//}
	}
	if (empty($action)) {
		array_push($errors,"Action should be provide.");			
	} 
	$object = new stdClass();   
    // Added property to the object 
	if(count($errors) > 0){
		$object->error = "Y"; 
	}else{
		$object->error = "N"; 
	}
	$object->errorDetails = $errors;
    $object->action = $action; 
    $object->result = $MYDATA;
	
	echo json_encode($object);
	
    
}