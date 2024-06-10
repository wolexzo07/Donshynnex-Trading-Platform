<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
?>
<div class="row">
						
	<div class="col-md-12">
	
		<div class="row">			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			
		<ul class="list-group mt-1">
		<li class="list-group-item">
					<center><img src="img/icon/settings.png" class="avatar"/></center>
					</li>
			<li style="font-weight:none;display:none;" class="list-group-item"><i class="fa fa-cog"></i> &nbsp;&nbsp;Account Settings
			</li>
			<li onclick="load('add-bank')" class="list-group-item"><i class="fa fa-plus"></i> &nbsp;&nbsp;Add Bank account
			<span class="pull-right badge" style="background:lightgray;color:white;"></span>
			</li>
			<li onclick="load('profile-manager')" class="list-group-item"><i class="fa fa-user"></i> &nbsp;&nbsp;Update Profile
			<span class="pull-right badge" style="background:lightgray;color:white;"></span>
			</li>
			<li onclick="load('photo-changer')" class="list-group-item"><i class="fa fa-cloud-upload"></i> &nbsp;&nbsp;Change photo
			<span class="pull-right badge" style="background:lightgray;color:white;"></span>
			</li>
			<li onclick="load('changePassword')" class="list-group-item"><i class="fa fa-lock"></i> &nbsp;&nbsp;Change password
			<span class="pull-right badge" style="background:lightgray;color:white;"></span>
			</li>
			<li onclick="load('profile-manager')" class="list-group-item"><i class="fa fa-question-circle"></i> &nbsp;&nbsp;About cryptabuy
			<span class="pull-right badge" style="background:lightgray;color:white;"></span>
			</li>
			<li onclick="load('profile-manager')" class="list-group-item"><i class="fa fa-phone"></i> &nbsp;&nbsp;Contact cryptabuy
			<span class="pull-right badge" style="background:lightgray;color:white;"></span>
			</li>

			<li onclick="load('settings-base')" class="list-group-item"><i class="fa fa-remove"></i> &nbsp;&nbsp;Close Account
			<span class="pull-right badge" style="background:lightgray;color:white;"></span>
			</li>
			<li onclick="load('AccountLogout')" class="list-group-item"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout 
			<span class="pull-right badge" style="background:lightgray;color:white;"></span>
			</li>
	</ul>
			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
		</div>
				
	<!---<h4 class="headerText"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp; BTC <font style="color:purple;">CURRENT RATES</font></h4>--->
		

	</div>
	

							
</div>
		