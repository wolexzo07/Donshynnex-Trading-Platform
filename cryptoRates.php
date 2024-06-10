	<h4 class="headerText"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp; CRYPTO <font style="color:purple;">CURRENT RATES</font></h4>
	
	<ul class="list-group mt-2">
		<?php
		
			$listCur = ["btc","eth","usdt@trx"];
			
			foreach($listCur as $key){
				
				if($key == "usdt@trx"){
					
					$cur = "usdt";
					
				}else{
					
					$cur = $key;
					
				}
				
				?>
				<li class="list-group-item">
					<h5 class="rateTxt">
					<img class="crypt-img" src="img/crypto/<?php echo $cur.'.png'?>"/>
					&nbsp;&nbsp;&nbsp; 1 <?php echo strtoupper($cur);?> =  <?php echo sh_rates("$key");?> 
					</h5>
				</li>	
				<?php
				
			}
		
		?>
		
	
	</ul>
	
	<style>
		.crypt-img {width:30px;}
	</style>
