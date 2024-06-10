<?php
			if(x_validatesession("TIMBOSS_CRYPTBUY_ID")){
				?>
				<div id="LoginResult"></div>
				
				<script src="workitout.js"></script>			
				<form class="pb-1" id="updatepass" autocomplete="off">
				<div class="text-right">
				<button class="btn btn-default" type="submit"><i class="fa fa-send"></i> update</button>
				</div>
	

			<p class="textStyler">New Password :</p>
			<div class="form-group mt-1">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password"
					 style="height:45px;" autocomplete="off" required="required" name="pass2" id="pass2" class="form-control" placeholder="Enter your password" />
				</div>
			</div>
			
			<p class="textStyler">Old Password :</p>
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