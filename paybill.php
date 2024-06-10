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
				<h4 style="display:none;" class="headerText"><i class="fa fa-money"></i>&nbsp;&nbsp; FUND <font style="color:purple;">WALLET</font></h4>
				
				<ul class="list-group mt-2">
					<li class="list-group-item">
					<center><img src="img/icon/wallet-top.png" class="avatar"/></center>
					
					</li>
					<li class="list-group-item">

						<div class="payoffine pb-3">
<?php
if(x_count("paymentkeys","status='Yes' LIMIT 1") > 0){

$user = x_clean($_SESSION["TIMBOSS_CRYPTBUY_EMAIL"]);
$namex = x_clean($_SESSION["TIMBOSS_CRYPTBUY_NAME"]);
$pid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
$ptoken = x_clean($_SESSION["TIMBOSS_CRYPTBUY_TOKEN"]);
$ref = "CRTP".str_shuffle(Date("YmdHis"));

foreach(x_select("secretkey,publickey","paymentkeys","status='Yes'","1","id") as $key){

		$sk = $key["secretkey"];
		$pk = $key["publickey"];

		$samt = xg("memy");


			//paystack charge
		if($samt < 2500){
		$charge = (1.6/100)*$samt;
		}else{
			$charge = ((1.6/100)*$samt) + 100;
			}
			//paystack charge ended
			
			// Bench marking charges start
			
			if($charge > 2000){
				$charge = 2000;
				$ramt = ($samt + $charge) * 100 ;
			}else{
				$charge = $charge;
				$ramt = ($samt + $charge) * 100 ;
			}
			
			// Bench marking charges start

		?>
<h4 style="display:none;" class="walletFunder text-center"><i class="fa fa-credit-card"></i>&nbsp;&nbsp; WALLET <font class="colorg">  TOP-UP </font></h4>

<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: '<?php echo $pk;?>',
      email: '<?php echo $user;?>',
      amount: <?php echo $ramt;?>,
      ref: '<?php echo $ref;?>',
      metadata: {
         custom_fields: [
            {
                display_name: "<?php echo $namex;?>",
                variable_name: "<?php echo 'crtp-'.$user;?>",
                value: "<?php echo 'Payment by : '.$pid;?>"
            }
         ]
      },
      callback: function(response){
      var rip = response.reference;
	   var un = "verifybill?pid=<?php echo $pid;?>&ptoken=<?php echo $ptoken;?>&uid=<?php echo $user;?>&pamt=<?php echo $samt;?>&ch=<?php echo $charge;?>&reference=" + rip ;
		load(un);
      },
      onClose: function(){

      }
    });
    handler.openIframe();
  }
</script>

<table style="font-size:9pt;" class="mt-2 table table-hover table-border">
	<caption style="border:1px solid lightgray;padding:10px;"> PAYMENT BREAKDOWN</caption>
<tr>
<th>Fees Breakdown</th><th>Amount</th>
</tr>

<tr>
<td>Top-up Amount</td><td><?php echo "NGN ".number_format($samt,2);?></td>
</tr>

<tr>
<td>Payment Gateway</td><td><?php echo "NGN ".number_format($charge,2);?></td>
</tr>

<tr>
<th>Total Amount</th><th><?php echo "NGN ".number_format(($ramt/100),2);?></th>
</tr>
</table>


<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	<button type="button" class="btn btn-primary btn-sm" style="margin-top:5px;margin-bottom:5px;" onclick="load('pay-online')"><i class="fa fa-arrow-left"></i> &nbsp;Previous </button>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	<form>
	 <button type="button" class="btn btn-success btn-sm" style="margin-top:5px;margin-bottom:5px;" onclick="payWithPaystack()"><i class="fa fa-credit-card"></i> &nbsp;Pay Now </button>
	</form>
</div>
</div>



		<?php

	}




		}
else{

echo "Payment key deactivated!";

}
?>

	
						</div>
						
			
					
					</li>
				
				</ul>
				
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
		</div>
				
	</div>
	

							
</div>
		