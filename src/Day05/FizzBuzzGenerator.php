<?php 

namespace Day05;

class FizzBuzzGenerator {

	public function generate($from, $to){
		$output = "";
		for($i = $from; $i <= $to; $i++){
			$output.= $this->generateOutputForVal($i);
			if($i < $to){
				$output.= "\n";
			}
		}
		return $output;
	}

	protected function generateOutputForVal($val){
		$result = "";
		if($val % 3 == 0){
			$result .= "Fizz";
		}
		if($val % 5 == 0){
			$result .= "Buzz";
		}
		return $result !== "" ? $result : $val;
	}
}
