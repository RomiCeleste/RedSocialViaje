<?php 
if(isset($_COOKIE["email"])) { 
	echo $_COOKIE["email"]; 

}else{
	if(isset($errores["email"])){ 
		
		echo "";
	
	}else { 
		 if($_POST){
		 	echo $_POST["email"];
		 }else{
		 	echo "";
		 } 
		
	} 

	
}



 ?>


