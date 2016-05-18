<?php
/**
* Color -  17 mai 2016
*
* @version     0.1.0
* @author      franckysolo (http://franckysolo-productions.com/)
* @link        http://github.com/franckysolo/php-color for the canonical source repository
* @copyright   Copyright (c) 2008-2016 franckysolo-productions (http://franckysolo-productions.com/)
* @license     MIT
*/
namespace PhpColor;
use InvalidArgumentException;

/**
 * The RGBA color class for gd, canvas, svg, css
 * From Good 1.0 will be package of php-draw
 * 
 * @author franckysolo
 * @package Drawing
 * @filesource Color.php
 */
class Color {

	/**
	 * Colors constants
	 *
	 * @var integer
	 */
	const TRANSPARENT 	= 0x7fffffff;
	const WHITE 	  	= 0xffffff;
	const LIGHTGRAY 	= 0xececec;
	const DARKGRAY 		= 0x666666;
	const SILVER 		= 0xc0c0c0;
	const GRAY      	= 0x999999;
	const MAROON		= 0x800000;
	const BLUE 	    	= 0x0000ff;
	const PURPLE 		= 0x800080;
	const FUSHIA		= 0xff00ff;
	const NAVY	    	= 0x000080;
	const AQUA	    	= 0x00ffff;
	const TEAL	    	= 0x008080;
	const RED 	    	= 0xff0000;
	const LIME     		= 0x00ff00;
	const GREEN 		= 0x008000;
	const OLIVE 		= 0x808000;
	const YELLOW 		= 0xffff00;
	const ORANGE 		= 0xff9900;
	const BLACK 	  	= 0x000000;

	/**
	 * The hexadecimal string color format
	 *
	 * @var string $format
	 */
	protected $format = '%02x%02x%02x%02x';

	/**
	 *  The red channel between 0 and 255
	 *
	 * @var integer
	 */
	protected $red = 0;

	/**
	 * The red channel between 0 and 255
	 *
	 * @var integer
	 */
	protected $blue = 0;

	/**
	 * The red channel between 0 and 255
	 *
	 * @var integer
	 */
	protected $green = 0;

	/**
	 *
	 * @var integer
	 */
	protected $alpha = 0;

	/**
	 * Create a new color class from hexadecimal color string
	 *
	 * @param string $string
	 * @throws InvalidArgumentException
	 * @return Color
	 */
	public static function fromHex($string) {

		if (0 === strpos($string, '#')) {
			$string =  substr($string, 1);
		}

		$split = str_split($string, 2);
		$count = count($split);

		if (3 === $count) { // rgb
			list($r, $g, $b) = array_map('hexdec', $split);
			$a = 0;
		} else if (4 === $count) {  // rgba
			list($a, $r, $g, $b) = array_map('hexdec', $split);
		} else {
			throw new InvalidArgumentException('Hexadecimal color is not supported');
		}

		return new static($r, $g, $b, $a);
	}

	/**
	 * Create a new color class from array integr color
	 *
	 * @param array $color [a],r,g,b
	 * @throws InvalidArgumentException
	 * @return Color
	 */
	public static function fromArray(array $color = []) {
		
		$count = count($color);
		
		if (3 === $count) { // rgb
			list($r, $g, $b) = $color;
			$a = 0;
		} else if (4 === $count) {  // rgba
			list($a, $r, $g, $b) = $color;
		} else {
			$message = 'The array color count expected 3 or 4 value';
			throw new InvalidArgumentException($message);
		}

		return new static($r, $g, $b, $a);
	}

	/**
	 * Create a new color class from array integr color
	 *
	 * @param integer $integer
	 * @throws InvalidArgumentException
	 * @return Color
	 */
	public static function fromInt($integer) {

		if ($integer < 0 || $integer >  0x7fffffff) {
			$message = 'The integer color value must be an integer between 0 and 2147483647';
			throw new InvalidArgumentException($message);
		}

		$r 	= ($integer >> 16) & 0xff;
		$g 	= ($integer >> 8) & 0xff;
		$b 	= ($integer) & 0xff;
		$a 	= ($integer >> 24 ) & 0xff;

		return new static($r, $g, $b, $a);
	}

