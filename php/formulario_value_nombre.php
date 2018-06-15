<?php

if(isset($_COOKIE["email"])) { 
	echo $_COOKIE["email"]; 

}else{
	if(isset($errores["nombre_completo"])){ 
	echo "";
	}
	else { 
		 if($_POST){
		 	echo $_POST["nombre_completo"];
		 }else{
		 	echo "";
		 } 
		
	}	
}

 


 ?>

