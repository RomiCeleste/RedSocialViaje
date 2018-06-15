<?php 
  include_once("functions.php");
  
 session_start();
    
  if ($_POST) {

      $errores = validarDatosLogin($_POST);
      if(empty($errores)){
        if(!empty($_POST['acordate'])){
          setcookie("email",$_POST['email'],time()+(10*365*24*60*60));
          setcookie("password",$_POST['password'],time()+(10*365*24*60*60));
        }else{
          if (isset($_COOKIE['email'])) {
             setcookie("email","");
          }
          if (isset($_COOKIE['password'])) {
             setcookie("password","");
          }
        }
        
        $_SESSION['login'] = $_POST['email'];
        header("Location:bienvenida.php");
      }else{
        include_once("formulario_home_registro_login.php");  
      }

  }else{
    if (isset($_SESSION['login'])) {
      include_once("formulario_home_logout.php");
    }
    else{
      include_once("formulario_home_registro_login.php");  
    }
  }

  
  
?>



 