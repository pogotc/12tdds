<?php 

namespace Day01;

class StatsCalculator {

	public function run(array $numbers)
	{
		$result = array(
			'min' => null,
			'max' => null,
			'avg' => 0,
			'elemcount' => 0
		);

		if(!count($numbers) || !is_array($numbers)){
			throw new \InvalidArgumentException("Invalid Array");
		}

		foreach($numbers as $number){
			if(!$result['min'] || $number < $result['min']){
				$result['min'] = $number;
			}
			if(!$result['max'] || $number > $result['max']){
				$result['max'] = $number;
			}
			$result['avg'] += $number;
			$result['elemcount']++;
		}
		$result['avg'] /= $result['elemcount'];
		return $result;
	}
}