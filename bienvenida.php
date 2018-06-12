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
<img src="<?php echo $usuario['avatar']; ?>" alt="imagen del usuario" width="254">
  
<br>
<a href="editar_datos.php">Cambia tus datos</a>
<br>
<a href="logout.php">Logout</a>
<br>
<a href="home.php">Volver a la página principal</a>

 