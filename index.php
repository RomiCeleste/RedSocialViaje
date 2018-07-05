<?php 
require_once 'validacionMysql.php';
require_once 'validacionJson.php';
require_once 'datosMysql.php';
require_once 'datosJson.php';

  
  
  session_start();
  $modo = file_get_contents("tipo.txt");
  if($modo == "mysql"){
    
    $validacionM = new ValidacionMysql();
    $usuario = new DatosMysql();
    if ($_POST) {
      $errores = $validacionM->validarDatosLogin($_POST);
      if(empty($errores)){
        if(!empty($_POST['acordate'])){
          setcookie("email",$_POST['email'],time()+(10*365*24*60*60));
                    
        }else{
          if (isset($_COOKIE['email'])) {
             setcookie("email","");
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

  
  }else{
    $validacionJ = new ValidacionJson();
    $usuario = new DatosJson();
    if ($_POST) {
      $errores = $validacionJ->validarDatosLogin($_POST);
      $usuario = new DatosJson();
      if(empty($errores)){
        if(!empty($_POST['acordate'])){
          setcookie("email",$_POST['email'],time()+(10*365*24*60*60));
                    
        }else{
          if (isset($_COOKIE['email'])) {
             setcookie("email","");
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

  }

?>




 