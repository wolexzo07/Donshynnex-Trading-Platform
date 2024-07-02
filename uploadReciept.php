<?php

	if(!isset($tranx_id)){
		exit();
	}
	
	$post_id = $tranx_id;
	
	$dirname = "recieptOndemand"; 
	
	 if(!is_dir($dirname)){
		 
		 mkdir($dirname);
		 
	 }
	 
	$files = array_filter($_FILES['upload']['name']);  $total_count = count($_FILES['upload']['name']);
	
	$filter_upload = $_FILES['upload']['tmp_name'][0]; // used to check if any file was uploaded
	
	if(is_uploaded_file($filter_upload)){
		
		for( $i=0 ; $i < $total_count ; $i++ ) {
			
				$file_num = $i+1; $file_no = "#".$file_num;
				
				$fsize = $_FILES['upload']['size'][$i]; // getting file size 
				
				$final_size = x_getsize($fsize); // returns size in kb , mb
				
				$getlimit = 512000; // 500kb limit
				
				$file_ext = explode(".",$_FILES['upload']['name'][$i]); // getting file extension
				
				$final_ext = end($file_ext);
				
				$allowed_ext = "jpg,png,jpeg"; // Filter allowed extension
				
				$allowed = explode(",",$allowed_ext);
				
				if(!in_array(strtolower($final_ext),$allowed)){
					
					$msg = "Invalid upload format (Allowed :: $allowed_ext)";
					
					x_toasts($msg);
					
					exit();
				
				}
				
				if($fsize > $getlimit){
					
					$limit = x_getsize($getlimit) ;
					
					$msg = "File upload must not exceed $limit";
					
					x_toasts($msg);
					
					exit();
				
				}
					
					   //The temp file path is obtained
					   
					   $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
					   
					   // checking for uploaded file
					   
					   if(!is_uploaded_file($tmpFilePath)){
						  
						   x_toasts("No file was uploaded");
						   
						   exit();
					   }
					   
					   if ($tmpFilePath != ""){
						   
						  $newFilePath = $dirname."/" . sha1($tranx_id.$_FILES['upload']['name'][$i]).".".$final_ext;
						  
						  // File is uploaded to temp dir
						  
						  if(move_uploaded_file($tmpFilePath, $newFilePath)){
							  
							  $ct[] = 1;
							  
						  }else{  
						  
							x_toasts("Failed to upload file");
							
							exit();
							
						  }
						  
						  x_insert("post_id,file_path,file_type,file_size,status","filelogs","'$post_id','$newFilePath','$final_ext','$final_size','0'","&nbsp;","<script>showalert('Failed to insert data')</script>");
						  
					   }
			
			}
	
		 //$tl = count($ct);	
			
		 $image_status = 1;
	
	}else{
		
		 $image_status = 0;
	
	}
?>