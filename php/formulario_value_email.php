<?php 

if(isset($errores["email"])){ 
	echo "";
}
else { 
	 if($_POST){
	 	echo $_POST["email"];
	 }else{
	 	echo "";
	 } 
	
} 

?>

