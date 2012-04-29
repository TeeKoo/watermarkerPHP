<?php
//error_reporting(0);
//putenv('GDFONTPATH=' . realpath('.'));
//include 'index.html';

$servername = "kalorikulutus.fi";
$username = "USERNAME";
$password = "PASSWORD";

function saveFileToServer(){
$url = $_GET['inputurlphp'];
$img = 'start.jpg';
file_put_contents($img, file_get_contents($url));
}
saveFileToServer();
$randul = rand(1, 99999999999);
//header ("Content-type: image/png");
$im = imagecreatefromjpeg("start.jpg");
$fontget = $_GET['pvalue4'] . ".ttf";
$font_path = $fontget;
$string = $_GET['pvalue7'];
$font = $_GET['pvalue6'];
$width = imagefontwidth($font) * strlen($string) ;
$height = imagefontheight($font) ;

$bbox = imageftbbox($font, 0, $font_path, $string);
$x = imagesx($im)/2 - (($bbox[2] - $bbox[0])/2);
$y = imagesy($im)/2;

$color = imagecolorallocate($im, $_GET['pvalue1'], $_GET['pvalue2'], $_GET['pvalue3']);
$gray = imagecolorallocate($im, 0x55, 0x55, 0x55);

$testshadow = $_GET['pvalue5'];
if($testshadow==="shadowon")
imagefttext($im, $font, 0, $x+3, $y+3, $gray, $font_path, $string);
imagettftext($im, $font, 0, $x, $y, $color, $font_path, $string);
$newimage = $randul . '.png';
imagepng($im, $newimage);


$picurl = "watermark.kalorikulutus.fi/" . $newimage;
echo "<html><body><img src='" . $newimage . "'/></body></html></br></br> ";
echo "<a href='" . $newimage . "'>Link Here</a>";
file_put_contents($im, "/water.dir");
imagedestroy($im);


function storeSQL(){
$con = mysql_connect($GLOBALS['servername'],$GLOBALS['username'],$GLOBALS['password']);

	if(!$con){
	die('could not connect: ' . mysql_error());
		echo "Could not connect to SQL database" + $GLOBALS['servername'] + $GLOBALS['username'] + $GLOBALS['tulppat'];
	}
	mysql_select_db("kaloriku_PICS", $con);
	$result = mysql_query("INSERT INTO watermark (pic_url) VALUES('" . $GLOBALS['picurl'] . "');");
	
	mysql_close($con);
}

storeSQL();




/*
// Create a 300x100 image

$im = imagecreatefromjpeg("start.jpg");

//header('Content-Type: image/png');

//Set up some colors, use a dark gray as the background color
$dark_grey = imagecolorallocate($im, 102, 102, 102);
$white = imagecolorallocate($im, 255, 255, 255);
 
//Set the path to our true type font 
$font_path = 'Vera';
 
//Set our text string 
$string = 'Hello World!';
 
//Write our text to the existing image.
imagettftext($im, 50, 0, 10, 160, $white, $font_path, $string);


*/



?>