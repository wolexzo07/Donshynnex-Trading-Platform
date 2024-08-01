<h4 class="headerText"><i class="fa fa-bank"></i>&nbsp;&nbsp; FIAT <font style="color:purple;">CURRENT RATES</font></h4>

<ul class="list-group mt-2 ngn-list">
	
	<li class="list-group-item">
		<h5 class="rateTxt">
		
			<?php
				//Array ( [0] => NGN---1400---1490 [1] => GHS---480---550 ) 
				
				if(is_array(sh_fiatrates("ALL"))){
					
					$getRate = sh_fiatrates("ALL");
					
					?>
					<table cellpadding="30px" class="table mt-2">
					<tr style="border-top:5px solid green;border-bottom:5px solid blue;">
							<th></th>
							<th>Buying</th>
							<th>Selling</th>
						</tr>
						<?php
						
							foreach($getRate as $key){
								
								$all = explode("---",$key);
								
								$flag = $all[0];$buy = $all[1];$sell = $all[2];
								
								?>
								<tr>
									<td>
									<img class="crypt-img" src="img/country/<?php echo $flag.'.png'?>"/>&nbsp;&nbsp;
									<?php echo $flag;?></td>
									<td><?php echo $buy." / $";?></td>
									<td><?php echo $sell." / $";?></td>
								</tr>
								<?php
							}
						
						?>
					
					</table><?php
				}
			
			?>
		
		</h5>
	</li>
	
</ul>
				
				
				