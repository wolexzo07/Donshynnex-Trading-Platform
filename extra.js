	function processAjaxForm(formid,resultid,processingScript,timerControl){
			$("#"+formid).on('submit',(function(e) {
			$("#"+resultid).show();
			$("#"+resultid).html("<img class='img-circle' src='img/ajax-loader.gif'/>wait....");
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