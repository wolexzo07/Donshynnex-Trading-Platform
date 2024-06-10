<?php
			if(x_validatesession("TIMBOSS_CRYPTBUY_ID")){
				?>
				<div id="LoginResult"></div>
				
				<script src="workitout.js"></script>			
				<form class="pb-1" id="updateData" autocomplete="off">
				<div class="text-right">
				<button class="btn btn-default" type="submit"><i class="fa fa-send"></i> update</button>
				</div>
			<p class="textStyler">Name (Read only <i style="color:green;" class="fa fa-lock"></i>):</p>
			<div class="form-group mt-1">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text"
					readonly="" value="<?php echo $_SESSION["TIMBOSS_CRYPTBUY_NAME"];?>" style="height:45px;" autocomplete="off" required="required" name="name" id="name" class="form-control" placeholder="Enter valid Name" />
				</div>
			</div>	
			
			<p class="textStyler">Mobile :</p>
			<div class="form-group mt-1">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
					<input type="text"
					 value="<?php echo $_SESSION["TIMBOSS_CRYPTBUY_MOBILE"];?>" style="height:45px;" autocomplete="off" required="required" name="mobile" id="mobile" class="form-control" placeholder="Enter valid mobile" />
				</div>
			</div>	
			
			<p class="textStyler">Email :</p>
			<div class="form-group mt-1">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text"
					value="<?php echo $_SESSION["TIMBOSS_CRYPTBUY_EMAIL"];?>" style="height:45px;" autocomplete="off" required="required" name="email" id="email" class="form-control" placeholder="Enter valid Name" />
				</div>
			</div>
			
			<p class="textStyler">Account Password :</p>
			<div class="form-group mt-1">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password"
					 style="height:45px;" autocomplete="off" required="required" name="pass" id="pass" class="form-control" placeholder="Enter your password" />
				</div>
			</div>
			<input type="hidden" value="<?php echo sha1(uniqid());?>" name="account_update"/>
</form>			
				<?php
			}
			?>