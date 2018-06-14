<?php

// recibe los datos del formulario
// y los valida uno por uno
function validarDatos($datos){
  $errores = [];
  if ($datos["nombre_completo"]=="") {
   $errores["nombre_completo"]="Por favor ingrese su nombre";
  }
  if ($datos["email"]=="") {
    $errores["email"]="Por favor ingrese su email";
  }elseif (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
    $errores["email"]="Por favor ingrese un email valido";
  }elseif(mailRepetido($datos["email"])){
    $errores["email"] = "el email ya está en la base de datos, ingresá otro";
  }

  if ($datos["usuario"]=="") {
   $errores["usuario"]="Por favor ingrese su usuario";
  }
  if ($datos["password"]=="") {
    $errores["password"]= "Por favor ingrese una contraseña";
  }
  if ($datos ["repassword"]=="") {
    $errores["repassword"]= "Por favor reingrese su contraseña";
  }elseif ($datos["password"]!==$datos["repassword"]) {
    $errores["repassword"]="Las contraseñas no coinciden";
  }

  return $errores;

}


function validarDatosLogin($datos){
  $errores = [];
  if ($datos["email"]=="") {
    $errores["email"]="Por favor ingrese su email";
  }elseif (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
    $errores["email"]="Por favor ingrese un email valido";
  }

  if ($datos["password"]=="") {
    $errores["password"]= "Por favor ingrese una contraseña";
  }


  if (!comprobarLogin($datos['email'], $datos['password'])) {
      $errores["email"]="No corresponde el email del usario con la contraseña";# code...
  }  

  return $errores;

}





// creamos un array con los datos del usuario
// le pasamos el array post
function crearUsuario($datos,$imagen){
  return [
    "nombre_completo" => $datos["nombre_completo"],               
    "email" => $datos["email"],                  
    "usuario" => $datos ["usuario"],                                   
    "password" => password_hash($datos["password"],PASSWORD_DEFAULT),   
    "avatar" => $imagen
  ];
}


function retornaUsuario($email){
  $json = file_get_contents("usuarios.json");
  $array = json_decode($json,true);   
  foreach($array as $usuarios)
    {
        foreach($usuarios as $usuario)
        {
            if ($usuario['email'] == $email) {
                return $usuario;
                
            }
            
        }
    }
  
}



function cargarfoto1($original){


  if ($original["error"] === UPLOAD_ERR_OK) { //UPLOAD_ERR_OK es equivalente a 0

    $nombreViejo = $original["name"]; // Nombre original del archivo
    $extension = pathinfo($nombreViejo, PATHINFO_EXTENSION); // Extensión del archivo subido
    //var_dump($extension);
    $nombreNuevo = $original["tmp_name"]; // Nombre temporal en el servidor
    
    $archivoFinal = dirname(__FILE__); // Agarramos el archivo donde estamos parados ahora mismo
    $archivoFinal .= "/img/"; // .= nos permite concatenar, en este caso es lo mismo que poner 
    $nombreFinal = uniqid() . "." . $extension; // uniqid genera un ID "único" para la foto
    $archivoFinal .= $nombreFinal;

    
    move_uploaded_file($nombreNuevo, $archivoFinal); // copiamos el archivo a la ubicación final
    return  "img/" . $nombreFinal;  
  
  }else{
    return "img/avatar1.png" ; 
  }
    
}
    



function guardarUsuario($usuario){
  $user= json_encode($usuario);              // pasamos a json el array usuario 
  $json_content= file_get_contents("usuarios.json");  // descargamos el contenido del archivo json
  $array= json_decode($json_content,true);            // pasamos a array el contenido del archivo json
  $array["usuarios"][]= $usuario;                // le agregamos un registro al array de usuario
  $array= json_encode($array);                // lo pasamos a json
  file_put_contents("usuarios.json",$array);  // y los ponemos de nuevo en el archivo

}




function guardarDatosNuevos($datos, $imagen){
    $usuario_c = $datos;
   //$clave = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $imagen2 = cargarfoto1($imagen);

    $json_content= file_get_contents("usuarios.json");  // descargamos el contenido del archivo json
    $array= json_decode($json_content,true);            // pasamos a $array el contenido del archivo json


    if (isset($_POST['preservar'])){
       foreach($array as $usuarios)
       {
          foreach($usuarios as $clave => $usuario)
          {
              if ($usuario['email'] == $usuario_c['email']) {
                  
                  $imagen2 = $array['usuarios'][$clave]['avatar'];              
              }
          }
       }
     }


   unset($usuario_c['preservar']);  // borramos el campo preservar
   
   $usuario_c['avatar'] = $imagen2;  // añadimos campo avatar
   

   // recorremos el array de usuarios, reemplazamos el array
    foreach($array as $usuarios)
    {
       foreach($usuarios as $clave => $usuario)
       {
              if ($usuario['email'] == $usuario_c['email']) {
                  
                 $array['usuarios'][$clave] = $usuario_c;              
              }
        }
    }
     
     $array= json_encode($array);                // lo pasamos a json
     file_put_contents("usuarios.json",$array);  // y los ponemos de nuevo en el archivo

}




function mailRepetido($email)
{
  $bandera = 0;
  $json = file_get_contents("usuarios.json");
  $array = json_decode($json,true);   
  foreach($array as $usuarios)
    {
        foreach($usuarios as $usuario)
        {
            if ($usuario['email'] == $email) {
                $bandera = 1;
            }
            
        }
    }
  return $bandera;
}



function comprobarLogin($email, $password){
    $json = file_get_contents("usuarios.json");
    $array = json_decode($json,true);
    $bandera = 0;
    foreach ($array as $usuarios) {
        foreach ($usuarios as $usuario) {
            if($usuario['email'] == $email && password_verify($password,$usuario['password'])){
                $bandera = 1;
            }
        }
    }
    return $bandera;
}




function asignarId()
{
   if(isset($_COOKIE['id_usuario']))
  { 
    // Caduca en un año 
    setcookie('id_usuario', $_COOKIE['id_usuario'] + 1, time() + 365 * 24 * 60 * 60); 
     
  } 
  else 
  { 
    // Caduca en un año 
    setcookie('id_usuario', 1, time() + 365 * 24 * 60 * 60); 
    
  }

  return $_COOKIE['id_usuario'];  
}



 ?>


  