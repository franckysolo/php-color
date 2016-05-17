<?php
require_once __DIR__ . '/../vendor/autoload.php';
use PhpColor\Color;
$green = Color::fromInt(Color::GREEN);
$blue = Color::fromInt(Color::BLUE);
$red = Color::fromInt(Color::RED);
$orange = Color::fromInt(Color::ORANGE);
$yellow = Color::fromInt(Color::YELLOW);
$lightGreen = Color::fromArray([100,0,255,0]);
?>
<svg width="1280">
<rect x="10" y="10" width="100" height="100" fill="<?php echo $red;?>" />
<rect x="120" y="10" width="100" height="100" fill="<?php echo $green;?>" />
<rect x="230" y="10" width="100" height="100" fill="<?php echo $blue;?>" />
<rect x="340" y="10" width="100" height="100" fill="<?php echo $orange;?>" />
<rect x="450" y="10" width="100" height="100" fill="<?php echo $yellow;?>" />
<rect x="560" y="10" width="100" height="100" fill="<?php echo $lightGreen;?>" />
</svg>