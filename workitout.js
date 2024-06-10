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
				$("#"+formid).find('input:text, input:password, input:file, select, textarea').val('');
				$("#"+formid).find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
				$("#email").val("");$("#mobile").val("");$("#amount").val("");
				
				$("#"+resultid).html(data);
				// Fetch update for bank acct detail
				FetchPostContent("bankfetcher","getBanking","1");
				
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
	
	// Fetching Content on page
	
		function FetchPostContent(resultid,processingScript,switchdisplay){
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
				
	 
	  // Process Registration Form |||| 1=enables timeout;0=disables timeout
	   processAjaxForm("registerForm","Showresult","processRegistration","1");
	  // Process Login Form
	   processAjaxForm("loginForm","LoginResult","processLogin","1");
	 // Process Selling of Bitcoin internally
	   processAjaxForm("sellbtcnow","LoginResult","processBtcSelling","0");
	   // Process Selling of Bitcoin from External wallet
	   processAjaxForm("confirmBTC","LoginResult","processBtcExternal","0");
	   // Process Buying of Bitcoin internally 
	   processAjaxForm("buybtcnow","LoginResult","processBtcBuying","0");
	   // Fetching approved transaction
	   FetchPostContent("approvedTransaction","approvedTransaction","1");
	   
	  // Handling events of transaction tracking
	  
		   $("#pendingBtn").click(function(){
			   $("#approvedTransaction").hide("fast");
			   $("#cancelledTransaction").hide("fast");
			   // Fetching pending transaction
				FetchPostContent("pendingTransaction","pendingTransactions","1");
				//$('html, body').animate({ scrollTop:3031 },"fast"); // scroll to bottom
		   });
		   $("#approvedBtn").click(function(){
			   $("#cancelledTransaction").hide("fast");
			   $("#pendingTransaction").hide("fast");
			   // Fetching approved transaction
				FetchPostContent("approvedTransaction","approvedTransaction","1");
		   });
		   $("#cancelledBtn").click(function(){
			   $("#approvedTransaction").hide("fast");
			   $("#pendingTransaction").hide("fast");
			   // Fetching cancelled transaction
				FetchPostContent("cancelledTransaction","cancelledTransaction","1");
		   });
		   
	    // Process addition of Bank details
		processAjaxForm("bankForm","LoginResult","bankpro","1");
		// Fetching Bank Added
	   FetchPostContent("bankfetcher","getBanking","1");
	   // Process profile update
		processAjaxForm("updateData","LoginResult","processDataupdate","1");
		// Process password update
		processAjaxForm("updatepass","LoginResult","processPassword","1");
		// Process photo update
		processAjaxForm("updatephoto","LoginResult","processPhoto","1");
		// Process offline alerts
		processAjaxForm("makepaymentoffline","LoginResult","processOffline","1");
		// Fetching Registered user
		FetchPostContent("fetchRegistered","FetchingRegisteredUsers","1");
	    // Fetching Payment Transaction
	    FetchPostContent("TrackPayment","FetchPaymentTransaction","1");
		
		$("#clickNote").click(function(){
			// Fetching Notifications
	    FetchPostContent("getContent","Read_Notification","1");
		})
		// Get counter
	    FetchPostContent("notecounter","notecounter","1");
		
		// Refresh every 20 seconds
		setInterval(function(){
			FetchPostContent("notecounter","notecounter","1");
		},20000);
		
   
	 });
	 
	 