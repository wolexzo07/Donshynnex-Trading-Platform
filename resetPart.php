<div class="resetPanel">
		<form id="resetForm" method="POST" autocomplete="off">
		
			<center><img src="img/cryptlogo.png" class="img-responsive clon"/></center>
				
			<div class="form-group" style="margin-top:10pt;">
				<div class="input-group date">
				<span class="input-group-addon">
				<span class="fa fa-key"></span>
				</span>
				<select class="form-control ema" required="required" name="pro" id="opt">
				<!---<option value="">choose what to reset?</option>
				<option value="pin">Pin Reset</option>--->
				<option value="pass">Password Reset</option>

				</select>
				</div>
			</div>	

			<div class="form-group" style="margin-top:10pt;">
				<div class="input-group date">
				<span class="input-group-addon">
				<span class="fa fa-inbox"></span>
				</span>
					<input type="email" autocomplete="off" required="required" name="cust" id="email" value="" class="form-control ema" style="margin-top:0pt;" placeholder="Enter valid email" onclick="tooltip.pop(this, '#demo4_tip',{position:0})" />
				</div>
			</div>

			<div class="form-group" style="margin-top:10pt;">
				<div class="input-group date">
				<span class="input-group-addon">
				<span class="fa fa-key"></span>
				</span>
					<input type="submit" value="Reset" type="button" class="btn btn-danger btu" />
				</div>
			</div>
			
		</form>
		
		<div id="Resetresult"></div>

		<div class="btn-group pull-right tio">
			<button id="RegBtn" class="btn btn-success RegBtn pageu" type="submit"><i class="fa fa-users"></i> Register </button>
			<button id="LogBtn" class="btn btn-info LogBtn pageu" type="submit"><i class="glyphicon glyphicon-log-in"></i> Login</button>
		</div>
	
</div>