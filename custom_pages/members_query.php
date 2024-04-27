<?php
    require_once(__DIR__ . '/../adm_program/system/common.php');    
	
	
	$originalImage = imagecreatefrompng("./images/3_661481339045f.png");
	
	$width = imagesx($originalImage);
    $height = imagesy($originalImage);

	$newImage = imagecreatetruecolor($width, $height);
	imagecopy($newImage, $originalImage, 0, 0, 0, 0, $width, $height);
	
	$text = "Subhas Sing # 1";
	$color = imagecolorallocate($newImage, 0, 0, 0);
	$x = 100;
	$y = 20;
	
	// Insert text to the image
    imagestring($newImage, 5, $x, $y, $text, $color);
	imagestring($newImage, 5, $x, $y+20, "Test", $color);
	
	imagepng($newImage, "./images/a.png");
?> 
<img src = "./images/a.png" border=1 />
<img src = "./images/3_661481339045f.png" border=1 />
<form action="members_details.php" method="post">    
        Email: <input type="text" name="email"><br>
        <input type="submit">
</form>