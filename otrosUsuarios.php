<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/styleform.css">
    <link rel="stylesheet" href="">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">
    <title>Contact us</title>
</head>
<body>

    <div id='fg_membersite'>
        <form id='register' action="" method='post' enctype="multipart/form-data">
            <div>
                <h1>Otros Viajeros</h1>

            </div>
        </form>

    </body>
</html>


<?php
require_once 'functions.php';
session_start();

if(!isset($_SESSION['login'])){     // un usuario si sesión es enviado a la página de inicio
	header('Location:home.php');

}
$usuario = retornaUsuario($_SESSION['login']);  // obtenemos todos los datos del usuario con su mail
echo "Bienvenido/a: " . $usuario['nombre_completo'];

echo("<br>");

?>
<img src="<?php echo $usuario['avatar']; ?>" alt="imagen del usuario" width="150px">

<br>
<br>
<a href="home.php">Volver a la página principal</a>

<br>
<br>
<br>
<br>
<div boton>
<a href="home.php" class="btn">VOLVER</a>
</div>
