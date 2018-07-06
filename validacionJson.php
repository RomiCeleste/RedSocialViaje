<?php 
require_once 'conexion.php';
require_once 'usuario.php';
require_once 'validacion.php';

class ValidacionJson extends Validacion 
{
	public function mailRepetido($email)
	{
	  $bandera = 0;
	  $json = file_get_contents("usuarios.json");
	  $array = json_decode($json,true);   
	  foreach($array as $usuarios)
		{
		    foreach($usuarios as $usuario)
		    {
		        if ($usuario['email'] == $email) {
		            $bandera = 1;
		        }
		        
		    }
		}
	  return $bandera;
	}


	public function comprobarLogin($email, $password){
		$json = file_get_contents("usuarios.json");
	    $array = json_decode($json,true);
	    $bandera = 0;
	    foreach ($array as $usuarios) {
	        foreach ($usuarios as $usuario) {
	            if($usuario['email'] == $email && password_verify($password,$usuario['password']))
	            {
	                $bandera = 1;
	            }
	        }
	    }
	    return $bandera;
	}

	public function validarDatos($datos){
	  if ($datos["nombre_completo"]=="") {
	   $this->errores["nombre_completo"]="Por favor ingrese su nombre";
	  }
	  if ($datos["email"]=="") {
	    $this->errores["email"]="Por favor ingrese su email";
	  }elseif (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
	    $this->errores["email"]="Por favor ingrese un email valido";
	  }elseif(self::mailRepetido($datos["email"])){
	    $this->errores["email"] = "el email ya está en la base de datos, ingresá otro";
	  }

	  if ($datos["usuario"]=="") {
	   $this->errores["usuario"]="Por favor ingrese su usuario";
	  }
	  if ($datos["password"]=="") {
	    $this->errores["password"]= "Por favor ingrese una contraseña";
	  }
	  if ($datos ["repassword"]=="") {
	    $this->errores["repassword"]= "Por favor reingrese su contraseña";
	  }elseif ($datos["password"]!==$datos["repassword"]) {
	    $this->errores["repassword"]="Las contraseñas no coinciden";
	  }

	  return $this->errores;

	}


	
	function validarDatosLogin($datos){
	  if ($datos["email"]=="") {
	    $this->errores["email"]="Por favor ingrese su email";
	  }elseif (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
	    $this->errores["email"]="Por favor ingrese un email valido";
	  }

	  if ($datos["password"]=="") {
	    $this->errores["password"]= "Por favor ingrese una contraseña";
	  }

	  parent::validarAdmin($datos['email']);

	  if (!self::comprobarLogin($datos['email'], $datos['password'])) {
	      $this->errores["login"]="No corresponde el email del usuario con la contraseña ingresada";
	  }  

	  return $this->errores;

	}

}

 ?>