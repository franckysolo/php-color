<?php
// An example of Color constants using gd
require_once __DIR__ . '/../vendor/autoload.php';
use PhpColor\Color;
$image = imagecreatetruecolor(100, 100);
imagefill($image, 0, 0, Color::TRANSPARENT);
imagefilledrectangle($image, 25, 25, 75, 75, Color::AQUA);
imagepng($image);
imagedestroy($image);
header('Content-type: image/png');