# php-color
The RGBA color PHP class implementation for Gd, Canvas, Svg, CSS  
From Good 1.0 will be package of php-draw
## Installation via composer
```
composer require franckysolo/php-color
```
## Usage

### Create colors
```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';
use PhpColor\Color;

// Create an instance
$black = new Color(); // will generate a black color default
$white = new Color(255, 255, 255); // will generate a white color
$transparent = new Color(255, 255, 255, 127); // will generate a transparent color

// with static methods
$red  = Color::fromArray([255, 0, 0]);
$alpha_red  = Color::fromArray([100, 255, 0, 0]);
$blue = Color::fromHex('0000ff');
$aqua = Color::fromInt(Color::AQUA);
```
### Reading colors
```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';
use PhpColor\Color;

// Create an instance
$white = new Color(255, 255, 255);
$aplha_red = new Color(255, 0, 0, 100);

// Reading colors
$intColor = $white->toInt() // returns integer 16777215
$arrayColor = $white->toArray() // returns array [0,255,255,255]
$hexColor = $white->toHex() // returns String  'ffffff'
$cssColor = $white->toHex(true) // returns String  '#ffffff'
echo $white; // display String 'rgb(255,255,255);'
echo $aplha_red; // display String 'rgba(255,255,255, 0.2);'
```
### Using colors with GD
```php
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
```
### Using with canvas Js
```php
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
var canvas = document.getElementById('PhpColor');
var ctx = canvas.getContext('2d');
ctx.fillStyle = "rgb(200,0,0)";
colors = <?php echo json_encode($json)?>;
var x1 = 10;
for (var i in colors) {
	ctx.fillStyle = colors[i];
	ctx.fillRect (x1, 25, 75, 75);
	x1 += 80;
}
</script>
```

### Using with SVG
```php
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
```

# Using with CSS
```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';
use PhpColor\Color;
$green = Color::fromInt(Color::GREEN);
$blue = Color::fromInt(Color::BLUE);
$red = Color::fromInt(Color::RED);
$orange = Color::fromInt(Color::ORANGE);
$yellow = Color::fromInt(Color::YELLOW);
$alphaGreen = Color::fromArray([120,0,255,0]);
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
```

Look at the examples directory for more example.

## License

[MIT](LICENSE)
