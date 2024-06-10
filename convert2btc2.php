<?php
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validateget("Valu")){
	$usd = x_get("Valu");
	if(is_numeric($usd)){
		echo x_usd2btc($usd);
	}
}
?>