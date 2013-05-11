<?php 

namespace Day09Test;

require 'vendor/autoload.php';

use Day09\BowlingScorer;

class BowlingScorerTest extends \PHPUnit_Framework_TestCase {

	public function testScoreIsZeroAtStart(){
		$scorer = new BowlingScorer(10);
		$this->assertEquals(0, $scorer->score());
		$this->assertEquals(1, $scorer->getCurrentFrame());
	}

	public function testScoreAfterNonSpareNonStrikeBowl(){
		$scorer = new BowlingScorer(10);
		$scorer->bowl(5);
		$this->assertEquals(1, $scorer->getCurrentFrame());
		$this->assertEquals(5, $scorer->score());
		$scorer->bowl(2);
		$this->assertEquals(2, $scorer->getCurrentFrame());
		$this->assertEquals(7, $scorer->score());
		$this->assertEquals(7, $scorer->getScoreForFrame(1));
	}

	public function testScoringForStrike(){
		$scorer = new BowlingScorer(10);
		$scorer->bowl(10);
		$this->assertEquals(2, $scorer->getCurrentFrame());
		$this->assertEquals(10, $scorer->score());
		$this->assertEquals("X", $scorer->getScoreForFrame(1));
	}

	public function testScoringForSpare(){
		$scorer = new BowlingScorer(10);
		$scorer->bowl(7);
		$this->assertEquals(1, $scorer->getCurrentFrame());
		$scorer->bowl(3);
		$this->assertEquals(2, $scorer->getCurrentFrame());
		$this->assertEquals(10, $scorer->score());
		$this->assertEquals("/", $scorer->getScoreForFrame(1));
	}

	public function testPointsCarryOverForStrike(){
		$scorer = new BowlingScorer(10);
		$scorer->bowl(10);
		$this->assertEquals(10, $scorer->score());
		$scorer->bowl(3);
		$scorer->bowl(5);
		$this->assertEquals(26, $scorer->score());
	}

	public function testPointsCarryOverForSpare(){
		$scorer = new BowlingScorer(10);
		//Frame 1
		$scorer->bowl(4);
		$scorer->bowl(6);
		$this->assertEquals(10, $scorer->score());

		//Frame 2
		$scorer->bowl(3);
		$scorer->bowl(6);

		$this->assertEquals(28, $scorer->score());
	}

	public function testPointsCarryOverMultipleStrikes(){
		$scorer = new BowlingScorer(10);
		//Frame 1
		$this->assertEquals(1, $scorer->getCurrentFrame());
		$scorer->bowl(10);

		//Frame 2
		$this->assertEquals(2, $scorer->getCurrentFrame());
		$scorer->bowl(10);

		//Frame 3
		$this->assertEquals(3, $scorer->getCurrentFrame());
		$scorer->bowl(10);

		//Frame 4
		$this->assertEquals(4, $scorer->getCurrentFrame());
		$scorer->bowl(10);

		//Frame 5
		$this->assertEquals(5, $scorer->getCurrentFrame());
		$scorer->bowl(10);

		$this->assertEquals(120, $scorer->score());
	}
}
