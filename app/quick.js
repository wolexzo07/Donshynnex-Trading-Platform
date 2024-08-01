 $(document).ready(function () {
	 
	 checkifSessionActive();
			 
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
	 
	 // Handling all membership details
	 
	 formProcessor("#loginForm","#Login-response","app-login","xelow-gc"); // android login
	 formProcessor("#registerForm","#register-response","app-register","xelow-gc");// android register
	 formProcessor("#resetForm","#Reset-response","app-reset","xelow-gc");// android password reset
	 
 });
 
  let uuid = new DeviceUUID().get();
  let hashed = sha1(uuid);
  $(".etoken").val(hashed);