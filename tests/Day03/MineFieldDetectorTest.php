<?php 

namespace Day03Test;

require 'vendor/autoload.php';

use Day03\MineFieldDetector;

class MineFieldDetectorTest extends \PHPUnit_Framework_TestCase {
	
	public function testEmptyArray(){
		$detector = new MineFieldDetector();
		$result = $detector->check(array());
		$this->assertEquals(array(), $result);
	}

	public function testRow(){
		$detector = new MineFieldDetector();
		$result = $detector->check(array(
			array('.', '*', '.', '.')
		));
		$this->assertEquals(array(
			array('1', '*', '1', '0')
		), $result);
	}

	public function testCheckColumn(){
		$detector = new MineFieldDetector();
		$result = $detector->check(array(
			array('.'),
			array('*'),
			array('.'),
			array('.'),
		));
		$this->assertEquals(array(
			array('1'),
			array('*'),
			array('1'),
			array('0')
		), $result);
	}

	public function testCheckGrid(){
		$detector = new MineFieldDetector();
		$result = $detector->check(array(
			array('*', '.', '.', '.'),
			array('.', '.', '*', '.'),
			array('.', '.', '.', '.'),
		));
		
		$this->assertEquals(array(
			array('*', '2', '1', '1'),
			array('1', '2', '*', '1'),
			array('0', '1', '1', '1'),
		), $result);
	}
}