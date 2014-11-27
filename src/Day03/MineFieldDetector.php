<?php 

namespace Day03;

class MineFieldDetector {

	public function check(array $grid)
	{
		$result = array();
		for($y = 0; $y < count($grid); $y++){
			$result[]= $this->checkRow($grid, $y);
		}
		return $result;
	}

	/**
	 * @param integer $y
	 */
	protected function checkRow($grid, $y){
		$result = array();
		for($x = 0; $x < count($grid[$y]); $x++){
			$result[$x] = $this->checkCell($grid, $x, $y);
		}
		return $result;
	}

	/**
	 * @param integer $x
	 */
	protected function checkCell($grid, $x, $y)
	{
		$rowStart = max(0, $y - 1);
		$rowEnd = min(count($grid) - 1, $y + 1);
		$colStart = max(0, $x - 1);
		$colEnd = min(count($grid[$y]) - 1, $x + 1);
		
		if($grid[$y][$x] == '*'){
			return '*';
		}

		$numMines = 0;
		for($row = $rowStart; $row <= $rowEnd; $row++){
			for($col = $colStart; $col <= $colEnd; $col++){
				if($grid[$row][$col] == '*'){
					$numMines++;
				}
			}
		}

		return $numMines;
	}
}
