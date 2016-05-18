<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use PhpColor\Color;
// the web safe colors
$colors = [];
for ($r = 0; $r <= 15; $r += 3) {
	for ($g = 0; $g <= 15; $g += 3) {
		for ($b = 0; $b <= 15; $b += 3) {
			$array = [dechex($r), dechex($r), dechex($g), dechex($g), dechex($b), dechex($b)];
			$string = vsprintf('#%d%d%d%d%d%d', $array);
			$color = Color::fromHex($string);
			if (! in_array($color, $colors)) {
				array_push($colors, $color);
			}
		}
	}
}
?>
<!doctype html>
<html>
<head>
<style type="text/css">
.color {
	color:white;
	width:150px;
	height:150px;
	line-height: 150px;
	display: inline-block;
	text-align: center;
	position: relative;
}

small {
  display: inline-block;
  vertical-align: middle;
  line-height: 16px;
}
</style>
</head>
<body>
<h1>Web safe colors with PhpColor</h1>
<?php foreach ($colors as $k => $color):?>
<div class="color" style="background-color:<?php echo $color->toHex(true)?>;">
<small>
<?php echo $color->toHex(true)?><br>
<?php echo $color;?><br>
<?php echo $color->toInt();?>
</small>
</div>
<?php if ($k % 8 == 7):?><div style="margin-bottom:5px;"></div><?php endif;?>
<?php endforeach;?>
<div>
</div>
</body>
</html>