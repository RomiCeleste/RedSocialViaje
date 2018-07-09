<?php 
require_once 'conexion.php';
require_once 'usuario.php';

abstract class Validacion 
{
	protected $errores;

    public function __construct() {
        $this->errores = array();
    }

    public function __set($prop, $value) {
        $this->errores[$prop] = $value;
    }

    public function __get($prop) {
        return $this->errores[$prop];
    }

    public function toArray() {
        return $this->errores;
    }


	abstract public function mailRepetido($email);
    abstract public function comprobarLogin($email, $password);

    

	public function passwordCoincidente($password,$repassword){
		$this->errores = false;
		if ($password !== $repassword) {
		   $this->errores = "Las contraseñas no coinciden";
		}
		return $this->errores;
	}

    public function validarAdmin($email){
        if($email == "admin@admin.com"){
            return true;
        }else{
            return false;
        }
    }

}


?>