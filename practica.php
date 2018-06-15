<?php 

<div><label for="login">Username</label></div>
        <div><input name="member_name" type="text" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" class="input-field">
    </div>
    <div class="field-group">
        <div><label for="password">Password</label></div>
        <div><input name="member_password" type="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" class="input-field"> 
    </div>
    <div class="field-group">
        <div><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
        <label for="remember-me">Remember me</label>
    </div>




// $archivo_json = 'usuarios.json';
//         if(file_exists($archivo_json)){
//             echo "el archivo existe";
//         }
//         else{
//             echo "el archivo no existe";
//         }

//$usuario = crearUsuario($_POST);


// function crearUsuario($datos){
//   return [
//     "nombre_completo" => $datos["nombre_completo"],               
//     "email" => $datos["email"],                  
//     "usuario" => $datos ["usuario"],                                   
//     "password" => password_hash($datos["password"],PASSWORD_DEFAULT),   
//   ];

// }

// guardarUsuario($usuario);

// function guardarUsuario($usuario){
//   $user= json_encode($usuario);              // pasamos a json el array usuario 
//   $json_content= file_get_contents("usuarios6.json");  // descargamos el contenido del archivo json
//   $array= json_decode($json_content,true);            // pasamos a array el contenido del archivo json
//   $array["usuarios"][]= $usuario;                // le agregamos un registro al array de usuario
//   $array= json_encode($array);                // lo pasamos a json
//   file_put_contents("usuarios6.json",$array);  // y los ponemos de nuevo en el archivo

// }


// $usuario = $_POST;

// function guardarPrimerUsuario($usuario){
  
//   $usuarios = array("usuarios" => array(
//     array(
//       "nombre_completo" => $usuario['nombre_completo'],
//       "email" => $usuario['email'],
//       "usuario" => $usuario['usuario'],
//       "password" => password_hash($usuario['password'],PASSWORD_DEFAULT)
//     )
//   ));

//   $json_usuarios = json_encode($usuarios);
//   $json = 'usuarios4.json';
//   $handler = fopen($json, "w+");
//   fwrite($handler,$json_usuarios);
//   fclose($handler);
// }

// guardarPrimerUsuario($usuario);

// function validarDatos($datos){
//   $errores = [];
//   if ($datos["nombre_completo"]=="") {
//    $errores["nombre_completo"]="Por favor ingrese su nombre";
//   }
//   if ($datos["email"]=="") {
//     $errores["email"]="Por favor ingrese su email";
//   }elseif (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
//     $errores["email"]="Por favor ingrese un email valido";
//   }if ($datos["usuario"]=="") {
//    $errores["usuario"]="Por favor ingrese su usuario";
//   }
//   if ($datos["password"]=="") {
//     $errores["password"]= "Por favor ingrese una contraseña";
//   }
//   if ($datos ["repassword"]=="") {
//     $errores["repassword"]= "Por favor reingrese su contraseña";
//   }elseif ($datos["password"]!==$datos["repassword"]) {
//     $errores["repassword"]="Las contraseñas no coinciden";
//   }

//   return $errores;

// }

// $email = $_POST['email'];
// var_dump($email);
// echo "<br>";

// function revisarMails($email)
// {
//     $bandera = "no hay coincidencia";
//     $json = file_get_contents("usuarios.json");
//     $array = json_decode($json,true);
//     foreach ($array as $value) {

//         foreach ($value as $value2) {
//         echo($value2['email']) . "<br>";
//           if($value2['email'] == $email){

//             $bandera = "hay coincidencia";
          
//           }else{

//             $bandera = "no hay coincidencia";
//           }


//         }
       
//     }
//     return $bandera;
// }

// echo revisarMails($email);

echo "<br>";
// $json = file_get_contents("usuarios6.json");
// $array = json_decode($json,true);
// var_dump($array);
echo("<br>");


// ?>




<?php 
    
    // foreach($array as $usuarios)
    // {
    //     echo "emails de los usuairios: ";
    //     foreach($usuarios as $usuario)
    //     {
    //         echo $usuario['email'] . "<br>";
    //     }
    //     echo "<br>";
    // }


    // foreach($array as $usuarios)
    // {
    //     echo "emails de los usuairios: ";
    //     foreach($usuarios as $key => $usuario)
    //     {
    //         echo $usuario->email . "<br>";
    //     }
    //     echo "<br>";
    // }

// $email = "vde@cs.com";
// echo "<br><br>";
// echo mailRepetido($email);

// function mailRepetido($email)
// {
//   $bandera = 0;
//   $json = file_get_contents("usuarios6.json");
//   $array = json_decode($json,true);   
//   foreach($array as $usuarios)
//     {
//         foreach($usuarios as $usuario)
//         {
//             if ($usuario['email'] == $email) {
//                 $bandera = 1;
//             }
            
//         }
//     }
//   return $bandera;
// }
// $email = "vde@csd.com";
// $password = "123";

// echo comprobarLogin($email,$password);

// function comprobarLogin($email, $password){
//     $json = file_get_contents("usuarios6.json");
//     $array = json_decode($json,true);
//     $bandera = 0;
//     foreach ($array as $usuarios) {
//         foreach ($usuarios as $usuario) {
//             if($usuario['email'] == $email && password_verify($password,$usuario['password'])){
//                 $bandera = 1;
//             }
//         }
//     }
//     return $bandera;
// }

