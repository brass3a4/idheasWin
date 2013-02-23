<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	 
function _clean_input_keys($str)
	{
		if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $str))
		{
			exit('Disallowed Key Characters.');
		}
 
		return $str;
	}

?>