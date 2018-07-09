<?php 
require_once 'conexion.php';
require_once 'usuario.php';
require_once 'datos.php';
require_once 'validacionMysql.php';

class DatosMysql extends Datos
{
	
	public function guardarUsuario(Usuario $usuario)
	{
		//var_dump($usuario);
		// var_dump($usuario);
		// exit();
		$nombre = $usuario->getNombre_completo();
		$email = $usuario->getEmail();
		$password = $usuario->getPassword();
		$usu = $usuario->getUsuario();
		$avatar = $usuario->getAvatar();

		// creo un objeto de la clase conexion
		$modelo = new Conexion();
		// guardo la conexión en una variable
		$conexion = $modelo->getConexion();
		// ahora creamos la consulta
		$sql = "INSERT INTO usuarios (nombre_completo,usuario,email,password,avatar) VALUES (:nombre_completo,:usuario,:email,:password,:avatar)";
		
		$statement = $conexion->prepare($sql); 
		// $statement->bindParam(':nombre_completo',$usuario->getNombre_completo());
		// $statement->bindParam(':usuario',$usuario->getUsuario());
		// $statement->bindParam(':email',$usuario->getEmail());
		// $statement->bindParam(':password',$usuario->getPassword());
		// $statement->bindParam(':avatar',$usuario->getAvatar());
		
		$statement->bindParam(':nombre_completo',$nombre);
		$statement->bindParam(':usuario',$usu);
		$statement->bindParam(':email',$email);
		$statement->bindParam(':password',$password);
		$statement->bindParam(':avatar',$avatar);

		if (!$statement) {
			//return "error al insertar datos";
		}else{
			$statement->execute();
			//return "registro creado correctamente";
		}
	}

	public function crearUsuario($nombre_completo,$usuario,$email,$password,$avatar)
	{
		$hasheado = password_hash($password, PASSWORD_DEFAULT);
		$usuario2 = new Usuario();
		$usuario2->setNombre_completo($nombre_completo);
		$usuario2->setUsuario($usuario);
		$usuario2->setEmail($email);
		$usuario2->setPassword($hasheado);
		$usuario2->setAvatar($avatar);
		return $usuario2;
	}


    public function guardarDatosNuevos($nombre_completo,$usuario,$email,$password,$avatar){
    	// var_dump($usuario);
    	// exit();
    	$modelo = new Conexion();
		// guardo la conexión en una variable
		$conexion = $modelo->getConexion();
	    
	 //    $nombre = $usuario->getNombre_completo();
		// $email = $usuario->getEmail();
		// $password = $usuario->getPassword();
		// $usu = $usuario->getUsuario();
		// $avatar = $usuario->getAvatar();

		// var_dump($avatar);
		// exit();

	    $sql = "UPDATE usuarios SET nombre_completo=:nombre_completo, usuario=:usuario, email=:email, password=:password, avatar=:avatar WHERE email=:email"; 
	    
	    $consulta = $conexion->prepare($sql);
		
		$consulta->bindParam(':nombre_completo',$nombre_completo);
		$consulta->bindParam(':email', $email);
		$consulta->bindParam(':password',$password);
		$consulta->bindParam(':usuario',$usuario);
		$consulta->bindParam(':avatar',$avatar);
		$consulta->execute();

	}	


	public function retornaUsuario($email){
	   
       $modelo = new Conexion();
       // guardo la conexión en una variable
	   $conexion = $modelo->getConexion();

	   $sql = 'SELECT nombre_completo, email, usuario, password, avatar FROM usuarios WHERE email = :email';
       $consulta = $conexion->prepare($sql);
       $consulta->bindParam(':email', $email);
       $consulta->execute();

       $registro = $consulta->fetch();
       if($registro){
          return new Usuario($registro['nombre_completo'], $registro['usuario'], $registro['email'],$registro['password'],$registro['avatar']);
       }else{
          return false;
       }
    } 


    public function otrosUsuarios($email){
	   
       $modelo = new Conexion();
       // guardo la conexión en una variable
	   $conexion = $modelo->getConexion();

	   $sql = 'SELECT nombre_completo, email, usuario, password, avatar FROM usuarios WHERE email != :email OR email != "admin@admin.com"';
       $consulta = $conexion->prepare($sql);
       $consulta->bindParam(':email', $email);
       $consulta->execute();

       $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
       
       
       if($registros){
          return $registros;

       }else{
          return false;
       }
    }  