// include_once("functions.php");


//       // $errores = validarDatosLogin($_POST);
//       // if(empty($errores)){
//           if(comprobarLogin($_POST['email'], $_POST['password'])){
//               header("Location:bienvenida.php");
//               setcookie("email",$_POST['email'],time()+3600*300);
//           }else{
//               header("Locarition:home.php");
//           }
      
          ?>
 


<?php 
    
// if(isset($_COOKIE['id_user']) && isset($_COOKIE['marca'])){
//     if($_COOKIE['id_user']!="" || $_COOKIE['marca']!=""){
//         $sql_c = mysql_query("SELECT * FROM users 
//                     WHERE id_user='".$_COOKIE["id_user"]."' 
//                     AND cookie='".$_COOKIE["marca"]."'
//                     AND cookie<>'';");
//     }
//     if(mysql_num_rows($sql_c)){
//         $row_c = mysql_fetch_array($sql_c);
//         echo "El usuario ".$row_c['username']." se ha identificado correctamente.";
//         $user_cookie = mysql_fetch_array($sql_c);
//     }
// }


    //
    // if($imagen['name'] == ""){
    //     $nombre = $carpeta_imagen . "avatar.png";
    // }else{
    //     cargarImagen($imagen);
    // }
            
   
  //   $usuario_c = $_POST;

  //   $imagen = cargarImagen1($_FILES);
    
  //           // iniciamos sesión
            
 include 'functions.php';

// include_once 'bienvenida.php';


$json_content= file_get_contents("usuarios.json");  // descargamos el contenido del archivo json
  $array= json_decode($json_content,true);            // pasamos a array el contenido del archivo json

$usuario_c = $_POST;

$imagen = cargarfoto1($_FILES['imagen']);


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
// var_dump($imagen);
// echo("<br>");
// var_dump($imagen2);


 var_dump($usuario_c);
 unset($usuario_c['preservar']);
echo("<br>");
 var_dump($usuario_c);
 //array_chunk(input, size) 
 //array_slice() 
 exit(); 


 $usuario_c['avatar'] = $imagen;  // añadimos campo avatar
 //$usuario_c['password'] = $clave;  // sobreescribimos campo clave, porque no estará hasheado


  
  
  
  foreach($array as $usuarios)
    {
        
        foreach($usuarios as $clave => $usuario)

        {
            if ($usuario['email'] == $usuario_c['email']) {
                
               $array['usuarios'][$clave] = $usuario_c;              
            }
            
        }
    }


   
   // $array= json_encode($array);                // lo pasamos a json
   // file_put_contents("usuarios.json",$array);  // y los ponemos de nuevo en el archivo



    // function cargarImagen($imagen){
    //     $nombre_imagen = $imagen['imagen']['name'];
        
    //     $carpeta_imagen = "img/";
        
    //     if($nombre_imagen){
    //        // guardamos la ruta de la carpeta destino de la imagen
    //        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . "/digitalhouse/RedSocialViaje2/img/";
    //        // copiamos la imagen desde la carpeta temporal del servidor a la carpeta elegida
    //        move_uploaded_file($imagen['imagen']['tmp_name'],$carpeta_destino . $nombre_imagen);
    //        return $carpeta_imagen . $nombre_imagen;
    //     }else{
            
    //        return $carpeta_imagen . "avatar1.png";
    //     }
        
    // }

    
        
//     $datos = $_POST;
// foreach ($datos as $key => $value) {
//     echo $key . "..." . $value;
//     echo("<br>");
    


// echo cargarImagen($imagen);

//$foto = $_FILES;
// if(!$foto){
//     echo("es nulo");
// }


?>
<!-- <!DOCTYPE html>
 <html>
 <head>
     <title></title>
 </head>
 <body>
    <img src="<?php //echo cargarImagen($imagen); ?>" alt="">
    
 </body>
 </html> -->

<?php 

// function cargarfoto1{
    // if ($_POST) {
          
    //       $original = $_FILES["foto_perfil"];

    //       if ($original["error"] === UPLOAD_ERR_OK) { //UPLOAD_ERR_OK es equivalente a 0
    //         $nombreViejo = $original["name"]; // Nombre original del archivo
    //         $extension = pathinfo($nombreViejo, PATHINFO_EXTENSION); // Extensión del archivo subido

    //         $nombreNuevo = $original["tmp_name"]; // Nombre temporal en el servidor

    //         $archivoFinal = dirname(__FILE__); // Agarramos el archivo donde estamos parados ahora mismo
    //         $archivoFinal .= "/img/"; // .= nos permite concatenar, en este caso es lo mismo que poner $archivoFinal = $archivoFinal . "/img/"
    //         $archivoFinal .= uniqid() . "." . $extension; // uniqid genera un ID "único" para la foto

    //         var_dump($nombreNuevo, $archivoFinal);exit;

    //         move_uploaded_file($nombreNuevo, $archivoFinal); // movemos el archivo a la ubicación final
    //       }
        
    // }


 ?>


    



 