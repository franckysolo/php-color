<?php 
require_once __DIR__ . '/../vendor/autoload.php'; 
use PhpColor\Color;
$green = Color::fromInt(Color::GREEN);
$blue = Color::fromInt(Color::BLUE);
$red = Color::fromInt(Color::RED);
$orange = Color::fromInt(Color::ORANGE);
$yellow = Color::fromInt(Color::YELLOW);

$alphaGreen = Color::fromArray([120,0,255,0]);
// @todo test the to hex method and report it to bg color
$opaqueGreen = $alphaGreen->toHex(true);
?>
<!doctype html>
<html>
<head>
<style type="text/css">
div {
display: inline-block;
width: 100px;
height: 100px;
}
.blue {
background-color : <?php echo $blue?>;
}
.green {
background-color : <?php echo $green?>;
}
.red {
background-color : <?php echo $red?>;
}
.orange {
background-color : <?php echo $orange?>;
}
.yellow {
background-color : <?php echo $yellow?>;
}
.green-alpha {
background-color : <?php echo $alphaGreen // alpha avaliable with __toString() method?>;
}
.green-opaque {
background-color : <?php echo $opaqueGreen // alpha disable with toHex method ?>;
}
</style>
</head>
<body>
<div class="red"></div>
<div class="green"></div>
<div class="blue"></div>
<div class="orange"></div>
<div class="yellow"></div>
<div class="green-alpha"></div>
<div class="green-opaque"></div>
</body>
</html>
