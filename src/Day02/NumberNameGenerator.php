<?php 

namespace Day02;

class NumberNameGenerator {

	public function spell($number){
		if(!$number){
			return;
		}
		if($number < 10){
			return $this->spellUnits($number);
		}elseif($number < 100){
			return $this->spellTens($number);
		}elseif($number < 1000){
			return $this->spellHundreds($number);
		}elseif($number < 1000000){
			return $this->spellThousands($number);
		}else{
			return $this->spellMillions($number);
		}
	}

	protected function spellUnits($unitVal){
		$values = array(
			1 => 'One',
			2 => 'Two',
			3 => 'Three',
			4 => 'Four',
			5 => 'Five',
			6 => 'Six',
			7 => 'Seven',
			8 => 'Eight',
			9 => 'Nine',
		);
		return $values[$unitVal];
	}

	protected function spellTens($tenVal){
		if(!$tenVal){
			return;
		}

		$values = array(
			10 => 'Ten',
			11 => 'Eleven',
			12 => 'Twelve',
			13 => 'Thirteen',
			14 => 'Fourteen',
			15 => 'Fifteen',
			16 => 'Sixteen',
			17 => 'Seventeen',
			18 => 'Eighteen',
			19 => 'Nineteen',
			20 => 'Twenty',
			30 => 'Thirty',
			40 => 'Forty',
			50 => 'Fifty',
			60 => 'Sixty',
			70 => 'Seventy',
			80 => 'Eighty',
			90 => 'Ninety'
		);

		if(isset($values[$tenVal])){
			return $values[$tenVal];
		}else{
			$hVal = floor($tenVal / 10) * 10;
			$unit = $tenVal - $hVal;

			$result = "";
			if(isset($values[$hVal])){
				$result.= $values[$hVal]." ";
			}
			$result.= $this->spellUnits($unit);
			return $result;
		}
	}

	protected function breakdownNumber($val, $divisor, $label, $remainderSeparator){
		$tval = floor($val / $divisor);
		$remainder = $val - ($tval * $divisor);
		$result = $this->spell($tval)." ".$label;
		$remainderTxt = $this->spell($remainder);
		if($remainderTxt){
			$result.= $remainderSeparator.$remainderTxt;
		}
		return $result;
	}

	protected function spellHundreds($val){
		return $this->breakdownNumber($val, 100, "Hundred", " and ");
	}

	protected function spellThousands($val){
		return $this->breakdownNumber($val, 1000, "Thousand", ", ");
	}

	protected function spellMillions($val){
		return $this->breakdownNumber($val, 1000000, "Million", ", ");
	}
}