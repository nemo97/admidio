<?php
    // Include the qrlib file 
    include __DIR__ .'/../phpqrcode/qrlib.php'; 
    require_once(__DIR__ . '/../adm_program/system/common.php');    

    
    $t = 24;
    if($t < 20){
        QRcode::png($text);
    }
    $email = $_POST['email'];
    
    if (empty($email)) {
        echo "Entered email is empty.<br>";
    }
    $queryParams = [$email];

    $sqlMember = 'SELECT ud2.`usd_value` AS member_status,ud.`usd_value` AS member_email
    FROM adm2_members m 
    LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_id` AND ud.`usd_usf_id` = 11 
    LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_id` AND ud2.`usd_usf_id` = 24
    WHERE ud.`usd_value` = ?';
    
    $datesStatement = $gDb->queryPrepared($sqlMember,$queryParams);
    
    $MYDATA = array();

    if ($row = $datesStatement->fetch()) {
        $MYDATA[] =  $row ;
        $member_status = $row['member_status'];
        if($member_status == 0){
            // 0 - not set yet , 1 - inative
            echo "Member is not active for this email.<br> Please contact";
        }else{
            // active

            $sql = 'SELECT m.`mem_id` as member_id ,ud2.`usd_value` AS member_status,ud.`usd_value` AS member_email, b.`iss_token` AS iss_token,`status`,`redeem_date`,`redeem_user`
            FROM adm2_members m LEFT OUTER JOIN bcaa_issues b ON m.`mem_id` = b.`member_id` 
            LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_id` AND ud.`usd_usf_id` = 11 
            LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_id` AND ud2.`usd_usf_id` = 24
            WHERE ud.`usd_value` = ? AND b.iss_token IS NOT NULL';

            $datesStatement1 = $gDb->queryPrepared($sql,$queryParams);
            while ($row1 = $datesStatement1->fetch()) {
                $iss_token = $row1['iss_token'];
                $member_id = $row1['member_id'];
                echo  "Email ".$email;   
                // QRcode::png($text);

                $text = $member_id.":".$iss_token; 
                // $path variable store the location where to  
                // store image and $file creates directory name 
                // of the QR code file by using 'uniqid' 
                // uniqid creates unique id based on microtime 
                $unqId = $member_id."_".$iss_token.".png";              
                $path = __DIR__ .'/images/'; 
                $file = $path.$unqId; 
                
                // $ecc stores error correction capability('L') 
                $ecc = 'L'; 
                $pixel_Size = 10; 
                $frame_Size = 10; 
                echo " File name ".$file;
                // Generates QR Code and Stores it in directory given 
                QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size); 
                
                // Displaying the stored QR code from directory 
                echo "<center><img src='./images/".$unqId."'></center>"; 
            }
        }

    }else {
        echo "Member not found for this email.<br>";
    }

    
?> 