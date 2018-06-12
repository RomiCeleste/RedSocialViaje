<?php
include_once "functions.php";


if(isset($_SESSION['login'])){
    header("Location:bienvenida.php");
}else{
    if ($_POST) {
       $errores = validarDatos($_POST);
       if(empty($errores)){
            $imagen = cargarFoto1($_FILES['imagen']);
            $usuario = crearUsuario($_POST,$imagen);
            //var_dump($usuario);
            guardarUsuario($usuario);
            // iniciamos sesión
            session_start();
            $_SESSION['login'] = $_POST['email'];   // comienza la sesión usuario, con el mail
            header("Location:bienvenida.php");
       }
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
    <title>Contact us</title>
</head>
<body>

    <div id='fg_membersite'>
        <form id='register' action="" method='post' enctype="multipart/form-data">
            <div>
                <h1>Registrate</h1>

                <div><span class='error'></span></div>
                <div class='container'>
                    <label for='name' >Nombre completo</label><br/>
                    <input type='text' name='nombre_completo' id='name' value='<?php include_once "php/formulario_value_nombre.php"; ?>' maxlength="50" /><br/>
                    <span id='register_name_errorloc' class='error'><?php echo isset($errores["nombre_completo"])? $errores["nombre_completo"]:"";?></span> 
                </div>
                <div class='container'>
                    <label for='email' >Email</label><br/>
                    <input type='text' name='email' id='email' value='<?php include_once "php/formulario_value_email.php"; ?>' maxlength="50" /><br/>
                    <span id='register_email_errorloc' class='error'><?php echo isset($errores["email"])? $errores["email"]:"";
                    ?></span>
                </div>
                <div class='container'>
                    <label for='username' >Nombre de usuario*</label><br/>
                    <input type='text' name='usuario' id='username' value='<?php include_once "php/formulario_value_usuario.php"; ?>' maxlength="50" /><br/>
                    <span id='register_username_errorloc' class='error'><?php echo isset($errores["usuario"])? $errores["usuario"]:"";?></span>
                </div>
                <div class='container' style='height:80px;'>
                    <label for='password' >Contaseña*</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <input type='password' name='password' id='password' maxlength="50" />
                    <div id='register_password_errorloc' class='error' style='clear:both'><?php echo isset($errores["password"])? $errores["password"]:"";?></div>
                </div>

                <div class='container' style='height:80px;'>
                    <label for='repassword' >Repetir Contaseña*</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <input type='password' name='repassword' id='repassword' maxlength="50" />
                    <div id='register_repassword_errorloc' class='error' style='clear:both'><?php echo isset($errores["repassword"])? $errores["repassword"]:"";?></div>
                </div>

                <div class='container' style='height:80px;'>
                    <label for='repassword' >Subir Imagen</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <input type='file' name='imagen' id='imagen' size="20" />
                </div>


                <div class='send'>
                    <input type='submit' name='Submit' value='Enviar' />
                </div>

                <a href="home.php" class="btn">VOLVER</a>

            </div>
        </form>

    </body>
</html>
