	$(document).ready(function(){
		
			processAjaxForm("registerForm","Showresult","processRegistration","1"); 
		  
			processAjaxForm("loginForm","LoginResult","processLogin","1");   // Process Login Form
			
			processAjaxForm("sellbtcnow","response-two","processBtcSelling","0");  // Process internal Selling 
				
			
			
			processAjaxForm("makepaymentoffline","off-response","processOffline","1"); // Process offline alerts
			
			processAjaxForm("buybtcnow","response-one","processBtcBuying","0"); // Process Buying of Bitcoin internally 
			  
			processAjaxForm("bankForm","LoginResult","bankpro","1");   // Process addition of Bank details
		 
			processAjaxForm("updateData","LoginResult","processDataupdate","1");   // Process profile update
			
			processAjaxForm("updatepass","LoginResult","processPassword","1"); // Process password update
			
			processAjaxForm("updatephoto","LoginResult","processPhoto","1"); // Process photo update
			
			
			
			FetchPostContent("bankfetcher","getBanking","1"); 	// Fetching Bank Added
			
			FetchPostContent("approvedTransaction","approvedTransaction","1");  // Fetching approved transaction
			
			
			
			FetchPostContent("fetchRegistered","FetchingRegisteredUsers","1"); // Fetching Registered user
		   
			FetchPostContent("TrackPayment","FetchPaymentTransaction","1"); // Handling Topups
			
			FetchPostContent("allPayment","getallPayments","1"); // Handling all Topups
			
			FetchPostContent("spay","getallSellers","1"); // Sellers
			
			FetchPostContent("bpay","getallBuyers","1"); // Buyers
			
			
			
			$("#clickNote").click(function(){
				
				FetchPostContent("getContent","Read_Notification","1"); // Fetching Notifications
			
			});
			
			FetchPostContent("notecounter","notecounter","1"); // Get counter
			
			setInterval(function(){ // Refresh every 20 seconds
			
				FetchPostContent("notecounter","notecounter","1");
				
			},300000);
		
	}); 
	
