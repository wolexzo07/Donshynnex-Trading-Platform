<div class="registerPanel">

	<center><img src="img/cryptlogo.png" class="img-responsive clon"/></center>
	
	<p class="" style="font-size:10pt;margin-top:10pt;text-transform:uppercase;display:none;"><font style="color:green;font-weight:bold;">NOTE :</font> All fields are required</p>
	
	<div class="regboss">

		<form id="registerForm" method="POST" autocomplete="off">	

				<!----<div class="form-group" style="margin-top:10pt;">

					<select name="fiat" class="form-control input-lg" required="">
						<option value="">Choose Fiat currency</option>
						<option value="NGN">Nigeria Naira (NGN)</option>
						<option value="GHS">Ghana Cedis (GHS)</option>
						<option value="KSH">Kenyan Shillings (KSH)</option>
						<option value="USD">United State Dollar(USD)</option>
					</select>

				</div>--->


				<div class="form-group" style="margin-top:10pt;">
				<div class="input-group date">
				<span class="input-group-addon">
				<span class="fa fa-user"></span>
				</span>
					<input type="text" autocomplete="off" required="required" name="name" id="name" value="" class="form-control ema" style="margin-top:0pt;" placeholder="Enter Fullname" />
				</div>
				</div>

				<div class="form-group" style="margin-top:10pt;">
				<div class="input-group date">
				<span class="input-group-addon">
				<span class="fa fa-inbox"></span>
				</span>
					<input type="email" autocomplete="off" required="required" name="email" id="email" value="" class="form-control ema" style="margin-top:0pt;" placeholder="Enter valid email" />
				</div>
				</div>

				<div class="form-group" style="margin-top:10pt;">
				<div class="input-group date">
				<span class="input-group-addon">
				<span class="fa fa-lock"></span>
				</span>
					<input type="password" autocomplete="off" required="required" name="passkey" id="passkey" value="" class="form-control ema" style="margin-top:0pt;" placeholder="Enter password" />
				</div>
				</div>

				<div class="form-group" style="margin-top:10pt;">
				<div class="input-group date">
				<span class="input-group-addon">
				<span class="fa fa-calculator"></span>
				</span>
					<input type="number" autocomplete="off" maxlength="11" required="required" name="mobile" id="mobile" value="" class="form-control ema" style="margin-top:0pt;" placeholder="Enter valid mobile" />
				</div>
				</div>
				<input type="hidden" value="<?php echo sha1(uniqid());?>" name="etoken"/>

				<div class="form-group" style="margin-top:10pt;">
				<div class="input-group date">
				<span class="input-group-addon">
				<span class="fa fa-send"></span>
				</span>
					<!---<input type="submit" value="Register" type="button" class="btn btn-success btu" />---->
					<button class="btn btn-success btu" type="submit">Register</button>

				</div>
				</div>
			
			</form>
			
			<div id="Showresult"></div>
			
			<div class="btn-group pull-right tio">
				<button id="LogBtn" class="btn btn-primary LogBtn pageu" type="submit"><i class="glyphicon glyphicon-log-in"></i> Login </button>
				<button id="LostBtn" class="btn btn-info LostBtn pageu" type="submit"><i class="fa fa-key"></i> Lost Password</button>
			</div>
			
	</div>

</div>