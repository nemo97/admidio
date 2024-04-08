<?php
require_once(__DIR__ . '/../adm_program/system/common.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $sql = 'SELECT * FROM adm2_members';
    $datesStatement = $gDb->queryPrepared($sql);
    
    $MYDATA = array();

    while ($row = $datesStatement->fetch()) {
        $MYDATA[] =  $row ;
    }

    echo json_encode($MYDATA);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents('php://input'), true);
    $action = $data["action"];
    $eventId = $data["eventId"];
    if($action == "all_active_members"){
        //
    }
    $sql = 'SELECT ud3.`usd_value` AS member_count,ud2.`usd_value` AS member_status,ud.`usd_value` AS member_email,m.* 
    FROM adm2_members m 
    LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_id` AND ud.`usd_usf_id` = 11 
    LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_id` AND ud2.`usd_usf_id` = 24
    LEFT OUTER JOIN `adm2_user_data` ud3 ON ud3.`usd_usr_id` = m.`mem_id` AND ud3.`usd_usf_id` = 25
    HAVING ud.`usd_value` IS NOT NULL';
    $datesStatement = $gDb->queryPrepared($sql);    
    $MYDATA = array();
    while ($row = $datesStatement->fetch()) {
        //$MYDATA[] =  $row ;
        $member_count = $row["member_count"];
        $member_status = $row["member_status"];
        $member_email = $row["member_email"];
        $i = 0;
        while($i < $member_count){
            // issue code

            
        }

    }

    echo json_encode($MYDATA);
}