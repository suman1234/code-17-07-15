<?php

 function getFile($path)
 {
	$dataFile_records = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	return $dataFile_records;
 }
 
 
function makeArrayFromFile($path){
	$data = getFile($path);
	
	$opt_array = array();
	foreach($data as $key => $val){
		if(!in_array($key,array(0,31))){
			$data = explode(" ", $val);
			foreach($data as $d => $v){
				$tmp = trim($v);
				if(!empty($tmp) && strlen($tmp))
					$opt_array[$key][] = $tmp;
			}
		}
	}
	
	return $opt_array;
	
 }
 
 function getCal($data, $cell_1, $cell_2, $cell_3){
	$final_data = array();
	if(!empty($data)){
		foreach($data as $day => $day_data){
			// echo '<pre>';
			if(isset($day_data[$cell_2]) && !empty($day_data[$cell_2])){
				if((int) trim($day_data[$cell_2]) > (int) trim($day_data[$cell_3]))
					$spread =  (int) trim($day_data[$cell_2])-(int) trim($day_data[$cell_3]);
				else
					$spread =  (int) trim($day_data[$cell_3])-(int) trim($day_data[$cell_2]);

				$final_data[$spread] = array(
												"report_for" => $day_data[$cell_1],
												"maxVal" => $day_data[$cell_2],
												"minVal" => $day_data[$cell_3],
												"diff" => $spread
									);
				}
		}
	}
	
	return $final_data;
	
 }
function getUglyNum($aNum)
{
	//~ $aDivider = array(2, 3, 5, 7);
	$aDivider = unserialize(COMMON);
	$aUgly = array();

	foreach($aNum as $num)
	{
		if(!empty($num))
		{
			foreach($aDivider['DIVIDER'] as $div)
			{
				$res1 = $num%$div;
				if($res1 == 0)
				{
					echo $num."\n";
					break;
				}
			}
		}
		else
		{
			echo $num."\n";
		}
	}
}

function palindrome($num,$no_iteration=0)
{
	$returnVal = array();
	$no_iteration = $no_iteration +1;	
	$initialVal = $num;
	$reverseVal = implode('', array_reverse(str_split($num)));
	
	if($initialVal != $reverseVal)
	{
		$add = $initialVal+$reverseVal;
		if($add  == implode('', array_reverse(str_split($add))))
			$returnVal = array($add,$no_iteration);
		else
			$returnVal = palindrome($add, $no_iteration);
	}
	else
		$returnVal = array($initialVal,0);
		
	if(!empty($returnVal))
		return $returnVal;
	
}

function closeToZero($aNum)
{
	$returnVal = array();
	for($i=0; $i< count($aNum); $i++){
		for($j=$i+1; $j< count($aNum); $j++){
		
			$add = str_replace('-',"",$aNum[$i]+$aNum[$j]);
			$returnVal[$add][0]=$aNum[$i];
			$returnVal[$add][1]=$aNum[$j];
		}
	}
	ksort($returnVal);
	//~ print_r($returnVal);
	
	foreach($returnVal as $key=>$val)
	{
		return "sum = ".$key.", For 2 numbers : ".$returnVal[$key][0].", ".$returnVal[$key][1];
		exit;
	}
}

function wordChain($aText)
{

	print_r($aText);

}
?>