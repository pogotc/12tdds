<?php 

namespace Day01Test;

require 'vendor/autoload.php';

use Day01\StatsCalculator;

class StatsCalculatorTest extends \PHPUnit_Framework_TestCase {


	public function testMinValue(){
		$calculator = new StatsCalculator();
		$result = $calculator->run(array(6, 9, 15, -2, 92, 11));
		$this->assertEquals(-2, $result['min']);
	}

	public function testMaxValue(){
		$calculator = new StatsCalculator();
		$result = $calculator->run(array(6, 9, 15, -2, 92, 11));
		$this->assertEquals(92, $result['max']);
	}

	public function testNumElements(){
		$calculator = new StatsCalculator();
		$result = $calculator->run(array(6, 9, 15, -2, 92, 11));
		$this->assertEquals(6, $result['elemcount']);
	}

	public function testAverageValue(){
		$calculator = new StatsCalculator();
		$result = $calculator->run(array(6, 9, 15, -2, 92, 11));
		$this->assertEquals(21.8333333333, $result['avg']);
	}

	/**
     * @expectedException InvalidArgumentException
     */
	public function testThrowsExceptionOnEmpty(){
		$calculator = new StatsCalculator();
		$result = $calculator->run(array());
	}	
}