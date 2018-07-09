<?php 
require_once 'conexion.php';
require_once 'usuario.php';

abstract class Datos 
{
	
	//abstract public function guardarUsuario();
	//abstract public function crearUsuario();
	//abstract public function guardarDatosNuevos();
	abstract public function retornaUsuario($email);
	abstract public function borrarUsuario($email);
    //abstract public function otrosUsuarios($email);


	public function cargarfoto1($original){
      if ($original["error"] === UPLOAD_ERR_OK) { //UPLOAD_ERR_OK es equivalente a 0

	    $nombreViejo = $original["name"]; // Nombre original del archivo
	    $extension = pathinfo($nombreViejo, PATHINFO_EXTENSION); // Extensión del archivo subido
	    //var_dump($extension);
	    $nombreNuevo = $original["tmp_name"]; // Nombre temporal en el servidor
	    
	    $archivoFinal = dirname(__FILE__); // Agarramos el archivo donde estamos parados ahora mismo
	    $archivoFinal .= "/img/"; // .= nos permite concatenar, en este caso es lo mismo que poner 
	    $nombreFinal = uniqid() . "." . $extension; // uniqid genera un ID "único" para la foto
	    $archivoFinal .= $nombreFinal;

	    
	    move_uploaded_file($nombreNuevo, $archivoFinal); // copiamos el archivo a la ubicación final
	    return  "img/" . $nombreFinal;  
	  
	  }else{
	    return "img/avatar1.png" ; 
	  }
	    
	}


	public function cargarJson($original){
      if ($original["error"] === UPLOAD_ERR_OK) { //UPLOAD_ERR_OK es equivalente a 0

	    $nombreViejo = $original["name"]; // Nombre original del archivo
	    $extension = pathinfo($nombreViejo, PATHINFO_EXTENSION); // Extensión del archivo subido
	    //var_dump($extension);
	    $nombreNuevo = $original["tmp_name"]; // Nombre temporal en el servidor
	    
	    $archivoFinal = dirname(__FILE__); // Agarramos el archivo donde estamos parados ahora mismo
	    $archivoFinal .= "/json/"; // .= nos permite concatenar, en este caso es lo mismo que poner 
	    $nombreFinal = date("H:i:s") . "." . $extension; // uniqid genera un ID "único" para la foto
	    $archivoFinal .= $nombreFinal;

	    
	    move_uploaded_file($nombreNuevo, $archivoFinal); // copiamos el archivo a la ubicación final
	    return  "json/" . $nombreFinal;  
	  

	  
	  }else{
	    return "hay un error en la cargar del archivo json" ; 
	  }
	    
	}



    


    


	


}



 ?>
