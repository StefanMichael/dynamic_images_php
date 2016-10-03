<?php
   //Set the 2 file names.
$resOriginalImage1='frame.png';
$resOriginalImage2=$_GET["url"];

//Image 1 Details
$image_details1 = getimagesize($resOriginalImage1);

if ($image_details1 === false){
	echo 'Not a valid image supplied, or this script does not have permissions to access it.';

}else{
	$Original_W1 = 806;
	$Original_H1 = 419;
	$type1 = $image_details1[2];
	$mime1 = $image_details1['mime'];
}

switch ($type1){
	case 1:
		//	GIF
		$source1 = imagecreatefromgif($resOriginalImage1);
		break;
		
	case 2:
		//	JPG
		$source1 = imagecreatefromjpeg($resOriginalImage1);
		break;
		
	case 3:
		//	PNG
		$source1 = imagecreatefrompng($resOriginalImage1);
		break;
		
	default:
		echo 'Unsupported image file format.';
		
}


$image_details2 = getimagesize($resOriginalImage2);

if ($image_details2 === false){
	echo 'Not a valid image supplied, or this script does not have permissions to access it.';

}else{
	$Original_W2 = 237;
	$Original_H2 = 229;
	$type2 = $image_details2[2];
	$mime2 = $image_details2['mime'];
}

switch ($type2){
	case 1:
		//	GIF
		$source2 = imagecreatefromgif($resOriginalImage2);
		break;
		
	case 2:
		//	JPG
		$source2 = imagecreatefromjpeg($resOriginalImage2);
		break;
		
	case 3:
		//	PNG
		$source2 = imagecreatefrompng($resOriginalImage2);
		break;
		
	default:
		echo 'Unsupported image file format.';
		
}
    //Set new Image Dimensions
	$newWidth = 806;
	$newHeight = 419;

    //create holder for new image
	$resResizedImage = imagecreatetruecolor($newWidth, $newHeight);


	 
	//Copy both images into the new image
	imagecopyresampled($resResizedImage, $source2, (806 - 237) / 2, (419-229)/2, 0, 0, 237, 229, 237, 229);
		//imagecopyresampled($resResizedImage, $source1, 0, 0, 0, 0, 806, 419, 806, 419);
imagecopyresampled($resResizedImage, $source1, 0, 0, 0, 0, 806, 419, 806, 419);
	//Save the New PNG File.

	imagepng($resResizedImage);
imagedestroy($resResizedImage);
?>