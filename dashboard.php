<?php include_once("param.php");?>
<!DOCTYPE html>
<html>
    <head>
		<title>DonShynnex Trading - Dashboard</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all"/>
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/toastify.min.css"/>
        <link rel="stylesheet" href="css/style3.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/specialCustom.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/slider.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/btc.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/more.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/wallets.css" type="text/css" media="all"/>
		
		<!--<script src="js/jquery-3.7.1.min.js"></script>-->
		<script src="js/jquery.js"></script>
		<script src="js/toastify-js.js"></script>
		<script src="js/indexController.js"></script>
		
		<script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

		<?php
			if(sh_adminchecker($uid) == "1"){ // admin access
			?>
		<script src="dtable/datatables.min.js"></script>
		<link rel="stylesheet" href="dtable/datatables.min.css"/>
			<?php	
			}
		?>
		
        <script type="text/javascript" src="js/online.js"></script>
		<script src="js/clipboard.min.js"></script>
		<script src="js/btcalone.js"></script>
	
    </head>
	
    <body>
	
	<script src="extra.js"></script>
	<script src="workitout.js"></script>
	
        <div class="wrapper">

            <div id="content">

					<!--<div class="container-fluid">--->
					
							<div class="row">
							
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-1">
									
										<?php include("smallChart.html");?>
										
									</div>
							
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															
										<h3 class="welcome"> 
										
											<span id="lblGreetings"></span>&nbsp;
											
											<img src="img/smiley.png" class="smiley-img"/>
											
											<span id="clickNote" onclick="load('Fetch_Notifications')" class="pull-right">
											
												<i class="fa fa-bell fa-1x"></i><span id="notecounter" class="badge"></span>
											
											</span>
									
										</h3>

									</div>
									
									

							</div>
					<!--</div>-->


					<div id="loadTemporal" class="text-center"></div>
					
					<div class="container-fluid" id="calculate"></div>
					<div class="container-fluid" id="ca"></div>
					
					

            </div>
			
        </div>
		
		
		
		
		<?php 
		
			if(sh_adminchecker($uid) == "0"){ // user access
				
				include_Once("Accountfunding.php"); // Account funding
				
				include_Once("BuyingAssets.php"); // Buying assets
				
				include_Once("SellingAssets.php"); // Selling Asset
				
				include_Once("menuExtra.php"); // User menu
				
			}
			
		?>


		
		<script type="text/javascript">
		
            $(document).ready(function () {

				<?php
					if(sh_adminchecker("$uid") == "1"){
						?>
						load('justme'); // Initializing the admin page
						<?php
					}else{
						?>
						load('homedash'); // Initializing the user page
						<?php
					}
				?>
				
				$("#menuGist").click(function(){
					
					$(".menuTag").toggle("slow");
					
				});
				
				document.getElementById('lblGreetings').innerHTML = '<img src="<?php echo $path_img;?>" style="width:30px;border-radius:500px;margin:0px;padding:0px;"/>&nbsp; '+'<b>Hi ,' + '<span style="color:black;"><?php echo ' '.$namex;?></span></b>';

          });
		 			
        </script>  
			

    </body>
</html>
