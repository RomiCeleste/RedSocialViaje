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
        </header>
        <main>
          <section class="content">
            <h2>No tendrás un viaje aburrido!!</h2>
            <p class="intro"> Red Social que permite comunicarse con otras personas con mismos intereses y  posibilidades de viajar a distintas ciudades del mundo.</p>
            <p>Completá tus datos y ponete en contacto con gente cerca tuyo que quieren ir a dónde vas vos.</p>
            <h3 class="conectate">Conectate al mundo</h3>
          </section>

          <section class="login registrado">
            <form class="" method="post" action="">
              <label for="inputEmail" >Usuario</label>
              <input type="text" id="inputEmail" name="email" placeholder="Usuario" pattern="[A-Za-z_-0-9]{1,20}"  value="<?php include_once 'php/formulario_value_login_email.php'; ?>">

              <label for="inputPassword" >Contraseña</label>
              <input type="password" id="inputPassword" name="password" placeholder="Contraseña" pattern="[A-Za-z_-0-9]{1,20}"  value="">

              <!-- <input type="checkbox" id="acordate" value="acordate" name="acordate" <?php //if (isset($_COOKIE['email'])) { ?> checked <?php} ?>> -->
              <label for="acordate">Recuérdame</label>
              <br>
              <span id='register_email_errorloc' class='error'><?php echo isset($errores["email"])? $errores["email"]:"";?></span>
              <br>
              <span id='register_email_errorloc' class='error'><?php echo isset($errores["password"])? $errores["password"]:"";?></span>
              <br>
              <br>

              <button type="submit" name="loguear" class="btn">Log In</button>

            </form>
           <br>
          <br>
          <div class="registrarse">
            <a href="formulario_registro.php" class="btn">Registrarse</a>
          </div>
          </section>
        </main>
      </section>
      <aside class="right">
      </aside>
    </div>
  </body>

</html>
