<?php
require_once 'datosMysql.php';
require_once 'datosJson.php';


$modo = file_get_contents("tipo.txt");

if($_COOKIE["base_datos"] == "json"){
    
    $json = file_get_contents("usuarios.json");
    $array = json_decode($json,true); 
    if ($_POST) {
        $usuario_borrado = $_POST['email'];
        $json = new DatosJson();
        $json->borrarUsuario($usuario_borrado);
    }
    
}else{
    $usuario = new DatosMysql();
    $array = $usuario->otrosUsuarios("admin@admin.com");
    if ($_POST) {
        $usuario_borrado = $_POST['email'];
        $usuarioM = new DatosMysql();
        $usuarioM->borrarUsuario($usuario_borrado);
    }
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
    <title>Todos los usuarios usuarios</title>
</head>
<body>

    <div id='fg_membersite'>
    
        <div>
            <?php 
                if ($_COOKIE["base_datos"]== "json") {
                  echo "<h1>Usuarios Alamacenados en usuarios.json</h1>";
                }else{
                   echo "<h1>Usuarios Alamacenados en Mysql</h1>"; 
                }
             
            ?>
                
            
        </div>

        <br>
        <br>
        <div>
        <?php 
        if($_COOKIE["base_datos"] == "json"){
            foreach ($array as $usuarios) {
                foreach ($usuarios as $usuario1) {
                    if ($usuario1['email'] != "admin@admin.com"){
        
                            include 'php/todosUsuarios.php'; 
                    }
                }
            }
        }else{
            foreach ($array as $usuario1) {
              
              include 'php/todosUsuarios.php';
            
            }
        }            
                        
        ?>            
        </div>
        <br>
        <br>
        <div>
            <a href="admin.php" class="btn">Volver al Panel de Administración</a><br>
            <br>
            <
        </div>
    </div>
</body>
</html>












        