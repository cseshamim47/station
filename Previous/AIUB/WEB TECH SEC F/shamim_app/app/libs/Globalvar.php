<?php 

class Globalvar{
	
		
	function array_group_by($arr, array $keys) {

		if (!is_array($arr)) {
			trigger_error('array_group_by(): The first argument should be an array', E_USER_ERROR);
		}
		if (count($keys)==0) {
			trigger_error('array_group_by(): The Second argument Array can not be empty', E_USER_ERROR);
		}

		// Load the new array, splitting by the target key
		$grouped = [];
		foreach ($arr as $value) {
			$grouped[$value[$keys[0]]][] = $value;
		}

		// Recursively build a nested grouping if more parameters are supplied
		// Each grouped array value is grouped according to the next sequential key
		if (count($keys) > 1) {
				foreach ($grouped as $key => $value) {
				   $parms = array_merge([$value], [array_slice($keys, 1,count($keys))]);
				   $grouped[$key] = call_user_func_array('array_group_by', $parms);

			}
		}
		return $grouped;
	}

	function getFormula($rows,$formula, $fd=0, $tr=0, $xpackchg=0, $transcost=0){
			


			$ta = array_sum(array_column($rows,"ta")); 

			$tt = array_sum(array_column($rows,"tt"));

			$id = array_sum(array_column($rows,"id"));

			
			$calstring = str_replace("ta", $ta, $formula);

			$calstring = str_replace("tt", $tt, $calstring); 

			$calstring = str_replace("id", $id, $calstring); 

			$calstring = str_replace("fd", $fd, $calstring); 
			
			$calstring = str_replace("tr", $tr, $calstring);

			$calstring = str_replace("pc", $xpackchg, $calstring);

			$calstring = str_replace("tc", $transcost, $calstring);
			
			$result = 0;
			
			$res = @eval('$result = (' . $calstring . ');'. "; return true;");

			if(!$res)
				eval( '$result = (' . $calstring . ');' );

			return $result;

		}
	
}