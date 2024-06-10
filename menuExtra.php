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

		<li onclick="load('btcConverter')" class="list-group-item"><i class="fa fa-calculator"></i>&nbsp;&nbsp; Bitcoin Calculator
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>
		
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

		<div onclick="load('top-up')" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
				<!---<button onclick="load('top-up')" class="btn btn-updated"><i class="fa fa-credit-card"></i><br/>Top-up</button>--->
				<span class="btn btn-updated"><i class="fa fa-credit-card"></i><br/> Fund</span>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
				<span onclick="load('buy-btc')" class="btn btn-updated"><i class="fa fa-bitcoin"></i><br/>Buy</span>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
				<span onclick="load('sell-btc')" class="btn btn-updated"><i class="fa fa-money"></i><br/>Sell</span>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
				<span id="menuGist" class="btn btn-updated"><i class="glyphicon glyphicon-align-left"></i><br/>Menu</span>
		</div>
			
	</div>
	
	</div>
	
</div>	