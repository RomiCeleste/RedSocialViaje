<?php 
require_once 'conexion.php';
require_once 'usuario.php';
require_once 'validacion.php';

class ValidacionMysql extends Validacion 
{
	

	public function mailRepetido($email){
    $modelo = new Conexion();
       // guardo la conexión en una variable
	  $conexion = $modelo->getConexion();

	  $sql = 'SELECT email FROM usuarios WHERE email = :email';
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':email', $email);
    $consulta->execute();

    $registro = $consulta->fetch();
    if($registro){
      return true;
    }else{
      return false;
    }
	}

	
	public function comprobarLogin($email, $password){
     $modelo = new Conexion();
       // guardo la conexión en una variable
	   $conexion = $modelo->getConexion();

	   $sql = 'SELECT password FROM usuarios WHERE email = :email';
       $consulta = $conexion->prepare($sql);
       $consulta->bindParam(':email', $email);
       $consulta->execute();

       $pass = $consulta->fetch();
       if($pass && password_verify($password,$pass)){
          return true;
       }else{
          return false;
       }
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

    if(parent::validarAdmin($datos['email'])){
         header('Location:admin.php');
    }


    if (!self::comprobarLogin($datos['email'], $datos['password'])) {
        $this->errores["login"]="No corresponde el email del usuario con la contraseña ingresada";
    }  

    return $this->errores;

  }

}

 ?>