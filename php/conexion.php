<?php 
// librería pdo
	try {
		// conexión con la base de datos
		$base = new PDO("mysql:host=localhost; dbname=red_social_viaje","root","1234");
		// propiedades de la conexión
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// miramos en la base de datos si existe el usuario
		// (usamos un marcadores)
		$sql = "SELECT * FROM usuarios WHERE email = :login AND password = :password";	
		// hacemos una consulta preparada con marcadores
		$resultado = $base->prepare($sql);

		// usamos htmlentities y addslashes para escapar de los caracteres especiales ingresadis por los usuarios para evitar la inyección sql
		$email_usuario = htmlentities(addslashes($_POST['usuario']));

		$password = htmlentities(addslashes($_POST['password']));

		// relacionamos los marcadores con las variables que contienen lo ingresado por el usuario
		$resultado->bindValue(":login",$email_usuario);
		$resultado->bindValue(":login",$password);

		// ejecutamos la función sql
		$resultado->execute();

		// verifico si el usuario está en la base de datos
		// rowCount() nos devuelve el número de registros que resultan de una consults
		// si el usuario no existe va a devolver 0 filas y si existe 1
		$numero_registro = $resultado->rowCount();

		// lo redirigimos a la página usuario o al home
		if($numero_registro){
			header("location:usuario.php");
		}else{
			header("location:home.php");
		}


 ?>

