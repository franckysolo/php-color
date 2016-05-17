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
.light-green {
background-color : <?php echo $lightGreen?>;
}
</style>
</head>
<body>
<div class="red"></div>
<div class="green"></div>
<div class="blue"></div>
<div class="orange"></div>
<div class="yellow"></div>
<div class="light-green"></div>
</body>
</html>
