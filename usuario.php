<?php 

/**
* 
*/
class Usuario 
{
	private $id;
	private $nombre_completo;
	private $usuario;
	private $email;
	private $password;
	private $avatar;

	function __construct($nombre_completo=0,$usuario=0,$email=0,$password=0,$avatar=0)
	{
		$this->nombre_completo = $nombre_completo;
		$this->usuario = $usuario;
		$this->email = $email;
		$this->password = $password;
		$this->avatar = $avatar;
	}

	public function getNombre_completo()
	{
	    return $this->nombre_completo;
	}
	
	public function setNombre_completo($nombre_completo)
	{
	    $this->nombre_completo = $nombre_completo;
	    return $this;
	}

	public function getUsuario()
	{
	    return $this->usuario;
	}
	
	public function setUsuario($usuario)
	{
	    $this->usuario = $usuario;
	    return $this;
	}

	public function getEmail()
	{
	    return $this->email;
	}
	
	public function setEmail($email)
	{
	    $this->email = $email;
	    return $this;
	}

	public function getPassword()

	{
	    return $this->password;
	}
	
	public function setPassword($password)
	{
	    $this->password = $password;
	    return $this;
	}

	public function getAvatar()
	{
	    return $this->avatar;
	}
	
	public function setAvatar($avatar)
	{
	    $this->avatar = $avatar;
	    return $this;
	}
}


 ?>