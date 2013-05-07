<?php 

namespace Day02Test;

require 'vendor/autoload.php';

use Day02\NumberNameGenerator;

class NumberNameGeneratorTest extends \PHPUnit_Framework_TestCase {
	
	function testUnits(){
		$numGen = new NumberNameGenerator();		
		$this->assertEquals('One', $numGen->spell(1));
		$this->assertEquals('Two', $numGen->spell(2));
		$this->assertEquals('Three', $numGen->spell(3));
		$this->assertEquals('Four', $numGen->spell(4));
		$this->assertEquals('Five', $numGen->spell(5));
		$this->assertEquals('Six', $numGen->spell(6));
		$this->assertEquals('Seven', $numGen->spell(7));
		$this->assertEquals('Eight', $numGen->spell(8));
		$this->assertEquals('Nine', $numGen->spell(9));

	}

	function testTens(){
		$numGen = new NumberNameGenerator();
		$this->assertEquals('Ten', $numGen->spell(10));
		$this->assertEquals('Eleven', $numGen->spell(11));
		$this->assertEquals('Twelve', $numGen->spell(12));
		$this->assertEquals('Thirteen', $numGen->spell(13));
		$this->assertEquals('Fourteen', $numGen->spell(14));
		$this->assertEquals('Fifteen', $numGen->spell(15));
		$this->assertEquals('Sixteen', $numGen->spell(16));
		$this->assertEquals('Seventeen', $numGen->spell(17));
		$this->assertEquals('Eighteen', $numGen->spell(18));
		$this->assertEquals('Nineteen', $numGen->spell(19));
		$this->assertEquals('Twenty', $numGen->spell(20));
		$this->assertEquals('Twenty Five', $numGen->spell(25));
		$this->assertEquals('Thirty', $numGen->spell(30));
		$this->assertEquals('Forty', $numGen->spell(40));
		$this->assertEquals('Fifty', $numGen->spell(50));
		$this->assertEquals('Sixty', $numGen->spell(60));
		$this->assertEquals('Seventy', $numGen->spell(70));
		$this->assertEquals('Eighty', $numGen->spell(80));
		$this->assertEquals('Ninety', $numGen->spell(90));
	}

	function testHundreds(){
		$numGen = new NumberNameGenerator();
		$this->assertEquals('One Hundred', $numGen->spell(100));
		$this->assertEquals('One Hundred and Fifty', $numGen->spell(150));
		$this->assertEquals('Two Hundred', $numGen->spell(200));
		$this->assertEquals('Three Hundred', $numGen->spell(300));
		$this->assertEquals('Four Hundred', $numGen->spell(400));
		$this->assertEquals('Five Hundred', $numGen->spell(500));
		$this->assertEquals('Six Hundred', $numGen->spell(600));
		$this->assertEquals('Seven Hundred', $numGen->spell(700));
		$this->assertEquals('Eight Hundred', $numGen->spell(800));
		$this->assertEquals('Nine Hundred', $numGen->spell(900));
	}

	function testThousands(){
		$numGen = new NumberNameGenerator();
		$this->assertEquals('One Thousand', $numGen->spell(1000));
		$this->assertEquals('Two Thousand', $numGen->spell(2000));
		$this->assertEquals('Three Thousand', $numGen->spell(3000));
		$this->assertEquals('Four Thousand', $numGen->spell(4000));
		$this->assertEquals('Five Thousand', $numGen->spell(5000));
		$this->assertEquals('Six Thousand', $numGen->spell(6000));
		$this->assertEquals('Seven Thousand', $numGen->spell(7000));
		$this->assertEquals('Eight Thousand', $numGen->spell(8000));
		$this->assertEquals('Nine Thousand', $numGen->spell(9000));
		$this->assertEquals('Ten Thousand', $numGen->spell(10000));
		$this->assertEquals('Eleven Thousand', $numGen->spell(11000));
		$this->assertEquals('Twelve Thousand', $numGen->spell(12000));
		$this->assertEquals('Thirteen Thousand', $numGen->spell(13000));
		$this->assertEquals('Fourteen Thousand', $numGen->spell(14000));
		$this->assertEquals('Fifteen Thousand', $numGen->spell(15000));
	}

	function testNumbers(){
		$numGen = new NumberNameGenerator();
		$this->assertEquals('Five Hundred and One', $numGen->spell(501));
		$this->assertEquals('One Thousand, Five Hundred and One', $numGen->spell(1501));
		$this->assertEquals('Twelve Thousand, Six Hundred and Nine', $numGen->spell(12609));
		$this->assertEquals('Five Hundred and Twelve Thousand, Six Hundred and Seven', $numGen->spell(512607));
		$this->assertEquals('Forty Three Million, One Hundred and Twelve Thousand, Six Hundred and Three', $numGen->spell(43112603));
	}
}