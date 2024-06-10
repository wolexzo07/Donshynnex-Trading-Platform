<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validatepost("bank_update") && x_validatesession("TIMBOSS_CRYPTBUY_ID")){
$user = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
$bankname = x_clean(x_post("bankname"));
$acctname = x_clean(x_post("acctname"));
$acctnum = x_clean(x_post("acctnum"));


// validating empty fields started

if($bankname == ""){x_print("<p class='rtext'>No bank was selected!</p>");}
if($acctname == ""){x_print("<p class='rtext'>No account name!</p>");}
if(($acctnum == "") || (strlen($acctnum) != 10) || !is_numeric($acctnum)){x_print("<p class='rtext'>No bank account number!</p>");}

// validating empty fields ended

if(x_count("createusers","id='$user' AND status='1' LIMIT 1") > 0){
	x_updated("createusers","id='$user' AND status='1'","bank_name='$bankname',acct_name='$acctname',acct_number='$acctnum'","<p class='rtext'>Account Updated successfully</p>","<p class='rtext'>Failed to update account</p>");
	
}else{
	echo "<p class='rtext'>Invalid user account</p>";
}


}
?>