<?php 
	if(isset($errores["usuario"])){ 
	echo "";
	}
	else { 
		 if($_POST){
		 	echo $_POST["usuario"];
		 }else{
		 	echo "";
		 } 
		
	} 




 ?>


