<?php 
require_once 'functions.php';
session_start();

if(!isset($_SESSION['login'])){
	header('Location:home.php');
	
}



if ($_POST) {
    
   
    //    $errores = validarDatos($_POST);
    //    if(empty($errores)){
            guardarDatosNuevos($_POST,$_FILES['imagen']);
            header('Location:bienvenida.php');
    //    }
    }

$usuario = retornaUsuario($_SESSION['login']);   // obtenemos todos los datos del usuario
echo "Podés cambiar tus datos: " . $usuario['nombre_completo'];
echo "<br>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form id='register' method='post' enctype="multipart/form-data">
            <div>
                <h1>Cambialos</h1>

                <div><span class='error'></span></div>
                <div class='container'>
                    <label for='name' >Nombre completo</label><br/>
                    <input type='text' name='nombre_completo' id='name' value='<?php echo $usuario["nombre_completo"];?>' maxlength="50" /><br/>
                    <span id='register_name_errorloc' class='error'><?php echo isset($errores["nombre_completo"])? $errores["nombre_completo"]:"";?></span> 
                </div>
                <div class='container'>
                    <label for='email' >Email</label><br/>
                    <input type='text' name='email' id='email' value='<?php echo $usuario["email"];?>' maxlength="50" readonly /><br/>
                    <span id='register_email_errorloc' class='error'><?php echo isset($errores["email"])? $errores["email"]:"";?></span>
                </div>
                <div class='container'>
                    <label for='username' >Nombre de usuario*</label><br/>
                    <input type='text' name='usuario' id='username' value='<?php echo $usuario["usuario"]; ?>' maxlength="50" /><br/>
                    <span id='register_username_errorloc' class='error'><?php echo isset($errores["usuario"])? $errores["usuario"]:"";?></span>
                </div>
                <div class='container' style='height:80px;'>
                    
                    <input type='hidden' name='password' id='password' maxlength="50" value='<?php echo $usuario["password"]; ?>'/>
                    
                </div>
                
                <label for='foto' >Editar Imagen</label><br/>
                <div class='container' style='height:80px;'>
                    <label for='imagen' >Subir Nueva Imagen</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <input type='file' name='imagen' id='imagen' size="20" />
                    <br>
                    <label for="preservar">Quiere preservar su foto?</label>
                    <input type="checkbox" name="preservar" id="preservar" value="value">

                </div>

                
                <div class='send'>
                    <input type='submit' value='Enviar' />
                </div>

                

            </div>
        </form>
</body>
</html>

<br>
<a href="logout.php">Logout</a>
<br>
<a href="bienvenida.php">Volver sin cambiar nada</a>

