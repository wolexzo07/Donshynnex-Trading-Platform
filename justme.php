<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("validate_owner.php"); // Authenticating super user
?>

<div class="row">
						
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	
		<ul class="list-group mt-1">
		
			<!---<li class="list-group-item">
				<center><img style="width:30%;" src="img/icon/admin.png" class="avatar"/></center>
			</li>--->
			
			<li style="padding-top:20px;padding-bottom:20px;font-size:24px;" class="list-group-item text-center">
				
				<p>Hi , <span style="color:black;" class=""><b><?php echo $_SESSION["TIMBOSS_CRYPTBUY_NAME"];?></b></span></p>
				
			</li>
			
			<li onclick="load('registeredUsers')" class="list-group-item"><i class="fa fa-users"></i> &nbsp;&nbsp;Registered users <span class="badge pull-right badgestyle"><?php echo x_count("createusers","status='1' OR status='0' OR status='2'");?></span>
			</li>
			
			<li onclick="load('Track_Payments')" class="list-group-item"><i class="fa fa-money"></i> &nbsp;&nbsp;Manage Payments
				<span class="pull-right badge badgestyle">2</span>
			</li>
			
			<!---<li onclick="load('settings-base')" class="list-group-item"><i class="fa fa-bar-chart"></i> &nbsp;&nbsp;Manage Transactions
				<span class="pull-right badge badgestyle" ></span>
			</li>
			
			<li onclick="load('profile-manager')" class="list-group-item"><i class="fa fa-refresh"></i> &nbsp;&nbsp;Pending Transactions
			<span class="pull-right badge badgestyle">2</span>
			</li>
			
			<li onclick="load('photo-changer')" class="list-group-item"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;Approved Transactions
				<span class="pull-right badge badgestyle">2</span>
			</li>
			
			<li onclick="load('changePassword')" class="list-group-item"><i class="fa fa-close"></i> &nbsp;&nbsp;Cancelled Transactions
				<span class="pull-right badge badgestyle">2</span>
			</li>
			
			<li onclick="load('profile-manager')" class="list-group-item"><i class="fa fa-bell"></i> &nbsp;&nbsp;Notifications
				<span class="pull-right badge badgestyle">2</span>
			</li>
			
			<li onclick="load('profile-manager')" class="list-group-item"><i class="fa fa-phone"></i> &nbsp;&nbsp; Messenger
				<span class="pull-right badge badgestyle"></span>
			</li>--->

			<li onclick="load('AccountLogout')" class="list-group-item"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout 
				<span class="pull-right badge" style="background:green;color:white;"></span>
			</li>
			
		</ul>
				
	</div>
							
</div>
		