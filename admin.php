<?php 
    require_once 'datosMysql.php';
    require_once 'datosJson.php';

    
    
    if(isset($_FILES['json'])){
        $datosM = new DatosMysql();
        $json = $_FILES['json'];
    	$json2 = $datosM->cargarJson($json);
    	$datosM->migrarABaseDeDatos($json2);
	    
    }

    if(isset($_POST['eljson'])){
        $datosj = new DatosJson();
        $datosj->pasarAjson2();
    }

    if(isset($_POST['json'])){
        $datosJ = new DatosJson();
    	$nombre = $_POST['json'];
    	$datosJ->pasarAjson($nombre);
    }

    if (isset($_POST['info'])) {
       $modo = $_POST['info'];
       $archivo = "tipo.txt";
       file_put_contents($archivo,$modo);
    }
 	
    if (isset($_POST['admin'])) {
       $clave = $_POST['admin'];
       $db = new datosMysql();
       $db->crearBaseDatos($clave);
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
    <h1>Administración</h1>
    <br>
    <br>
    <h2>Migrar de Json a Base de Datos</h2>
    <form  method="post" enctype="multipart/form-data">
        Seleccione el archivo json para procesar:
        <input type="file" name="json" id="json">
        <input type="submit" value="subir json" name="submit">
    </form>
    <br><br>
    <h2>Migrar de Base de Datos a un Json</h2>
    <form  method="post" enctype="multipart/form-data">
        Ingrese el nombre del archivo json a crearse:
        <input type="text" name="json" id="json">
        <input type="submit" value="pasar a json" name="submit">
    </form>
    <br>
    <br>
    <h2>Migrar de Base de Datos a usuarios.json </h2>
    <form  method="post" enctype="multipart/form-data">
        <input type="checkbox" name="eljson" value="usuarios.json" checked>
        <input type="submit" value="subir a usuarios.json" name="submit">
    </form>
    <br><br>
    <h2>Almacenar la info en la Base de Datos o en  usuarios.json</h2>
    <form method="post">
        Seleccione el modo:
        <br>
        <input type="radio" name="info" value="mysql">Mysql
        <input type="radio" name="info" value="json">Json
        <input type="submit" value="Seleccionar" name="submit">
        <p>Modo actual: <?php echo file_get_contents("tipo.txt") ?></p>
    </form>
    <br><br>
    <h2>Crear Base de datos, con tabla y usuario admin</h2>
    <form method="post">
        ingrese el password del administrador:
        <input type="text" name="admin" id="admin">
        <input type="submit" value="Seleccionar" name="submit">
    </form>
    <br>
    <br>
    <div class="boton">
        <a href="index.php" class="btn">VOLVER</a>
    </div>
</body>
</html>



