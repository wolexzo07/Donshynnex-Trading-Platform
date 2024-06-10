<?php
// Getting company profile
$company = x_getsingle("select company_name from adminbank where id='1' AND status='1' LIMIT 1","adminbank where id='1' AND status='1'","company_name");

$companyEmail = x_getsingle("select email from adminbank where id='1' AND status='1' LIMIT 1","adminbank where id='1' AND status='1'","email");

$companynum1 = x_getsingle("select companyNum from adminbank where id='1' AND status='1' LIMIT 1","adminbank where id='1' AND status='1'","companyNum");

$companynum2 = x_getsingle("select companyNum_two from adminbank where id='1' AND status='1' LIMIT 1","adminbank where id='1' AND status='1'","companyNum_two");

$site = x_getsingle("select base_url from adminbank where id='1' AND status='1' LIMIT 1","adminbank where id='1' AND status='1'","base_url");

$companyLogo = x_getsingle("select company_logo_path from adminbank where id='1' AND status='1' LIMIT 1","adminbank where id='1' AND status='1'","company_logo_path");

$cyear = DATE("Y");


$subject = "$company LIMITED : NGN $refamt WAS CREDITED TO YOUR WALLET.";

$to = $email;

$regEX = "/^[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z_+])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9}$/";


$message = "<html>
<head>
<title>$subject</title>
</head>
<body>

<table cellpadding='20px' cellspacing='0px' border='0px' style='border:1px solid lightgray;' width='100%'>
<thead>
<tr style='background:DodgerBlue;'>
<th><center><img src='$site/$companyLogo' style='width:100px;'/></center></th>
</tr>
<tr>
<th><h2><font style='color:orange;font-weight:bold;'>$company</font> <font style='color:purple;font-weight:bold;'> LIMITED</font><h2></th>
</tr>
</thead>
<tbody>
<tr>
<td>
<p>Hi <b>$namex</b>,</p>
<p>Your Naira wallet has been credited with the amount (<b>NGN $refamt</b>) you paid.You can now start buying bitcoin.</p>
</td>
</tr>
</tbody>
<tfoot>
<tr>
<td>
Thank you for choosing us<br/>
From <b>$company TEAM</b>
</td>
</tr>
<tr style='background:DodgerBlue;color:white;'>
<td>
<h4>INCASE YOU HAVE ANY QUESTION REGARDING THIS MAIL KINDLY CONTACT US ON:</h4>
$companynum1
$companynum2
<p>Email :  <a style='text-decoration:none;color:white;'>$companyEmail</a></p>
<p style='text-align:center;border-top:1px solid lightgray;padding-top:10px;'>Powered by <b><a style='text-decoration:none;color:white;'>$company</a> &copy; $cyear</b></p>
</td>
</tr>
</tfoot>

</table>

</body>
</html>";
		
	if(x_count("controlmailer","subject='Mailer' AND status='sandbox'") > 0){
			if(preg_match($regEX,$to)){
					if(sendmail($to,$subject,$message) == 0){
						echo "Failed to send mail";
					}
				}
	}else{
			if(preg_match($regEX,$to)){
					if(sendmail_local($to,$subject,$message) == 0){
						echo "Failed to send mail";
					}
				}
	}

			
?>
