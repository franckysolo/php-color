<?php
// An example of Color using gd
require_once __DIR__ . '/../vendor/autoload.php';

use PhpColor\Color;

$colors = [
	// some alpha colors
	new Color(222, 0, 0, 100),
	new Color(0, 222, 0, 100),
	new Color(0, 0, 222, 100),
	new Color(222, 222, 0, 100),
	new Color(0, 222, 222, 100),
	new Color(222, 0, 222, 100),
	new Color(222, 222, 222, 100),
	new Color(124, 222, 222, 100),
	new Color(222,124, 222, 100),
	// Red gradient
	new Color(255, 0, 0, 0),
	new Color(255, 0, 0, 50),
	new Color(255, 0, 0, 75),
	new Color(255, 0, 0, 100),
];

$bg = new Color(255, 255, 255, 0);
$image = imagecreatetruecolor(800, 100);
imagefill($image, 0, 0, $bg->toInt());

imagestring($image, 4, 10, 8, 'Color using gd php', Color::BLACK);

$x1 = 10;
$x2 = 60;
foreach ($colors as $k => $color) {
	imagefilledrectangle($image, $x1, 25, $x2, 75, $color->toInt());
	$x1 += 60;
	$x2 += 60;
}

imagepng($image);
imagedestroy($image);
header('Content-type: image/png');