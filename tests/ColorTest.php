<?php
use PhpColor\Color;

class ColorTest extends PHPUnit_Framework_TestCase
{
		
	public function testStaticMethodFromHex() {
		
		$color = Color::fromHex('#ffffff');		
		$this->assertInstanceOf('Drawing\Color', $color);		
		$this->assertEquals(255, $color->getRed());
		$this->assertEquals(255, $color->getGreen());
		$this->assertEquals(255, $color->getBlue());
		$this->assertEquals(0, $color->getAlpha());	
		
		$color = Color::fromHex('#cccccc');
		$this->assertInstanceOf('Drawing\Color', $color);
		$this->assertEquals(204, $color->getRed());
		$this->assertEquals(204, $color->getGreen());
		$this->assertEquals(204, $color->getBlue());
		$this->assertEquals(0, $color->getAlpha());
		
		$color = Color::fromHex('#7fffffff');
		$this->assertInstanceOf('Drawing\Color', $color);
		$this->assertEquals(255, $color->getRed());
		$this->assertEquals(255, $color->getGreen());
		$this->assertEquals(255, $color->getBlue());
		$this->assertEquals(127, $color->getAlpha());
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Hexadecimal color is not correct
	 */
	public function testStaticMethodFromHexWithWrongParams() {
		$color = Color::fromHex('#ddd');
	}
	
	public function testStaticMethodFromArray() {
		
		$color = Color::fromArray([255, 255, 255]);
		$this->assertInstanceOf('Drawing\Color', $color);
		$this->assertEquals(255, $color->getRed());
		$this->assertEquals(255, $color->getGreen());
		$this->assertEquals(255, $color->getBlue());
		$this->assertEquals(0, $color->getAlpha());
		
		$this->assertEquals('ffffff', $color->toHex());
		$this->assertEquals('#ffffff', $color->toHex(true));
		$this->assertEquals(0xffffff, $color->toInt());
		
		$color = Color::fromArray([204, 204, 204]);
		$this->assertInstanceOf('Drawing\Color', $color);
		$this->assertEquals(204, $color->getRed());
		$this->assertEquals(204, $color->getGreen());
		$this->assertEquals(204, $color->getBlue());
		$this->assertEquals(0, $color->getAlpha());
		
		$this->assertEquals('cccccc', $color->toHex());
		$this->assertEquals('#cccccc', $color->toHex(true));
		$this->assertEquals(0xcccccc, $color->toInt());
		
		$color = Color::fromArray([127, 255, 255, 255]);
		$this->assertInstanceOf('Drawing\Color', $color);
		$this->assertEquals(255, $color->getRed());
		$this->assertEquals(255, $color->getGreen());
		$this->assertEquals(255, $color->getBlue());
		$this->assertEquals(127, $color->getAlpha());
		
		$this->assertEquals('7fffffff', $color->toHex());
		$this->assertEquals('#7fffffff', $color->toHex(true));
		$this->assertEquals(0x7fffffff, $color->toInt());
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage The array color count expected 3 or 4 value
	 */
	public function testStaticMethodFromArrayWithWrongParams() {
		$color = Color::fromArray([255, 255]);
	}
	
	public function testStaticMethodFromInt() {
		
		// white
		$color = Color::fromInt(0xffffff);
		$this->assertInstanceOf('Drawing\Color', $color);
		$this->assertEquals(255, $color->getRed());
		$this->assertEquals(255, $color->getGreen());
		$this->assertEquals(255, $color->getBlue());
		$this->assertEquals(0, $color->getAlpha());
		
		$this->assertEquals('ffffff', $color->toHex());
		$this->assertEquals('#ffffff', $color->toHex(true));
		$this->assertCount(4, $color->toArray());
		
		// transparent
		$color = Color::fromInt(0x7fffffff);
		$this->assertInstanceOf('Drawing\Color', $color);
		$this->assertEquals(255, $color->getRed());
		$this->assertEquals(255, $color->getGreen());
		$this->assertEquals(255, $color->getBlue());
		$this->assertEquals(127, $color->getAlpha());
		$this->assertEquals('#7fffffff', $color->toHex(true));
		$this->assertCount(4, $color->toArray());		
	}
		
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage The integer color value must be an integer between 0 and 2147483647
	 */
	public function testStaticMethodFromIntWithWrongParams() {
		$color = Color::fromInt(2147483648);
	}
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Channel color must be an integer between 0 and 255
	 */
	public function testSetWrongRedChannel() {
		$color = new Color();
		$color->setRed(289);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Channel color must be an integer between 0 and 255
	 */
	public function testSetWrongGreenChannel() {
		$color = new Color();
		$color->setGreen(-25);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Channel color must be an integer between 0 and 255
	 */
	public function testSetWrongBlueChannel() {
		$color = new Color();
		$color->setBlue(256);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Alpha parameter value must be an integer between 0 and 127
	 */
	public function testSetWrongAlphaChannel() {
		$color = new Color();
		$color->setAlpha(222);
	}
	
	public function testSettingsChannelsAfterInstance() {
		
		$color = new Color();
		
		$this->assertInstanceOf('Drawing\Color', $color);
		$this->assertEquals(0, $color->getRed());
		$this->assertEquals(0, $color->getGreen());
		$this->assertEquals(0, $color->getBlue());
		$this->assertEquals(0, $color->getAlpha());
		
		$color->setRed(255)		
			->setGreen(255)
			->setBlue(255)
			->setAlpha(127)
		;
		
		$this->assertEquals(255, $color->getRed());
		$this->assertEquals(255, $color->getGreen());
		$this->assertEquals(255, $color->getBlue());
		$this->assertEquals(127, $color->getAlpha());
	}
	
	public function testToStringMethod() {
		$color = new Color(222, 222, 222);
		$this->assertEquals('rgb(222,222,222)', $color->__toString());
		
		$color = new Color(222, 222, 222, 100);
		$this->assertEquals('rgba(222,222,222,0.2)', $color->__toString());
	}
	
	public function testConstantsColors() {
		$color = Color::fromInt(Color::BLUE);
		$this->assertEquals(0, $color->getRed());
		$this->assertEquals(0, $color->getGreen());
		$this->assertEquals(255, $color->getBlue());
		$this->assertEquals(0, $color->getAlpha());
	}	
}