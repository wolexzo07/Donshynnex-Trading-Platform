<?php
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validateget("Valu")){
	$btc = x_get("Valu");
	if(is_numeric($btc)){
		echo x_btc2usdnf($btc);
	}
}
?>