 <?php
	if(!isset($ptoken)){
		exit();
	}
	
 ?>
 
 <div class="menuTag">
	<ul class="list-group">
		<li onclick="load('homedash')" class="list-group-item"><i class="fa fa-dashboard"></i>&nbsp;&nbsp; Dashboard 
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>

		<!---<li onclick="load('btcConverter')" class="list-group-item"><i class="fa fa-calculator"></i>&nbsp;&nbsp; Bitcoin Calculator
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>--->
		
		<li onclick="load('settings-base')" class="list-group-item"><i class="fa fa-cog"></i> &nbsp;&nbsp;Settings
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>
		<li onclick="load('AccountLogout')" class="list-group-item"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout 
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>
	
	</ul>
 
 </div>       

<div class="mobilemenu">
	<div class="container-fluid">
	
	<div class="row">

		<!---<div onclick="load('top-up')" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
			<span class="btn btn-updated"><i class="fa fa-credit-card"></i><br/> Fund</span>
		</div>--->
		
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
			<span onclick="window.location='dashboard'" class="btn btn-updated"><i class="fa fa-home fa-2x"></i><br/> Home</span>
		</div>
		
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-left initiate-funding">
			<span class="btn btn-updated"><i class="fa fa-credit-card"></i><br/> Fund</span>
		</div>
		
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-left initiate-buying">
			<span class="btn btn-updated"><i class="fa fa-arrow-up"></i><br/>Buy</span>
		</div>
		
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-left initiate-selling">
			<span  class="btn btn-updated"><i class="fa fa-arrow-down"></i><br/>Sell</span>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-right">
			<span id="menuGist" class="btn btn-updated"><i class="fa fa-bars fa-2x"></i><br/>Menu</span>
		</div>
			
	</div>
	
	</div>
	
</div>	