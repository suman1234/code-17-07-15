<?php
/** 
   * @team  Rakesh Salunke and Suman B. Sharma.
   * @author Suman B. Sharma.
   * @internal Get Ugly number from given file.
   * @internal Test for negative, zero.
   */
include_once 'common.php';

// Call functions
$aNum = array(39, 40, 1414, 1515, 0, -44, - 13);
//~ getUglyNum($aNum);
foreach($aNum as $num)
{
	if($num > 0)
	{
		echo $num.' - ';
		echo palindrome($num)."\n";
	}
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

function palindrome($num)
{
	//~ echo '**'.$num.'&&';
	$returnVal = 0;
		
	$initialVal = $num;
	$reverseVal = implode('', array_reverse(str_split($num)));
	$add = $initialVal+$reverseVal;
	if($add  == implode('', array_reverse(str_split($add))))
		$returnVal = $add;
	else
		$returnVal = palindrome($add);
	
	if(!empty($returnVal))
		return $returnVal;
	
}


?>