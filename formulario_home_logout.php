<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Group Trip</title>
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="container">
      <section class="left">
        <header>
          <div class="header-class">
            <h1><img src="img/avion1-50.jpg"><a href="home.php">Group Trip</a></h1>
          </div>
          <?php require_once('nav.php'); ?>
          <?php if($modo == "json"){$array = $usuario->retornaUsuario($_SESSION['login']);}
                if ($modo == "mysql"){$usu = $usuario->retornaUsuario($_SESSION['login']);} ?>
          

        </header>
        <main>
          <section class="content">
            <h2>No tendrás un viaje aburrido!!  <?php if($modo == "json"){echo $array['nombre_completo'];}else {echo $usu->getNombre_completo();} ?></h2>
            <p class="intro"> Red Social que permite comunicarse con otras personas con mismos intereses y  posibilidades de viajar a distintas ciudades del mundo.</p>
            <p>Completá tus datos y ponete en contacto con gente cerca tuyo que quieren ir a dónde vas vos.</p>
            <h3 class="conectate">Conectate al mundo</h3>
          </section>

          <section class="login registrado">
            
              <a href='logout.php'>Logout</a>
              <br>
              
              <a href="bienvenida.php">Volver a tu página personal </a>
  
            
          </section>
        </main>
      </section>
      <aside class="right">
      </aside>
    </div>
  </body>

</html>
