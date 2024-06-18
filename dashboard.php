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
		
        <script type="text/javascript" src="js/online.js"></script>
		<script src="js/clipboard.min.js"></script>
		<script src="workitout.js"></script>	
		<script src="js/btcalone.js"></script>
	
    </head>
	
    <body>
	
	<?php //x_toasts("I am a winner");?>
	
        <div class="wrapper">

            <div id="content">

					<div class="container-fluid">
					
							<div class="row">
							
									<div class="col-md-12">
															
										<h3 class="welcome"> 
										
											<font id="lblGreetings"></font>&nbsp;
											
											<img src="img/smiley.png" class="smiley-img"/>
											
											<span id="clickNote" onclick="load('Fetch_Notifications')" class="pull-right">
											
												<i class="fa fa-bell fa-1x"></i><span id="notecounter" class="badge"></span>
											
											</span>
									
										</h3>

									</div>
									
							</div>
					</div>


					<div id="loadTemporal" class="text-center"></div>
					
					<div class="container-fluid" id="calculate"></div>

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

        <script src="js/bootstrap.min.js"></script>
		
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
		
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
				
				let greet = "Hi , ";
				
				/***let myDate = new Date();
				let hrs = myDate.getHours();
				let greet;

				if (hrs < 12)
					
					greet = 'Good Morning';
					
				else if (hrs >= 12 && hrs <= 17)
					
					greet = 'Good Afternoon';
					
				else if (hrs >= 17 && hrs <= 24)
					
					greet = 'Good Evening';***/

				document.getElementById('lblGreetings').innerHTML = '<img src="<?php echo $path_img;?>" style="width:30px;border-radius:500px;" class=""/>&nbsp; '+'<b>' + greet + '<span style="color:black;"><?php echo ' '.$namex;?></span></b>';

				
          });
		  				
        </script>   

    </body>
</html>
