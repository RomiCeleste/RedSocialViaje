<?php 


    $json_content= file_get_contents("usuarios.json");  // descargamos el contenido del archivo json
	  $array= json_decode($json_content,true);  


	  print_r($array);


 ?>