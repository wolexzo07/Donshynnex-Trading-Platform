function showalert(msg){
	Toastify({
	  text: msg,
	  duration: 3000,
	  //destination: "https://github.com/apvarun/toastify-js",
	  newWindow: true,
	  close: true,
	  gravity: "top", // `top` or `bottom`
	  position: "center", // `left`, `center` or `right`
	  stopOnFocus: true, // Prevents dismissing of toast on hover
	  style: {
		//background: "linear-gradient(to right, #00b09b, #96c93d)",
		background: "white",
		color:"green",
	  },
	  onClick: function(){} // Callback after click
	}).showToast();
}

function cloader(page,pageid){
	$(pageid).show(300);
	//topFunction();
		$.ajax({
			type	: 'GET',
			url		: page,
			success	: function(data) {
				try {
					$(pageid).html(data);
					
				} catch (err) {
					alert(err);
				}
			}
		});
}

function topFunction() {
	  document.body.scrollTop = 0; // For Safari
	  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

 function formProcessor(formid,resultid,cmdvalue,hasher){
	 
	  $(formid).submit(function(e){
			e.preventDefault();
			let cmd = cmdvalue;
			//let urlMan = "yungopay.com";
			let urlMan = "localhost/shina";
			$(resultid).html("<center><img src='img/ajax-loader.gif' style='width:20px;margin:20px;'/></center>");
			$.ajax({
				crossOrigin: true,
				method:"POST",
				url:"https://"+urlMan+"/realapp/appController?hasher="+hasher+"&cmd="+cmd,
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(response){
				
					if(cmd == "external-sales"){
						
						$(resultid).html(response);
						
						$(".reset-external").click();
					}
					
					if(cmd == "app-buys"){
						
						$(resultid).html(response);
						
						$(".reset-buy").click();
					}

					if(cmd == "app-sells"){
						
						$(resultid).html(response);
						
						$(".reset-sell").click();
					}

					if(cmd == "app-register"){
						
						$(resultid).html(response);
						
					}
					
					if(cmd == "app-reset"){
						$(resultid).html(response);
					}
					
					if(cmd == "app-login"){
						
						let getResponse = x_getValues(response , 0);
						
						if(getResponse == "success"){
							
							$(".reset-form").click();
							
							let getId = x_getValues(response , 1);
							let getToken = x_getValues(response , 2);
							let getName = x_getValues(response , 3);
							let getEmail = x_getValues(response , 4);
							
							// Activating cookie
							
							setSession("user-id-yungopay", getId);
							setSession("user-token-yungopay", getToken);
							setSession("user-name-yungopay", getName);
							setSession("user-email-yungopay", getEmail);
							
							showalert("Login was successful!!");
							
							window.location = "dashboard.html";
							
						}else{
							
							$(resultid).html(response);
							
						}
						
					}
			
				},
				error:function(){}
			});
		});
    }
	
 function contentViewer(result,cmd,hasher){
		//let urlMan = "yungopay.com";
		let urlMan = "localhost/shina";
		
		const allowlist = ["convert_crypto_usd" , "convert_usd_crypto"];
		
		if(allowlist.includes(cmd)){}
		else{
			$(result).html("<center><img src='img/ajax-loader.gif' style='width:20px;margin:20px;'/></center>");
		}
		
		$.ajax({
				crossOrigin: true,
				url:"https://"+urlMan+"/realapp/appController?hasher="+hasher+"&cmd="+cmd,
				method:"GET",
				success:function(response){
					
					if(cmd == "convert_crypto_usd"){
						
						$(result).html("");
						
						$(".byamountinusd").val(response);
						
					}else if(cmd == "convert_usd_crypto"){
						
						$(result).html("");
						
						$(".byamountinbtc").val(response);
						
					}else{
						
						$(result).html(response);
					
					}
					
			
				},
				error:function(){}
			});
	}
	

function x_getValues(str , index){
	
	if(str != null){
		
		const parts = str.split("---");
	
		let response;

		if(parts.length > 0 && index >= 0){
			
			response = parts[index];
			
		}else{
			
			response = "invalid";
			
		}
		
		return response;
	}
	
}

function x_getNamex(str , index){
	
	if(str != null){
		
		const parts = str.split(" ");
	
		let response;

		if(parts.length > 0 && index >= 0){
			
			response = parts[index];
			
		}else{
			
			response = "invalid";
			
		}
		
		return response;
	}
	
}

function logoutApp(){
	
	if((getSession("user-id-yungopay") != undefined) && (getSession("user-token-yungopay") != undefined)){
		
		removeSession("user-id-yungopay");
		
		removeSession("user-token-yungopay");
		
		removeSession("user-name-yungopay");
		
		removeSession("user-email-yungopay");

		showalert("You are logged out!");
		
		window.location = "registerApp.html";
		
	}
	
}


function setSession(key, value) { // Set session data

    localStorage.setItem(key, value);
	
}


function getSession(key) { // Get session data

    return localStorage.getItem(key);
	
}


function removeSession(key) { // Remove session data

    localStorage.removeItem(key);
	
}


function checkuserlogin(){ // checking if user is logged on
	
	if((getSession("user-id-yungopay") == undefined) && (getSession("user-token-yungopay") == undefined)){
		
		//cloader("appLogin",".c-fluid"); // load loginpage if session expired
		
		showalert("Inactive session! Please login");
		
		window.location = "registerApp.html";
		
	}
}


function checkifSessionActive(){ // If session action active
	
	if((getSession("user-id-yungopay") == undefined) && (getSession("user-token-yungopay") == undefined)){

	}else{
		
		window.location = "dashboard.html";
		
	}
}

	function manageDivs(openSelector , Content , closeSelector){
		
		$(openSelector).click(function(){
			
			$(Content).show(300);
			
		});	
		
		$(closeSelector).click(function(){
			
			$(Content).hide(300);
			
		});
	}
	
	function changerExInt(str){
		
		if(str == "external"){
			
			$(".wallet-internal").hide(300);
			
			$(".wallet-external").show(300);
			
		}
		
		if(str == "internal"){
			
			$(".wallet-internal").show(300);
			
			$(".wallet-external").hide(300);
			
		}
		
	}