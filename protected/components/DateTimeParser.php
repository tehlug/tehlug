<?php
include_once('jdf.php');
Class DateTimeParser Extends CDateTimeParser {
	public static function parse($value, $pattern='MM/dd/yyyy') {
		$parts = explode('/', $value); // jalali doesnt currently support $pattern.

		if(count($parts) != 3)
			return False;

		$time = jmaketime(0,0,0, $parts[1], $parts[2], $parts[0]);
		return $time;
	}
}