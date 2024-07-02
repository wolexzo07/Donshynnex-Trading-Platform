 function x_formpro(formid,resultid,cmdvalue,hasher){
	 
	  let cmd = cmdvalue;
	  
	  $(formid).submit(function(e){
			e.preventDefault();
			$(resultid).html("<img src='img/ajax-loader.gif' style='width:20px;'/>");
			$.ajax({
				method:"POST",
				url:"appController?hasher="+hasher+"&cmd="+cmd,
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(response){},
				error:function(){}
			});
		});
    }
	
	
 function x_fetchprobyid(extra_id,result,cmd,hasher){
	  $(result).show(300);
	  $(result).html("<img src='img/ajax-loader.gif' style='width:20px;'/>");
	  $.ajax({
				url:"appController?eid="+extra_id+"&hasher="+hasher+"&cmd="+cmd,
				method:"GET",
				success:function(response){
			
						$(result).html(response);
						
				},
				error:function(){}
			});
	}
	
 function x_fetchpro(result,cmd,hasher){
		$(result).show(300);
		$(result).html("<img src='img/ajax-loader.gif' style='width:20px;'/>");
		$.ajax({
				url:"appController?hasher="+hasher+"&cmd="+cmd,
				method:"GET",
				success:function(response){
					
					$(result).html(response);
					
				},
				error:function(){}
			});
	}