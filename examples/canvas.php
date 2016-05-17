<?php
require_once __DIR__ . '/../vendor/autoload.php';
use PhpColor\Color;
$green = Color::fromInt(Color::GREEN);
$blue = Color::fromInt(Color::BLUE);
$red = Color::fromInt(Color::RED);
$orange = Color::fromInt(Color::ORANGE);
$yellow = Color::fromInt(Color::YELLOW);
$lightGreen = Color::fromArray([100,0,255,0]);
$values = [$green, $blue, $red, $orange, $yellow, $lightGreen];
$json = [];
foreach ($values as $value) {
	$json[] = $value->__toString();
}
?>
<canvas id="PhpColor" width="800" height="400"></canvas>
<script>
var canvas 	= document.getElementById('PhpColor');
var ctx  	= canvas.getContext('2d');
ctx.fillStyle = "rgb(200,0,0)";
colors = <?php echo json_encode($json)?>;
var x1 = 10;
for (var i in colors) {
	ctx.fillStyle = colors[i];
	ctx.fillRect (x1, 25, 75, 75);
	x1 += 80;
}
</script>