<?php
require_once(__DIR__ . '/../adm_program/system/common.php');
require_once('./email.php');

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
/*
if ($gValidLogin) {
	// logged in
}else{
	http_response_code( 500 );
	die();
}
*/		
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$action = $_GET['action'];
	$MYDATA = array();
	$errors = array();
	$summery = array();
	if($action == "ALL_ACTIVE" || empty($action)){
		$sql = "
			SELECT m.`mem_uuid`,m.`mem_id` AS member_id ,ud2.`usd_value` AS member_status,CASE WHEN ud2.`usd_value` = 1 THEN 'Active' END AS member_status_desc,ud.`usd_value` AS member_email,CONCAT(ud4.`usd_value`,' ',ud3.`usd_value`) AS member_name,
   (SELECT COUNT(redeem_date) FROM bcaa_token_redeem b WHERE m.`mem_id` = b.`member_id` AND b.event_id=get_active_event()) AS token_count, ud5.`usd_value` AS guest_count,e.`sent_status`,e.`sent_date`
	FROM adm2_members m             
	LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_usr_id` AND ud.`usd_usf_id` = 11 
	LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_usr_id` AND ud2.`usd_usf_id` = 24
	LEFT OUTER JOIN `adm2_user_data` ud3 ON ud3.`usd_usr_id` = m.`mem_usr_id` AND ud3.`usd_usf_id` = 1
	LEFT OUTER JOIN `adm2_user_data` ud4 ON ud4.`usd_usr_id` = m.`mem_usr_id` AND ud4.`usd_usf_id` = 2
	LEFT OUTER JOIN `adm2_user_data` ud5 ON ud5.`usd_usr_id` = m.`mem_usr_id` AND ud5.`usd_usf_id` = 25
	LEFT OUTER JOIN `bcaa_send_email` e ON e.`mem_uuid` = m.`mem_uuid` 
	WHERE ud2.`usd_value` IS NOT NULL
				";		
		$datesStatement = $gDb->queryPrepared($sql);
		
		//$MYDATA = array();

		while ($row = $datesStatement->fetch()) {
			$MYDATA[] =  $row ;
		}


	$sql2 = "
		SELECT  (SELECT SUM(ud5.usd_value)
FROM adm2_members m             				
LEFT OUTER JOIN `adm2_user_data` ud5 ON ud5.`usd_usr_id` = m.`mem_id` AND ud5.`usd_usf_id` = 25	
) AS guest_count,
(SELECT COUNT(redeem_date) FROM bcaa_token_redeem b WHERE b.event_id=get_active_event()) AS total_redeem_count,
(
SELECT SUM(ud6.usd_value)
FROM `bcaa_token_redeem` r
INNER JOIN adm2_members m2  ON r.member_id= m2.`mem_usr_id` 
INNER JOIN `adm2_user_data` ud6 ON ud6.`usd_usr_id` = m2.`mem_usr_id` AND ud6.`usd_usf_id` = 25
WHERE `get_event_desc`(r.`event_id`) LIKE '%Checkin%'
) AS total_checkin_count
		";
		
		$datesStatement2 = $gDb->queryPrepared($sql2);
		while ($row = $datesStatement2->fetch()) {
			$summery[] =  $row ;
		}
		
		//echo json_encode($MYDATA);
	}else if($action == "GET_TOKENS"){
		// 
		$member_id = $_GET['member_id'];
		 if (empty($member_id)) {
			array_push($errors,"Member_ID should be provide.");			
		}
		$queryParams = [$member_id];
		$sql = "
		SELECT iss_id,b.`member_id`,b.`iss_token` AS token_text,
		t.`redeem_date` AS token_redeem_date,e.`sent_status`,e.sent_date,t.`status`,t.`redeem_id`,t.event_id,get_event_desc(t.event_id)  AS event_desc
	FROM bcaa_issues b 
	LEFT OUTER JOIN bcaa_token_redeem t ON t.member_id = b.`member_id` AND t.`status`='R'
	LEFT OUTER JOIN adm2_members m ON m.`mem_id` = b.`member_id`
	LEFT OUTER JOIN `bcaa_send_email` e ON e.`mem_uuid` = m.`mem_uuid`  
		WHERE  b.`member_id` = ? 
		ORDER BY t.`redeem_date` DESC
		";
		
		$datesStatement = $gDb->queryPrepared($sql,$queryParams);
		while ($row = $datesStatement->fetch()) {
			$MYDATA[] =  $row ;
		}
		
	}
	else if($action == "GET_EVENTS"){
		
		$sql = "
		SELECT 	`event_id`, 
	`status`, 
	`description`	 
	FROM 
	`admidio`.`bcaa_current_event` 
		";
		
		$datesStatement = $gDb->queryPrepared($sql);
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
	$object->summery = $summery;
	
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
	if($action == "send_email_active_members"){
        // issue to ALL active members    
		$sql = 'SELECT m.`mem_uuid`,ud3.`usd_value` AS member_count,ud2.`usd_value` AS member_status,ud.`usd_value` AS member_email,m.`mem_usr_id`,
		(SELECT COUNT(1) FROM bcaa_issues b WHERE m.`mem_usr_id` = b.`member_id`) AS token_count,e.`sent_status`,e.`sent_date`,
		CONCAT(ud5.`usd_value`,\' \',ud4.`usd_value`) AS member_name
		FROM adm2_members m 
		LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_usr_id` AND ud.`usd_usf_id` = 11 
		LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_usr_id` AND ud2.`usd_usf_id` = 24
		LEFT OUTER JOIN `adm2_user_data` ud3 ON ud3.`usd_usr_id` = m.`mem_usr_id` AND ud3.`usd_usf_id` = 25		
		LEFT OUTER JOIN `bcaa_send_email` e ON e.`mem_uuid` = m.`mem_uuid` 
		LEFT OUTER JOIN `adm2_user_data` ud4 ON ud4.`usd_usr_id` = m.`mem_usr_id` AND ud4.`usd_usf_id` = 1
		LEFT OUTER JOIN `adm2_user_data` ud5 ON ud5.`usd_usr_id` = m.`mem_usr_id` AND ud5.`usd_usf_id` = 2
		HAVING ud.`usd_value` IS NOT NULL';
		
		$datesStatement = $gDb->queryPrepared($sql);    
		
		while ($row = $datesStatement->fetch()) {
			//$MYDATA[] =  $row ;
			$member_count = $row["member_count"];
			$member_status = $row["member_status"];
			$member_email = $row["member_email"];
			$member_id = $row["mem_usr_id"];
			$token_count = $row["token_count"];
			$sent_status = $row["sent_status"];
			$mem_uuid = $rowUser["mem_uuid"];
			$member_name = $rowUser["member_name"];
			
			if($token_count > 0 && $sent_status != 'Y'){			
				$url = "https://bcaa.subhas.dev/custom_pages/members_details.php?email=".$member_email."&id=".$mem_uuid;
				$result = sendEmail($member_email,$member_name,$url);
				if($result == 0){
					$insetSQL = "INSERT INTO bcaa_send_email(`mem_uuid`,`email_id`,`sent_status`,`sent_date`) VALUES ('".$mem_uuid."','".$member_email."','Y', CURRENT_TIMESTAMP())";
					$gDb->queryPrepared($insetSQL);  
				}else{					
					$insetSQL = "INSERT INTO bcaa_send_email(`mem_uuid`,`email_id`,`sent_status`,`sent_date`) VALUES ('".$mem_uuid."','".$member_email."','N', CURRENT_TIMESTAMP())";
					$gDb->queryPrepared($insetSQL);  
				}
			}

		}
	}else
	if($action == "issue_all_active_members"){
        // issue to ALL active members    
		$sql = 'SELECT ud3.`usd_value` AS member_count,ud2.`usd_value` AS member_status,ud.`usd_value` AS member_email,m.`mem_usr_id`,
		(SELECT COUNT(1) FROM bcaa_issues b WHERE m.`mem_usr_id` = b.`member_id`) AS token_count
		FROM adm2_members m 
		LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_usr_id` AND ud.`usd_usf_id` = 11 
		LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_usr_id` AND ud2.`usd_usf_id` = 24
		LEFT OUTER JOIN `adm2_user_data` ud3 ON ud3.`usd_usr_id` = m.`mem_usr_id` AND ud3.`usd_usf_id` = 25		
		HAVING ud.`usd_value` IS NOT NULL';
		$datesStatement = $gDb->queryPrepared($sql);    
		
		while ($row = $datesStatement->fetch()) {
			//$MYDATA[] =  $row ;
			$member_count = $row["member_count"];
			$member_status = $row["member_status"];
			$member_email = $row["member_email"];
			$member_id = $row["mem_usr_id"];
			$token_count = $row["token_count"];
			$member_count = 1;// as per new design issue single qrcode per member
			if($token_count == 0){
				$i = 0;
				while($i < $member_count){
					// issue code             
					$uniqueId = uniqid();
					$insetSQL = "INSERT INTO bcaa_issues(iss_id,member_id,iss_token) VALUES (NULL,".$member_id.",'".$uniqueId."')";
					$gDb->queryPrepared($insetSQL);            

					$i++;
				}
			}

		}
	}else if( $action == "UNDO_TOKEN"){
		 $redeem_id = $data["redeem_id"];
		 $member_id = $data["member_id"];
		 if (empty($member_id)) {
			array_push($errors,"Member_ID should be provide.");			
		 } 
		 if (empty($redeem_id)) {
			array_push($errors,"redeem_id should be provide.");			
		 }
		$queryParams = [$redeem_id,$member_id];
		$sql = "SELECT count(1) as CNT from bcaa_token_redeem where redeem_id=? and member_id=? and `status`='R'";		
		$stmt = $gDb->queryPrepared($sql,$queryParams);
		$rec_count = 0;
		if ($row = $stmt->fetch()) {
			$rec_count = $row["CNT"];			
		}
		if($rec_count > 0 ){
			$insetSQL = "UPDATE bcaa_token_redeem set `status`='D' where redeem_id=? and member_id=?";		
			$stmt = $gDb->queryPrepared($insetSQL,$queryParams);	
		}else{
			array_push($errors,"No record found with redeem status('R') for redeem_id=".$redeem_id.", member id: ".$member_id);			
		}			
		
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
	}else if( $action == "SET_EVENT"){
		 $event_id = $data["event_id"];
		  
		 if (!isset($event_id) || empty($event_id)) {
			array_push($errors, "event_id should be provided.");			
		 }
		$queryParams = [$event_id];
		$sql = "SELECT count(1) as CNT from bcaa_current_event where event_id=?";		
		$stmt = $gDb->queryPrepared($sql,$queryParams);
		$rec_count = 0;
		while ($row = $stmt->fetch()) {
			$rec_count = $row["CNT"];			
		}
		if($rec_count > 0 ){
			$updateSQL = "UPDATE bcaa_current_event set status='N'";		
			$gDb->queryPrepared($updateSQL);
			
			$insetSQL = "UPDATE bcaa_current_event set status='Y' WHERE event_id=?";		
			$stmt = $gDb->queryPrepared($insetSQL,$queryParams);	
		}else{
			array_push($errors, "No record found event_id=".$event_id."");			
		}			
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
		$insetSQL = "INSERT INTO bcaa_issues(iss_id,member_id,iss_token) VALUES (NULL,".$member_id.",'".$uniqueId."')";
		$gDb->queryPrepared($insetSQL);  				
		
	}else if( $action == "SEND_SINGLE_EMAIL"){
		 
		 $member_id = $data["member_id"];		 
		 if (empty($member_id)) {
			array_push($errors,"Member_ID should be provide.");			
		 } 
		 
		$queryParams = [$member_id];
		$sql = "SELECT count(1) as CNT from bcaa_issues where  member_id=?";		
		$stmt = $gDb->queryPrepared($sql,$queryParams);
		$rec_count = 0;
		if($row = $stmt->fetch()) {
			$rec_count = $row["CNT"];			
		}
		
		if($rec_count > 0){
			$sqlUser = "
			SELECT m.`mem_uuid`, ud2.`usd_value` AS member_status,ud.`usd_value` AS member_email, ud3.`usd_value` AS guest_count,e.`sent_status`,e.`sent_date`,
			CONCAT(ud5.`usd_value`,' ',ud4.`usd_value`) AS member_name
    FROM adm2_members m 
    LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_usr_id` AND ud.`usd_usf_id` = 11 
    LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_usr_id` AND ud2.`usd_usf_id` = 24
    LEFT OUTER JOIN `adm2_user_data` ud3 ON ud3.`usd_usr_id` = m.`mem_usr_id` AND ud3.`usd_usf_id` = 25
    LEFT OUTER JOIN `bcaa_send_email` e ON e.`mem_uuid` = m.`mem_uuid` 
	LEFT OUTER JOIN `adm2_user_data` ud4 ON ud4.`usd_usr_id` = m.`mem_usr_id` AND ud4.`usd_usf_id` = 1
	LEFT OUTER JOIN `adm2_user_data` ud5 ON ud5.`usd_usr_id` = m.`mem_usr_id` AND ud5.`usd_usf_id` = 2
    WHERE m.`mem_usr_id` = ?
			";		
			$mem_uuid = '';
			$sent_status = '';
			$sent_date = '';
			$member_email = '';
			$member_name  = '';
			$stmtUser = $gDb->queryPrepared($sqlUser,$queryParams);
			if($rowUser = $stmtUser->fetch()) {
				$mem_uuid = $rowUser["mem_uuid"];
				$sent_status = $rowUser["sent_status"];				
				$sent_date = $rowUser["sent_date"];	
				$member_email = $rowUser["member_email"];
				$member_name = $rowUser["member_name"];
			}
			
			if (!empty($member_email) && $sent_status === "Y") {
				array_push($errors,"Email already sent to this user on ".$sent_date);
			}else if(!empty($member_email)){
				$url = "https://bcaa.subhas.dev/custom_pages/members_details.php?email=".$member_email."&id=".$mem_uuid;
				$result = sendEmail($member_email,$member_name,$url);
				if($result == 0){
					$insetSQL = "INSERT INTO bcaa_send_email(`mem_uuid`,`email_id`,`sent_status`,`sent_date`) VALUES ('".$mem_uuid."','".$member_email."','Y', CURRENT_TIMESTAMP())";
					$gDb->queryPrepared($insetSQL);  
				}else{					
					$insetSQL = "INSERT INTO bcaa_send_email(`mem_uuid`,`email_id`,`sent_status`,`sent_date`) VALUES ('".$mem_uuid."','".$member_email."','N', CURRENT_TIMESTAMP())";
					$gDb->queryPrepared($insetSQL);  
				}
				
			}else{
				array_push($errors,"Email not found for user");
			}
			
			
		}else{
			array_push($errors,"No token issued for this user.");
		}
		
	}
	else{
		array_push($errors,"Not a Valid Action.");
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