	/**
	 * Create a new color class
	 * 
	 * @param integer $red between 0 and 255
	 * @param integer $blue between 0 and 255
	 * @param integer $green between 0 and 255
	 * @param integer $alpha between 0 and 127
	 */
	public function __construct($red = 0, $green = 0, $blue = 0, $alpha = 0) {
		$this->setRed($red);
		$this->setGreen($green);
		$this->setBlue($blue);
		$this->setAlpha($alpha);
	}

	/**
	 * Check if color channel is valid
	 * 
	 * @param integer $primary
	 * @throws InvalidArgumentException
	 */
	protected function _isValid($primary) {

		if ($primary < 0 || $primary > 255) {
			throw new InvalidArgumentException (
				'Channel color must be an integer between 0 and 255'
			);
		}

		return true;
	}

	/**
	 * Returns the red channel integer
	 *
	 * @return integer
	 */
	public function getRed() {
		return $this->red;
	}

	/**
	 * Set the red channel
	 * 
	 * @param the integer $red  value
	 * @return
	 */
	public function setRed($red) {

		if ($this->_isValid($red)) {
			$this->red = (int) $red;
		}

		return $this;
	}

	/**
	 * Returns the blue channel integer
	 *
	 * @return integer
	 */
	public function getBlue() {
		return $this->blue;
	}

	/**
	 * Set the blue channel
	 *
	 * @param integer $blue between 0 and 255
	 * @return Color
	 */
	public function setBlue($blue) {
		
		if ($this->_isValid($blue)) {
			$this->blue = (int) $blue;
		}
		
		return $this;
	}

	/**
	 * Returns the green channel integer
	 *
	 * @return integer
	 */
	public function getGreen() {
		return $this->green;
	}

	/**
	 * Set the green channel
	 *
	 * @param integer $green between 0 and 255
	 * @return Color
	 */
	public function setGreen($green) {

		if ($this->_isValid($green)) {
			$this->green = (int) $green;
		}

		return $this;
	}

	/**
	 * Returns the alpha channel integer
	 *
	 * @return An integer between 0 and 127
	 */
	public function getAlpha() {
		return $this->alpha;
	}

	/**
	 * Set the Alpha channel
	 *
	 * @param integer $alpha
	 * @return Color
	 */
	public function setAlpha($alpha) {

		if ($alpha < 0 || $alpha > 127) {
			throw new InvalidArgumentException(
				'Alpha parameter value must be an integer between 0 and 127'
			);
		}
		
		$this->alpha = (int) $alpha;
		
		return $this;
	}

	/**
	 * Returns the array color values a, r, g, b
	 *
	 * @return array
	 */
	public function toArray() {
		return array (
			$this->alpha,
			$this->red,
			$this->green,
			$this->blue,
		);
	}

	/**
	 * Returns the integer color value
	 *
	 * @return integer
	 */
	public function toInt() {
		return hexdec(vsprintf($this->format, $this->toArray()));
	}

	/**
	 * Returns the string color hexadecimal value
	 *
	 * @param boolean $prefix
	 * @return string
	 */
	public function toHex($prefix = false) {
		
		$pattern = $this->format;
		$array = $this->toArray();
		
		// remove alpha channel			
		if ($prefix) {
			array_shift($array);
			$pattern = substr($pattern, 4);
			$pattern = '#' . $pattern;
		}
			
		return vsprintf($pattern, $array);
	}

	/**
	 * Returns the string color format for css, svg, canvas
	 * 
	 * @return string
	 */
	public function __toString() {

		list($a, $r, $g, $b) = $this->toArray();
		
		if ($a > 0) {
			return sprintf('rgba(%d,%d,%d,%s)', $r, $g, $b,  1 - round($a / 127, 1));
		}

		return sprintf('rgb(%d,%d,%d)', $r, $g, $b);
	}
}