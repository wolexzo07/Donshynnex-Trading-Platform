<?php
//require_once("../finishit.php");
//xstart("0");
if(x_count("nigeriabanklisting","01") > 0){
	$bn = x_clean($_SESSION["TIMBOSS_CRYPTBUY_BKN"]);
		foreach(x_select("banks","nigeriabanklisting","status='1'","50","banks") as $key){
		$bank = $key["banks"];
		if($bn == $bank){
			echo "<option value='$bank' selected='selected'>$bank</option>";
		}else{
			echo "<option value='$bank'>$bank</option>";
		}
		
	}
}
else{
	echo "<option value=''>No bank found</option>";
}
?>