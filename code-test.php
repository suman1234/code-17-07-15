<?php
/** 
   * @team  Rakesh Salunke and Suman B. Sharma.
   * @author Suman B. Sharma.
   * @internal Get Ugly number from given file.
   * @internal Test for negative, zero.
   */
include_once 'common.php';



// Call functions

$tmp_action = (isset($argv[1]) && !empty($argv[1])) ? $argv[1] :null;
$tmp_file_path = (isset($argv[2]) && !empty($argv[2])) ? $argv[2] :null;

if(!empty($tmp_file_path)){

	$aNum = getFile($tmp_file_path);
	
	switch($tmp_action){
			
		case 'number':
			// Ugly numbers
			echo "Ugly numbers : \n";
			getUglyNum($aNum);
			
			
			echo "\n \n";
			
			
			// Palindrome
			echo "Palindrome numbers : \n";
			echo "Iterations   Palindrome Number\n";
			
			foreach($aNum as $num)
			{
				if($num > 0)
				{
					$opt =  palindrome($num);
					if(!empty($opt))
						echo $opt[1]." \t\t  ".$opt[0]."\n";
				}
			}
			
			
			
			echo "\n \n";
			
			echo "Closest To Zero : \n";
			echo closeToZero($aNum)." \n";	 
			
			echo "\n \n";
		break;
		
		case 'ugly':
			
			// Ugly numbers
			echo "Ugly numbers : \n";
			getUglyNum($aNum);
			echo "\n \n";
			
		break;
		
		case 'palindrome':
			
			// Palindrome
			echo "Palindrome numbers : \n";
			echo "Iterations   Palindrome Number\n";
			
			foreach($aNum as $num)
			{
				if($num > 0)
				{
					$opt =  palindrome($num);
					if(!empty($opt))
						echo $opt[1]." \t\t  ".$opt[0]."\n";
				}
			}
			echo "\n \n";
			
		break;
		case 'closetozero': 
			echo "Closest To Zero : \n";
			echo closeToZero($aNum);	 
			echo "\n \n";
			
		break;
		
		case 'word.txt':
			echo "Word Chain : \n";
			wordChain($aText);
			echo "\n \n";
			
		break;
		
		case 'weather-report':
			$weather_array = makeArrayFromFile($tmp_file_path);
			$final_data = getCal($weather_array, 0, 1,2);
			
			echo "Weather report for Morristown, NJ for June 2002 : \n";
			ksort($final_data);
			
			$i = 1;
			foreach($final_data as $tmpKey => $opt){
				if($i==1){
					echo "Date : ".$opt['report_for']."\n";
					//echo "Max. Temp. : ".$opt['maxVal']."\n";
					//echo "Min. Temp. : ".$opt['minVal']."\n";
					//echo "Diffrence : ".$opt['diff']."\n";
				}else{
					break;
				}
				$i++;

			}
			echo "\n \n";
			
		break;
		
		case 'football-report':
			
			$football_array = makeArrayFromFile($tmp_file_path);
			
			$final_data = getCal($football_array, 1, 6,8);
			ksort($final_data);

			echo "Football report from English Premier League for 2001/2 : \n";

			$i = 1;
			foreach($final_data as $tmpKey => $opt){
				if($i==1){
					echo "Team Name : ".$opt['report_for']."\n";
					//echo "For goals : ".$opt['maxVal']."\n";
					//echo "Against Goals : ".$opt['minVal']."\n";
					//echo "Diffrence : ".$opt['diff']."\n";
				}else{
					break;
				}
				$i++;
			}
			echo "\n \n";
			
		break;
		
		
		
	}
	
	
}else{
	echo "no path";
}




?>