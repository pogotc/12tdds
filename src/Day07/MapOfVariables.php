<?php 

namespace Day07;

class MapOfVariables {

	private $vars;

	public function __construct(){
		$this->vars = array();
	}

	public function put($name, $value){
		$this->vars[$name] = $value;
	}

	public function get($name){
		if(!isset($this->vars[$name])){
			throw new \InvalidArgumentException();
			
		}
		return $this->vars[$name];
	}
}