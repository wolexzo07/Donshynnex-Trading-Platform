<div class="loginPanel">

<!---<form autocomplete="off" method="GET" onsubmit="return logmein()">--->
<form id="loginForm" method="POST" autocomplete="off">
	<center>
	<img src="img/cryptlogo.png" class="img-responsive clon"/>
	</center>
	
			<div class="form-group" style="margin-top:10pt;">
<div class="input-group date">
<span class="input-group-addon">
<span class="fa fa-user"></span>
</span>
	<input type="text" autocomplete="off" required="required" name="userlogin" id="email" value="" class="form-control ema" style="margin-top:0pt;" placeholder="Enter email | Mobile" onclick="tooltip.pop(this, '#demo4_tip',{position:0})" />
</div>
</div>

<div class="form-group" style="margin-top:10pt;">
<div class="input-group date">
<span class="input-group-addon">
<span class="fa fa-lock"></span>
</span>
	<input type="password" autocomplete="off" required="required" name="userpass" id="passkey" value="" class="form-control ema" style="margin-top:0pt;" placeholder="Enter password" onclick="tooltip.pop(this, '#demo4_tip',{position:0})" />
</div>
</div>
<input type="hidden" value="<?php echo sha1(uniqid());?>" name="etoken"/>

<div class="form-group" style="margin-top:10pt;">
<div class="input-group date">
<span class="input-group-addon">
<span class="glyphicon glyphicon-log-in"></span>
</span>
	<!---<input type="submit" value="Login" type="button" class="btn btn-primary btu" />--->
	<button class="btn btn-success btu" type="submit">Login</button>
</div>
</div>
	
	</form>
	<div id="LoginResult"></div>
	
			<div class="btn-group pull-right tio">
	
	<button  id="RegBtn" class="btn btn-success RegBtn pageu" type="submit"><i class="fa fa-users"></i> Register </button>
	
	<button id="LostBtn" class="btn btn-info LostBtn pageu" type="submit"><i class="fa fa-key"></i> Lost Password</button>
	
	</div>
	
	
	
	</div>