	document.addEventListener("exitButton",function(){ 

		navigator.notification.confirm(
			   'Do you want to quit', 
			   onConfirmQuit, 
			   'QUIT TITLE', 
			   'OK,Cancel'  
		);

	}, true);
	
	function goRemote(remoteURL) {
		
	   var networkState = navigator.connection.type;
	   var states = {};
		
	   states[Connection.UNKNOWN]  = 'Unknown connection';
	   states[Connection.ETHERNET] = 'Ethernet connection';
	   states[Connection.WIFI]     = 'WiFi connection';
	   states[Connection.CELL_2G]  = 'Cell 2G connection';
	   states[Connection.CELL_3G]  = 'Cell 3G connection';
	   states[Connection.CELL_4G]  = 'Cell 4G connection';
	   states[Connection.CELL_5G]  = 'Cell 5G connection';
	   states[Connection.CELL]     = 'Cell generic connection';
	   states[Connection.NONE]     = 'No network connection';

	   if(states[networkState] == 'No network connection'){
		   
				window.plugins.toast.showLongBottom("No internet connection!");
				
				setTimeout(function(){
					
					navigator.app.exitApp();
					
				},5000);
			
		   }else{
			   
				   var url = remoteURL;
				   var target = '_self';
				   var options = "location=no,toolbar=0,menubar=0,scrollbars=no,allowInlineMediaPlayback=yes,mediaPlaybackRequiresUserAction=no,shouldPauseOnSuspend=yes";
				   var ref = cordova.InAppBrowser.open(url, target, options);

				   ref.addEventListener('loadstart', loadstartCallback);
				   ref.addEventListener('loadstop', loadstopCallback);
				   ref.addEventListener('loadloaderror', loaderrorCallback);
				   ref.addEventListener('exit', exitCallback);

				   function loadstartCallback(event) {
					  console.log('Loading started: '  + event.url)
				   }

				   function loadstopCallback(event) {
					  console.log('Loading finished: ' + event.url)
				   }

				   function loaderrorCallback(error) {
					  console.log('Loading error: ' + error.message)
				   }

				   function exitCallback() {
					  console.log('Browser is closed...')
				   }
			   
			   }
		
	}

	function goLocal(localURL) {
		
	   var networkState = navigator.connection.type;
	   
	   var states = {};
		
	   states[Connection.UNKNOWN]  = 'Unknown connection';
	   states[Connection.ETHERNET] = 'Ethernet connection';
	   states[Connection.WIFI]     = 'WiFi connection';
	   states[Connection.CELL_2G]  = 'Cell 2G connection';
	   states[Connection.CELL_3G]  = 'Cell 3G connection';
	   states[Connection.CELL_4G]  = 'Cell 4G connection';
	   states[Connection.CELL_5G]  = 'Cell 5G connection';
	   states[Connection.CELL]     = 'Cell generic connection';
	   states[Connection.NONE]     = 'No network connection';
	   
	   if(states[networkState] == 'No network connection'){
		   
		
		   window.plugins.toast.showLongBottom("No internet connection!");
		   
			setTimeout(function(){
				
				navigator.app.exitApp();
				
			},5000);
		   
		   }else{
			   
				window.location = localURL;
			   
			   }

	}

	function initializeLoader(){
		
		return loadfile("index.html");
		
	}


	function onConfirmQuit(button){
		
	   if(button == "1"){
		   
		 navigator.app.exitApp(); 
		 
	   }
	   
	}
	
	function alertDismissed() {
	  
		navigator.app.exitApp();
		
	}
	
	function all_toasts(){
		
		//showShortTop(message)
		//showShortCenter(message)
		//showShortBottom(message)
		//showLongTop(message)
		//showLongCenter(message)
		//showLongBottom(message)

	}
	
	function initVibration(time){
		
		navigator.vibrate(time)

	}