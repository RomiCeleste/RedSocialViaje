<?php 
require_once 'datosMysql.php';
require_once 'datosJson.php';
session_start();

if(!isset($_SESSION['login'])){     // un usuario si sesión es enviado a la página de inicio
	header('Location:home.php');
	
}

$modo = file_get_contents("tipo.txt");

if($modo == "json"){
    $json = new DatosJson();
    $usuario = $json->retornaUsuario($_SESSION['login']);  // obtenemos todos los datos del usuario con su mail

}else{
    $datosM = new DatosMysql();
    $usuario = $datosM->retornaUsuario($_SESSION['login']);

}
	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/styleform.css">
    <link rel="stylesheet" href="">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">
    <title>Bienvenida</title>
</head>
<body>

    <div id='fg_membersite'>
    
        <h1>Bienvenido/a <?php if($modo=='json'){echo $usuario['nombre_completo'];}else{echo $usuario->getNombre_completo();}?></h1><br>
        <img src="<?php if($modo=='json'){echo $usuario['avatar'];}else{echo $usuario->getAvatar();} ?>" alt="imagen del usuario" width="254">

        <br>
        <a href="editar_datos.php">Cambia tus datos</a>
        <br>
        <a href="logout.php">Logout</a>
        
        <br>
        
        <div class="otros">
        	<a href="otrosUsuarios.php" class="btn">OTROS USUARIOS</a>
        </div>
        <br>
        <br>
        <div class="boton">
        	<a href="index.php" class="btn">VOLVER</a>
        </div>
	</div>
</body>
</html>




 

 