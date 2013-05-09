<?php 

namespace Day07;

class TemplateEngine {

	public function evaluate($str, MapOfVariables $variables){
		return preg_replace_callback('~\{\$([\w]+)\}~', function($matches) use ($variables){
			return $variables->get($matches[1]);
		}, $str);
	}
}