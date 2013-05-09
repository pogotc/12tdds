<?php 

namespace Day07Test;

require 'vendor/autoload.php';

use Day07\MapOfVariables;

class MapOfVariablesTest extends \PHPUnit_Framework_TestCase {

	public function testCanRetrieveValue(){
		$mov = new MapOfVariables();
		$mov->put("name", "Armando");
		$this->assertEquals("Armando", $mov->get("name"));
	}

	/**
     * @expectedException InvalidArgumentException
     */
	public function testRetrievingUndefinedVarThrowsException(){
		$mov = new MapOfVariables();
		$mov->get("fakevar");
	}
}