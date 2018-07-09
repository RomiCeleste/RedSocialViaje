<?php
require_once 'datosMysql.php';
require_once 'datosJson.php';
session_start();

if(!isset($_SESSION['login'])){     // un usuario si sesión es enviado a la página de inicio
    header('Location:index.php');

}

$modo = file_get_contents("tipo.txt");

if($modo == "json"){
    $usuario = new DatosJson();
    $usu = $usuario->retornaUsuario($_SESSION['login']);  // obtenemos todos los datos del usuario con su mail
    $json = file_get_contents("usuarios.json");
    $array = json_decode($json,true); 

}else{
    $usuario = new DatosMysql();
    $array = $usuario->otrosUsuarios($_SESSION['login']);


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
        
        if($modo == "json"){
            foreach ($array as $usuarios) {
                foreach ($usuarios as $usuario1) {
                    if (($usu['email'] != $usuario1['email']) && $usuario1['email'] != "admin@admin.com"){
                        include 'php/otrosUsuarios.php';
                    }
                }
            }
        }else{
            foreach ($array as $usuario1) {
                include 'php/otrosUsuarios.php';   
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












        