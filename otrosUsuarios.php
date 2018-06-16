<?php
require_once 'functions.php';
session_start();

if(!isset($_SESSION['login'])){     // un usuario si sesión es enviado a la página de inicio
    header('Location:index.php');

}
$usuario = retornaUsuario($_SESSION['login']);  // obtenemos todos los datos del usuario con su mail

 $json = file_get_contents("usuarios.json");
  $array = json_decode($json,true); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/styleform.css">
    <link rel="stylesheet" href="">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">
    <title>Otros usuarios</title>
</head>
<body>

    <div id='fg_membersite'>
    
        <div>
            <h1>Otros Viajeros</h1>

        </div>

        <br>
        <br>
        <div>
            <?php  
            foreach ($array as $usuarios) {
                foreach ($usuarios as $usuario1) {
                    if ($usuario['email'] != $usuario1['email']){
                ?>     
                    <div>
                        <center>
                            <div><img src="<?php echo($usuario1['avatar']) ?>" width="100"></div>
                            <p><?php echo($usuario1['nombre_completo']) ?></p><br><br><br>
                            
                        </center>
                    </div>
            <?php 
                    }
                }
            }        
             ?>              
                    
        </div>
        <br>
        <br>
        <div>
            <a href="bienvenida.php" class="btn">Volver a tu página</a><br>
            <br>
            <a href="logout.php">Logout</a>
            <br>
            <a href="index.php">Volver a la página principal</a>
        </div>
    </div>
</body>
</html>












        