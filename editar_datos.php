<?php 
require_once 'validacionMysql.php';
require_once 'validacionJson.php';
require_once 'datosMysql.php';
require_once 'datosJson.php';
session_start();


if(!isset($_SESSION['login'])){
	header('Location:home.php');
	
}

$modo = file_get_contents("tipo.txt");

if($modo == "json"){
    $json = new DatosJson();
    if ($_POST) {
        $json->guardarDatosNuevos($_POST,$_FILES['imagen']);
        header('Location:bienvenida.php');
    }
    $usuario = $json->retornaUsuario($_SESSION['login']);   // obtenemos todos los datos del 

}else{
    $datosM = new DatosMysql();
    if ($_POST) {
        if($_POST['preservar']){
            $datosM->guardarDatosNuevos($_POST['nombre_completo'],$_POST['usuario'],$_POST['email'],$_POST['password'],$_COOKIE['foto']);
        }else{
            if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
                $datosM->guardarDatosNuevos($_POST['nombre_completo'],$_POST['usuario'],$_POST['email'],$_POST['password'],$_FILES['imagen']);
            }else{
                $datosM->guardarDatosNuevos($_POST['nombre_completo'],$_POST['usuario'],$_POST['email'],$_POST['password'],$_COOKIE['avatar']);
            }
        }
        header('Location:bienvenida.php');
    }
    $usuario = $datosM->retornaUsuario($_SESSION['login']);
    $foto = $usuario->getAvatar();
    setcookie('foto',$foto); 
    $avatar = "img/avatar1.png";
    setcookie('avatar',$avatar);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/styleform.css">
    <link rel="stylesheet" href="">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	<form id='register' method='post' enctype="multipart/form-data">
                            
                <div><span class='error'></span></div>
                <div class='container'>
                    <h1>Podés editar tus datos <?php if($modo == "json"){echo $usuario['nombre_completo'];}else {echo $usuario->getNombre_completo();} ?></h1><br>
                    <label for='name' >Nombre completo</label><br/>
                    <input type='text' name='nombre_completo' id='name' value='<?php if($modo == "json"){echo $usuario["nombre_completo"];}else {echo $usuario->getNombre_completo();}?>' maxlength="50" /><br/>
                    <span id='register_name_errorloc' class='error'><?php echo isset($errores["nombre_completo"])? $errores["nombre_completo"]:"";?></span> 
                </div>
                <div class='container'>
                    <label for='email' >Email</label><br/>
                    <input type='text' name='email' id='email' value='<?php if($modo == "json"){echo $usuario["email"];}else{echo $usuario->getEmail() ;}?>' maxlength="50" readonly /><br/>
                    <span id='register_email_errorloc' class='error'><?php echo isset($errores["email"])? $errores["email"]:"";?></span>
                </div>
                <div class='container'>
                    <label for='username' >Nombre de usuario*</label><br/>
                    <input type='text' name='usuario' id='username' value='<?php if($modo == "json"){echo $usuario["usuario"];}else{echo $usuario->getUsuario();} ?>' maxlength="50" /><br/>
                    <span id='register_username_errorloc' class='error'><?php echo isset($errores["usuario"])? $errores["usuario"]:"";?></span>
                </div>
                <div class='container' style='height:80px;'>
                    
                    <input type='hidden' name='password' id='password' maxlength="50" value='<?php if($modo == "json"){echo $usuario["password"];}else{echo $usuario->getPassword();} ?>'/>
                    
                </div>
                
                
                <div class='container' style='height:80px;'>
                    <p >Editar Imagen</p><br/>
                    <label for='imagen' >Subir Nueva Imagen</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <input type='file' name='imagen' id='imagen' size="20" />
                    <br>
                    <label for="preservar">Quiere preservar su foto?</label>
                    <input type="checkbox" name="preservar" id="preservar" value="value">
                    <br><br>
                    <div class='send'>
                       <input type='submit' value='Enviar' />
                    </div>
                    <div>
                        <br>
                        <a href="logout.php">Logout</a>
                        <br>
                        <a href="bienvenida.php">Volver sin cambiar nada</a>
                    </div>

                </div>

                

        </form>
</body>
</html>



