<?php 
require_once 'functions.php';
session_start();

if(!isset($_SESSION['login'])){     // un usuario si sesión es enviado a la página de inicio
	header('Location:home.php');
	
}
$usuario = retornaUsuario($_SESSION['login']);  // obtenemos todos los datos del usuario con su mail

	
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
    
        <h1>Bienvenido/a <?php echo $usuario['nombre_completo']; ?></h1><br>
        <img src="<?php echo $usuario['avatar']; ?>" alt="imagen del usuario" width="254">

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



 

 