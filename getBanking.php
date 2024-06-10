<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validatesession("TIMBOSS_CRYPTBUY_ID")){
	$user = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
if(x_count("createusers","id='$user' AND acct_number !='' LIMIT 1") > 0){
	?>
	<h5 class="mt-2 mb-1"><i class="fa fa-bank"></i> Added <font class="colorg">Bank Details</font></h5>
	<table style="font-size:9pt;" class="table table-bordered table-hover">
	
	<?php
	foreach(x_select("acct_name,acct_number,bank_name","createusers","id='$user'","1","id") as $key){
		$bn = $key["bank_name"];$acct = $key["acct_name"];
		$acn = $key["acct_number"];
		?>
		<tr>
		<th>Bank Name</th>
		<td><?php echo $bn;?></td>
		</tr>
		<tr>
		<th>Account Name</th>
		<td><?php echo $acct;?></td>
		</tr>
		<tr>
		<th>Account Number</th>
		<td><?php echo $acn;?></td>
		</tr>
		<?php
	}
	?></table><?php
}else{
	//echo "Nothing to display";
}
}

?>