<?php 

namespace Day06;

class RecentlyUsed {

	private $items;
	private $size;

	public function __construct($size = null){
		$this->items = array();
		$this->size = $size;
	}

	public function push($item){
		if(!$item){
			throw new \InvalidArgumentException();
		}

		if(in_array($item, $this->items)){
			$this->moveItemToFront($item);
		}else{
			array_unshift($this->items, $item);

			if($this->size !== null && $this->length() > $this->size){
				array_pop($this->items);
			}
		}
	}

	public function pop(){
		if(count($this->items)){
			return array_shift($this->items);
		}
	}

	public function itemAt($idx){
		if($idx >= count($this->items)){
			throw new \OutOfBoundsException();
		}
		return $this->items[$idx];
	}

	public function length(){
		return count($this->items);
	}

	public function data(){
		return $this->items;
	}

	protected function moveItemToFront($item){
		$itemIdx = array_search($item, $this->items);
		if($itemIdx !== null){
			unset($this->items[$itemIdx]);
			$this->push($item);
		}
	}
}
