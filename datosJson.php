<?php 
require_once 'conexion.php';
require_once 'usuario.php';
require_once 'datos.php';


class DatosJson extends Datos
{
	// creamos un array con los datos del usuario
	// le pasamos el array post
	public function crearUsuario($datos,$imagen){
	  return [
	    "nombre_completo" => $datos["nombre_completo"],               
	    "email" => $datos["email"],                  
	    "usuario" => $datos ["usuario"],                                   
	    "password" => password_hash($datos["password"],PASSWORD_DEFAULT),   
	    "avatar" => $imagen
	  ];
	}


	public function retornaUsuario($email){
	    $json = file_get_contents("usuarios.json");
	    $array = json_decode($json,true);   
	    foreach($array as $usuarios)
	    {
	        foreach($usuarios as $usuario)
	        {
	            if ($usuario['email'] == $email) {
	                return $usuario;
	                
	            }
	            
	        }
	    }
	  
	}


    public function guardarUsuario($usuario){
	  // $user= json_encode($usuario);              // pasamos a json el array usuario 
	  $json_content= file_get_contents("usuarios.json");  // descargamos el contenido del archivo json
	  $array= json_decode($json_content,true);            // pasamos a array el contenido del archivo json
	  $array["usuarios"][]= $usuario;                // le agregamos un registro al array de usuario
	  $array= json_encode($array);                // lo pasamos a json
	  file_put_contents("usuarios.json",$array);  // y los ponemos de nuevo en el archivo

	}




	public function guardarDatosNuevos($datos, $imagen){
	    $usuario_c = $datos;
	   //$clave = password_hash($_POST["password"],PASSWORD_DEFAULT);
	    $imagen2 = self::cargarfoto1($imagen);

	    $json_content= file_get_contents("usuarios.json");  // descargamos el contenido del archivo json
	    $array= json_decode($json_content,true);            // pasamos a $array el contenido del archivo json


	    if (isset($_POST['preservar'])){
	       foreach($array as $usuarios)
	       {
	          foreach($usuarios as $clave => $usuario)
	          {
	              if ($usuario['email'] == $usuario_c['email']) {
	                  
	                  $imagen2 = $array['usuarios'][$clave]['avatar'];              
	              }
	          }
	       }
	     }

	   unset($usuario_c['preservar']);  // borramos el campo preservar
	   
	   $usuario_c['avatar'] = $imagen2;  // añadimos campo avatar
	   
	   // recorremos el array de usuarios, reemplazamos el array
	    foreach($array as $usuarios)
	    {
	       foreach($usuarios as $clave => $usuario)
	       {
	              if ($usuario['email'] == $usuario_c['email']) {
	                  
	                 $array['usuarios'][$clave] = $usuario_c;              
	              }
	        }
	    }
	     
	     $array= json_encode($array);                // lo pasamos a json
	     file_put_contents("usuarios.json",$array);  // y los ponemos de nuevo en el archivo
	}



	public function pasarAjson($archivo){
		$modelo = new Conexion();
        // guardo la conexión en una variable
	    $conexion = $modelo->getConexion();

	    $sql = 'SELECT nombre_completo, email, usuario, password, avatar FROM usuarios';
        $consulta = $conexion->prepare($sql);
        $consulta->execute();

        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach ($registros as $value => $registro) {
             $array["usuarios"][]= $registro;
        }
        // echo("<pre>");
        // var_dump($array);
        // echo("</pre>");
    
        $array= json_encode($array);
        $contenido = "json/" . $archivo . ".json";               
  		file_put_contents($contenido,$array);
	}


}
	


 ?>