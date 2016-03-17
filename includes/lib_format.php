<?php

// $switch
// 0 spell out the type
// 1 abbreviate
function formatPhone($phone_num, $phone_ext, $vc_id, $phone_type, $switch){
	$query = "select * from country_country where vc_id = '" . $vc_id . "';";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

	$phone_length = $row['phone_length'];
	$phone_area_length = $row['phone_area_length'];
	$phone_exchange_length = $row['phone_exchange_length'];
	$phone_line_length = $row['phone_line_length'];

	$phone_num_area = substr($phone_num,0,$phone_area_length);
	$phone_num_exchange = substr($phone_num,$phone_area_length,$phone_exchange_length);
	$phone_num_line = substr($phone_num,$phone_area_length+$phone_exchange_length,$phone_line_length);

	// if country is "US" or "CA"
	if (($vc_id == 1) || ($vc_id == 6) ){
	}else{
		echo "+" . $row['country_code'] . " ";
	}

	// if country is "FR"
	if ($vc_id == 10){
		$phone_num_fr_prefix = substr($phone_num,0,2);
		$phone_num_fr_01 = substr($phone_num,2,2);
		$phone_num_fr_02 = substr($phone_num,4,2);
		$phone_num_fr_03 = substr($phone_num,6,2);
		$phone_num_fr_04 = substr($phone_num,8,2);

		echo "(" . $phone_num_fr_prefix . ") " . $phone_num_fr_01 . " " . $phone_num_fr_02 . " " . $phone_num_fr_03 . " " . $phone_num_fr_04;
#	}else{
#		$query = "select * from country_country where vc_id = '" . $vc_id . "';";
#		$result = mysql_query($query);
#		$row = mysql_fetch_array($result);
#
#		$phone_length = $row['phone_length'];
#		$phone_area_length = $row['phone_area_length'];
#		$phone_exchange_length = $row['phone_exchange_length'];
#		$phone_line_length = $row['phone_line_length'];

	// for korea
	// create the number backwards, for case where
	// area/city code is 2 or 3 digits
	}else if ($vc_id == 2){
		$phone_length_actual = strlen($phone_num);	

		if ($phone_length_actual == 9){
			$phone_num_area = substr($phone_num,0,2);
			$phone_num_exchange = substr($phone_num,2,$phone_exchange_length);
			$phone_num_line = substr($phone_num,(2+$phone_exchange_length),$phone_line_length);
		}else if ($phone_length_actual == 10){
			$phone_num_area = substr($phone_num,0,3);
			$phone_num_exchange = substr($phone_num,3,$phone_exchange_length);
			$phone_num_line = substr($phone_num,(3+$phone_exchange_length),$phone_line_length);
		// for korea mobile phone numbers
		}else if ($phone_length_actual == 11){
			$phone_exchange_length = 4;
			$phone_num_area = substr($phone_num,0,3);
			// cheat, add +1 to phone_exchange_length for korea mobile numbers
			$phone_num_exchange = substr($phone_num,3,$phone_exchange_length);
			$phone_num_line = substr($phone_num,(3+$phone_exchange_length),$phone_line_length);
		}else{
				// something is really wrong if you hit this condition
		}

		echo "(" . $phone_num_area . ") " . $phone_num_exchange . " - " . $phone_num_line;
	// for everyone else	
	// Netherlands
	}else if ($vc_id == 13){
		$phone_num_exchange_prefix = substr($phone_num_exchange,0,1);
		$phone_num_exchange_suffix = substr($phone_num_exchange,1,3);

		echo "(" . $phone_num_exchange_prefix . ")" . $phone_num_exchange_suffix . " - " . $phone_num_line;
	}else if ($vc_id == 14){
		$phone_num_be_00 = substr($phone_num,0,2);
		$phone_num_be_00 = substr($phone_num,2,2);
		$phone_num_be_00 = substr($phone_num,4,2);
		$phone_num_be_00 = substr($phone_num,6,2);

		echo $phone_num_be_00 . " " . $phone_num_be_01 . " " . $phone_num_be_02 . " " . $phone_num_be_03;
	}else{
		$phone_num_area = substr($phone_num,0,$phone_area_length);
		$phone_num_exchange = substr($phone_num,$phone_area_length,$phone_exchange_length);
		$phone_num_line = substr($phone_num,$phone_area_length+$phone_exchange_length,$phone_line_length);
	
		echo "(" . $phone_num_area . ") " . $phone_num_exchange . " - " . $phone_num_line;
	}

#	echo "(" . $phone_num_area . ") " . $phone_num_exchange . " - " . $phone_num_line;
#	}

	if ($phone_ext == 0){
	}else{
		echo " x" . $phone_ext;
	}

	if ($switch == 0){
		echo " - " . $phone_type;
	}else if ($switch == 1){
		if ($phone_type == "Business"){
			echo " (W)";
		}else if ($phone_type == "Fax"){
			echo " (F)";
		}else if ($phone_type == "Mobile"){
			echo " (M)";
		}else{
		}
	}else{
	}
}

// can get rid of vc_id and go by country code.
function formatPostal($zip, $vc_id){
	// currently usa = 1
	//           korea = 2
	//           england = 3
	//	     india = 5
	//	     canada = 6
	if ($vc_id == 1){
		$first = substr($zip,0,5);
		
		if (strlen($zip) > 5){
			$second = substr($zip,5,4);
			return $first . "-" . $second;
		}else{
			return $first;
		}
	}else if ($vc_id == 2){
	}else if ($vc_id == 3){
		$first = substr($zip,0,3);
		$second = substr($zip,3,3);

		return $first . "-" . $second;
	}else if ($vc_id == 5){
		$first = substr($zip,0,3);
		$second = substr($zip,3,3);

		return $first . " " . $second;
	}else if ($vc_id == 6){
		$first = substr($zip,0,3);
		$second = substr($zip,3,3);

		return $first . " " . $second;
	}else{
	}
}

function lineBreak(){
?>
<br/><br/>
<?
}

?>
