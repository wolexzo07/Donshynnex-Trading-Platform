<?php
	
	session_start();
	include("../justlibrary/finishit.php");
	include("../justlibrary/cryptabuyExtension.php");

	if(x_validatesession("TIMBOSS_CRYPTBUY_ID")){
		finish("dashboard","0");
		exit();
	}
	
?>

<!DOCTYPE html>
<html>
    <head>
		<title>DonShynexx Trading - Membership</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/custom.css"/>
		<script src="js/jquery.js"></script>
		<script type="text/javascript" src="js/online.js"></script>
		<script type="text/javascript" src="workitout.js"></script>
    </head>
    <body class="bold">

	<div class="container">
	
			<div class="row">
			
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
					
					<div class="col-lg-6 col-md-6  col-sm-12 col-xs-12 bai">

						<?php 
						
							include("registerPart.php");
							
							include("loginPart.php");
							
							include("resetPart.php");
							
						?>

					</div>
					
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
			
			</div>
	
	</div>
	
	<style type="text/css">
	
	
	</style>
     

        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
             $(document).ready(function () {
				 
				 $(".RegBtn").click(function(){
				    $(".registerPanel").show("slow");
					$(".loginPanel").hide("slow");
					$(".resetPanel").hide("slow");
				 });
				
				 $(".LogBtn").click(function(){
					 $(".loginPanel").show("slow");
					 $(".registerPanel").hide("slow");
					 $(".resetPanel").hide("slow");
				 });
				  
				 $(".LostBtn").click(function(){
					 $(".resetPanel").show("slow");
					 $(".loginPanel").hide("slow");
					 $(".registerPanel").hide("slow");
				 });
                 
             });
         </script>
		 
    </body>
</html>