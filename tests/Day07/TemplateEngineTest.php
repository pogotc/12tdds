<?php 

namespace Day07Test;

require 'vendor/autoload.php';

use Day07\MapOfVariables;
use Day07\TemplateEngine;

class TemplateEngineTest extends \PHPUnit_Framework_TestCase {

	public function testEvaluateSingleExpression(){
		$engine = new TemplateEngine();

		$mapOfVariables = $this->getMock("Day07\MapOfVariables");
		$mapOfVariables->expects($this->once())
						->method("get")
						->will($this->returnValue("Armando"));

		$this->assertEquals("Hello Armando", $engine->evaluate('Hello {$name}', $mapOfVariables));
	}

	public function testEvaluateMultipleExpressions(){
		$engine = new TemplateEngine();

		$mapOfVariables = $this->getMock("Day07\MapOfVariables");

		$varMap = array(
			array('name', 'Armando'),
			array('lastName', 'Paredes')
		);

		$mapOfVariables->expects($this->any())
						->method("get")
						->will($this->returnValueMap($varMap));

		$this->assertEquals("Hello Armando Paredes", $engine->evaluate('Hello {$name} {$lastName}', $mapOfVariables));		
	}

	/**
     * @expectedException InvalidArgumentException
     */
	public function testThrowsErrorWhenVariableDoesNotExist(){
		$engine = new TemplateEngine();

		$mapOfVariables = new MapOfVariables();
		$this->assertEquals("Hello Armando", $engine->evaluate('Hello {$name}', $mapOfVariables));
	}

	public function testEvaluateComplexCases(){
		$engine = new TemplateEngine();		

		$mapOfVariables = $this->getMock("Day07\MapOfVariables");
		$mapOfVariables->expects($this->once())
						->method("get")
						->will($this->returnValue("Armando"));
		$this->assertEquals('Hello ${Armando}', $engine->evaluate('Hello ${{$name}}', $mapOfVariables));
	}
}