<?php 

namespace Day06Test;

require 'vendor/autoload.php';

use Day06\RecentlyUsed;

class RecentlyUsedTest extends \PHPUnit_Framework_TestCase {

	public function testInitialListIsEmpty(){
		$list = new RecentlyUsed();
		$this->assertEquals(0, $list->length());
		$this->assertEquals(array(), $list->data());
	}

	public function testOrderOfItemsIsCorrect(){
		$list = new RecentlyUsed();
		$list->push("alpha");
		$list->push("beta");
		$this->assertEquals(2, $list->length());
		$this->assertEquals("beta", $list->pop());
		$this->assertEquals(1, $list->length());
		$this->assertEquals("alpha", $list->pop());
		$this->assertEquals(0, $list->length());
	}

	public function testItemsCanBeLookedUp(){
		$list = new RecentlyUsed();
		$list->push("alpha");
		$list->push("beta");
		$list->push("gamma");
		$this->assertEquals("gamma", $list->itemAt(0));
		$this->assertEquals("beta", $list->itemAt(1));
		$this->assertEquals("alpha", $list->itemAt(2));
	}

	public function testDuplicateInsertionsReorders(){
		$list = new RecentlyUsed();
		$list->push("alpha");
		$list->push("beta");
		$list->push("gamma");
		$this->assertEquals("alpha", $list->itemAt(2));
		$this->assertEquals(3, $list->length());
		$list->push('alpha');
		//Check alpha is now at position 0 and the size has not changed
		$this->assertEquals("alpha", $list->itemAt(0));
		$this->assertEquals(3, $list->length());
	}

	/**
     * @expectedException OutOfBoundsException
     */
	public function testAccessingInvalidItemThrowsException(){
		$list = new RecentlyUsed();
		$list->itemAt(1);
	}

	/**
     * @expectedException InvalidArgumentException
     */
	public function testNullInsertionsNotAllowed(){
		$list = new RecentlyUsed();
		$list->push(null);
	}

	/**
     * @expectedException InvalidArgumentException
     */
	public function testEmptyStringInsertionsNotAllowed(){
		$list = new RecentlyUsed();
		$list->push("");
	}

	public function testOverflow(){
		$list = new RecentlyUsed(5);
		$list->push("alpha");
		$list->push("beta");
		$list->push("gamma");
		$list->push("delta");
		$list->push("epsilon");

		$this->assertEquals(5, $list->length());
		$this->assertEquals('alpha', $list->itemAt(4));
		//Adding Zeta should push off alpha
		$list->push("zeta");
		$this->assertEquals('beta', $list->itemAt(4));
		$this->assertEquals(5, $list->length());
	}
}
