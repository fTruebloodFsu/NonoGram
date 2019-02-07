<?php

// You should have file_uploads = On in C:\xampp\php\php.ini (if you have xampp)

$target_dir = "uploads/"; // you must create this directory in the folder where you have the PHP file
$target_file = $target_dir . basename($_FILES["fileup"]["name"]);

echo "<p>Upload information</p><ul>";
echo  "<li>Target folder for the upload :". $target_file . "</li>";
echo  "<li>File name :". basename($_FILES["fileup"]["name"]) . "</li>";

// basename: Returns the base name of the given path

$uploadOk = 1;

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Verify if the image file is an actual image or a fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileup"]["tmp_name"]);
    if($check !== false) {
        //echo "<li>File is an image of type - " . $check["mime"] . ".</li>";
        $uploadOk = 1;
    } else {
        //echo "<li>File is not an image.</li>";
        $uploadOk = 0;
    }
}
// Verify if file already exists
if (file_exists($target_file)) {
    //echo "<li>The file already exists.</li>";
    $uploadOk = 0;
}
// Verify the file size
if ($_FILES["fileup"]["size"] > 500000) {
    //echo "<li>The file is too large.</li>";
    $uploadOk = 0;
}
// Verify certain file formats
if($imageFileType != "jpg" && $imageFileType != "png") {
    //echo "<li>Only jpg and png files are allowed for the upload.</li>";
    $uploadOk = 0;
}
// Verify if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "<li>The file was not uploaded.</li>";
} else { // upload file
    if (move_uploaded_file($_FILES["fileup"]["tmp_name"], $target_file)) {
        //echo "<li>The file ". basename( $_FILES["fileup"]["name"]). " has been uploaded.</li>";
    } else {
        //echo "<li>Error uploading your file.</li>";
    }
}

//echo "</ul>";

if($imageFileType == "jpg"){
	$source_file = $target_file;
	// http://php.net/manual/en/function.imagecreatefromjpeg.php
	$im = imagecreatefromjpeg($source_file); 
	$im = imagerotate($im, 90, 0);
	imageflip($im, IMG_FLIP_VERTICAL);

	$imgw = imagesx($im);
	$imgh = imagesy($im);

	$map = [];
	for ($i=0; $i<$imgw; $i++) {
			$map[$i] = [];
			for ($j=0; $j<$imgh; $j++) {      
					// get the rgb value for current pixel
					$rgb = ImageColorAt($im,$i,$j);        
					// extract each value for R, G, B (RED, GREEN, BLUE)     
					$rr = ($rgb >> 16) & 0xFF;
					$gg = ($rgb >> 8) & 0xFF;
					$bb = $rgb & 0xFF;  
					// get the Value from the RGB value
					$g = round(($rr + $gg + $bb) / 3);
					// Grayscale values have r=g=b=g (just the average of the 3 channels)
					$val = imagecolorallocate($im, $g, $g, $g);
					$map[$i][$j]=$val;
					// set the gray value
					imagesetpixel ($im, $i, $j, $val);
					
					if($g>=128){
						$map[$i][$j] = 1;
					}
					if($g<128){
						$map[$i][$j] = 0;
					}
			}
	}
	
	
	$ROWS = 13;
	$COLS = 13;

	$newWidth = $imgw - ($imgw%$ROWS);
	$newHeight = $imgh - ($imgh%$COLS);
	
	//echo "<br>".$newWidth." ".$newHeight."<br>";
	
	$xCoord = $newWidth/$ROWS;
	$yCoord = $newHeight/$COLS;
	
	//echo "<br>".$xCoord." ".$yCoord."<br>";
	
	//echo json_encode($map);
	
	$map1 = [];
	$temp = 0;
	$count = 0;
	for($i = 0; $i < $newWidth; $i = $i+$xCoord){
		$map1[$i/$xCoord] = [];
		for($j = 0; $j < $newHeight; $j = $j+$yCoord){
			for($k = 0; $k < $xCoord; $k++){
				for($l = 0; $l < $yCoord; $l++){
					$temp += $map[$i+$k][$j+$l];
				}
			}
			$temp = $temp/($xCoord*$yCoord);
			if($temp >= .5){ $map1[$i/$xCoord][$j/$yCoord] = 1;}
			else{ $map1[$i/$xCoord][$j/$yCoord] = 0;}
			//echo $map1[$i/$xCoord][$j/$yCoord];
			$temp = 0;
		}
		//echo "<br>";
	}
	
	echo json_encode($map1);
	
}else{
	echo "must be jpg format.1";
}

?>

