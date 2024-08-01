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
			
			<li onclick="load('registeredUsers')" class="list-group-item"><i class="fa fa-users"></i> &nbsp;&nbsp;Registered users
			</li>
			
			<li onclick="load('manageWallets')" class="list-group-item"><i class="fa fa-users"></i> &nbsp;&nbsp;Manage wallet
			</li>
			
			<li onclick="load('Track_Payments')" class="list-group-item"><i class="fa fa-money"></i> &nbsp;&nbsp;Manage Top-ups
			</li>
			
			<li onclick="load('allPayments')" class="list-group-item"><i class="fa fa-money"></i> &nbsp;&nbsp;Treated Top-ups
			</li>
			
			<li onclick="load('sellingTransactions')" class="list-group-item"><i class="fa fa-money"></i> &nbsp;&nbsp;Manage Crypto Sellers
			</li>
			
			<li onclick="load('BuyingTransaction')" class="list-group-item"><i class="fa fa-money"></i> &nbsp;&nbsp;Manage Crypto Buyers
			</li>

			<li onclick="load('AccountLogout')" class="list-group-item"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout 
			</li>
			
		</ul>
				
	</div>
							
</div>
		