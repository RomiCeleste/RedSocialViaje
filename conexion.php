<?php
class Conexion
{
	// private $host = 'localhost';
	// private	$usuario = 'root';
	// private	$pass = '1234';
	// private	$bd = "red_social_viaje";

	private $dsn = 'mysql:host=localhost;dbname=red_social_viaje;charset=utf8mb4;port:3306';
	private $user = 'root';
	private $pass = '1234';
	public function getConexion()
	{
		try {
		   $conexion = new PDO($this->dsn,$this->user,$this->pass);
		   $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		   // echo("conexión ok");
		   return $conexion;
		   
		} catch(PDOException $ex) {
  			echo 'Error conectando a la BBDD. '.$ex->getMessage(); 
        }  
	}
}	
	// 
	// try {
	// 	$db = new PDO($dsn,$user,$pass);
	// 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 	$sql = 'INSERT INTO usuarios (nombre_completo,usuario,email,password,avatar) VALUES ("hola mundo","hola","hola@email","123","avatar.jpg")';
	// 	$query = $db->query($sql);
	// 	echo("conexion ok");
	// } catch (Exception $e) {
	// 	echo($e->getMessage());
	// }
	
//}

  //       $modelo = new Conexion();
		// // guardo la conexión en una variable
		// $conexion = $modelo->getConexion();
		// $sql = 'INSERT INTO usuarios (nombre_completo,usuario,email,password,avatar) VALUES ("hola mundo0","hola2","hola2@email","123","avatar.jpg")';
		// $query = $conexion->prepare($sql);
		// $query->execute(); 

?>
