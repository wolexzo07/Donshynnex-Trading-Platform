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
			<?php
			if(x_validatesession("TIMBOSS_CRYPTBUY_ID")){
				$user = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
				$path = x_clean($_SESSION["TIMBOSS_CRYPTBUY_PATH"]);
				$mobile = x_clean($_SESSION["TIMBOSS_CRYPTBUY_MOBILE"]);
				$name = x_clean($_SESSION["TIMBOSS_CRYPTBUY_NAME"]);
				$email = x_clean($_SESSION["TIMBOSS_CRYPTBUY_EMAIL"]);
				?>
				
				<ul class="list-group mt-2">
				<li class="list-group-item">
				<center><img src="<?php
				if($path == ""){
					echo "img/avatar.png";
				}else{
					if(file_exists($path)){
						echo $path;
					}else{
						echo "img/avatar.png";
					}
				}
				?>" class="userprofile"/></center>
				
				</li>
				<li class="list-group-item">
					<?php include("updateData.php");?>
				</li>
				<li class="list-group-item">
					<span class="fa fa-user"></span>&nbsp;&nbsp;&nbsp;<?php echo $name;?>
				</li>
				<li class="list-group-item">
					<span class="fa fa-envelope-o"></span>&nbsp;&nbsp;&nbsp;<?php echo $email;?>
				</li>
				<li class="list-group-item">
					<span class="fa fa-phone"></span>&nbsp;&nbsp;&nbsp;<?php echo $mobile;?>
				</li>
				
				<li class="list-group-item">
					<div class="btn-group">
						<button onclick="load('settings-base')" class="btn btn-success"><i class="fa fa-arrow-left"></i> Return Back</button>
						<button onclick="load('profile-manager')" class="btn btn-info"> <i class="fa fa-refresh"></i> Refresh</button>
					</div>
				</li>
				
				</ul>
				<?php
			}
			?>
			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
		</div>
				
	</div>
	

							
</div>
		