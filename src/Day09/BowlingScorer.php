<?php 

namespace Day09;

class BowlingScorer {

	private $numFrames;
	private $currentFrame;
	private $ballNumInFrame;
	private $frameScore;
	private $pointsPerFrame;

	public function __construct($numFrames = 10){
		// $this->score = 0;
		$this->numFrames = $numFrames;
		$this->currentFrame = 1;
		$this->ballNumInFrame = 0;
		$this->frameScore = 0;
		$this->pointsPerFrame = array();
	}

	public function score(){
		$score = 0;
		foreach($this->pointsPerFrame as $pointsInfo){
			if(isset($pointsInfo['points'])){
				$score+= $pointsInfo['points'];
			}
		}
		return $score;
	}

	public function bowl($points){
		$this->pointsPerFrame[$this->currentFrame][$this->ballNumInFrame] = $points;

		if($this->ballNumInFrame == 0){
			$this->pointsPerFrame[$this->currentFrame]['points'] = 0;
			$this->pointsPerFrame[$this->currentFrame]['score'] = 0;
		}
		$this->pointsPerFrame[$this->currentFrame]['points']+= $points;
		$this->pointsPerFrame[$this->currentFrame]['score']+= $points;

		if($points == 10){
			$this->pointsPerFrame[$this->currentFrame]['score'] = "X";
			$this->pointsPerFrame[$this->currentFrame]['strike'] = true;
			$this->pointsPerFrame[$this->currentFrame]['spare'] = false;
			$this->pointsPerFrame[$this->currentFrame][1] = 0;
			$this->ballNumInFrame++;
		}elseif($this->pointsPerFrame[$this->currentFrame]['points'] == 10){
			$this->pointsPerFrame[$this->currentFrame]['score'] = "/";
			$this->pointsPerFrame[$this->currentFrame]['spare'] = true;
			$this->pointsPerFrame[$this->currentFrame]['strike'] = false;
		}else{
			$this->pointsPerFrame[$this->currentFrame]['spare'] = false;
			$this->pointsPerFrame[$this->currentFrame]['strike'] = false;
		}
		
		$this->ballNumInFrame++;
		if($this->ballNumInFrame > 1){
			$this->ballNumInFrame = 0;
			$this->addPointsForStrikesAndSpares();
			$this->advanceFrame();
		}
	}

	public function getScoreForFrame($frame){
		return $this->pointsPerFrame[$frame]['score'];
	}

	public function getCurrentFrame(){
		return $this->currentFrame;
	}

	protected function advanceFrame(){
		$this->currentFrame++;
		$this->frameScore = 0;
	}

	protected function addPointsForStrikesAndSpares(){
		$currentFrameScore = $this->pointsPerFrame[$this->currentFrame]['points'];
		if($this->currentFrame > 2){
			$frame = &$this->pointsPerFrame[$this->currentFrame - 2];
			if($frame['strike']){
				$frame['points'] += $currentFrameScore;
			}
		}

		if($this->currentFrame > 1){
			$frame = &$this->pointsPerFrame[$this->currentFrame - 1];
			if($frame['strike'] || $frame['spare']){
				$frame['points'] += $currentFrameScore;
			}
		}
	}
}