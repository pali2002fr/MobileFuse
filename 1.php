<?php
function firstAlphanumeric($str){
	if(strlen($str) == 0) return false;
	$pattern = '/[a-zAZ0-9]/';
	preg_match_all($pattern, $str, $matches, PREG_SET_ORDER, 0);
	if(!empty($matches)){
		return $matches[0][0];
	}
	return false;
}

echo firstAlphanumeric('!@#$%^&*()1977pali');