<?php

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


 ?>

