<?php


session_start();

$captcha = rand(1000, 9999);

$_SESSION["captcha"] = $captcha;

$im = imagecreatetruecolor(50, 24);

$black = imagecolorallocate($im, 0, 0, 0);

$white = imagecolorallocate($im, 255, 255, 255);

imagefill($im, 0, 0, $white);

imagestring($im, rand(1, 7), rand(1, 7),
			rand(1, 7), $captcha, $black); 
header('Content-type: image/png');


imagepng($im);

imagedestroy($im);
?>