<?php
// ___by__celento___ Feel free to use it for anything cool !...
header("Content-Type: image/png");

//Replace this with POST Values
$mainHeading = "Here goes the main heading.....";
$text1="Text 1";
$text2="Text 2";
$src = imagecreatefrompng('image1.png');  // Location of the image on the bottom left.


$text_length = 100; // Maximum text length in a single line.
$sig = wordwrap($mainHeading, $text_length, "<br />", true); // Adding line break if the length of mainHeading exceeds $text_length.
$text = str_replace('<br />', "\n", $sig); // mainHeading after initial text_length check.
$font = 'font.otf'; //Font to be used ( Font is not provided with this project)

$fontsize = 18;

$img = imagecreatetruecolor(800, 400); // Main Canvas

$white = imagecolorallocate($img, 255, 255, 255); // color : #FFF
imagefilledrectangle($img, 0, 0, 800, 800, $white);



//Main Heading
$c = imagecolorallocate($img, 0, 0, 0); // color : #000
imagettftext($img, $fontsize, 0,75, 102, $c, $font, $text);

// Image Bottom Left

$width = imagesx($src);
$height = imagesy($src);

imagecopyresampled($img, $src, 75, 250, 0, 0, 100,100, $width, $height);

//Text1
imagettftext($img, 14, 0,190, 295, $c, $font, $text1);

//Text2
$c = imagecolorallocate($img, 54, 54, 54);
imagettftext($img, 13, 0,190, 320, $c, $font, $text2);

//Image Bottom Right
$src2 = imagecreatefrompng('image2.png'); // Location to image on the bottom right.
$width2 = imagesx($src2);
$height2 = imagesy($src2);
imagecopy($img, $src2, 570, 280, 0, 0, $width2, $height2);

imagepng($img);

//The file will be saved to the disk as a PNG file.
imagepng($img, 'output.png');  //output.png
imagedestroy($img);
?>