    public function migrarABaseDeDatos($json)
	{
		$json_content= file_get_contents($json);  // descargamos el contenido del archivo json
        $array= json_decode($json_content,true);

        $validar = new ValidacionMysql(); 

        foreach($array as $usuarios)
	    {
	       foreach($usuarios as $usuario)
	       {
	       		$nombre_completo = $usuario['nombre_completo'];
		        $email = $usuario['email'];
		        $usu = $usuario['usuario'];
		        $password = $usuario['password'];
		        $avatar = $usuario['avatar'];

		        $usu2 = self::crearUsuario($nombre_completo,$usu,$email,$password,$avatar);
		        if (!$validar->mailRepetido($usu2->getEmail())) {
		        	self::guardarUsuario($usu2);
		        }
		        
		    }
	    }  
	}


	public function crearTabla($password)
	{

	 	$modelo = new Conexion();
	    $conexion = $modelo->getConexion();
	    
	    //creamos la base de datos si no existe
	 	$crear_db = $conexion->prepare('CREATE DATABASE IF NOT EXISTS red_social_viajes COLLATE utf8_spanish_ci');   
	 	$crear_db->execute();
	 
	    //decimos que queremos usar la base que acabamos de crear
		if($crear_db):
		  $usar_db = $conexion->prepare('USE red_social_viajes');   
		  $usar_db->execute();
		endif;
	 
		//si se ha creado la base de datos y estamos en uso de ella creamos las tablas
		if($usar_db):
		    //creamos la tabla usuarios
			$crear_tabla = $conexion->prepare('
			CREATE TABLE IF NOT EXISTS usuarios (
			id int(11) NOT NULL AUTO_INCREMENT,
			nombre_completo varchar(100) COLLATE utf8_spanish_ci NOT NULL,
			usuario varchar(100) COLLATE utf8_spanish_ci NOT NULL,
			email varchar(100) COLLATE utf8_spanish_ci NOT NULL,
			password varchar(150) COLLATE utf8_spanish_ci NOT NULL,
			avatar varchar(150) COLLATE utf8_spanish_ci NOT NULL,
			PRIMARY KEY (id))'); 
		 	$crear_tabla->execute();

		 	$insertar_admin = $conexion->prepare('
			 INSERT INTO usuarios (nombre_completo, usuario, email, password, avatar) VALUES
			 ("admin","admin","admin@admin.com",:password,"img/avatar1.png")'); 

		 	$hasheado = password_hash($password, PASSWORD_DEFAULT);
		 	$insertar_admin->bindParam(':password',$hasheado);
			$insertar_admin->execute();
			// $user = self::crearUsuario("admin","admin","admin@admin.com","123","img/avatar1.png");
			// var_dump($user);
			// exit();
			// self::guardarUsuario($user);		 		 	

	 	endif;
	 
	}

	public function crearBaseDatos($password){
		$conex = new Conexion();
		$con = $conex->getConexion2();

		 $crear_db = $con->prepare('CREATE DATABASE IF NOT EXISTS red_social_viaje COLLATE utf8_spanish_ci');   
		 $crear_db->execute();
		 
		 //decimos que queremos usar la tabla que acabamos de crear
		 if($crear_db):
		 $use_db = $con->prepare('USE red_social_viaje');   
		 $use_db->execute();
		 endif;
		 
		 //si se ha creado la base de datos y estamos en uso de ella creamos las tablas
		 if($use_db):
		 //creamos la tabla usuarios
		 $crear_tb_users = $con->prepare('
		 CREATE TABLE IF NOT EXISTS usuarios (
				id int(11) NOT NULL AUTO_INCREMENT,
				nombre_completo varchar(100) COLLATE utf8_spanish_ci NOT NULL,
				usuario varchar(100) COLLATE utf8_spanish_ci NOT NULL,
				email varchar(100) COLLATE utf8_spanish_ci NOT NULL,
				password varchar(150) COLLATE utf8_spanish_ci NOT NULL,
				avatar varchar(150) COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY (id))'); 
		    
		 $crear_tb_users->execute();
		 
		 //creamos la tabla posts
		 $insertar_admin = $con->prepare('
				 INSERT INTO usuarios (nombre_completo, usuario, email, password, avatar) VALUES
				 ("admin","admin","admin@admin.com",:password,"img/avatar1.png")'); 

	 	$hasheado = password_hash($password, PASSWORD_DEFAULT);
	 	$insertar_admin->bindParam(':password',$hasheado);
		$insertar_admin->execute();
		endif;
	 
	 }


	public function borrarUsuario($email){
	   $modelo = new Conexion();
       // guardo la conexión en una variable
	   $conexion = $modelo->getConexion();

	   $sql = 'DELETE FROM usuarios WHERE email = :email';
       $consulta = $conexion->prepare($sql);
       $consulta->bindParam(':email', $email);
       $consulta->execute();

	}

}

?>

