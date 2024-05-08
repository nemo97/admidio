<!doctype html>
<html lang="en">
<head>
 <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Member Details</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color:lightblue">
<div class="container">
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BCAA - Member's QRCode Page</a>
  </div>
</nav>
<div style="margin-top: 100px;">
<?php
    // Include the qrlib file 
    include __DIR__ .'/../phpqrcode/qrlib.php'; 
    require_once(__DIR__ . '/../adm_program/system/common.php');    
    
  
	$internal = $_POST['internal'];
    if (empty($internal)) {
		$internal = $_GET['internal'];
	}
	if (empty($internal)) {
	    $internal = "N";
	}
	
    $email = $_POST['email'];
    if (empty($email)) {
		$email = $_GET['email'];
	}
	
    if (empty($email)) {
        exit( "<div class='alert alert-warning' role='alert'>Entered email is empty.<br></div>");
    }
	
	$id = $_POST['id'];
    if (empty($id)) {
		$id = $_GET['id'];
	}
	
	if (empty($id) && $internal != "Y" ) {
        exit( "<div class='alert alert-warning' role='alert'>Invalid URL, please click the link provided from BCAA.</div>");
    }	
	//$_SERVER['HTTP_REFERER']
	
    $queryParams = [$email];

    $sqlMember = 'SELECT m.`mem_uuid` as mem_uuid, ud2.`usd_value` AS member_status,ud.`usd_value` AS member_email
    FROM adm2_members m 
    LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_id` AND ud.`usd_usf_id` = 11 
    LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_id` AND ud2.`usd_usf_id` = 24
    WHERE ud.`usd_value` = ?';
    
    $datesStatement = $gDb->queryPrepared($sqlMember,$queryParams);
    
    $MYDATA = array();

    if ($row = $datesStatement->fetch()) {
		
        $MYDATA[] =  $row ;
		$mem_uuid = $row['mem_uuid'];		
        $member_status = $row['member_status'];
		if(empty($id) && $internal == "Y"){
			// if empty and coming from  internal user
			$id = $mem_uuid;
		}		
		if($id != $mem_uuid){
			 //echo "Invalid request, Please contact admin.";
			 exit( "<div class='alert alert-warning' role='alert'>Invalid request, Please contact admin.".$id." internal ".$internal."</div>");
		}
		
			
        if($member_status == 0){
            // 0 - not set yet , 1 - inative
            exit("<div class='alert alert-warning' role='alert'>Member is not active for this email.<br> Please contact </div>");
        }else{
            // active

            $sql = 'SELECT m.`mem_id` AS member_id ,ud2.`usd_value` AS member_status,ud.`usd_value` AS member_email,CONCAT(ud4.usd_value,\' \',ud3.usd_value) AS member_name, b.`iss_token` AS iss_token,`status`,`redeem_date`,`redeem_user`
            FROM adm2_members m LEFT OUTER JOIN bcaa_issues b ON m.`mem_id` = b.`member_id` 
            LEFT OUTER JOIN `adm2_user_data` ud ON ud.`usd_usr_id` = m.`mem_id` AND ud.`usd_usf_id` = 11 
            LEFT OUTER JOIN `adm2_user_data` ud2 ON ud2.`usd_usr_id` = m.`mem_id` AND ud2.`usd_usf_id` = 24
            LEFT OUTER JOIN `adm2_user_data` ud3 ON ud3.`usd_usr_id` = m.`mem_id` AND ud3.`usd_usf_id` = 1
            LEFT OUTER JOIN `adm2_user_data` ud4 ON ud4.`usd_usr_id` = m.`mem_id` AND ud4.`usd_usf_id` = 2
            WHERE ud.`usd_value` = ? AND b.iss_token IS NOT NULL';

            $datesStatement1 = $gDb->queryPrepared($sql,$queryParams);
			$index = 0;
            while ($row1 = $datesStatement1->fetch()) {
				$index = $index + 1;
                $iss_token = $row1['iss_token'];
                $member_id = $row1['member_id'];
				$member_name = $row1['member_name'];
				$redeem_date = $row1['redeem_date'];
				$status = $row1['status'];
				
                //echo  "<div class='row'><div class='col'> Email ".$email;   
                // QRcode::png($text);

                $text = $member_id.":".$iss_token; 
                // $path variable store the location where to  
                // store image and $file creates directory name 
                // of the QR code file by using 'uniqid' 
                // uniqid creates unique id based on microtime 
                $unqId = $member_id."_".$iss_token;              
                $path = __DIR__ .'/images/'; 
                $file = $path.$unqId.".png"; 
				$modifiedFile = $path.$unqId."_m.png"; 
                
                // $ecc stores error correction capability('L') 
                $ecc = 'L'; 
                $pixel_Size = 10; 
                $frame_Size = 10; 
                //echo " File name ".$file;
                // Generates QR Code and Stores it in directory given 
                QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size); 
                
                // Displaying the stored QR code from directory 
				$originalImage = imagecreatefrompng($file);
	
				$width = imagesx($originalImage);
				$height = imagesy($originalImage);

				$newImage = imagecreatetruecolor($width, $height);
				imagecopy($newImage, $originalImage, 0, 0, 0, 0, $width, $height);
				
				$text = $member_name." # ".$index;
				$color = imagecolorallocate($newImage, 0, 0, 0);
				$colorRed = imagecolorallocate($newImage, 0, 0, 0);
				$x = 100;
				$y = 20;
				
				// Insert text to the image
				imagestring($newImage, 5, $x, $y, $text, $color);
				imagestring($newImage, 5, $x, $height - 50, $iss_token, $color);
				if (!empty($redeem_date)) {
					imagestring($newImage, 5, $x, $y+30, $redeem_date, $colorRed);
				}
				
				imagepng($newImage, $modifiedFile);
	
                $fileExt="_m.png";
				
				print "<div class='row align-items-center justify-content-center' style='height: 100vh'>
						 <div class='card' style='width: 18rem;'>
						  <img src=./images/$unqId$fileExt class='card-img-top'>	
						  <div class='card-body'>
							&nbsp; 
						  </div>
						</div>					
					</div>
				";
            }
        }

    }else {
        exit("<div class='alert alert-warning' role='alert'>Member not found for this email.<br></div>");
    }

    
?> 
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>