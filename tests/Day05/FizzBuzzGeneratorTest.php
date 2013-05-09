<?php 

namespace Day05Test;

require 'vendor/autoload.php';

use Day05\FizzBuzzGenerator;

class FizzBuzzGeneratorTest extends \PHPUnit_Framework_TestCase {
	
	public function testFizz(){
		$fbGen = new FizzBuzzGenerator();
		$this->assertEquals("Fizz", $fbGen->generate(3, 3));
	}

	public function testBuzz(){
		$fbGen = new FizzBuzzGenerator();
		$this->assertEquals("Buzz", $fbGen->generate(5, 5));
	}

	public function testFizzBuzz(){
		$fbGen = new FizzBuzzGenerator();
		$this->assertEquals("FizzBuzz", $fbGen->generate(15, 15));
	}

	public function testNumber(){
		$fbGen = new FizzBuzzGenerator();
		$this->assertEquals("1", $fbGen->generate(1, 1));
	}

	public function testRange(){
		$fbGen = new FizzBuzzGenerator();
		$result = <<<EOT
1
2
Fizz
4
Buzz
Fizz
7
8
Fizz
Buzz
11
Fizz
13
14
FizzBuzz
16
17
Fizz
19
Buzz
EOT;
		$this->assertEquals($result, $fbGen->generate(1, 20));
	}
}