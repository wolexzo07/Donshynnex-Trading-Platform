$(document).ready(function(e){		 

		function processAjaxForm(formid,resultid,processingScript,timerControl){
			$("#"+formid).on('submit',(function(e) {
			$("#"+resultid).show();
			$("#"+resultid).html("<img class='img-circle' src='img/ajax-loader.gif'/> Processing wait....");
			e.preventDefault();
			$.ajax({
	        	url: processingScript,
				type: "POST",
				data:  new FormData(this),
				contentType: false,
	    	    cache: false,
				processData:false,
				success: function(data){
				
					$("#"+resultid).html(data);
					
					if(timerControl == "1"){
						
						setTimeout(function(){
							
							$("#"+resultid).hide();
							
							},10000);
							
					}
				
				},
				
			  	error: function(){ alert("Error: Failed to process form");}
		   });
		}));
	}
	

	    processAjaxForm("registerForm","Showresult","processRegistration","1");  // Process Registration Form |||| 1=enables timeout;0=disables timeout
	  
	    processAjaxForm("loginForm","LoginResult","processLogin","1");   // Process Login Form
	   
	    processAjaxForm("sellbtcnow","response-two","processBtcSelling","0");  // Process Selling of Bitcoin internally
	  
	    processAjaxForm("confirmBTC","response-two","processBtcExternal","0"); // Process Selling of Bitcoin from External wallet
	   
	    processAjaxForm("buybtcnow","response-one","processBtcBuying","0"); // Process Buying of Bitcoin internally 
	  
		processAjaxForm("bankForm","LoginResult","bankpro","1");   // Process addition of Bank details
	 
		processAjaxForm("updateData","LoginResult","processDataupdate","1");   // Process profile update
		
		processAjaxForm("updatepass","LoginResult","processPassword","1"); // Process password update
		
		processAjaxForm("updatephoto","LoginResult","processPhoto","1"); // Process photo update
		
		processAjaxForm("makepaymentoffline","off-response","processOffline","1"); // Process offline alerts
		
		
		function FetchPostContent(resultid,processingScript,switchdisplay){ // Fetching Content on page
		
			if(switchdisplay == "1"){
				
				$("#"+resultid).show();
				
				$("#"+resultid+"1").show();
				
				$("#"+resultid+"1").fadeIn(400).html("<img class='img-circle' src='img/ajax-loader.gif'/> wait....");
				
			}
			
		   var dataString = "";
		   
		   $.ajax({
			   type: "POST",
			   url: processingScript,
			   data: dataString,
			   cache: false,
			   success: function(result){
				   
					$("#"+resultid).html(result);
					
					$("#"+resultid+"1").hide();
				
			   }
			});
		}
		
		
		FetchPostContent("bankfetcher","getBanking","1"); 	// Fetching Bank Added
		
	    FetchPostContent("approvedTransaction","approvedTransaction","1");  // Fetching approved transaction
		
		FetchPostContent("fetchRegistered","FetchingRegisteredUsers","1"); // Fetching Registered user
	   
	    FetchPostContent("TrackPayment","FetchPaymentTransaction","1"); // Fetching Payment Transaction
		
		$("#clickNote").click(function(){
			
			FetchPostContent("getContent","Read_Notification","1"); // Fetching Notifications
		
		})
		
	    FetchPostContent("notecounter","notecounter","1"); // Get counter
		
		setInterval(function(){ // Refresh every 20 seconds
		
			FetchPostContent("notecounter","notecounter","1");
			
		},300000);
	   
   
	 });
	 
	 